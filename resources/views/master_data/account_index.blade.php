@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Members </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Master Data</a>
                </li>
                <li class="breadcrumb-item active"> Members
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
              <a class="dropdown-item" href="#"><i class="la la-plus"></i> Add Account</a>
              <div class="dropdown-divider"></div>
              <button class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#info"><i class="la la-plus-circle"></i> Add Group</button>  
            </div>
          </div>
        </div>
      </div>

      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Account Master </h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <ul class="nav nav-tabs nav-linetriangle">
                      <li class="nav-item">
                        <a class="nav-link active" id="baseIcon-tab31" data-toggle="tab" aria-controls="tabIcon31"
                        href="#tabIcon31" aria-expanded="true"><i class="la la-play"></i> Account List</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="baseIcon-tab32" data-toggle="tab" aria-controls="tabIcon32"
                        href="#tabIcon32" aria-expanded="false"><i class="la la-flag"></i> Account Group</a>
                      </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                      <div role="tabpanel" class="tab-pane active" id="tabIcon31" aria-expanded="true"
                      aria-labelledby="baseIcon-tab31">
                      <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Unit</th>
                          <th>Acc Code</th>
                          <th>Acc group</th>
                          <th>Acc Text</th>
                          <th>Acc Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                          <td>$320,800</td>
                        </tr>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                        <th>#</th>
                          <th>Unit</th>
                          <th>Acc Code</th>
                          <th>Acc group</th>
                          <th>Acc Text</th>
                          <th>Acc Status</th>
                        </tr>
                      </tfoot>
                    </table>
                      </div>
                      <div class="tab-pane" id="tabIcon32" aria-labelledby="baseIcon-tab32">
                      <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Unit</th>
                          <th>Group</th>
                          <th>Description</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                        </tr>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Unit</th>
                          <th>Group</th>
                          <th>Description</th>
                          <th>Status</th>
                        </tr>
                      </tfoot>
                    </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ Zero configuration table -->



        <!-- Modal -->
        <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Account Group</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-info">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- end Modal -->


      </div>
</div>

    
@endsection