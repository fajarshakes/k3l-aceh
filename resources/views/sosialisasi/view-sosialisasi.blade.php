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
              <button onclick="location.href='/sosialisasi'" class="dropdown-item"><i class="la la-chevron-circle-left"></i> Kembali</button>
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
                  <h4 class="card-title">LOKASI SOSIALISASI</h4>
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
                <form id="form_menu_xx" method="post" enctype="multipart/form-data">
                @csrf  
                  <input type="hidden" name="update_id" value="{{$sosialisasi ? $sosialisasi->id : ''}}" id="update_id" />
                  <div class="card-body">
                    <div class="row">
                    <div class="col-xl-6">
                        <fieldset>
                          <div id="geoloc5"></div>
                          <div id="fixedMapCont" class="height-450"></div>
                          <input id="geolat" type="hidden" value="" size="20"  class="form-control"/>
                          <input id="geolng" type="hidden" value="" size="20"  class="form-control"/>
                        </fieldset>

                        <fieldset>
                          <h5>LAT / LONG</h5>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                                <input id="new-geolat" name="latitude" value="{{$sosialisasi ? $sosialisasi->latitude : ''}}" type="text" class="form-control" readonly />
                                <small class="text-muted">Latitude</small>
                            </div>
                            <div class="col-md-6">
                                <input id="new-geolng" name="longitude" value="{{$sosialisasi ? $sosialisasi->longitude : ''}}" type="text" class="form-control" readonly />
                                <small class="text-muted">Longitude</small>
                            </div>
                          </div>
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>EVIDENCE</h5>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <a target="_blank" href="{{ URL::to('/') }}/files/sosialisasi/{{ $sosialisasi->photo }}" class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> View Photo</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <a target="_blank" href="{{ URL::to('/') }}/files/sosialisasi/{{ $sosialisasi->presentasi }}" class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> View Presentasi</a>
                                </div>
                            </div>
                          </div>
                          </div>
                        </fieldset>
                        
                      </div>
                      
                      <div class="col-xl-6">
                        <fieldset>
                          <h5>LOKASI SOSIALISASI
                          </h5>
                          <div class="form-group">
                            <input type="text" name="lokasi" value="{{$sosialisasi ? $sosialisasi->lokasi : ''}}" class="form-control" placeholder="Input Lokasi Sosialisasi" readonly
                            />
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>JUDUL SOSIALISASI</h5>
                          <div class="form-group">
                          <input type="text" name="judul" value="{{$sosialisasi ? $sosialisasi->judul : ''}}" class="form-control" placeholder="Input Judul Sosiaslisi" readonly/>
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>DESKRIPSI SOSIALISASI</h5>
                          <div class="form-group">
                            <textarea name="deskripsi" class="form-control" placeholder="Input Detail Sosiaslisi" readonly>{{$sosialisasi ? $sosialisasi->deskripsi : ''}}</textarea>
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>JUMLAH PESERTA
                            <small class="text-muted">Estimasi jumlah peserta</small>
                          </h5>
                          <div class="form-group">
                            <input name="jml_peserta" value="{{$sosialisasi ? $sosialisasi->jml_peserta : ''}}" type="text" class="form-control" placeholder="Estimasi jumlah peserta" readonly
                            />
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>PIC SOSIALISASI</h5>
                          <div class="form-group">
                            <input name="pic_sosialisasi" value="{{$sosialisasi ? $sosialisasi->pic_sosialisasi : ''}}" type="text" class="form-control" placeholder="Nama PIC" readonly
                            />
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>TANGGAL PELAKSANAAN</h5>
                          <div class="form-group">
                            <input name="tanggal" value="{{$sosialisasi ? $sosialisasi->tanggal : ''}}"  type="date" class="form-control datetime" readonly/>
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>WAKTU PELAKSANAAN</h5>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                                <input name="jam_mulai" value="{{$sosialisasi ? $sosialisasi->jam_mulai : ''}}" type='time' class="form-control" readonly/>
                                <small class="text-muted">Jam Mulai</small>
                            </div>
                            <div class="col-md-6">
                                <input name="jam_selesai" value="{{$sosialisasi ? $sosialisasi->jam_selesai : ''}}" type='time' class="form-control" readonly>
                                <small class="text-muted">Jam Selesai</small>
                            </div>
                          </div>
                          </div>
                        </fieldset>
                        
                      </div>

                    </div>

                    <div class="form-group">
                      <a href="javascript:history.back()" class="btn btn-info btn-icon"><i class="la la-arrow-circle-left"></i> Back</a>
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

<script>

$('#geoloc5').leafletLocationPicker({
		alwaysOpen: true,
		mapContainer: "#fixedMapCont"
}).on('changeLocation', function(e) {
	$(this)
	.siblings('#geolat').val( e.latlng.lat )
	.siblings('#geolng').val( e.latlng.lng )
  .siblings('#address').text('"'+e.location+'"');
  
var geolat = document.getElementById("geolat").value;
var geolng = document.getElementById("geolng").value;

document.getElementById('new-geolat').value = geolat ;
document.getElementById('new-geolng').value = geolng ;
});ß

</script>

@endsection