@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Profile </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Master Data</a>
                </li>
                <li class="breadcrumb-item active"> Profile
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton"><a class="dropdown-item" href="#"><i class="la la-calendar-check-o"></i> Calender</a>
              <a class="dropdown-item" href="/member/add"><i class="la la-cart-plus"></i> Add Member</a>
              <a class="dropdown-item" href="#"><i class="la la-cart-plus"></i> Cart</a>
              <a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Support</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
            </div>
          </div>
        </div>
      </div>

      <div class="content-body">

      <!-- Grid With Label start -->
      <section class="grid-with-label" id="grid-with-label">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">PROFILE</h4>
                  <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form action="#">
                      <div class="form-body">
                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Nama Perusahaan</label>
                              <input type="text" class="form-control" placeholder="1">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Alamat Perusahaan</label>
                              <input type="text" class="form-control" placeholder="1">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>NPWP</label>
                              <input type="text" class="form-control" placeholder="col-md-2">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Label</label>
                              <input type="text" class="form-control" placeholder="col-md-10">
                            </div>
                            <fieldset>
                      <div class="input-group">
                        <input type="text" class="form-control touchspin" value="50">
                      </div>
                    </fieldset>
                          </div>
                        </div>

                      </div>
                      <div class="form-actions">
                        <div class="text-right">
                          <button type="submit" class="btn btn-primary">Submit <i class="ft-thumbs-up position-right"></i></button>
                          <button type="reset" class="btn btn-warning">Reset <i class="ft-refresh-cw position-right"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Grid With Label end -->
      </div>
</div>

    
@endsection