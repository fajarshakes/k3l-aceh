@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Working Permit </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Working Permit</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Template</a>
                </li>
                <li class="breadcrumb-item active"> Add Template
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
              <button class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#filter_modal"><i class="la la-check-circle-o"></i> Submit Permit</button>
              <button class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#filter_modal"><i class="la la-filter"></i> Filter Data</button>

              <div class="dropdown-divider"></div>
              <button class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#"><i class="la la-file-text"></i> Export Excel (.xlsx)</button>  
            </div>
          </div>
        </div>
      </div>

      <div class="content-body">
      <!-- Form wizard with icon tabs section start -->
      <section id="icon-tabs">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">TEMPLATE WORKING PERMIT</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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
                    <form id="form_menu" method="post" enctype="multipart/form-data" class="icons-tab-steps-1 wizard-circle">
                    @csrf
                      <!-- Step 1 -->
                      <h6><i class="step-icon la la-exclamation-triangle"></i> HIRARC </h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="location2">JENIS TEMPLATE :</label>
                              <select class="custom-select form-control" name="jenis_template">
                                <option value="">Pilih Unit</option>
                                @foreach($unitType as $type => $value)
                                    <option value="{{ $value->UNIT_TYPE }}" {{ $value->UNIT_TYPE == $selectedID ? 'selected' : '' }}> {{ $value->UNIT_TYPE .' - '. $value->TYPE_NAME }}</option>
                                @endforeach
                              </select>
                            </div>
                         
                            <div class="form-group">
                              <label for="location2">NAMA TEMPLATE :</label>
                              <input type="text" class="form-control" name="nama_template" value="{{$detail ? $detail->nama_template : ''}}">
                            </div>
                            </div>
                            <div class="col-md-12">
                              <button type="button" class="tambah_hirarc btn btn-primary btn-sm btn-icon">
                                <i class="la la-plus-circle"></i> Tambah Data
                              </button>
                            </div>

                            <table id="tbl-hirac" class="table table-striped table-bordered table-hover add-rows">
                              <thead>
                                <tr>
                                  <th rowspan="2" style="text-align:center;text-align: center;vertical-align: middle;"><i class="fa fa-trash-o"></i></th>	
                                  <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;" width="15%">KEGIATAN</th>
                                  <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;" width="10%">POTENSI BAHAYA</th>
                                  <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;" width="10%">RESIKO</th>
                                  <th colspan="2" style="text-align: center;border-bottom: 1px solid #ccc;font-size: 11px;" width="10%">PENILAIAN RESIKO</th>
                                  <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;" width="20%">PENGENDALIAN RESIKO</th>
                                  <th colspan="2" style="text-align: center;border-bottom: 1px solid #ccc;font-size: 11px;" width="10%">PENGENDALIAN RESIKO</th>
                                  <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;" width="7%">STATUS PENGENDALIAN</th>
                                  <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;" width="10%">PENANGGUNG JAWAB</th>
                                </tr>
                                <tr>
                                  <td align="center">Konsekuensi</td>
                                  <td align="center">Kemungkinan</td>

                                  <td align="center">Konsekuensi</td>
                                  <td align="center">Kemungkinan</td>
                                </tr>
                              </thead>
                              <tbody id="konten_hirarc">
                              @foreach($tbl_hirarc as $data)
                                <tr>
                                  <td><button class="btn-danger btn-sm disabled"><i class="la la-trash-o"></i></button></td>
                                  <td><input type="text" class="form-control" name="kegiatan_hirarc[]" value="{{$data ? $data->kegiatan : ''}}"></td>
                                  <td><input type="text" class="form-control" name="potensi_bahaya_hirarc[]" value="{{$data ? $data->potensi_bahaya : ''}}"></td>
                                  <td><input type="text" class="form-control" name="resiko_hirarc[]" value="{{$data ? $data->resiko : ''}}"></td>
                                  <td>
                                    <select class="form-control select2me paket_harga required" name="nilai_konsekuensi_hirarc[]">
                                      <option value="1" {{ $data->penilaian_konsekuensi == '1' ? 'selected' : '' }}>1</option>
                                      <option value="2" {{ $data->penilaian_konsekuensi == '2' ? 'selected' : '' }}>2</option>
                                      <option value="3" {{ $data->penilaian_konsekuensi == '3' ? 'selected' : '' }}>3</option>
                                      <option value="4" {{ $data->penilaian_konsekuensi == '4' ? 'selected' : '' }}>4</option>
                                      <option value="5" {{ $data->penilaian_konsekuensi == '5' ? 'selected' : '' }}>5</option>
                                  </select>
                                  </td>
                                  <td>
                                    <select class="custom-select form-control" name="nilai_kemungkinan_hirarc[]">
                                      <option value="A" {{ $data->penilaian_kemungkinan == 'A' ? 'selected' : '' }}>A</option>
                                      <option value="B" {{ $data->penilaian_kemungkinan == 'B' ? 'selected' : '' }}>B</option>
                                      <option value="C" {{ $data->penilaian_kemungkinan == 'C' ? 'selected' : '' }}>C</option>
                                      <option value="D" {{ $data->penilaian_kemungkinan == 'D' ? 'selected' : '' }}>D</option>
                                      <option value="E" {{ $data->penilaian_kemungkinan == 'E' ? 'selected' : '' }}>E</option>
                                  </select>
                                  </td>
                                  <td><input type="text" class="form-control" name="pengendalian_resiko_hirarc[]" value="{{$data ? $data->pengendalian_resiko : ''}}"></td>
                                  <td>
                                    <select class="custom-select form-control" name="kendali_konsekuensi[]">
                                      <option value="1" {{ $data->pengendalian_konsekuensi == '1' ? 'selected' : '' }}>1</option>
                                      <option value="2" {{ $data->pengendalian_konsekuensi == '2' ? 'selected' : '' }}>2</option>
                                      <option value="3" {{ $data->pengendalian_konsekuensi == '3' ? 'selected' : '' }}>3</option>
                                      <option value="4" {{ $data->pengendalian_konsekuensi == '4' ? 'selected' : '' }}>4</option>
                                      <option value="5" {{ $data->pengendalian_konsekuensi == '5' ? 'selected' : '' }}>5</option>
                                  </select>
                                  </td>
                                  <td>
                                    <select class="custom-select form-control" name="kendali_kemungkinan[]">
                                      <option value="A" {{ $data->pengendalian_kemungkinan == 'A' ? 'selected' : '' }}>A</option>
                                      <option value="B" {{ $data->pengendalian_kemungkinan == 'B' ? 'selected' : '' }}>B</option>
                                      <option value="C" {{ $data->pengendalian_kemungkinan == 'C' ? 'selected' : '' }}>C</option>
                                      <option value="D" {{ $data->pengendalian_kemungkinan == 'D' ? 'selected' : '' }}>D</option>
                                      <option value="E" {{ $data->pengendalian_kemungkinan == 'E' ? 'selected' : '' }}>E</option>
                                  </select>
                                  </td>
                                  <td><input type="text" class="form-control" name="status_pengendalian[]" value="{{$data ? $data->status_pengendalian : ''}}"></td>
                                  <td><input type="text" class="form-control" name="penanggung_jawab[]" value="{{$data ? $data->penanggung_jawab : ''}}"></td>
                                </tr>
                              @endforeach
                              </tbody>
                            </table>
                        </div>
                        <br>
                        <hr>
                      </fieldset>
                      <!-- Step 2 -->
                      <h6><i class="step-icon la la-fire-extinguisher"></i>JSA</h6>
                      <fieldset>
                      <h4><i class="step-icon la la-fire-extinguisher"></i> JSA - JOB SAFETY ANALYSIS (JSA)</h4>
                      <hr>
                      <h5 style="padding-bottom:5px;">
                        <b>B. PERALATAN KESELAMATAN</b>
                      </h5>

                        <div class="row">
                          <!-- <div class="col-md-12"> -->
                          <div class="col-md-12" style="padding-bottom:5px;">
                              <label>ALAT PELINDUNG DIRI (APD) <span style="color:red">*</span></label>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="c-inputs-stacked">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Helm" class="custom-control-input" id="item21">
                                        <label class="custom-control-label" for="item21">Helm</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Sepatu Keselamatan" class="custom-control-input" id="item22">
                                        <label class="custom-control-label" for="item22">Sepatu Keselamatan</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Kacamata" class="custom-control-input" id="item23">
                                        <label class="custom-control-label" for="item23">Kacamata</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Earplug" class="custom-control-input" id="item24">
                                        <label class="custom-control-label" for="item24">Earplug</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Earplug" class="custom-control-input" id="item31">
                                        <label class="custom-control-label" for="item31">Earmuff</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Sarung Tangan Katun" class="custom-control-input" id="item32">
                                        <label class="custom-control-label" for="item32">Sarung Tangan Katun</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Sarung Tangan Karet" class="custom-control-input" id="item33">
                                        <label class="custom-control-label" for="item33">Sarung Tangan Karet</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Sarung Tangan 20KV" class="custom-control-input" id="item34">
                                        <label class="custom-control-label" for="item34">Sarung Tangan 20KV</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Pelampung / Life Vest" class="custom-control-input" id="item41">
                                        <label class="custom-control-label" for="item41">Pelampung / Life Vest</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Tabung Pernafasan" class="custom-control-input" id="item42">
                                        <label class="custom-control-label" for="item42">Tabung Pernafasan</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Full Body Harness" class="custom-control-input" id="item43">
                                        <label class="custom-control-label" for="item43">Full Body Harness</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="other" class="custom-control-input" id="item44">
                                        <label class="custom-control-label" for="item44">Lain-lain (Sebutkan)</label>
                                        <textarea name="peralatan[]" id="participants2" rows="1" class="form-control"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <!-- </div> -->

                        <!-- <div class="col-md-12"> -->
                        <div class="col-md-12" style="padding-bottom:5px;">
                              <label>PERLENGKAPAN KESELAMATAN & DARURAT <span style="color:red">*</span></label>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="c-inputs-stacked">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Pemadam Api (APAR dll)" class="custom-control-input" id="item01">
                                        <label class="custom-control-label" for="item01">Pemadam Api (APAR dll)</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="LOTO (lock out tag out)" class="custom-control-input" id="item02">
                                        <label class="custom-control-label" for="item02">LOTO (lock out tag out)</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Kotak P3K" class="custom-control-input" id="item11">
                                        <label class="custom-control-label" for="item11">Kotak P3K</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Radio Telekomunikasi" class="custom-control-input" id="item12">
                                        <label class="custom-control-label" for="item12">Radio Telekomunikasi</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Rambu Keselamatan" class="custom-control-input" id="item1">
                                        <label class="custom-control-label" for="item1">Rambu Keselamatan</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="other" class="custom-control-input" id="item4">
                                        <label class="custom-control-label" for="item4">Lain-lain (Sebutkan)</label>
                                        <textarea name="peralatan[]" id="participants2" rows="1" class="form-control"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- </div> -->

                        <div class="row">
                          <div class="col-md-12">
                            <h5 style="padding-bottom:5px;">
                              <b>C. ANALISIS KESELAMATAN KERJA</b>
                            </h5>
                          </div>
                          <div class="col-md-12">
                            <button type="button" class="tambah_analisis btn btn-primary btn-icon btn-sm">
												      <i class="la la-plus-circle"></i> Tambah Data
												    </button>
                          </div>
                          <table id="tbl-analisa" class="table display nowrap table-striped table-bordered zero-configuration">
                            <thead>
                              <tr>
                                <th class="text-center">LANGKAH PEKERJAAN</th>
                                <th class="text-center">POTENSI BAHAYA</th>
                                <th class="text-center">RESIKO</th>
                                <th class="text-center">TINDAKAN PENGENDALIAN</th>
                                <th class="text-center">ACTION</th>
                              </tr>
                            </thead>
                            <tbody id="konten-analisis">
                              <tr>
                                <td><input type="text" class="form-control" name="langkah_pekerjaan[]"></td>
                                <td><input type="text" class="form-control" name="potensi_bahaya[]"></td>
                                <td><input type="text" class="form-control" name="resiko[]"></td>
                                <td><input type="text" class="form-control" name="tindakan[]"></td>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-info btn-icon"><i class="la la-check-circle-o"></i> Submit</button>
                      </fieldset>
     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Form wizard with icon tabs section end -->
        </div>     

</div>

<script type="text/javascript">
$(document).ready(function() {
  //var table = $('#example').removeAttr('width').DataTable( {
  $('#tbl-hirac').removeAttr('width').DataTable( {
        "scrollX": true,
        "searching": false,
        "info": false,
        "paging": false,
        "ordering": false,
        "columnDefs": [
          { "width": "12px", "targets": 0 },
          { "width": "250px", "targets": 1 },
          { "width": "250px", "targets": 2 },
          { "width": "150px", "targets": 3 },
          { "width": "150px", "targets": 6 },
          { "width": "150px", "targets": 9 },
          { "width": "150px", "targets": 10 },
        ],

    } );
} );

$(document).ready(function() {
    $('#tbl-analisa').DataTable( {
        "scrollX": false,
        "searching": false,
        "info": false,
        "paging": false,
        "ordering": false,
        "columnDefs": [
          { "width": "20%", "targets": 0 },
        ],
    } );
} );
</script>

<script type="text/javascript">
$('#form_menu').on('submit', function(event){
      event.preventDefault();
      
      $.ajax({
          url:"{{ route('template_store') }}",
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
                window.location.href = '/wp/template';
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

<script type="text/javascript">
	$(document).ready(function() {

  var nomor = 0;
  var status="";
  
  $(".tambah_hirarc").click(function(){
    nomor ++;
    potensi_bahaya = '<select class="form-control select2me paket_harga required" id="id_potensi_bahaya_hirarc+nomor" name="potensi_bahaya_hirarc[]"><option value="" selected="selected">PILIH POTENSI BAHAYA</option><option value="1">Bahaya Fisik (Pencahayaan, Getaran, Kebisingan, Ketinggian dll)</option><option value="2">Bahaya Kimia (Gas, Asap, Uap, Bahan Kimia Berbahaya dll)</option><option value="3">Bahaya Biologi (Micro Biologi(Virus, Bakteri, Jamur, dll); Macro Biologi(Hewan, Serangga, Tumbuhan) dll)</option><option value="4">Bahaya Ergonomi (Stress Fisik (Gerakan Berulang, Ruang Sempit, Menfosir Tenaga) dll)</option><option value="5">Bahaya Mekanis (Titik Jepit, Putaran Pulley atau Roller dll)</option><option value="6">Bahaya Elektris (Kabel terkelupas, Kabel bertegangan tanpa pengaman dll)</option><option value="7">Bahaya Psikososial (Trauma, Intimidasi, Pola promosi jabatan yang salah, Stress Mental (Jenuh/Bosan, Overload) dll)</option><option value="8">Bahaya Tingkah Laku (Tidak patuh terhadap peraturan, overconfident, sok tahu, tidak peduli dll)</option><option value="9">Bahaya Lingkungan Sekitar (Kemiringan permukaan, cuaca yang tidak ramah, permukaan jalan kecil dll)</option></select>';  
    nilai_konsekuensi_hirarc = '<select class="form-control select2me paket_harga required" id="id_nilai_konsekuensi_hirarc+nomor" name="nilai_konsekuensi_hirarc[]"><option value="" selected="selected">PILIH</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>';
    nilai_kemungkinan_hirarc = '<select class="form-control select2me paket_harga required" id="id_nilai_kemungkinan_hirarc+nomor" name="nilai_kemungkinan_hirarc[]"><option value="" selected="selected">PILIH</option><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option></select>';   
    
    kendali_konsekuensi_hirarc = '<select class="form-control select2me paket_harga required" id="id_kendali_konsekuensi_hirarc+nomor" name="kendali_konsekuensi[]"><option value="" selected="selected">PILIH</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>';
    kendali_kemungkinan_hirarc = '<select class="form-control select2me paket_harga required" id="id_kendali_konsekuensi_hirarc+nomor" name="kendali_kemungkinan[]"><option value="" selected="selected">PILIH</option><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option></select>';
    $('#konten_hirarc').append(
      '<tr class="baris_hirarc">'
          +'<td align="center" style="text-align:center;text-align: center;vertical-align: middle;"><button type="button" id="hapus" class="btn hapus_in btn-danger btn-sm"><i class="la la-trash-o"></i></button></td>'
					+'<td><input type="input" name="kegiatan_hirarc[]" class="form-control"></td>'
					+'<td><input type="text" class="form-control" name="potensi_bahaya_hirarc[]" /></td>'
					+'<td><input type="input" name="resiko_hirarc[]" class="form-control"></td>'
					+'<td>'+nilai_konsekuensi_hirarc+'</td>'
					+'<td>'+nilai_kemungkinan_hirarc+'</td>'
					+'<td><input type="input" name="pengendalian_resiko_hirarc[]" class="form-control"></td>'
					+'<td>'+kendali_konsekuensi_hirarc+'</td>'
					+'<td>'+kendali_kemungkinan_hirarc+'</td>'
					+'<td><input type="input" name="status_pengendalian[]" class="form-control"></td>'
					+'<td><input type="input" name="penanggung_jawab[]" class="form-control"></td>'
				  +'</tr>'
    );
      
      $('select.select2me').select2();
    
    });
    /*
    $("#hapus").live('click', function () {
      $(this).parents(".baris_hirarc").hide("fast", function(){ $(this).remove(); });
    });
    */
    });

	$(document).ready(function() {

    var nomor1 = 0;
		var status="";
		
        $(".tambah_analisis").click(function(){
            nomor1 ++;
                                                                                                                                                                  
          $('#konten-analisis').append(
          '<tr class="baris_analisis">'
            +'<td><input type="input" name="langkah_pekerjaan[]" class="form-control"></td>'
            +'<td><input type="input" name="potensi_bahaya[]" class="form-control"></td>'
            +'<td><input type="input" name="resiko[]" class="form-control"></td>'
            +'<td><input type="input" name="tindakan[]" class="form-control"></td>'
            +'<td align="center" style="vertical-align:middle;"><button type="button" id="hapus" class="btn hapus_in btn-sm btn-danger btn-icon"><i class="la la-trash-o"></i></button></td>'
          +'</tr>'
          );
          
          $('select.select2me').select2();
        });

				/*
        $("#hapus").live('click', function () {
			  $(this).parents(".baris_jsa").hide("fast", function(){ $(this).remove(); });
        });		
        */

    });
</script>
@endsection