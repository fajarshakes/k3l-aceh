<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\Menu;
use App\Models\Sales\Sales;
use App\Models\Sales\Salesitem;
use App\Models\Config\Config;
use App\Models\Master\MenuCategory;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;


class SalesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->sales     = new Sales();
    }
    
    public function index(Request $request)
    {
        $sales     = new Sales();
        $status    = 4;
        $period    = $sales->checkPeriod(Auth::user()->unit)->date_open ?? 0;
        $activeodr = $sales->getActiveOrder($period, Auth::user()->unit, $status);
        $data = [
            'log_transaksi' => $checkPeriod = $this->sales->checkPeriod(Auth::user()->unit) ?? 0,
            'active_orders' => $activeodr,
        ];
        return view('sales/index', $data);
    }

    public function closed(Request $request)
    {
        $sales = new Sales();
        $period = $sales->checkPeriod(Auth::user()->unit)->date_open;
        $closedodr = $sales->getClosedOrder($period, Auth::user()->unit);
        $data = [
            'log_transaksi' => $checkPeriod = $this->sales->checkPeriod(Auth::user()->unit),
            'closed_orders' => $closedodr,
        ];
        //return response()->json([$paymentMethod]);
        return view('sales/closed', $data);

    }

    public function p_period(Request $request)
    {
        $checkPeriod = $this->sales->checkPeriod(Auth::user()->unit);
        if ($checkPeriod){
            
            return response()->json(['gagal' => 'Period already exist.']);

        } else {
            $store = DB::table('transaction')->insert([
                //$form_data = array(
                    'unit'         => Auth::user()->unit,
                    'status'       => '00',
                    'user_open'    => Auth::user()->username,
                    'date_open'    => date('Y-m-d'),
                    'ip_open'      => \Request::getClientIp(true),
                    'time_open'    => date('H:i:s'),
                    'cash_inhand'  => str_replace(",", "", $request->cashinhand),
                ]);
                return response()->json(['success' => 'Data Insert successfully.']);
        }
    }
    
    public function p_opentable(Request $request)
    {
        $sales = new Sales();
        $period = $sales->checkPeriod(Auth::user()->unit)->date_open;
        $GetId = $this->sales->getMaxTempId(Auth::user()->unit);
        $store = DB::table('orders_temp')->insert([
            //$form_data = array(
                'unit'         => Auth::user()->unit,
                'temp_id'      => $GetId,
                'order_type'   => '1',
                'order_type_desc'   => 'EAT IN',
                'status'       => 'OPEN',
                'table_no'     => $request->table_no,
                'post_by'      => Auth::user()->username,
                'datetime'     => date('Y-m-d H:i:s'),
                'period_date'  => $period,
            ]);
        
        return response()->json(['success' => 'Data Insert successfully.',
                                 'temp_id' => $GetId]);
    }

    public function p_takeaway(Request $request)
    {
        $sales = new Sales();
        $period = $sales->checkPeriod(Auth::user()->unit)->date_open;
        $GetId = $this->sales->getMaxTempId(Auth::user()->unit);
        $store = DB::table('orders_temp')->insert([
            //$form_data = array(
                'unit'        => Auth::user()->unit,
                'temp_id'     => $GetId,
                'order_type'  => '2',
                'order_type_desc'   => 'TAKE AWAY',
                'status'      => 'OPEN',
                //'table_no'     => $request->table_no,
                'name'        => $request->name,
                'phone'       => $request->phone,
                'post_by'     => Auth::user()->username,
                'datetime'    => date('Y-m-d H:i:s'),
                'period_date'  => $period,
            ]);
        
        return response()->json(['success' => 'Data Insert successfully.',
                                 'temp_id' => $GetId]);
    }

    public function test(Request $request)
    {
        $sales = new Sales();
        $menu = new Menu();
        $pathid = '100200004';
        $period = $sales->checkPeriod(Auth::user()->unit)->date_open;
        $ordersid   = $sales->CheckTempId($pathid)->orders_id;

        $mnuuuu = $menu->getMenuActive_x(Auth::user()->unit);
        $method = $sales->getConfigUnit(Auth::user()->unit)->payment_method;
        $paymentMethod = $sales->getPaymentMethod($method);
        $activeodr = $sales->getActiveOrder($period, Auth::user()->unit, '4');

        //$paymentMethod = Auth::user()->unit;

        return response()->json([$ordersid]);
    }
    
    public function opentable(Request $request, $temp_id)
    {
    $menu = new Menu();
    $sales = new Sales();

    $method = $sales->getConfigUnit(Auth::user()->unit)->payment_method;
     //$paymentMethod = $sales->getPaymentMethod($method);

     //$menuCategory = MenuCategory::orderBy('cat_cd', 'asc')->get();
     //$menuActive = Menu::with('cat_cd')->orderBy('menu_name', 'asc')->get();
    $sql    = "SELECT
                *
                FROM
                    menu_category
                WHERE
                cat_status = 1
                ";

    $v      = DB::select($sql);

        
    $data = [
        //'menuCategory'    => $menuCat->getCatForMenu(),
        'menuActive'      => $menu->getMenuActive_x(Auth::user()->unit),
        'paymentMethod'   => $sales->getPaymentMethod($method),
        'tempStatus'      => $sales->CheckTempId($temp_id),
        'group'           => $v,
     ];

     return view('sales/form_opentable', $data); 
    }

    public function addpdc(Request $request)
    {   
        $salesitem      = new Salesitem();
        $sales      = new Sales();
        
        $status     = 0;
        $unit       = Auth::user()->unit;
        $menu_id    = $request->product_id;
        $temp_id    = $request->temp_id;

        //$product = Product::find($this->input->post('product_id'));
        //$PostPrice = $request->name,
        //$Number = $this->input->post('number');
        //$price = !$product->taxmethod || $product->taxmethod == '0' ? floatval($PostPrice) : floatval($PostPrice)*(1 + $product->tax / 100);
      /******************************************* sock version *************************************************************/
        /*
        $store_order = DB::table('orders')->insert([
        //$form_data = array(
            'orders_id'         => Auth::user()->unit,
            'unit'              => Auth::user()->unit,
            'cust_id'           => '1',
            'cust_name'         => 'Fachrul', //str_replace(".", "", $request->price),
            'total_qt'          => '',
            'total_price'       => '',
            'status'            => '',
        ]);
        */

        $CheckTempId = $this->sales->CheckTempId($temp_id)->orders_id;
        $table_no = $this->sales->CheckTempId($temp_id)->table_no;
        $checkorder = $salesitem->findOrdersItem($unit, $menu_id, $status, $CheckTempId);
        $GetId = $this->sales->getMaxTempId(Auth::user()->unit);
        $period    = $sales->checkPeriod(Auth::user()->unit)->date_open;

        
        //check menu already orders
        if ($checkorder) {
            $new_qt = $checkorder->qt + 1;
            $update_qt = DB::table('orders_item')
                ->where('id', $checkorder->id)
                ->update(['qt' => $new_qt]);
            
            return response()->json(['success' => 'Data Added successfully.']);
        } else if (empty($CheckTempId)){

        $store_item = DB::table('orders_item')->insert([
            //$form_data = array(
                'orders_id'         => $GetId,
                'unit'              => Auth::user()->unit,
                'cat_code'          => $request->category,
                'menu_id'           => $request->product_id,
                'menu_name'         => $request->name,
                'price'             => str_replace(".", "", $request->price),
                'qt'                => 1,
                'status'            => 1,
                'table_no'          => $table_no,
                'post_by'           => Auth::user()->username,
                'period_date'       => $period,
                'date'              => date('Y-m-d'),
                'time'              => date('H:i:s'),
                'add_desc'          => ''
            ]);
    
        $id = DB::getPdo()->lastInsertId();;
        
        $store_log = DB::table('orders_log')->insertGetId([
                //$form_data = array(
                'oi_id'             => $id,
                'orders_id'         => $GetId,
                'menu_id'           => $request->product_id,
                'menu_name'         => $request->name,
                'date'              => date('Y-m-d'),
                'time_input'        => date('H:i:s'),
            ]);
        
        $update_temp = DB::table('orders_temp')
            ->where('temp_id', $temp_id)
            ->update(['orders_id' => $GetId,
                      'status'    => 'LOCKED'
                      ]);

        return response()->json(['success' => 'Data Added successfully.']);
        } else if (!empty($CheckTempId)){

            $store_item = DB::table('orders_item')->insert([
                //$form_data = array(
                    'orders_id'         => $GetId,
                    'unit'              => Auth::user()->unit,
                    'cat_code'          => $request->category,
                    'menu_id'           => $request->product_id,
                    'menu_name'         => $request->name,
                    'price'             => str_replace(".", "", $request->price),
                    'qt'                => 1,
                    'status'            => 1,
                    'table_no'          => $table_no,
                    'post_by'           => Auth::user()->username,
                    'period_date'       => $period,
                    'date'              => date('Y-m-d'),
                    'time'              => date('H:i:s'),
                    'add_desc'          => ''
                ]);
            
            $id = DB::getPdo()->lastInsertId();;
        
            $store_log = DB::table('orders_log')->insertGetId([
                    //$form_data = array(
                    'oi_id'             => $id,     
                    'orders_id'         => $GetId,
                    'menu_id'           => $request->product_id,
                    'menu_name'         => $request->name,
                    'date'              => date('Y-m-d'),
                    'time_input'        => date('H:i:s'),
                ]);
    
            return response()->json(['success' => 'Data Added successfully.']);
            }
        
    }

    public function edit_sales(Request $request, $id)
    {
        $salesitem      = new Salesitem();
        $checkorder     = $salesitem->findById($id);

        $update_qt = DB::table('orders_item')
                ->where('id', $checkorder->id)
                ->update(['qt' => $request->qt]);

        return response()->json(['success' => 'Data Deleted successfully.']);
    }
    
    public function delete_order(Request $request)
    {
        $sales          = new Sales();
        $salesitem      = new Salesitem();

        $pathid     = $request->tempid;
        $ordersid   = $sales->CheckTempId($pathid)->orders_id;

        $del_orders_temp    = $sales->del_orders_temp($pathid);
        $update1 = DB::table('orders_item')
                    ->where('orders_id', $ordersid)
                    ->update([
                        'status'    => '5',
                        'status_desc'    => $request->reason,
                    ]);
                    
        return response()->json(['success' => 'Data Deleted successfully.']);
    }
    
    public function delete_sales($id)
    {
        $salesitem      = new Salesitem();
        
        $guru = $salesitem->deleteByid($id);
        return response()->json(['success' => 'Data Deleted successfully.']);
    }

    public function load_sales(Request $request, $temp_id)
    {
        $sales = new Sales();
        $order_status   = 0;
        $unit           = Auth::user()->unit;
        $orders_item    = $sales->getAll($unit, $order_status, $temp_id);

        $data = '';
        if ($orders_item) {
            foreach ($orders_item as $items) {
                $row = '
                <tr>
                        <td class="c1">
                            <a type="button" href="javascript:void(0)" onclick="delete_posale(' . "'" . $items->id . "'" . ')" class="btn btn-icon btn-pure secondary mr-1 text-white p-2 productD"><i class="la la-trash"></i></a>
                        </td>

                        <td class="c2">
                            <h6 class="text-white">' . $items->menu_name . '</h6>
                            <h6 class="text-white">IDR. ' . $items->price . '</h6>
                        </td>
                        
                        <td class="c4">
                            <div class="input-group input-group-sm productNum">
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm decbutton"><i class="ft-minus"></i></a>
                            <input type="text" id="qt-' . $items->id . '" onchange="edit_posale(' . $items->id . ')" class="form-control input-md" value="' . $items->qt . '" data-bts-min="1" data-bts-max="2" />
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm incbutton"><i class="ft-plus"></i></a>
                            </div>
                        </td>
                        
                        <td class="c0">
                        <a type="button" name="add_comment" id="'.$items->id.'" class="add_comment btn btn-icon btn-pure secondary mr-1 text-white p-2"><i class="ft-message-circle"></i></a>
                        </td>

                        <td class="c3">
                            <div class="media-right p-2 media-middle"><h6 class="text-white">' . number_format((float)$items->price*$items->qt) . '</h6></div>
                        </td>
                      </tr>';
                $data .= $row;
            }
            $data .= '<script type="text/javascript">$(".incbutton").on("click", function() {var $button = $(this);var oldValue = $button.parent().parent().find("input").val();var newVal = parseFloat(oldValue) + 1;$button.parent().parent().find("input").val(newVal);edit_posale($button.parent().parent().find("input").attr("id").slice(3));});$(".decbutton").on("click", function() {var $button = $(this);var oldValue = $button.parent().parent().find("input").val();if (oldValue > 0) {var newVal = parseFloat(oldValue) - 1;} else {newVal = 1;}$button.parent().parent().find("input").val(newVal);edit_posale($button.parent().parent().find("input").attr("id").slice(3));});</script>';

         } else {
                $data = 'nodata';
            }
            return $data;
    }

    public function get_det_menu()
    {
        $id = $_GET['id'];
        $data = DB::table('orders_item')
        ->where('id','=',$id)
        ->get();
        return response()->json(['data' => $data]);
    }

    public function desc_store(Request $request)
    {
        $store = DB::table('orders_item')
        ->where('id', $request->id)
        ->update([
            'add_desc'         => $request->description
        ]);
        return response()->json(['success' => 'Data Added successfully.']);
    }

    
    public function tokitchen_store(Request $request)
    {
        $get_data       = $request->menu_id; 
        //$data           = json_decode($get_data, true);
        
        
        foreach($get_data as $row){          
            //$kontrakDikontrak = $rowTerkontrak[$row->id]->terkontrak ?? 0)
            $temp_id        = $request->path_id;
            $status    = $this->sales->CheckStatusOrder($temp_id, $row)->status;
            if ($status != 2){
            $update1 = DB::table('orders_item')
                    ->where('id', $row)
                    ->update([
                        'status'    => '2',
                    ]);
                    
            $update2 = DB::table('orders_log')
                    ->where('oi_id', $row)
                    ->update([
                        'time_submit'    => date('H:i:s'),
                    ]);
            //$data   = json_encode($row, true);
            }
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }
    
    
    public function order_datatables(Request $request, $temp_id)
    {
        //if(request()->ajax())
        //{
            $sql = "SELECT
                        oi.* 
                    FROM
                        orders_item oi
                        INNER JOIN orders_temp ot ON ot.orders_id = oi.orders_id
                        where ot.temp_id = '$temp_id'";
            $v = DB::select($sql);
            
            return Datatables::of($v)
            
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="la la-pencil-square"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="la la-trash-o"></i> Delete</button>';
                        return $button;
                    })
            ->rawColumns(['action'])
            ->make(true);
        //}
        //return view('master_data/menu_index', ['menu' => $menu]);
    }

    public function list_order(Request $request, $temp_id)
    {
        //$this->has_login();
        
        $data = $request->description;
        $data = $request->data;
        //$data = $this->input->post('data');
        //$posales = Posale::find('all', array('conditions' => array('number = ?', $id)));

        $sql = "SELECT
                    oi.* 
                FROM
                    orders_item oi
                    INNER JOIN orders_temp ot ON ot.orders_id = oi.orders_id
                    WHERE ot.temp_id = '$temp_id'";
        $v = DB::select($sql);


        $no=1;
        foreach ($v as $value) {
          $pesanan_new = !empty($data['qt-'.$value->id])?$data['qt-'.$value->id]:0;
          $pesanan_old = $value->qt;
          $total = $pesanan_old;
          //$total = $pesanan_new - $pesanan_old;
          //if($total)

          $status  = $value->status;
          if ($status == 1){
            $lbl_status = '<span class="badge badge-danger mr-1">Order</span> <i class="font-medium-1 ft-check-circle blue-grey lighten-3"></i></span>';
          } else if ($status == 2){
            $lbl_status = '<span class="badge badge-info mr-1">Cooking</span> <i class="font-medium-1 ft-aperture blue-grey lighten-3"></i></span>';
          } else if ($status == 3){
            $lbl_status = '<span class="badge badge-success mr-1">Serving</span> <i class="font-medium-1 ft-bell blue-grey lighten-3"></i></span>';
          }

          if($total)
          echo '<tr>
                  <td style="text-align:center; width:30px;">'.$no++.'</td>
                  <td style="text-align:left; width:180px;"><input type="hidden" name="menu_id[]" value="'.$value->id.'">'.($total<0?'[Cancel] ':'').$value->menu_name.'</td>
                  <td style="text-align:right; width:50px;">'.$total.'</td>
                  <td style="text-align:left; width:50px;">'.$value->add_desc.'</td>
                  <td style="text-align:center; width:50px;">'.$lbl_status.'</td>
                </tr>';
        }

        //echo json_encode($d);
    } 

    public function active_table(Request $request)
    {
        $sales = new Sales();
        $status    = 4;
        $period    = $sales->checkPeriod(Auth::user()->unit)->date_open;
        $activeodr = $sales->getActiveOrder($period, Auth::user()->unit, $status);

        $no=1;
        foreach ($activeodr as $row) {
        if ($row->order_type == 1){
            $outline    = 'cyan';
        } else if ($row->order_type == 2){
            $outline    = 'red';
        } else {
            $outline    = 'green';
        }
          echo '
          <input type="radio" id="changeTblBtn" name="changeTblBtn" class="input-hidden" value="'. $row->table_no. '" />
          <button value="'. $row->table_no. '" type="button" class="btn btn-float btn-outline-'. $outline .'" ><i class="la la-slack"></i>
              <span>No : '. $row->table_no. '</span>
          </button>';
        }

        //echo json_encode($d);
    } 

    public function add_payment(Request $request)
    {
        //date_default_timezone_set($this->setting->timezone);
        $date = date("Y-m-d H:i:s");
        $pay_type   = $request->type;
        //$_POST['created_at'] = $date;
        //$_POST['register_id'] = $this->register;
        //$register = Register::find($this->register);
        //$store = Store::find($register->store_id);
		
        /*
        $hold = Hold::find('all', array(
			  'conditions' => array(
				  'number = ? and register_id = ?',
				  $number_,
				  $this->register
			  )
		));
		
		if(!$hold){
			echo '<div class="col-md-12">
					<div class="text-center"><h4 class="text-center">Meja tidak tersedia atau sudah dilakukan Payment</h4></div>
				</div>';
			die();
		}
        */
        $type = '1111';
        //CC ----------------------------------------------------------
        if ($type == 0) {
            try {
                Stripe::setApiKey($this->setting->stripe_secret_key);
                $myCard = array(
                    'number' => $this->input->post('ccnum'),
                    'exp_month' => $this->input->post('ccmonth'),
                    'exp_year' => $this->input->post('ccyear'),
                    "cvc" => $this->input->post('ccv')
                );
                $charge = Stripe_Charge::create(array(
                    'card' => $myCard,
                    'amount' => (floatval($this->input->post('paid')) * 100),
                    'currency' => $this->setting->currency
                ));
                echo "<p class='bg-success text-center'>" . label('saleStripesccess') . '</p>';
            } catch (Stripe_CardError $e) {
                // Since it's a decline, Stripe_CardError will be caught
                $body = $e->getJsonBody();
                $err = $body['error'];
                echo "<p class='bg-danger text-center'>" . $err['message'] . '</p>';
            }
        }
        unset($_POST['ccnum']);
        unset($_POST['ccmonth']);
        unset($_POST['ccyear']);
        unset($_POST['ccv']);

		//cek jika 
        /*
        $posales = Posale::find('all', array(
            'conditions' => array(
                (!empty($number_)?'number':'status').' = ? AND register_id = ?',
                (!empty($number_)?$number_:1),
                $this->register
            )
        ));
        */
        $sales = new Sales();

        $pathid = $request->pathid;
        $orders_id    = $this->sales->getOrdersId($pathid)->orders_id;
        if ($orders_id){
            
            //check payment method
            if ($pay_type == 01){
                $pay_amount     = $request->payamount;
                $change         = $request->payamount - $request->total;
            } else {
                $pay_amount     = $request->total;
                $change         = 0;
            }
                $store_orders = DB::table('orders')->insert([
                    'orders_id'         => $orders_id,
                    'unit'              => Auth::user()->unit,
                    'table_no'          => $request->tableno,
                    'period_date'       => $sales->checkPeriod(Auth::user()->unit)->date_open,
                    'order_date'        => $sales->getOrdersId($pathid)->datetime,
                    'total_price'       => $request->total,
                    'total_qt'          => $request->total_itm,
                    'discount'          => $request->discount,
                    'tax'               => $request->tax,
                    'pay_method_id'     => $request->type,
                    'pay_date'          => date('Y-m-d'),
                    'pay_time'          => date('H:i:s'),
                    'pay_ip'            => \Request::getClientIp(true),
                    'cashier'           => Auth::user()->username,
                    'status'            => '01',
                ]);

                $store_payment = DB::table('payment')->insert([
                    'orders_id'         => $orders_id,
                    'unit'              => Auth::user()->unit,
                    'table_no'          => $request->tableno,
                    'total_price'       => $request->total,
                    'total_qt'          => $request->total_itm,
                    'discount'          => $request->discount,
                    'tax'               => $request->tax,
                    'pay_amount'        => $pay_amount,
                    'change'            => $change,
                    'pay_method_id'     => $request->type,
                    'pay_method_name'   => $request->payname,
                    'pay_date'          => date('Y-m-d'),
                    'pay_time'          => date('H:i:s'),
                    'pay_ip'            => \Request::getClientIp(true),
                    'cashier'           => Auth::user()->username,
                    'card_type'         => $request->cardtype,
                    'bank_name'         => $request->bankname,
                    'card_number'       => $request->cardnumber,
                    'account_no'        => $request->accountno,
                    'reff_no'           => $request->reffno,
                ]);   
        
        //return response()->json(['success' => 'Data Added successfully.']);
        //}
        
        $receiptheader = 'Terima Kasih';
        $data_struk=[];

        //$ticket = '<div class="col-md-12"><div class="text-center">' . $receiptheader . '</div><div style="clear:both;"><h4 class="text-center">' . label("SaleNum") . '.: ' . sprintf("%05d", $sale->id) . '</h4> <div style="clear:both;"></div><span class="float-left">' . label("Date") . ': ' . $sale->created_at->format('d-m-Y H:i:s') . '</span><br><div style="clear:both;"><span class="float-left">Waiter by: ' . $sale->waitername . '</span><div style="clear:both;"><table class="table" cellspacing="0" border="0"><thead><tr><th><em>#</em></th><th>' . label("Product") . '</th><th>' . label("Quantity") . '</th><th>' . label("SubTotal") . '</th></tr></thead><tbody>';
        $ticket = 
        '<div class="col-md-12"> 
            <div style="clear:both;"><h4 class="text-center">NM CAFE</h4> <div style="clear:both;"></div>
            <div class="text-center">#' . $orders_id . '</div>
            <div class="text-center">' . date('d-m-Y H:i:s') . '</div>
            <div style="clear:both;"><span class="float-left">SERVE BY : FACHRUL</span>
            <div style="clear:both;">
            
            <table class="table" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th><em>#</em></th>
                    <th>PRODUCT</th>
                    <th>QT</th>
                    <th>TOTAL</th>
                </tr>
                </thead>
                <tbody>';

        $order_status   = 0;
        $temp_id   = $request->pathid;
        $orders_item    = $sales->getAll(Auth::user()->unit, $order_status, $temp_id);
        
        //$data_struk['no'] = sprintf("%05d", $sale->id);
        //$data_struk['date'] = $sale->created_at->format('d-m-Y H:i:s');
        //$data_struk['client'] = $sale->waitername;
        $data_struk['orders_item']=[];

        $i = 1;
        foreach ($orders_item as $posale) {
            //$ticket .= '<tr><td style="text-align:center; width:30px;">' . $i . '</td><td style="text-align:left; width:180px;">' . $posale->menu_name . '</td><td style="text-align:center; width:50px;">' . $posale->qt . '</td><td style="text-align:right; width:70px; ">' . number_format((float)($posale->qt * $posale->price), 0, '.' , ',') . ' ' . IDR . '</td></tr>';
            $ticket .= 
            '<tr>
                <td style="text-align:center; width:10px;">' . $i . '</td>
                <td style="text-align:left; width:180px;">' . $posale->menu_name . '</td>
                <td style="text-align:center; width:50px;">' . $posale->qt . '</td>
                <td style="text-align:right; width:70px; ">' . number_format((float)($posale->qt * $posale->price), 0, '.' , ',') . '</td>
            </tr>';
            
            $i ++;

            $data_struk['orders_item'][] = [
              'name'=>$posale->menu_name,
              'qt'=>$posale->qt,
              'total'=>number_format((float)($posale->qt * $posale->price), 0, '.' , ',')
            ];
        }
        
        $bcs = 'code128';
        $height = 20;
        $width = 3;
        //$ticket .= '</tbody></table><table class="table" cellspacing="0" border="0" style="margin-bottom:8px;"><tbody><tr><td style="text-align:left;">Total Items</td><td style="text-align:right; padding-right:1.5%;">' . $sale->totalitems . '</td><td style="text-align:left; padding-left:1.5%;">' . label("Total") . '</td><td style="text-align:right;font-weight:bold;">' . $sale->subtotal . ' ' . $this->setting->currency . '</td></tr>';
        $ticket .= 
        '</tbody>
            </table>
            
            <table class="table" cellspacing="0" border="0" style="margin-bottom:8px;">
                <tbody>
                <tr>
                    <td width="37%" style="text-align:left;">TOT ITEMS :</td>
                    <td width="5%" style="text-align:right; padding-right:1.5%;">' . $request->total_itm . '</td>
                    <td width="33%" style="text-align:left; font-weight:bold; padding-left:1.5%;">SUB TOTAL </td>
                    <td width="25%" style="text-align:right;font-weight:bold;">' . number_format((float)($request->subtotal), 0, '.' , ',') . '</td>
                </tr>';
                  
        
          $data_struk['total_item']=$request->total_itm;
          $data_struk['total_price']=$request->total;


        if (intval($request->discount)){
            $ticket .= 
            '<tr>
                <td style="text-align:left;"></td>
                <td style="text-align:right; padding-right:1.5%;font-weight:bold;"></td>
                <td style="text-align:left; font-weight:bold; padding-left:1.5%;">DISCOUNT</td>
                <td style="text-align:right;font-weight:bold;">' . number_format((float)($request->discount), 0, '.' , ',') . '</td>
            </tr>';
            $data_struk['discount']=$request->discount;
        }
        
        if (intval($request->tax)){
            $ticket .= 
            '<tr>
                <td style="text-align:left;"></td>
                <td style="text-align:right; padding-right:1.5%;font-weight:bold;"></td>
                <td style="text-align:left; font-weight:bold; padding-left:1.5%;">TAX</td>
                <td style="text-align:right;font-weight:bold;">' . number_format((float)($request->tax), 0, '.' , ',') . '</td>
            </tr>';
            $data_struk['tax']=$request->tax;
        }
    
        $ticket .= 
        '<tr>
            <td style="text-align:left;"></td>
            <td style="text-align:right; padding-right:1.5%;font-weight:bold;"></td>
            <td style="text-align:left; font-weight:bold; padding-left:1.5%;">TOTAL</td>
            <td style="text-align:right;font-weight:bold;">' . number_format((float)($request->total), 0, '.' , ',') . '</td>
        </tr>';

        /*
        //'<tr><td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;">' . label("GrandTotal") . '</td><td colspan="2" style="border-top:1px dashed #000; padding-top:5px; text-align:right; font-weight:bold;">' . number_format((float)$sale->total, $this->setting->decimals, '.' , ',') . ' ' . $this->setting->currency . '</td></tr><tr>';

        //$data_struk['grandtotal']=number_format((float)$sale->total, $this->setting->decimals, '.' , ',');

        //$PayMethode = explode('~', $sale->paidmethod);
        
        switch ($PayMethode[0]) {
            case '01': // cash
                $ticket .= '<td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;">' . label("CreditCard") . '</td><td colspan="2" style="padding-top:5px; text-align:right; font-weight:bold;">xxxx xxxx xxxx ' . substr($PayMethode[1], - 4) . '</td></tr><tr><td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;">' . label("CreditCardHold") . '</td><td colspan="2" style="padding-top:5px; text-align:right; font-weight:bold;">' . $PayMethode[2] . '</td></tr></tbody></table>';
                break;
            case '2': // case ckeck
                $ticket .= '<td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;">' . label("ChequeNum") . '</td><td colspan="2" style="padding-top:5px; text-align:right; font-weight:bold;">' . $PayMethode[1] . '</td></tr></tbody></table>';
                break;
            default:
                $ticket .= '<td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;">' . label("Paid") . '</td><td colspan="2" style="padding-top:5px; text-align:right; font-weight:bold;">' . number_format((float)$sale->paid, $this->setting->decimals, '.' , ',') . ' ' . $this->setting->currency . '</td></tr><tr><td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;">' . label("Change") . '</td><td colspan="2" style="padding-top:5px; text-align:right; font-weight:bold;">' . number_format((float)(floatval($sale->paid) - floatval($sale->total)), $this->setting->decimals, '.' , ',') . ' ' . $this->setting->currency . '</td></tr></tbody></table>';

                $data_struk['paid']=number_format((float)$sale->paid, $this->setting->decimals, '.', ',');
                $data_struk['change']=number_format((float)(floatval($sale->paid) - floatval($sale->total)), $this->setting->decimals, '.', ',');

        }
        */

        $PayMethode = $request->type;
        if ($PayMethode == 01){

        $ticket .= 
        '<tr>
            <td style="text-align:left;"></td>
            <td style="text-align:right; padding-right:1.5%;font-weight:bold;"></td>
            <td style="text-align:left; font-weight:bold; padding-left:1.5%;">PAYMENT</td>
            <td style="text-align:right;font-weight:bold;">' . number_format((float)($request->payamount ), 0, '.' , ',') . '</td>
        </tr>
      
        <tr>
            <td style="text-align:left;"></td>
            <td style="text-align:right; padding-right:1.5%;font-weight:bold;"></td>
            <td style="text-align:left; font-weight:bold; padding-left:1.5%;">CHANGE</td>
            <td style="text-align:right;font-weight:bold;">' . number_format((float)(floatval($request->payamount) - floatval($request->total)), 0, '.' , ',') .'</td>
        </tr>
        </tbody>
        </table>';

        } else {

        $ticket .= 
        '<tr>
            <td style="text-align:left;"></td>
            <td style="text-align:right; padding-right:1.5%;font-weight:bold;"></td>
            <td style="text-align:left; font-weight:bold; padding-left:1.5%;">PAYMENT</td>
            <td style="text-align:right;font-weight:bold;">' . number_format((float)($request->total ), 0, '.' , ',') . '</td>
        </tr>

        </tbody>
        </table>';

        }

        $ticket .= 
        '<div class="text-center">FOLLOW IG : @MILKYWAYCOFFEEPROJECT</div>
        <div class="text-center">CONTACT : 0811680000</div>
        <div class="text-center">TERIMAKASIH ATAS KUNJUNGAN ANDA</div>';


        //$ticket .= '<div style="border-top:1px solid #000; padding-top:10px;"><span class="float-left">' . $store->name . '</span><span class="float-right">' . label("Tel") . ' ' . ($store->phone ? $store->phone : $this->setting->phone) . '</span><div style="clear:both;"><center><img style="margin-top:30px" src="' . site_url('pos/GenerateBarcode/' . sprintf("%05d", $sale->id) . '/' . $bcs . '/' . $height . '/' . $width) . '" alt="' . $sale->id . '" /></center><p class="text-center" style="margin:0 auto;margin-top:10px;">' . $store->footer_text . '</p><div class="text-center" style="background-color:#000;padding:5px;width:85%;color:#fff;margin:0 auto;border-radius:3px;margin-top:20px;">' . $this->setting->receiptfooter . '</div></div>';
        
        /*
        $ticket .='<script>
        $(function(){
          $(".print_ticket").click(function(e){
              e.preventDefault();
              $.ajax({
                url : "'.site_url("pos/cetak_tiket").'",
                type: "POST",
                data: {qr:"'.sprintf($this->config->item('client_url'), $token_, $number_).'",data: '.json_encode($data_struk).',number:"'.$number_.'"},
                success: function(data)
                {
                   $.notify({
                    title:"Ticket Print: ",
                    message:"Success" 
                  },{
                    type: "success"
                  });
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                   $.notify({
                    title:"Ticket Print: ",
                    message:"Failed" 
                  },{
                    type: "error"
                  });
                }
             });
          });
        })
        </script>';
        */

        //delete orders temp
        $del_orders_temp    = $this->sales->del_orders_temp($pathid);
        $orders_status      = '4'; //closed
        $upd_orders_item    = $this->sales->upd_orders_item($orders_id, $orders_status);

        return $ticket;
    }   
    }

    public function subtot(Request $request, $temp_id)
    {
        $sales = new Sales();
        $order_status   = 0;
        $unit           = Auth::user()->unit;
        $orders_item    = $sales->getAll($unit, $order_status, $temp_id);

        $sub = 0;
        foreach ($orders_item as $items) {
                $sub += $items->price * $items->qt;
        }
        return number_format($sub);
    }
    
    public function totiems(Request $request, $temp_id)
    {
        $sales = new Sales();
        $order_status   = 0;
        $unit           = Auth::user()->unit;
        $orders_item    = $sales->getAll($unit, $order_status, $temp_id);
        
        $sub = 0;
        foreach ($orders_item as $items) {
            $sub += $items->qt;
        }
        return $sub;
    }

    public function tax(Request $request, $temp_id)
    {
        $config = new Config();
        $getTax = $config->GetConfig_tax(Auth::user()->unit)->tax_amount ?? 0;
        $subtot = $this->subtot($request, $temp_id);
        $string_subtot = str_replace(",", "", $subtot);

        if ($getTax) {
            $tot_amount = ($string_subtot * $getTax) / 100;
        } else {
            $tot_amount = 0;
        }
        return number_format($tot_amount);
    }

    public function tax_pcn(Request $request)
    {
        $config = new Config();
        $getTax = $config->GetConfig_tax(Auth::user()->unit)->tax_amount ?? 0;
        return ''.$getTax.'%';
    }

    public function disc_pcn(Request $request)
    {
        $config  = new Config();
        $getDisc = $config->GetConfig_disc(Auth::user()->unit)->discount_amount ?? 0;
        return ''.$getDisc.'%';
    }

}
