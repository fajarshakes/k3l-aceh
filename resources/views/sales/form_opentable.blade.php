@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')
@php $path_id = \Request::segment(3); @endphp
  <!-- menu sales  
  <div class="sidebar-left">
      <div class="sidebar_1">
        <div class="sidebar-content email-app-sidebar_1 d-flex">
          <div class="email-app-menu col-md-12 card d-none d-lg-block">

            {{-- @include('sales.menu') --}}

          </div>
        </div>
      </div>
    </div>
  -->
<style>

.tbl1 { box-shadow:0px 0px 5px #aaa; width:100%; border-top:1px white }
.tbl1 tr { height:15px; border:1px white }

.tbl1 .c1 { border:0; width:2%; text-align:center; border-top:0px solid black}
.tbl1 .c0 { border:0; width:2%; text-align:center; border-top:0px solid black}
.tbl1 .c2 { border:0; width:56%; text-align:left; border-top:0px solid black}
.tbl1 .c3 { border:0; width:10%; text-align:right; border-top:0px solid black}
.tbl1 .c4 { border:0; width:30%; text-align:center; border-top:0px solid black}

div.list_sale {
  height: 390px;
  overflow:scroll;
}

div.list_menu {
  height: 510px;
  overflow:scroll;
}

div.modalreceipt {
  height: 550px;
  overflow-y: scroll;
}

.modal-ku {
  width: 750px;
  margin: auto;
}

/* STYLE FOR PAYMENT */
.input_change:focus,
.input_hold:focus{
  outline: none;
}
.input_change,
.input_hold{
  height:100px;
  width:100%;
  font-size: 85px;
  border:none;
  text-align: center;
}

.input-hidden {
  position: absolute;
  left: -9999px;
}

input[type=radio]:checked + label>img {
  border: 1px solid #fff;
  box-shadow: 0 0 3px 3px #090;
}

/* icon size */
.ft-alert-triangle {
    font-size: 75px;
}

@media screen {
    #printSection_1 {
        display: none;
    }
}
@media print {
    body * {
        visibility:hidden;
    }
    #printSection_1, #printSection_1 * {
        visibility:visible;
    }
    #printSection_1 {
        position:absolute;
        left:0;
        top:0;
    }
}

</style>

    <div class="content-right-2">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="card email-app-details d-none d-lg-block">
            <div class="card-content">
              <div class="email-app-options card-body">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                      data-placement="top" data-original-title="Replay"><i class="la la-reply"></i></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                      data-placement="top" data-original-title="Replay All"><i class="la la-reply-all"></i></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                      data-placement="top" id="change_table" data-original-title="Change Table"><i class="ft-alert-octagon"></i></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                      name="del_orders" id="del_orders" data-placement="top" data-original-title="Delete Orders"><i class="ft-trash-2"></i></button>
                      <button type="button" class="btn btn-info btn-sm btn-outline-secondary" data-toggle="tooltip"
                      name="add_menu" id="add_menu" data-placement="top" data-original-title="Add Menu"><i class="ft-plus-square"></i></button>
                      <button type="button" class="btn btn-warning btn-sm btn-outline-secondary" data-toggle="tooltip"
                      name="receipt" id="receipt" data-placement="top" data-original-title="Print Bill"><i class="ft-printer"></i></button>
                    </div>
                  </div>
                  <div class="col-md-6 col-12 text-right">
                  <span class="badge badge-info mr-1 badge-lg">{{ $tempStatus->table_no }}</span></span>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                      data-placement="top" data-original-title="Previous"><i class="la la-angle-left"></i></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                      data-placement="top" data-original-title="Next"><i class="la la-angle-right"></i></button>
                    </div>
                    <div class="btn-group ml-1">
                      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">More</button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Mark as unread</a>
                        <a class="dropdown-item" href="#">Mark as unimportant</a>
                        <a class="dropdown-item" href="#">Add star</a>
                        <a class="dropdown-item" href="#">Add to task</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Filter mail</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            <div class="row">
            <div class="col-12">
              <div class="card box-shadow-0">
                <div class="card-content">
                  <div class="row">
                    <div class="col-xl-6 col-lg-12">
                 
                  <div class="col-xl-12 col-md-12">
                  <div class="media-body pr-1">
                      <h6 class="list-group-item-heading"></h6>
                      <p class="list-group-item-text">to me
                        <span>Today</span>
                        <span class="float-right">
                          <i class="la la-reply mr-1"></i>
                          <i class="la la-arrow-right mr-1"></i>
                          <i class="la la-ellipsis-v"></i>
                        </span>
                      </p>
                  </div>
                  </div>
               

              <div class="col-12">
              <div class="row">
                <div class="col-md-2 text-center">
                  <label>Action</label>
                </div>
                <div class="col-md-5 text-center">
                  <label>Menu & Price</label>
                </div>
                <div class="col-md-2 text-center">
                  <label>Quantity</label>
                </div>
                <div class="col-md-1">
                  <label></label>
                </div>
                <div class="col-md-2 text-center">
                  <label>Total</label>
                </div>
              </div>


          <div class="row">
            <div class="list_sale">
            <div class="col-xl-12 col-md-12">
              <div class="card overflow-hidden">
                <div class="card-content">
                  <div class="media align-items-stretch bg-gradient-x-info text-white rounded">
                  <table class="tbl1" id="productList">
                      
                  </table>

                  </div>
                </div>
              </div>
            </div>
            </div>

            <div class="table-responsive col-sm-12 totalTab">
               <table class="table">
                  <tr>
                     <td class="bg-primary bg-lighten-5" width="40%">Sub Total</td>
                     <td class="whiteBg" width="60%"><span id="Subtot"></span> IDR
                        <span class="float-right"><b id="ItemsNum"><span></span> items</b></span>
                     </td>
                  </tr>
                  
                  <tr>
                     <td class="bg-primary bg-lighten-5">TAX</td>
                     <td class="whiteBg light-blue text-bold"><span id="TotalTax" onchange="total_change()"></span> IDR 
                     <b><span class="float-right TAX_2" id="TaxPerc"> </span></b></td>
                  </tr>
                  
                  <tr>
                     <td class="bg-primary bg-lighten-5">Discount (-)</td>
                     <td class="whiteBg light-blue text-bold"><span id="TotalDisc"></span> IDR
                     <b><span class="float-right DISCOUNT" id="DiscPerc"> </span></b> </td>
                  </tr>

                  <tr>
                     <td class="bg-primary bg-lighten-5">Total</td>
                     <td class="whiteBg light-blue text-bold"><span class="TOTAL_AMOUNT" id="total_amount"></span> IDR </td>
                  </tr>
               </table>
            </div>
            <div class="btn-group col-sm-12">
              <button type="button" onclick="cancelPOS()" class="btn btn-danger col-sm-4"><h5 class="text-bold text-white">CANCEL</h5></button>
              <button type="button" class="btn btn-warning col-sm-4" data-toggle="modal" data-target="#cookModal"><h5 class="text-bold text-white">SENT TO KITCHEN</h5></button>
              <button type="button" class="btn btn-success col-sm-4" id="paymentProcess" name="paymentProcess"><h5 class="text-bold text-white">PAYMENT</h5></button>
            </div>

          </div>

        </div>
      </div>
                    
                    <div class="col-xl-6 col-lg-12">
                    <div class="card-content">
                  <div class="card-body">
                    <ul class="nav nav-tabs nav-linetriangle">
                      <li class="nav-item">
                        <a class="nav-link active" id="baseIcon-tab31" data-toggle="tab" aria-controls="tabIcon31"
                        href="#tabIcon31" aria-expanded="true"><i class="la la-play"></i> Tab 1</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="baseIcon-tab32" data-toggle="tab" aria-controls="tabIcon32"
                        href="#tabIcon32" aria-expanded="false"><i class="la la-flag"></i> Tab 2</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="baseIcon-tab33" data-toggle="tab" aria-controls="tabIcon33"
                        href="#tabIcon33" aria-expanded="false"><i class="la la-cog"></i> Tab 3</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled"><i class="la la-unlink"></i> Disabled</a>
                      </li>
                    </ul>
                    
                    <div class="list_menu">
                    <div class="tab-content px-1 pt-1">
                      <div role="tabpanel" class="tab-pane active" id="tabIcon31" aria-expanded="true"
                      aria-labelledby="baseIcon-tab31">
                        
                      <div class="row">
                      
                      @foreach($menuActive as $index=>$row)
                      
                      <div class="col-xl-4 col-lg-6 col-12">
                        <a href="javascript:void(0)" class="addPct" id="product-<?=$row->idmenu;?>" onclick="add_posale('<?=$row->idmenu;?>')">
                        <div class="card bg-success h-100">
                          <div class="card-content">
                          <img class="card-img-top" {{--img-fluid--}} src="{{ URL::to('/images/pic_menu/'.$row->image) }}" height="150" class="img-thumbnail"
                          alt="Card image cap">
                          
                          <div class="card-body">
                              <div class="media d-flex">
                                <div class="media-body text-white text-left">
                                  <h3 class="text-white">Rp. @if ($row->discount_status == 1)
                                    {{ $row->discount_price }}
                                    @else
                                    {{ $row->menu_price }}
                                    @endif</h3>
                                  <span>{{ $row->menu_name }}</span>

                                  <!-- hidden input -->
                                  @csrf
                                  <input type="hidden" id="idname-<?=$row->idmenu;?>" name="name" value="<?=$row->menu_name;?>" />
                                  <input type="hidden" id="idprice-<?=$row->idmenu;?>" name="price" value="<?=$row->menu_price;?>" />
                                  <input type="hidden" id="idcat-<?=$row->idmenu;?>" name="category" value="<?=$row->mncategory;?>" />
                                </div>
                                {{--<div class="align-self-center">--}}
                                  {{--<i class="icon-rocket text-white font-large-2 float-right"></i>
                                </div>--}}
                              </div>
                            </div>
                          </div>
                        </div>
                        </a>
                      </div>
                      <br></br>
                      @endforeach

                      
                      </div>
                    
           
                      </div>
                      <div class="tab-pane" id="tabIcon32" aria-labelledby="baseIcon-tab32">
                        <p>Sugar plum tootsie roll biscuit caramels. Liquorice brownie
                          pastry cotton candy oat cake fruitcake jelly chupa chups.
                          Pudding caramels pastry powder cake soufflé wafer caramels.
                          Jelly-o pie cupcake.</p>
                      </div>
                      <div class="tab-pane" id="tabIcon33" aria-labelledby="baseIcon-tab33">
                        <p>Biscuit ice cream halvah candy canes bear claw ice cream
                          cake chocolate bar donut. Toffee cotton candy liquorice.
                          Oat cake lemon drops gingerbread dessert caramels. Sweet
                          dessert jujubes powder sweet sesame snaps.</p>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
              


            </div>
          </div>
        </div>
      </div>
    </div>

      <!-- Modal -->
      <div class="modal fade text-left" id="menuModal" tabindex="false" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_menu_" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="companyName">Select Menu {{-- $data --}}</label>
                  <br>
                  <select name="sel_menu" class="select2 form-control block" style="width: 100%">
                  @foreach($group as $index=>$row)
                    <optgroup label="{{ $row->cat_cd }}">
                      <option value="HI">@php ($menuActive = $menuActive[$row->cat_cd]->idmenu ?? 0)</option>
                    </optgroup>
                  @endforeach
                  </select>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">Category</label>
                      <select id="catcd" name="catcd" class="form-control">
                        <option value="none" selected="" disabled="">Select Category</option>
                        {{-- @foreach($categoryData as $c)
                          <option value="{{ $c->cat_cd }}">{{ $c->cat_text }}</option>
                        @endforeach --}}
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="companyName">Price</label>
                      <input type="text" class="rupiah form-control" id="price" name="price" style="text-align: right" placeholder="Price">
                    </div>
                  </div>
                </div>
                
              </div>
              
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="action_button" id="action_button" value="Add" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>

      <!-- DELETE ORDER MODAL / FORM -->
      <div class="modal fade text-left" id="deleteModal" tabindex="false" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-danger white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="deleteorderrs" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
              
              <div class="form-group text-center">
                <h1><i class="ft-alert-triangle text-danger"></i></h1>
              </div>
              
              <div class="form-group">
                <label for="name_order">Enter reason </label>
                <input type="text" id="reason" name="reason" class="form-control form-lg" placeholder="alasan pembatalan" required>
              </div>
              
              <div class="form-group">
                <label for="name_order">Enter your password to submit </label>
                <input type="password" class="form-control form-lg" required>
              </div>

              </div>
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-danger" onclick="delete_order()">Delete Order</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
      <!-- PAYMENT MODAL / FORM -->
      <div class="modal fade text-left" id="payModal" tabindex="false" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_payment" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
              <div class="form-group">
               <table class="table">
                <tr>
                  <td class="bg-primary bg-lighten-5"><h4><label for="companyName">Total Amount</label></h4></td>
                  <td class="whiteBg light-blue text-bold">
                    <h2 id="TotalModal"><span></span> IDR</h2>
                  </td>
                </tr>
               </table>
              </div>
            
              <div id="paymentMethod" class="form-group form-center">
                <label for="companyName">Select Payment Method</label>
                <fieldset class="col-md-12 form-group">
                @foreach($paymentMethod as $index=>$row)
                <input type="radio" name="emotion" id="{{ $row->payment_id }}" class="input-hidden" value="{{ $row->payment_id }}" />
                <label for="{{ $row->payment_id }}">
                  <img src="{{ url('images/pic_payment/'.$row->payment_pic) }}" width="130" alt="{{ $row->payment_method }}" />
                </label>
                @endforeach
                </fieldset>
              </div>
            
              <!-- FOR CASH PAYMENT -->
              <div class="form-group p_amount" style="display:none;">
                <label for="name_order">Payment Amount</label>
                <input type="text" class="rupiah form-control form-lg" id="p_amount" name="p_amount" style="text-align: right" required>
              </div>

              <div class="form-group p_change" style="display:none;">
                <label for="name_order">Change</label>
                <h3 id="ReturnChange"><span>0</span> IDR</h3>
              </div>
            
              <!-- FOR CARD PAYMENT -->
              <div class="row card_field" style="display:none;">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput5">Card Type</label>
                      <select id="card_type" name="card_type" class="form-control">
                        <option value="none" selected="" disabled="">Select Category</option>
                        <option value="DEBIT">DEBIT CARD</option>
                        <option value="CREDIT">CREDIT CARD</option>
                      </select>
                  </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="companyName">Bank Name</label>
                    <input type="text" class="form-control form-lg" id="bank_name" name="bank_name" required>
                  </div>
                </div>
              </div>

              <div class="form-group card_number" style="display:none;">
                <label for="name_order">Card Number</label>
                <input type="text" class="form-control form-lg" id="card_number" name="card_number" required>
              </div>
            
              <!-- FOR GOJEK / OVO PAYMENT -->
              <div class="form-group account_no" style="display:none;">
                <label for="name_order">Account No</label>
                <input type="text" class="form-control form-lg" id="account_no" name="account_no" required>
              </div>

              <div class="form-group reff_no" style="display:none;">
                <label for="name_order">Reff No</label>
                <input type="text" class="form-control form-lg" id="reff_no" name="reff_no" required>
              </div>
              </div>

              <input type="hidden" id="paymethod" name="paymethod" value="">
              <input type="hidden" id="paymethod_id" name="paymethod_id" value="">
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-info" onclick="payBtn(1)">Submit Payment</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- SENT TO KITCHEN MODAL / FORM -->
        <div class="modal fade text-left" id="cookModal" tabindex="false" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" role="document" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_kitchen" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                
                <h4 class="text-center meja_order">Pesanan Meja : 3</h4>
                
                <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">Menu Name</th>
                    <th style="text-align:center">Qt</th>
                    <th style="text-align:center">Comment</th>
                    <th style="text-align:center">Status</th>
                  </tr>
                </thead>
                <tbody class="list_dapur"></tbody>
                </table>
                </div>

                <input type="hidden" name="send_kitchen" id="send_kitchen" />
                <input type="hidden" name="path_id" id="path_id" />
              
              </div>
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" value="SendToKitchen" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- CHANGE MODAL / FORM -->
        <div class="modal fade text-left" id="changeTable" tabindex="false" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" role="document" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="cTable" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
              <div class="col-xl-12 col-lg-12 mb-1">
                <div class="form-group text-center list_table">
                
                </div>

                <div class="form-group">
                  <label for="companyName"><h4>Change Table to : </h4>
                    <strong><h4 id="tablechanged"><span>0</span></h4></strong>
                  </label>
                </div>
              </div>
              
              </div>
              
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" value="SendToKitchen" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
        
        <div class="modal fade text-left" id="descModal" tabindex="false" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_menu" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                    <label for="companyName">Menu Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="" readonly >
                </div>
                <div class="form-group">
                  <label for="companyName">Add Comment</label>
                  <br>
                  <textarea class="form-control" id="description" name="description" placeholder="Input additional description"></textarea>
                </div>
              </div>
              
              <input type="hidden" name="aksii" id="aksii" />
              <input type="hidden" name="id" id="id" />
              <input type="hidden" name="temp_id" id="temp_id" />
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="action_btn" id="action_btn" value="AddComment" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
        
        <div class="modal fade text-left" id="receiptTicket_TEST" tabindex="false" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closedOrder()"> 
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_menu" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
              <!-- SECTION 1 -->
              <div class="col-md-12"> 
                <div style="clear:both;"><h4 class="text-center">NM CAFE</h4> <div style="clear:both;"></div>
                <div class="text-center">#00000</div>
                <div class="text-center">18-01-2020 22.00</div>
                <div style="clear:both;"><span class="float-left">SERVE BY : FACHRUL</span>
                <div style="clear:both;">
                
                <!-- SECTION 2 -->
                <table class="table" cellspacing="0" border="0">
                  <thead>
                    <tr>
                      <th><em>#</em></th>
                      <th>PRODUCT</th>
                      <th>QT</th>
                      <th>TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <!-- SECTION 3 -->
                  <tr>
                    <td style="text-align:center; width:20px;">1</td>
                    <td style="text-align:left; width:180px;">Nm Menu</td>
                    <td style="text-align:center; width:50px;">99</td>
                    <td style="text-align:right; width:70px; ">99.000</td>
                  </tr>
                  
                  <!-- SECTION 4 -->
                  </tbody>
                </table>

                <table class="table" cellspacing="0" border="0" style="margin-bottom:8px;">
                <tbody>
                  <tr>
                    <td width="37%" style="text-align:left;">TOT ITEMS :</td>
                    <td width="5%" style="text-align:right; padding-right:1.5%;">999</td>
                    <td width="33%" style="text-align:left; font-weight:bold; padding-left:1.5%;">SUB TOTAL </td>
                    <td width="25%" style="text-align:right;font-weight:bold;">99.000</td>
                  </tr>
                  
                  <!-- SECTION 5 -->
                  <tr>
                    <td style="text-align:left;"></td>
                    <td style="text-align:right; padding-right:1.5%;font-weight:bold;"></td>
                    <td style="text-align:left; font-weight:bold; padding-left:1.5%;">DISCOUNT</td>
                    <td style="text-align:right;font-weight:bold;">99.000</td>
                  </tr>
                  
                  <!-- SECTION 6 -->
                  <tr>
                    <td style="text-align:left;"></td>
                    <td style="text-align:right; padding-right:1.5%;font-weight:bold;"></td>
                    <td style="text-align:left; font-weight:bold; padding-left:1.5%;">TAX</td>
                    <td style="text-align:right;font-weight:bold;">99.000</td>
                  </tr>

                 <!-- SECTION 7 -->
                 <tr>
                    <td style="text-align:left;"></td>
                    <td style="text-align:right; padding-right:1.5%;font-weight:bold;"></td>
                    <td style="text-align:left; font-weight:bold; padding-left:1.5%;">TOTAL</td>
                    <td style="text-align:right;font-weight:bold;">99.000</td>
                  </tr>
                  
                
                  <!-- SECTION 8 -->
                  <tr>
                    <td style="text-align:left;"></td>
                    <td style="text-align:right; padding-right:1.5%;font-weight:bold;"></td>
                    <td style="text-align:left; font-weight:bold; padding-left:1.5%;">PAYMENT</td>
                    <td style="text-align:right;font-weight:bold;">99.000</td>
                  </tr>
                  
                  <tr>
                    <td style="text-align:left;"></td>
                    <td style="text-align:right; padding-right:1.5%;font-weight:bold;"></td>
                    <td style="text-align:left; font-weight:bold; padding-left:1.5%;">CHANGE</td>
                    <td style="text-align:right;font-weight:bold;">99.000</td>
                  </tr>
              </tbody>
            </table>

            <div class="text-center">FOLLOW IG : @MILKYWAYCOFFEEPROJECT</div>
            <div class="text-center">TERIMAKASIH ATAS KUNJUNGAN ANDA</div>


                </div>
                </div>
                </div>
                </div>
          

              </div>
              
              <div class="modal-footer">
                <button type="button" id="close_btn" value="closed" class="btn grey btn-outline-secondary" data-dismiss="modal" onclick="closedOrder()">Close</button>
                <!--button type="button" name="close_btn" id="close_btn" alue="" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button-->
                <button type="submit" name="action_btn" id="action_btn" value="AddComment" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
        <div class="modal fade text-left" id="receiptTicket" tabindex="false" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closedOrder()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_menu" method="post" enctype="multipart/form-data">
              @csrf

              <div class="modalreceipt">
              <div class="modal-body" id="modal-body">
                <div id="printSection"></div>
              </div>
              </div>
              
              <div class="modal-footer">
                <button type="button" name="close" class="btn grey btn-outline-secondary" data-dismiss="modal" onclick="closedOrder()">Close</button>
                <button type="button" class="btn btn-outline-info" id="Print">Print</button>

              </div>
              </form>
            </div>


          </div>
        </div>
        
<script type="text/javascript">
$(document).ready(function() {
  $('#del_orders').click(function(){
      $('.modal-title').text("Delete Orders..");
      $('#store_image').html("");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#deleteModal').modal('show');
    });
});

$(document).ready(function() {
  $('#add_menu').click(function(){
      $('.modal-title').text("Input Menu");
      $('#store_image').html("");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#payModal').modal('show');
    });
});

$(document).ready(function() {
  $('#receipt').click(function(){
      $('.modal-title').text("Input Menu");
      $('#store_image').html("");
      $('#close_btn').val("closed");
      $('#action').val("Add");
      $('#receiptTicket_TEST').modal('show');
  });
});


$('#form_menu').on('submit', function(event){
      event.preventDefault();
      
      if($('#aksii').val() == 'addComment')
      {
        $.ajax({
          url: "{{ url('sales/desc_store') }}", 
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          success:function(data)
          {
            var html = '';
            if(data.errors)
            {
              html = '<div>';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<li>' + data.errors[count] + '</li>';
              }
              html += '</div>';
              type_toast = 'error';
            }
            if(data.success)
            {
              //html = '<div class="alert alert-success">' + data.success + '</div>';
              var temp_id = '{{ $path_id }}';
              html = data.success;
              type_toast = 'success';
              $('#productList').load("{{ url('sales/load_sales') }}/"+temp_id);
              $('#ItemsNum span, #ItemsNum2 span').load("{{ url('sales/totiems') }}/"+temp_id);
              $('#TotalTax').load("{{ url('sales/tax') }}/"+temp_id);
              $('#TaxPerc').load("{{ url('sales/tax_pcn') }}");
              $('#DiscPerc').load("{{ url('sales/disc_pcn') }}");
              $('#Subtot').load("{{ url('sales/subtot') }}/"+temp_id, null, total_change);

              $('#form_menu')[0].reset();
              //$('#cookModal')[0].reset();
              $('#descModal').modal('hide');
            }
            //$('#form_result').html(html);
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            }
          }
        })
      }
});

$('#form_kitchen').on('submit', function(event){
      event.preventDefault();
      
      if($('#send_kitchen').val() == 'SendToKitchen')
      {
        $.ajax({
          url: "{{ url('sales/tokitchen_store') }}", 
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          success:function(data)
          {
            var html = '';
            if(data.errors)
            {
              html = '<div>';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<li>' + data.errors[count] + '</li>';
              }
              html += '</div>';
              type_toast = 'error';
            }
            if(data.success)
            {
              //html = '<div class="alert alert-success">' + data.success + '</div>';
              var temp_id = '{{ $path_id }}';
              html = data.success;
              type_toast = 'success';
              $('#productList').load("{{ url('sales/load_sales') }}/"+temp_id);
              $('#ItemsNum span, #ItemsNum2 span').load("{{ url('sales/totiems') }}/"+temp_id);
              $('#TotalTax').load("{{ url('sales/tax') }}/"+temp_id);
              $('#TaxPerc').load("{{ url('sales/tax_pcn') }}");
              $('#DiscPerc').load("{{ url('sales/disc_pcn') }}");
              $('#Subtot').load("{{ url('sales/subtot') }}/"+temp_id, null, total_change);

              $('#form_kitchen')[0].reset();
              //$('#cookModal')[0].reset();
              $('#cookModal').modal('hide');
            }
            //$('#form_result').html(html);
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            }
          }
        })
      }
});


$(document).on('click', '.add_comment', function(){
  var id = $(this).attr('id');
  var temp_id = '{{ $path_id }}';
  $('#form_result').html('');
    $.ajax({
      type : "GET",
        url: "{{ url('sales/get_det_menu') }}",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          //var rupiah = html.data[0].menu_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." );
          $('#name').val(html.data[0].menu_name);
          $('#description').val(html.data[0].add_desc);
          $('#aksii').val("addComment");
          $('#id').val(html.data[0].id);
          $('#temp_id').val(temp_id);
          //$('#price').val(rupiah);
          //$("#catcd").val(html.data[0].cat_cd).attr('selected','selected');
          //$('#hidden_id').val(html.data[0].id);
          $('.modal-title').text("Add Description");
          //$('#action_button').val("Edit");
          
          $('#descModal').modal('show');
        },error: function (jqXhr, textStatus, errorMessage) { // error callback 
					$('p').append('Error: ' + errorMessage);
				}
      })
});


var temp_id = '{{ $path_id }}';

  $('#productList').load("{{ url('sales/load_sales') }}/"+temp_id);
  $('#ItemsNum span, #ItemsNum2 span').load("{{ url('sales/totiems') }}/"+temp_id);
  $('#TotalTax').load("{{ url('sales/tax') }}/"+temp_id);
  $('#TaxPerc').load("{{ url('sales/tax_pcn') }}");
  $('#DiscPerc').load("{{ url('sales/disc_pcn') }}");
  $('#Subtot').load("{{ url('sales/subtot') }}/"+temp_id, null, total_change);


$(".incbutton").on("click", function() {
    var $button = $(this);
    var oldValue = $button.parent().parent().find("input").val();
    var newVal = parseFloat(oldValue) + 1;$button.parent().parent().find("input").val(newVal);
    edit_posale($button.parent().parent().find("input").attr("id").slice(3));
    });
    $(".decbutton").on("click", function() {
        var $button = $(this);var oldValue = $button.parent().parent().find("input").val();
        if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        $button.parent().parent().find("input").val(newVal);
        edit_posale($button.parent().parent().find("input").attr("id").slice(3));
    });

function delete_order()
{
   var temp_id = '{{ $path_id }}';
   var token = '{{ csrf_token() }}';
   var reason_fill  = $('#reason').val();
   //var Paid = $('#p_amount').val().replace(/,/g, "");
   $.ajax({
     url: "{{ url('sales/delete_order') }}/",
     type: "POST",
     data: {tempid: temp_id, reason:reason_fill, _token: token },
     success: function(data)
         {
            if(data === 'stock'){
               swal("Belum Tau Maksudnya");
            }else{

              location.href = "{{ url('sales') }}";

            }
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
            alert("[E] delete order failed");
         }
     });
}

function add_posale(id)
{
   var name1 = $('#idname-'+id).val();
   var category1 = $('#idcat-'+id).val();
   var price1 = $('#idprice-'+id).val();
   var number = 21;
   var temp_id = '{{ $path_id }}';
   var token = '{{ csrf_token() }}';
   //var number = $('.selectedHold').clone().children().remove().end().text();
     // ajax delete data to database
     $.ajax({
      
         url: "{{ url('sales/addpdc') }}",
         type: "POST",
         data: {name: name1, category: category1, price: price1, product_id: id, number: number, temp_id: temp_id, registerid: {{ Auth::user()->unit}}, _token: token },
         success: function(data)
         {
            if(data === 'stock'){
               swal("Belum Tau Maksudnya");
            }else{
              $('#productList').load("{{ url('sales/load_sales') }}/"+temp_id);
              $('#ItemsNum span, #ItemsNum2 span').load("{{ url('sales/totiems') }}/"+temp_id);
              $('#TotalTax').load("{{ url('sales/tax') }}/"+temp_id);
              $('#TaxPerc').load("{{ url('sales/tax_pcn') }}");
              $('#DiscPerc').load("{{ url('sales/disc_pcn') }}");
              $('#Subtot').load("{{ url('sales/subtot') }}/"+temp_id, null, total_change);
            }
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
            alert("[E] add posales failed");
         }
     });
}

function edit_posale(id)
{
   var qt1 = $('#qt-'+id).val();
   var temp_id = '{{ $path_id }}';
   var token = '{{ csrf_token() }}';
   //var number = $('.selectedHold').clone().children().remove().end().text();

    $.ajax({
        url : "{{ url('sales/edit_sales') }}/"+id,
        type: "POST",
        data: {qt: qt1, temp_id: temp_id, _token: token},
          success: function(data)
            {
            if(data === 'stock'){
                swal("Belum Ngerti");
                $('#productList').load("{{ url('sales/load_sales') }}/"+temp_id);
            }else{
              $('#productList').load("{{ url('sales/load_sales') }}/"+temp_id);
              $('#ItemsNum span, #ItemsNum2 span').load("{{ url('sales/totiems') }}/"+temp_id);
              $('#TotalTax').load("{{ url('sales/tax') }}/"+temp_id);
              $('#TaxPerc').load("{{ url('sales/tax_pcn') }}");
              $('#DiscPerc').load("{{ url('sales/disc_pcn') }}");
              $('#Subtot').load("{{ url('sales/subtot') }}/"+temp_id, null, total_change);
              }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               alert("[E] Edit posales failed");
            }
    });
}

function delete_posale(id)
{
  // ajax delete data to database

   //var number = $('.selectedHold').clone().children().remove().end().text();
   var temp_id = '{{ $path_id }}';
   var token = '{{ csrf_token() }}';
  $.ajax({
      url : "{{ url('sales/delete_sales') }}/"+id,
      type: "POST",
      dataType: "JSON",
      data: {_token: token},
      success: function(data)
      {
        $('#productList').load("{{ url('sales/load_sales') }}/"+temp_id);
        $('#ItemsNum span, #ItemsNum2 span').load("{{ url('sales/totiems') }}/"+temp_id);
        $('#TotalTax').load("{{ url('sales/tax') }}/"+temp_id);
        $('#TaxPerc').load("{{ url('sales/tax_pcn') }}");
        $('#DiscPerc').load("{{ url('sales/disc_pcn') }}");
        $('#Subtot').load("{{ url('sales/subtot') }}/"+temp_id, null, total_change);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
         alert("[E] Delete posale failed");
      }
  });

}
// function to calculate a percentage from a number
function percentage(tot, n) {
   var perc;
   perc = ((parseFloat(tot) * (parseFloat(n ? n : 0)*0.01)));
   return perc;
}

function total_change() {
   var tot = 0;
   var disc = 0;
   if ( ($('.TAX_2').val().indexOf('%') == -1) && ($('.DISCOUNT').val().indexOf('%') == -1) ) {
      disc = parseFloat($('#Subtot').text().replace(/,/g, "")) * parseFloat($('#DiscPerc').text().replace(/%/g, "")) / 100;
      tot = parseFloat($('#Subtot').text().replace(/,/g, "")) + parseFloat($('#TotalTax').text().replace(/,/g, ""), $('.TAX_2').val());
      tot = tot - disc;

      $('#total_amount').number(tot.toFixed(1));
      $('#TotalDisc').number(disc.toFixed(1));
      $('#TotalModal span').number(tot.toFixed(1));

   }else if ( ($('.TAX_2').val().indexOf('%') == -1) && ($('.DISCOUNT').val().indexOf('%') != -1) ) {
      disc = 0;
      tot = parseFloat($('#Subtot').text().replace(/,/g, "")) + parseFloat($('#TotalTax').text().replace(/,/g, ""), $('.TAX_2').val());
      tot = tot - disc;

      $('#total_amount').number(tot.toFixed(1));
      $('#TotalDisc').number(disc.toFixed(1));
      $('#TotalModal span').number(tot.toFixed(1));

   }else if ( ($('.TAX_2').val().indexOf('%') != -1) && ($('.DISCOUNT').val().indexOf('%') == -1) ) {
      disc = parseFloat($('#Subtot').text().replace(/,/g, "")) * parseFloat($('#DiscPerc').text().replace(/%/g, "")) / 100;
      tot = parseFloat($('#Subtot').text().replace(/,/g, ""));
      tot = tot - disc;

      $('#total_amount').number(tot.toFixed(1));
      $('#TotalDisc').number(disc.toFixed(1));
      $('#TotalModal span').number(tot.toFixed(1));

   }else if ( ($('.TAX_2').val().indexOf('%') != -1) && ($('.DISCOUNT').val().indexOf('%') != -1) ) {
      disc = 0;
      tot = parseFloat($('#Subtot').text().replace(/,/g, ""));
      tot = tot - disc;

      $('#total_amount').number(tot.toFixed(1));
      $('#TotalDisc').number(disc.toFixed(1));
      $('#TotalModal span').number(tot.toFixed(1));

   }
    
}
/* script sebelum perbaikan runnning mulus */
//function total_change() {
function total_change_() {
   var tot = 0;
   var disc = 0;
   if ( ($('.TAX_2').val().indexOf('%') == -1) && ($('.DISCOUNT').val().indexOf('%') == -1) ) {
      disc = parseFloat($('#Subtot').text().replace(/,/g, "")) * parseFloat($('#DiscPerc').text().replace(/%/g, "")) / 100;
      tot = parseFloat($('#Subtot').text().replace(/,/g, "")) + parseFloat($('#TotalTax').text().replace(/,/g, ""), $('.TAX_2').val());
      tot = tot - disc;

      $('#total_amount').text(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
      $('#TotalDisc').text(disc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
      
      $('#TotalModal span').text(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
      $('#TotalModal1 span').number(tot.toFixed(1));


   }else if ( ($('.TAX_2').val().indexOf('%') == -1) && ($('.DISCOUNT').val().indexOf('%') != -1) ) {
      disc = 0;
      tot = parseFloat($('#Subtot').text().replace(/,/g, "")) + parseFloat($('#TotalTax').text().replace(/,/g, ""), $('.TAX_2').val());
      tot = tot - disc;

      $('#total_amount').text(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
      $('#TotalDisc').text(disc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));

      $('#TotalModal span').text(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
      $('#TotalModal1 span').number(tot.toFixed(1));

   }else if ( ($('.TAX_2').val().indexOf('%') != -1) && ($('.DISCOUNT').val().indexOf('%') == -1) ) {
      disc = parseFloat($('#Subtot').text().replace(/,/g, "")) * parseFloat($('#DiscPerc').text().replace(/%/g, "")) / 100;
      tot = parseFloat($('#Subtot').text().replace(/,/g, ""));
      tot = tot - disc;

      $('#total_amount').text(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
      $('#TotalDisc').text(disc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));

      $('#TotalModal span').text(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
      $('#TotalModal1 span').number(tot.toFixed(1));

   }else if ( ($('.TAX_2').val().indexOf('%') != -1) && ($('.DISCOUNT').val().indexOf('%') != -1) ) {
      disc = 0;
      tot = parseFloat($('#Subtot').text().replace(/,/g, ""));
      tot = tot - disc;

      $('#total_amount').text(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
      $('#TotalDisc').text(disc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));

      $('#TotalModal span').text(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
      $('#TotalModal1 span').number(tot.toFixed(1));
   }   
}

$('#cook').click(function(){
  $('.modal-title').text("Send Order to Kitchen");
  //$('#cookModal').modal('show');

//$(document).ready(function() {
var temp_id = '{{ $path_id }}';
var vtable = $('#datamenu').DataTable({
   processing: true,
   serverSide: true,
   searching: false,
   paging: false,
   bInfo : false,
   //order: [[ 2, 'asc' ]],
   ajax:{
    url: "{{ url('sales/order_datatables') }}/"+temp_id,
   },
   columns:[
     {
     data: 'menu_name',
     name: 'menu_name'
     },
     {
     data: 'qt',
     className: "text-center"
     },
     {
     data: 'add_desc',
     className: "text-center"
     }
   ]
  });
 });

//function tampilModal() {
//$( "#cookModal" ).on('shown.bs.modal', function(){

$('#cookModal').click(function(){
  $('#cookModal').modal('show');
  

//$( "#cookModal" ).on('shown.bs.modal', function(){
//$( "#cookModal" ).on('shown.bs.modal', function(){
      //var id = $('.holdList .selectedHold').attr('id');
      $('.modal-title').text("Send Order to Kitchen");
      $('#action_button').val("Add");
      var temp_id = '{{ $path_id }}';
      var token = '{{ csrf_token() }}';

      var data ={};
      //.productNum input attr id=qt-123
      $('#productList > div').each(function(){
        var el = $(this).find('.productNum input');
        data[el.attr('id')] = el.val();
      });

      //alert(JSON.stringify(data));
      //return false;
      $.ajax({
          url : "{{ url('sales/list_order') }}/"+temp_id,
          type: "POST",
          data:{'data':data, '_token':token},
          //dataType: "JSON",
          success: function(data)
          { 
            if(data!=''){
              $('.list_dapur').html(data);
              var d = new Date();
              $('.date_dapur').html("Date: "+d.getDate() + "-" + d.getMonth() + "-" + d.getFullYear()+" "+
                d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds());
              $('.meja_order').html("Pesanan Meja : "+temp_id);
              $('.user_order').html("User Order : "+$('.navbar-right .hidden-xs').text());
              $('#path_id').val(temp_id);
              $('#send_kitchen').val("SendToKitchen");
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
             alert("[E] List order failed");
          }
      });

      $(this).find('.button_focus').focus();
  });

  $( "#cookModal" ).on('hidden.bs.modal', function(){
      $('.list_dapur').html('');
  });

$('#change_table').click(function(){
  $('#changeTable').modal('show');
  $('.modal-title').text("Change Table");
  
  var token = '{{ csrf_token() }}';
  var temp_id = '{{ $path_id }}';
  
  var data ={};
  $('#productList > div').each(function(){
    var el = $(this).find('.productNum input');
    data[el.attr('id')] = el.val();
  });

  $.ajax({
    url : "{{ url('sales/active_table') }}",
    type: "POST",
    data:{'data':data, '_token':token},
    success: function(data)
    {
      if(data!=''){
        $('.list_table').html(data);

        $('#path_id').val(temp_id);
        

        //$('#tablechanged span').text(next_table);
        }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert("[E] List order failed");
        }
        });
      
      $(this).find('.button_focus').focus();
  });

  $("#list_table").click(function(){
    var method = $('input[name="changeTblBtn"]:checked').val();
    $('#tablechanged').text(method);

}); 

  function reply_click(clicked_id)
  {
      //onClick="reply_click(this.value)"
      //alert(clicked_id);
      //var clicked_id;
      
  }

 $('#paymentProcess').click(function(){
      var total_payment;
      total_payment = document.getElementById("total_amount").innerText;  

      $('.modal-title').text("Payment Form");
      $('#t_payment').val(total_payment);
      $('#payModal').modal('show');
  });

  $("#paymentMethod").click(function(){
    var method = $('input[name="emotion"]:checked').val();
    var button = $('#pay_button');
    
    if (method === '01') {
      $('.p_amount').show();
      $('.p_change').show();
      $('.card_field').hide();
      $('.card_number').hide();
      $('.account_no').hide();
      $('.reff_no').hide();
      $('#action_button').val("cash");
      $('#paymethod_id').val("01");
      $('#paymethod').val("CASH");
      $(button).prop('disabled', false);
    } else if (method === '02') {
      $('.p_amount').hide();
      $('.p_change').hide();
      $('.card_field').show();
      $('.card_number').show();
      $('.account_no').hide();
      $('.reff_no').show();
      $('#action_button').val("card");
      $('#paymethod_id').val("02");
      $('#paymethod').val("CARD");
      $(button).prop('disabled', false);
    } else if (method === '03') {
      $('.p_amount').hide();
      $('.p_change').hide();
      $('.card_field').hide();
      $('.card_number').hide();
      $('.account_no').show();
      $('.reff_no').show();
      $('#action_button').val("delivery");
      $('#paymethod_id').val("03");
      $('#paymethod').val("OVO");
      $(button).prop('disabled', false);
    } else if (method === '04') {
      $('.p_amount').hide();
      $('.p_change').hide();
      $('.card_field').hide();
      $('.card_number').hide();
      $('.account_no').show();
      $('.reff_no').show();
      $('#action_button').val("delivery");
      $('#paymethod_id').val("04");
      $('#paymethod').val("GOPAY");
      $(button).prop('disabled', false);
    }
});   


 // ********************************* change calculations
 $('#p_amount:not(.numpad)').on('keyup',function() {
      get_paid();
 });

function get_paid(){
  //$('#total_amount').text(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));

  var change = -(parseFloat($('#total_amount').text().replace(/,/g, "")) - parseFloat($('#p_amount').val().replace(/,/g, "")));
  var button = $('#pay_button');
  
  if(change < 0){
     $('#ReturnChange span').number(change.toFixed(1));
     $('#ReturnChange span').addClass( "red" );
     $('#ReturnChange span').removeClass( "light-blue" );
     $(button).prop('disabled', false);
  }else{
     $('#ReturnChange span').number(change.toFixed(1));
     $('#ReturnChange span').removeClass( "red" );
     $('#ReturnChange span').addClass( "light-blue" );
     $(button).prop('disabled', false);
  }
}

function payBtn() {
   $(".print_ticket").off();
	
	var Type = $('#paymethod_id').val();
	var PayName = $('#paymethod').val();
   //var waiterID = $('.Hold.selectedHold').attr('waiterid');
   //var waiterName = $('.Hold.selectedHold').attr('waitername');
   var Tax = $('.TAX_2').val();
   var Discount = $('.DISCOUNT').val().replace(/,/g, "");
   var Subtotal = $('#Subtot').text().replace(/,/g, "");
   var Total = $('#total_amount').text().replace(/,/g, "");
   //var createdBy = '<!--?php echo $this->user->firstname." ".$this->user->lastname;?>';
   var totalItems = $('#ItemsNum span').text();
   var Paid = $('#p_amount').val().replace(/,/g, "");
   var Change = $('#p_change').text().replace(/,/g, "");
   var paidMethod = $('#paymentMethod').find('input[name="emotion"]:checked').val();
   var Status = 0;

   var Card_number = $('#card_number').val();
   var Card_type = $('#card_type').val();
   var Bank_name = $('#bank_name').val();
   var Accountno = $('#account_no').val();
   var Reffno = $('#reff_no').val();
   //var ccmonth = $('#CreditCardMonth').val();
   //var ccyear = $('#CreditCardYear').val();
   //var ccv = $('#CreditCardCODECV').val();
   var path_id = '{{ $path_id }}';
   
   
   /*
   switch(paidMethod) {
       case '1':
           paidMethod += '~'+$('#CreditCardNum').val()+'~'+$('#CreditCardHold').val();
           break;
       case '2':
           paidMethod += '~'+$('#ChequeNum').val()
           break;
       case '0':
           var change = parseFloat(Total) - parseFloat(Paid);
           if(change==parseFloat(Total)) Status = 1;
           else if(change>0) Status = 2;
           else if(change<=0) Status = 0;
   }
   */
  var taxamount = $('#TotalTax').text().replace(/,/g, "");
  //var taxamount = $('.TAX_2').val().indexOf('%') != -1 ? parseFloat($('#TotalTax').text()) : $('.TAX_2').val();
  var discountamount = $('#TotalDisc').text().replace(/,/g, "");
  //var discountamount = $('.DISCOUNT').val().indexOf('%') != -1 ? parseFloat($('#TotalDisc').text()) : $('.DISCOUNT').val();
  var Tableno = '{{ $tempStatus->table_no }}'
  var token = '{{ csrf_token() }}';


   //var number = $('.selectedHold').clone().children().remove().end().text();
   //var token = $('.holdList .selectedHold').attr('data-token');

  $.ajax({
      url : "{{ url('sales/add_payment') }}",
      type: "POST",
      data: {type: Type, pathid: path_id, subtotal: Subtotal, total: Total, total_itm: totalItems, discount: discountamount,
             tax: taxamount, payamount: Paid, chamount: Change, payname: PayName, tableno: Tableno, cardnumber: Card_number,
             cardtype: Card_type, bankname: Bank_name, reffno: Reffno, accountno: Accountno, _token: token},
      //data: {waiter_id: waiterID, waitername: waiterName, discountamount: discountamount, taxamount: taxamount, tax: Tax, discount: Discount, subtotal: Subtotal, total: Total, created_by: createdBy, totalitems: totalItems, paid: Paid, status: Status, paidmethod: paidMethod, ccnum: ccnum, ccmonth: ccmonth, ccyear: ccyear, ccv: ccv},
      success: function(data)
      {
         $('#printSection').html(data);
         //$('#productList').load("<!--?php echo site_url('pos/load_posales')?>/"+number);
         //$('#ItemsNum span, #ItemsNum2 span').load("<_?php echo site_url('pos/totiems')?>/"+number);
         //$('#Subtot').load("<_?php echo site_url('pos/subtot')?>/"+number, null, total_change);
         $('#payModal').modal('hide');
         $('#receiptTicket').modal('show');
         $('.modal-title').text("RECEIPT");
         ///$('#ReturnChange span').text('0');
         $('#Paid').val('0');
         //$('.holdList').load("<_?php echo site_url('pos/holdList/'.$this->register)?>/"+number);
		
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
         alert("[E] Sale failed");
      }
  });
  
  $('#CreditCardNum').val('');
  $('#CreditCardHold').val('');
  $('#CreditCardYear').val('');
  $('#CreditCardMonth').val('');
  $('#CreditCardCODECV').val('');

}

function PrintTicket() {
  $('.modal-body').removeAttr('id');
  window.print();
  $('.modal-body').attr('id', 'modal-body');
}

document.getElementById("Print").onclick = function () {
    printElement(document.getElementById("printSection"));
};

function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection_1 = document.getElementById("printSection_1");

    if (!$printSection_1) {
        var $printSection_1 = document.createElement("div");
        $printSection_1.id = "printSection_1";
        document.body.appendChild($printSection_1);
    }

    $printSection_1.innerHTML = "";
    $printSection_1.appendChild(domClone);
    window.print();
}

function closedOrder() {
  if($('#close_btn').val() == 'closed')
  {
    location.href = "{{ url('sales') }}";
  }
}


</script>

@endsection

