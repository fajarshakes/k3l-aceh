@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
  </div>
      <div class="content-body">
        <div id="user-profile">
          <div class="row">
            <div class="col-12">
              <div class="card profile-with-cover">
                <div class="card-img-top img-fluid bg-cover height-300" style="background: url('../../../app-assets/images/carousel/22.jpg') 50%;"></div>
                <div class="media profil-cover-details w-100">
                  <div class="media-left pl-2 pt-2">
                    <a href="#" class="profile-image">
                      <img src="../../../app-assets/images/portrait/small/avatar-s-8.png" class="rounded-circle img-border height-100"
                      alt="Card image">
                    </a>
                  </div>
                  <div class="media-body pt-3 px-2">
                    <div class="row">
                      <div class="col">
                        <h3 class="card-title">{{ $userdata->name }}</h3>
                      </div>
                      <div class="col text-right">
                        {{--<button type="button" class="btn btn-primary d-"><i class="la la-plus"></i> Follow</button>--}}
                        <div class="btn-group d-none d-md-block float-right ml-2" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-success"><i class="la la-dashcube"></i> UBAH PASSWORD</button>
                          <button type="button" class="btn btn-success"><i class="la la-cog"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <nav class="navbar navbar-light navbar-profile align-self-end">
                  <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse" aria-expanded="false"
                  aria-label="Toggle navigation"></button>
                  <nav class="navbar navbar-expand-lg">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        {{--
                        <li class="nav-item active">
                          <a class="nav-link" href="#"><i class="la la-line-chart"></i> Timeline <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><i class="la la-user"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><i class="la la-briefcase"></i> Projects</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><i class="la la-heart-o"></i> Favourites</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><i class="la la-bell-o"></i> Notifications</a>
                        </li>
                        --}}
                        <li class="nav-item">
                          <a class="nav-link" href="#"><i class="la la-user"></i> Profile : {{ $userdata->name }}</a>
                        </li>
                      </ul>
                    </div>
              </div>
              </nav>
            </div>
          </div>
        </div>
        
        <div class="col-6">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        </div>

        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="striped-row-layout-icons">Personal Info</h4>
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
                <div class="card-content collpase show">
                  <div class="card-body">
                    <form class="form form-horizontal striped-rows form-bordered">
                      <div class="form-body">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="timesheetinput1">Nama Lengkap</label>
                          <div class="col-md-8">
                            <div class="position-relative has-icon-left">
                              <input type="text" class="form-control" value="{{ $userdata->name }}"
                              name="employeename" readonly >
                              <div class="form-control-position">
                                <i class="ft-user"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="timesheetinput1">Username</label>
                          <div class="col-md-8">
                            <div class="position-relative has-icon-left">
                              <input type="text" id="timesheetinput1" class="form-control" value="{{ $userdata->username }}"
                              name="employeename" readonly >
                              <div class="form-control-position">
                                <i class="ft-user"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="timesheetinput2">Unit</label>
                          <div class="col-md-8">
                            <div class="position-relative has-icon-left">
                              <input type="text" id="timesheetinput2" class="form-control" value="{{ $userdata->UNIT_NAME }}"
                              name="projectname" readonly>
                              <div class="form-control-position">
                                <i class="la la-bank"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="timesheetinput1">Sebutan Jabatan</label>
                          <div class="col-md-8">
                            <div class="position-relative has-icon-left">
                              <input type="text" id="timesheetinput1" class="form-control" value="{{ $userdata->position_desc }}"
                              name="employeename" readonly >
                              <div class="form-control-position">
                                <i class="la la-comment"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="timesheetinput1">Hak Akses</label>
                          <div class="col-md-8">
                            <div class="position-relative has-icon-left">
                              <input type="text" id="timesheetinput1" class="form-control" value="{{ $userdata->GROUP_NAME }}"
                              name="employeename" readonly >
                              <div class="form-control-position">
                                <i class="la la-check-circle"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="timesheetinput2">Email</label>
                          <div class="col-md-8">
                            <div class="position-relative has-icon-left">
                              <input type="text" id="timesheetinput2" class="form-control" value="{{ $userdata->email }}"
                              name="projectname" readonly>
                              <div class="form-control-position">
                                <i class="la la-envelope"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          
            @if (!empty($vendordata))
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="striped-row-layout-icons">Company Info</h4>
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
                <div class="card-content collpase show">
                  <div class="card-body">
                  <form class="form" action="profile/update_company" method="post">
                  {{csrf_field()}}
                      <div class="form-body">
                        <div class="form-group">
                          <label for="timesheetinput1">Nama Perusahaan</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" value="{{ $vendordata->VENDOR_NAME }}"
                            name="employeename" readonly>
                            <div class="form-control-position">
                              <i class="la la-bank"></i>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="timesheetinput5">SAP No</label>
                              <div class="position-relative has-icon-left">
                                <input type="text" class="form-control" value="{{ $vendordata->SAP_NO }}" readonly>
                                <div class="form-control-position">
                                  <i class="la la-flag"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="timesheetinput6">SIPAT No</label>
                              <div class="position-relative has-icon-left">
                                <input type="text" class="form-control" value="{{ $vendordata->SIPAT_ID }}" readonly>
                                <div class="form-control-position">
                                  <i class="la la-flag"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="timesheetinput6">KUALIFIKASI</label>
                              <div class="position-relative has-icon-left">
                                <input type="text" class="form-control" value="{{ $vendordata->QUALIFICATION }}" readonly>
                                <div class="form-control-position">
                                  <i class="la la-flag"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="timesheetinput2">Alamat Perusahaan</label>
                          <div class="position-relative has-icon-left">
                            <textarea class="form-control" placeholder="Alamat Perusahaan"
                            name="address" required>{{ $vendordata->ADDRESS }}</textarea>
                            <div class="form-control-position">
                              <i class="la la-home"></i>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="timesheetinput5">Nama Penanggung Jawab</label>
                              <div class="position-relative has-icon-left">
                                <input type="text" class="form-control" name="pic_name" value="{{ $vendordata->PIC_NAME }}" required>
                                <div class="form-control-position">
                                  <i class="ft-user"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="timesheetinput6">Jabatan</label>
                              <div class="position-relative has-icon-left">
                                <input type="text" class="form-control" name="pic_position" value="{{ $vendordata->PIC_POSITION }}" required>
                                <div class="form-control-position">
                                  <i class="la la-graduation-cap"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="timesheetinput6">Kontak / Phone</label>
                              <div class="position-relative has-icon-left">
                                <input type="text" class="form-control" name="pic_contact" value="{{ $vendordata->PIC_PHONE }}" required>
                                <div class="form-control-position">
                                  <i class="la la-mobile"></i>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- HIDDEN FIELD -->
                          <input type="hidden" name="company_id" value="{{ $vendordata->ID }}" required>

                        </div>


                      </div>
                      <div class="form-actions right">
                        <button type="button" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> Update Data
                        </button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
            @endif

        </div>

      </div>
    </div>


<script type="text/javascript">
$(document).ready(function() {
    $('#table1').DataTable( {
        //"scrollX": true,
        "searching" : false,
        "info" : false,
        "paging" : false
    } );
} );

</script>
@endsection