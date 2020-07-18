@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Peta Sosialisasi </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Peta Sosialisasi</a>
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
              <button onclick="location.href='/sosialisasi/add'" class="dropdown-item"><i class="la la-check-circle-o"></i> Tambah Lokasi</button>
              <button class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#submit_form"><i class="la la-filter"></i> Filter Data</button>

              <div class="dropdown-divider"></div>
              <button class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#"><i class="la la-file-text"></i> Export Excel (.xlsx)</button>  
            </div>
          </div>
        </div>
      </div>

      <div class="content-body">
        <!-- Input Mask start -->
        <section class="inputmask" id="inputmask">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">PENAMBAHAN LOKASI</h4>
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
                <div class="card-content collapse show">
                <form id="form_menu" method="post" enctype="multipart/form-data" class="icons-tab-steps-1 wizard-circle">
                @csrf  
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>LOKASI SOSIALISASI
                          </h5>
                          <div class="form-group">
                            <input type="text" name="lokasi" class="form-control" placeholder="Input Lokasi Sosialisasi"
                            />
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>JUDUL SOSIALISASI</h5>
                          <div class="form-group">
                          <input type="text" name="judul" class="form-control" placeholder="Input Judul Sosiaslisi"/>
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>DESKRIPSI SOSIALISASI</h5>
                          <div class="form-group">
                            <textarea name="deskripsi" class="form-control" placeholder="Input Detail Sosiaslisi"></textarea>
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>JUMLAH PESERTA
                            <small class="text-muted">Estimasi jumlah peserta</small>
                          </h5>
                          <div class="form-group">
                            <input name="jml_peserta" type="text" class="form-control" placeholder="Estimasi jumlah peserta"
                            />
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>PIC SOSIALISASI</h5>
                          <div class="form-group">
                            <input name="pic_sosialisasi" type="text" class="form-control" placeholder="Nama PIC"
                            />
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>TANGGAL PELAKSANAAN</h5>
                          <div class="form-group">
                            <input name="tanggal"  type="date" class="form-control datetime" />
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>WAKTU PELAKSANAAN</h5>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                                <input name="jam_mulai" type='time' class="form-control" />
                                <small class="text-muted">Jam Mulai</small>
                            </div>
                            <div class="col-md-6">
                                <input name="jam_selesai" type='time' class="form-control">
                                <small class="text-muted">Jam Selesai</small>
                            </div>
                          </div>
                          </div>
                        </fieldset>
                      </div>

                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                        <form method="post" id="geocoding_form">
                          <label for="address">CARI LOKASI :</label>
                            <div class="input-group mb-1">
                              <input type="text" class="form-control" id="address" name="address" />
                              <div class="input-group-append">
                                <input type="submit" class="btn btn-primary" value="Search" />
                              </div>
                            </div>
                        </form>
                        </fieldset>

                        <fieldset>
                          <h5>MAPS</h5>
                            <div class="card-body">
                              <div id="world-map-gdp" class="height-400"></div>
                            </div>
                        </fieldset>
                        <fieldset>
                          <h5>LAT / LONG</h5>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                                <input name="latitude" type="text" class="form-control" />
                                <small class="text-muted">Latitude</small>
                            </div>
                            <div class="col-md-6">
                                <input name="longitude" type="text" class="form-control">
                                <small class="text-muted">Longitude</small>
                            </div>
                          </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>

                    <div class="form-group">
                      <button class="btn btn-info btn-icon"><i class="la la-arrow-circle-left"></i> Back</button>
                      <button type="submit" class="btn btn-success btn-icon"><i class="la la-check-circle-o"></i> Submit</button>
                    </div>
                  </div>
              </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Input Mask end -->
           
      <div id="loading"></div>
      </div>
</div>

<script type="text/javascript">
$('#form_menu').on('submit', function(event){
      event.preventDefault();
      
      $.ajax({
          url:"{{ route('sosialisasi_store') }}",
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
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
              $('#form_menu')[0].reset();
              setTimeout(function() {
                window.location.href = '/sosialisasi/';
              }, 1000);
            }
            //$('#form_result').html(html);
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            }
          }
    });
})
</script>
@endsection