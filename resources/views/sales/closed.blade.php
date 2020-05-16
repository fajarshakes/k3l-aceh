@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<style>
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

</style>

    <div class="sidebar-left">
      <div class="sidebar">
        <div class="sidebar-content email-app-sidebar d-flex">
          <div class="email-app-menu col-md-5 card d-none d-lg-block">

            @include('sales.menu')

            
          </div>
          <div class="email-app-list-wraper col-md-7 card p-0">
            <div class="email-app-list">
              <div class="card-body chat-fixed-search">
                <fieldset class="form-group position-relative has-icon-left m-0 pb-1">
                  <input type="text" class="form-control" id="iconLeft4" placeholder="Search email">
                  <div class="form-control-position">
                    <i class="ft-search"></i>
                  </div>
                </fieldset>
              </div>
              <div id="users-list" class="list-group">
                <div class="users-list-padding media-list">
                  
                @foreach($closed_orders as $index=>$row)
                  <a href="#" class="media border-0">
                    <div class="media-left pr-1">
                      <span class="avatar avatar-md">
                        <span class="media-object rounded-circle text-circle bg-info">T</span>
                      </span>
                    </div>
                    <div class="media-body w-100">
                      <h6 class="list-group-item-heading text-bold-500">Tonny Deep
                        <span class="float-right">
                          <span class="font-small-2 primary">4:14 AM</span>
                        </span>
                      </h6>
                      <p class="list-group-item-text text-truncate text-bold-600 mb-0">PixInvent, I fount you...</p>
                      <p class="list-group-item-text mb-0">I would be good.
                        <span class="float-right primary">
                          <span class="badge badge-danger mr-1">Family</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span>
                      </p>
                    </div>
                  </a>
                  @endforeach    
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="content-right">
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
                      data-placement="top" data-original-title="Report SPAM"><i class="ft-alert-octagon"></i></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                      data-placement="top" data-original-title="Delete"><i class="ft-trash-2"></i></button>
                    </div>
                  </div>
                  <div class="col-md-6 col-12 text-right">
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
              <div class="email-app-title card-body">
                <h3 class="list-group-item-heading">Project ABC Status Report</h3>
                <p class="list-group-item-text">
                  <span class="primary">
                    <span class="badge badge-primary">Previous</span> <i class="float-right font-medium-3 ft-star warning"></i></span>
                </p>
              </div>
              <div class="media-list">
                <div id="headingCollapse1" class="card-header p-0">
                  <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1"
                  class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                    <div class="media-left pr-1">
                      <span class="avatar avatar-md">
                        <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-1.png"
                        alt="Generic placeholder image">
                      </span>
                    </div>
                    <div class="media-body w-100">
                      <h6 class="list-group-item-heading">John Doe</h6>
                      <p class="list-group-item-text">Can you please provide me ABC Status Report.
                        <span class="float-right text muted">12 July</span>
                      </p>
                    </div>
                  </a>
                </div>
                <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1" class="card-collapse collapse"
                aria-expanded="true">
                  <div class="card-content">
                    <div class="card-body">
                      <p>Hi Wayne,</p>
                      <p>Can you please provide me ABC Status Report.</p>
                      <p>Gmail Material Design Concept. Please check the full project
                        on Behance. Hope that will be fine for you.</p>
                      <p>Thanks for your consideration !</p>
                      <p>Regards,
                        <br/>John</p>
                    </div>
                  </div>
                </div>
                <div id="headingCollapse2" class="card-header p-0">
                  <a data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2"
                  class="email-app-sender media border-0">
                    <div class="media-left pr-1">
                      <span class="avatar avatar-md">
                        <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.png"
                        alt="Generic placeholder image">
                      </span>
                    </div>
                    <div class="media-body w-100">
                      <h6 class="list-group-item-heading">Wayne Burton</h6>
                      <p class="list-group-item-text">to me
                        <span>Today</span>
                        <span class="float-right">
                          <i class="la la-reply mr-1"></i>
                          <i class="la la-arrow-right mr-1"></i>
                          <i class="la la-ellipsis-v"></i>
                        </span>
                      </p>
                    </div>
                  </a>
                </div>
                <div id="collapse2" role="tabpanel" aria-labelledby="headingCollapse2" class="card-collapse"
                aria-expanded="false">
                  <div class="card-content">
                    <div class="email-app-text card-body">
                      <div class="email-app-message">
                        <p>Hi John,</p>
                        <p>Thanks for your feedback ! Here's a new layout for a new
                          Modern Admin theme.</p>
                        <p>We will start the new application development soon once this
                          will be completed, I will provide you more details after
                          this Saturday. Hope that will be fine for you.</p>
                        <p>Hope your like it, or feel free to comment, feedback or rebound
                          !
                        </p>
                        <p>Cheers~</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="email-app-text-action card-body">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <!-- Modal -->
      <div class="modal fade text-left" id="formPeriod" tabindex="false" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Open Period Transaction - {{ date('Y-m-d') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_period" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
              
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="companyName">Cash In Hand</label>
                      <input type="text" class="rupiah form-control" id="cashinhand" name="cashinhand" style="text-align: right" placeholder="Cash In Hand">
                    </div>
                  </div>
              </div>
                
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade text-left" id="formModal" tabindex="false" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_menu" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">

              <div id="orderMethod1" class="form-group form-center">
                <label for="companyName">Select Order Type</label>
                <fieldset class="col-md-12 form-group">
                
                <input type="radio" name="emotion" id="eat_in" class="input-hidden" value="1" />
                <label for="eat_in">
                  <img src="{{ url('app-assets/images/portrait/small/avatar-s-1.png') }}" alt="EAT IN" />
                </label>

                <input type="radio" name="emotion" id="take_away" class="input-hidden" value="2" />
                <label for="take_away">
                  <img src="{{ url('app-assets/images/portrait/small/avatar-s-2.png') }}" alt="TAKE AWAY" />
                </label>

                <input type="radio" name="emotion" id="delivery" class="input-hidden" value="3" />
                <label for="delivery">
                  <img src="{{ url('app-assets/images/portrait/small/avatar-s-3.png') }}" alt="DELIVERY" />
                </label>
              
              </fieldset>
            </div>

            <div class="form-group take_form" style="display:none;">
              <label for="name_order">Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name">
              <p></p>
              <label for="name_order">Phone</label>
                <input type="text" class="form-control" placeholder="Phone" name="phone">
            </div>

            <div class="form-group eat_in" style="display:none;">
            <label for="name_order">Table No</label>
              <div class="col-md-12">
                <input name="table_no" class="input_hold 01">
              </div>
            </div>
              
              <input type="hidden" name="action" id="action" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="action_button" id="action_button" class="btn btn-outline-info" disabled>Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>


@endsection