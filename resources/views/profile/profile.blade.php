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
                          <button name="open_modal" id="open_modal" type="button" class="btn btn-success"><i class="la la-dashcube"></i> UBAH PASSWORD</button>
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

 <!-- Modal -->
 <div class="modal fade text-left" id="submit_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info white">
          <h4 class="modal-title white" id="myModalLabel11">SUBMIT FORM</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">

          <div class="form-group">
            <p class="blue text-center"><i class="la la-check-circle" style="font-size:60px;"></i></p>
            <p class="text-center text-blue">Untuk perubahan password, anda harus mendapatkan token dari email terdaftar. klik tombol dibawah untuk generate  token</p>

            <div class="col-md-12 text-center">
              <button onclick="generate_token('{{ $userdata->id }}')" class="btn btn-danger btn-icon"><i class="la la-check-circle-o"></i> GENERATE TOKEN </button>
            </div>

          </div>

          <form id="form_menu" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="companyName">TOKEN</label>
            <input type="text" class="form-control" name="action" maxlength="6" placeholder="TOKEN" required /> 
          </div>
          
          <div class="form-group">
            <label for="companyName">PASSWORD BARU</label>
            <input type="text" class="form-control" name="action" placeholder="PASSWORD BARU" required /> 
          </div>

          <div class="form-group">
            <label for="companyName">ULANGI PASSWORD BARU</label>
            <input type="text" class="form-control" name="action" placeholder="ULANGI PASSWORD BARU" required /> 
          </div>
        
          <input type="hidden" name="id_user" id="id_user" />
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info btn-icon"><i class="la la-check-circle-o"></i> Submit</button>
        </div>
        </form>
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


$('#open_modal').click(function(){
  $('.modal-title').text("RESET PASSWORD");
  $('#action_button').val("Add");
  $('#action').val("submit");
  $('#submit_form').modal('show');
});

function generate_token(id)
{

   var token = '{{ csrf_token() }}';
    $.ajax({
        url:"{{ route('generate_token') }}",
        method:"POST",
        data: {id_user: id, _token: token },
        //data: new FormData(this),
        //contentType: false,
        //cache:false,
        //processData: false,
        //dataType:"json",
        beforeSend: function(){
          $('#loading').html('<div class="loader-container"><div class="line-scale loader-warning"><div></div><div></div><div></div><div></div><div></div></div></div>');
        },
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
            html = data.success;
              type_toast = 'success';
          }
          //$('#form_result').html(html);
          if(type_toast == 'error'){
            $('#loading').html('');
            toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
          } else if (type_toast == 'success') {
            toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
          }
        }
  });
}

</script>
@endsection