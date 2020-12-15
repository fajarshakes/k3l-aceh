<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Helpers\ActivityLog;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SSOController extends Controller
{
    public function redirect()
    {
        // $user_check = User::where('username', 'auzan.muhammad')->first();
        // auth()->login($user_check, true);
        // return;
        $client_id = config('sso.client_id');
        $redirect_uri = config('sso.redirect_uri');
        $iam_url = 'https://iam.pln.co.id/svc-core/oauth2/auth?response_type=code&client_id='.$client_id.'&redirect_uri='.$redirect_uri.'&scope=openid email profile empinfo phone address';

        return redirect($iam_url);
    }

    public function handle(Request $request)
    {      
        if (!$request->code) {
            return redirect()->route('auth.login.index')
                    ->withErrors('You did not share your profile data with our app.');
        }

        // Get access token
        $client_id = config('sso.client_id');
        $client_secret = config('sso.client_secret');
        $redirect_uri = config('sso.redirect_uri');

        $url_access_token = 'https://iam.pln.co.id/svc-core/oauth2/token';
        $url_get_user = 'https://iam.pln.co.id/svc-core/oauth2/me';
        try {
            $http = new \GuzzleHttp\Client([
                'headers' => [
                    'Authorization' => 'Basic '.base64_encode($client_id.':'.$client_secret)
                ],
                'verify' => false
            ]);
            $response = $http->post($url_access_token, [
                'form_params' => [
                    'grant_type'    => 'authorization_code',
                    'client_id'     => $client_id,
                    'client_secret' => $client_secret,
                    'redirect_uri'  => $redirect_uri,
                    'code'          => $request->code,
                ],
            ]);

            // Explode response access token
            $data = (array)json_decode((string)$response->getBody(), true);
            $access_token = $data['access_token'];
            $id_token = $data['id_token'];
            session(['sso_id_token' => $id_token]);

            $http = new \GuzzleHttp\Client([
                'headers' => [
                    'Authorization' => 'Bearer '.$access_token
                ],
                'verify' => false
            ]);
            $response = $http->get($url_get_user);
            $data = json_decode((string)$response->getBody(), true);
            $user_sso = collect($data);

            // Check user in database
            if(isset($user_sso['https://iam.pln.co.id/svc-core/account/hrinfo'])) {
                $user_sso_hr = $user_sso['https://iam.pln.co.id/svc-core/account/hrinfo'];
                $user_check = User::where('nip', $user_sso_hr['nip'])->first();
            } else {
                $user_check = User::where('username', strtolower($user_sso['sub']))->first();
            }
            
            $user = new User;
            if($user_check) {
                // Existing user
                $user = $user_check;      
            } else {
                // New user
                $user->status = 'ACTV';
            }

            $user->fullname = ucwords(ltrim($user_sso['name']));
            $user->username = strtolower($user_sso['sub']);
            $user->email = strtolower($user_sso['email']);
            $user->password = bcrypt(str_random(16));
            $user->remember_token = str_random(100);
            $user->is_sso = true;
            $user->is_active_directory  = true;

            if(isset($user_sso['https://iam.pln.co.id/svc-core/account/hrinfo'])) {
                // SSO Attributes
                $user_sso_hr = $user_sso['https://iam.pln.co.id/svc-core/account/hrinfo'];
                $user->fullname = strtoupper($user_sso_hr['registeredName']);
                $user->nip = $user_sso_hr['nip'] ?? null;
                $user->phonenumber = $user_sso_hr['phone'] ?? null;
                $user->title = strtoupper($user_sso_hr['posisi']['name']) ?? null;
                $user->company = strtoupper($user_sso_hr['personnelSubArea']['name']) ?? null;
                $user->department = strtoupper($user_sso_hr['organisasi']['name']) ?? null;
                $user->company_code = $user_sso_hr['companyCode']['id'] ?? null;
                $user->business_area = $user_sso_hr['businessArea']['id'] ?? null;
                $user->personnel_area = $user_sso_hr['personnelArea']['id'] ?? null;
                $user->personnel_sub_area = $user_sso_hr['personnelSubArea']['id'] ?? null;
                $user->grade = $user_sso_hr['grade'] ?? null;
                $user->officer_nip = isset($user_sso_hr['officer']) ? explode(' - ', $user_sso_hr['officer'])[0] : null;
                $user->pernr = $user_sso_hr['pernr'] ?? null;
                $user->organization_code = $user_sso_hr['organisasi']['id'] ?? null;
                $user->job_level = $user_sso_hr['jenisJabatan']['id'] ?? null;
                $user->job_sub_level = $user_sso_hr['jenisJabatan']['id'] ?? null;
                $user->position_code = $user_sso_hr['posisi']['id'] ?? null;
                $user->is_external = false;
            } else {
                // Not detected as employee
                $message = 'Maaf, username '.strtolower($user_sso['sub']).' terdeteksi sebagai akun non pegawai. Silahkan menghubungi admin.';
                return redirect()->route('auth.login.index')->withErrors($message);
            }
            $user->disableLogging();
            $user->save();

            // Assign role
            if(!count($user->getRoleNames())) {
                // Add guest role
                $user->assignRole('pegawai');
            }

            // Check if user in active
            if($user->status != 'ACTV') {
                $message = 'Maaf, user anda sedang tidak aktif. Mohon menunggu untuk diverifikasi atau segera menghubungi admin.';
                return redirect()->route('auth.login.index')->withErrors($message);
            }

            // Check if user in active date
            if(!$user->in_active_date) {
                $message = 'Maaf, user anda dalam masa non aktif. Silahkan hubungi admin untuk perpanjang waktu.';
                return redirect()->route('auth.login.index')->withErrors($message);
            }

            // Check unit
            // if(!$user->organizationUnit) {
            //     $message = 'Maaf, unit organisasi ('.$user->organization_code.') - '.$user->department.' tidak ditemukan. Silahkan menghubungi admin.';
            //     return redirect()->route('auth.login.index')->withErrors($message);
            // }

            // if(!$user->personnelArea) {
            //     $message = 'Maaf, personnel area ('.$user->personnel_area.') - '.$user->company.' tidak ditemukan. Silahkan menghubungi admin.';
            //     return redirect()->route('auth.login.index')->withErrors($message);
            // }

            // if(!$user->personnelSubArea) {
            //     $message = 'Maaf, personnel sub area ('.$user->personnel_sub_area.') - '.$user->company.' tidak ditemukan. Silahkan menghubungi admin.';
            //     return redirect()->route('auth.login.index')->withErrors($message);
            // }

            // Auth login
            auth()->login($user, true);

            // Check if auth correct
            if(auth()->check()) {
                // User last login at
                auth()->user()->last_login_at = Carbon::now();
                auth()->user()->last_login_ip = request()->ip();
                auth()->user()->disableLogging();
                auth()->user()->save();            

                ActivityLog::login();
                return redirect()->intended(route('backend.dashboard.index'));
            };
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            ActivityLog::sentry($e);
            return redirect()->route('auth.login.index')
                    ->withErrors('Errors when redirect to IAM PLN.');
        } catch (Illuminate\Database\QueryException $e){
            ActivityLog::sentry($e);
            return redirect()->route('auth.login.index')
                    ->withErrors($e->getMessage());
        } catch (\Exception $e) {
            ActivityLog::sentry($e);
            return redirect()->route('auth.login.index')
                    ->withErrors($e->getMessage());
        }
    }

    public function logout()
    {
        if(session('sso_id_token')) {
            $logout_url = config('sso.logout_uri');
            $id_token = session('sso_id_token');
            $iam_logout_url = 'https://iam.pln.co.id/svc-core/oauth2/session/end?post_logout_redirect_uri='.$logout_url.'&id_token_hint='.$id_token;
            
            return redirect($iam_logout_url);
        }
        return route('auth.logout');
    }
}