<?php

namespace App\Http\Controllers\Config;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Master;
use App\Models\Wp\WpModel;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;

class ConfigController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->wpModel     = new WpModel();

    }

    public function getLv3List(Request $request, $id_lv2)
    {   
        if ($id_lv2 == 6100){
            $result = '[{"UL_CODE":610000,"UNIT_NAME":"SEMUA UNIT LV 3"}]';
        } else {
            $result  = $this->wpModel->getUnit_l3($id_lv2);
            //$result .= '[{"UL_CODE":610000,"UNIT_NAME":"SEMUA UNIT LV 3"}]';
        }
        //return json_encode($result);
        return $result;
    }

    
}
