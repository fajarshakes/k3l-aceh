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
                <li class="breadcrumb-item"><a href="#">List Permit</a>
                </li>
                <li class="breadcrumb-item active"> Submit Permit
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
              <a href="javascript:history.back()" class="dropdown-item"><i class="la la-chevron-circle-left"></i> Kembali</a>
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
                  <h4 class="card-title">Tambah Working Permit</h4>
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
                          <div class="col-md-8">
                
                            <div class="form-group">
                              <label for="location2">LOKASI PEKERJAAN :</label>
                              <select class="jui-select-default form-control required" id="unit_id" name="unit_id">
                                <option value=""> - PILIH LOKASI PEKERJAAN -</option>
                                @foreach($unit_l3 as $list_l3)
                                  <option value="{{ $list_l3->UL_CODE }}">{{ $list_l3->UL_CODE .' - '. $list_l3->UNIT_NAME }}</option>
                                @endforeach
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="location2">SUPERVISOR UP / UL :</label>
                              <select class="form-control" id="supervisor" name="supervisor">
                                <option value=""> - PILIH SPV PENGAWAS -</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="location2">PEJABAT PELAKSANA K3L :</label>
                              <select class="form-control" id="pejabat" name="pejabat">
                                <option value=""> - PILIH PELAKSANA K3 -</option>
                              </select>
                            </div>
                            
                            <div class="form-group">
                              <label for="location2">MANAGER BAGIAN / UL :</label>
                              <select class="form-control" id="manager" name="manager">
                                <option value=""> - PILIH MANAGER -</option>
                              </select>
                            </div>
                         
                          </div>
                          <div class="col-md-12">
                            <button type="button" class="tambah_hirarc btn btn-primary btn-sm">
												      <i class="la la-plus-circle"></i> Tambah Data
												    </button>
                          </div>
                          <table id="tbl-hirac" class="table table-striped table-bordered table-hover add-rows">
								          <thead>
                            <tr>
                              <th rowspan="2" style="text-align:center;text-align: center;vertical-align: middle;"><i class="fa fa-trash-o"></i></th>	
                              <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;">KEGIATAN</th>
                              <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;">POTENSI BAHAYA</th>
                              <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;">RESIKO</th>
                              <th colspan="2" style="text-align: center;border-bottom: 1px solid #ccc;font-size:">PENILAIAN RESIKO</th>
                              <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;">PENGENDALIAN RESIKO</th>
                              <th colspan="2" style="text-align: center;border-bottom: 1px solid #ccc;font-size: 11px;">PENGENDALIAN RESIKO</th>
                              <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;">STATUS PENGENDALIAN</th>
                              <th rowspan="2" style="font-size: 11px;text-align: center;vertical-align: middle;">PENANGGUNG JAWAB</th>
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
                            <tr class="baris_hirarc">
                              <td><button type="button" id="hapus" class="hapus btn btn-danger btn-sm"> <i class="la la-trash-o"></i></button></td>
                              <td><input type="text" class="form-control" name="kegiatan_hirarc[]" value="{{$data ? $data->kegiatan : ''}}"></td>
                              <td><input type="text" class="form-control" name="potensi_bahaya_hirarc[]" value="{{$data ? $data->potensi_bahaya : ''}}"></td>
                              <td><input type="text" class="form-control" name="resiko_hirarc[]" value="{{$data ? $data->resiko : ''}}"></td>
                              <td>
                                <select class="form-control select2me" name="penilaian_konsekuensi[]">
                                <option value="">PILIH</option>
                                <option value="1" {{ $data->penilaian_konsekuensi == '1' ? 'selected' : '' }}>1 : Tidak ada cedera, kerugian materi kecil</option>
                                <option value="2" {{ $data->penilaian_konsekuensi == '2' ? 'selected' : '' }}>2 : Cedera ringan/P3K, kerugian cukup materi sedang</option>
                                <option value="3" {{ $data->penilaian_konsekuensi == '3' ? 'selected' : '' }}>3 : Hilang hari kerja, kerugian cukup besar</option>
                                <option value="4" {{ $data->penilaian_konsekuensi == '4' ? 'selected' : '' }}>4 : Cacat, kerugian materi besar</option>
                                <option value="5" {{ $data->penilaian_konsekuensi == '5' ? 'selected' : '' }}>5 : Kematian, kerugian materi sangat besar</option>
                            </select>
                              </td>
                              <td>
                                <select class="form-control" name="penilaian_kemungkinan[]">
                                <option value="">PILIH</option>
                                <option value="A" {{ $data->penilaian_kemungkinan == 'A' ? 'selected' : '' }}>A : Hampir pasti akan terjadi/almost certain</option>
                                <option value="B" {{ $data->penilaian_kemungkinan == 'B' ? 'selected' : '' }}>B : Cenderung untuk terjadi/likely</option>
                                <option value="C" {{ $data->penilaian_kemungkinan == 'C' ? 'selected' : '' }}>C : Mungkin dapat terjadi / moderate</option>
                                <option value="D" {{ $data->penilaian_kemungkinan == 'D' ? 'selected' : '' }}>D : Kecil kemungkinan terjadi/unlikely</option>
                                <option value="E" {{ $data->penilaian_kemungkinan == 'E' ? 'selected' : '' }}>E : Jarang terjadi/rare</option>
                            </select>
                              </td>
                              <td><input type="text" class="form-control" name="potensi_bahaya[]" value="{{$data ? $data->pengendalian_resiko : ''}}"></td>
                              <td>
                                <select class="form-control" name="pengendalian_konsekuensi[]">
                                <option value="">PILIH</option>
                                <option value="1" {{ $data->pengendalian_konsekuensi == '1' ? 'selected' : '' }}>1 : Tidak ada cedera, kerugian materi kecil</option>
                                <option value="2" {{ $data->pengendalian_konsekuensi == '2' ? 'selected' : '' }}>2 : Cedera ringan/P3K, kerugian cukup materi sedang</option>
                                <option value="3" {{ $data->pengendalian_konsekuensi == '3' ? 'selected' : '' }}>3 : Hilang hari kerja, kerugian cukup besar</option>
                                <option value="4" {{ $data->pengendalian_konsekuensi == '4' ? 'selected' : '' }}>4 : Cacat, kerugian materi besar</option>
                                <option value="5" {{ $data->pengendalian_konsekuensi == '5' ? 'selected' : '' }}>5 : Kematian, kerugian materi sangat besar</option>
                              </select>
                              </td>
                              <td>
                                <select class="form-control" name="pengendalian_kemungkinan[]">
                                <option value="A" {{ $data->pengendalian_kemungkinan == 'A' ? 'selected' : '' }}>A : Hampir pasti akan terjadi/almost certain</option>
                                <option value="B" {{ $data->pengendalian_kemungkinan == 'B' ? 'selected' : '' }}>B : Cenderung untuk terjadi/likely</option>
                                <option value="C" {{ $data->pengendalian_kemungkinan == 'C' ? 'selected' : '' }}>C : Mungkin dapat terjadi / moderate</option>
                                <option value="D" {{ $data->pengendalian_kemungkinan == 'D' ? 'selected' : '' }}>D : Kecil kemungkinan terjadi/unlikely</option>
                                <option value="E" {{ $data->pengendalian_kemungkinan == 'E' ? 'selected' : '' }}>E : Jarang terjadi/rare</option>
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
                        <div class="row">
                          <div class="col-md-12">
                            <h5 style="padding-bottom:5px;">
                              <b>A. INFORMASI PEKERJAAN</b>
                            </h5>
                          </div>
                          <div class="col-md-12">
                            <button type="button" class="tambah_pelaksana btn btn-primary btn-icon btn-sm">
												      <i class="la la-user-plus"></i> Tambah Data
												    </button>
                            <p></p>
                          </div>
                          <div class="col-md-12">
                          <table id="tbl-pelaksana" class="table display nowrap table-striped table-bordered add-rows">
                            <thead>
                              <tr>
                                <th>NAMA PELAKSANA</th>
                                <th>NIP / NIK</th>
                                <th>JABATAN</th>
                                <th>ACTION</th>
                              </tr>
                            </thead>
                            <tbody id="konten-pelaksana">
                              <tr class="baris_pelaksana">
                                <td><input type="text" name="nama_pelaksana[]" class="form-control"></td>
                                <td><input type="text" name="nip_pelaksana[]" class="form-control"></td>
                                <td><input type="text" name="jabatan_pelaksana[]" class="form-control"></td>
                                <td class="text-center" style="vertical-align:middle;"></td>
                              </tr>
                            </tbody>
                          </table>
                          </div>
                        </div>

                        <div class="row">  
                          <div class="col-md-12">
                            <h5 style="padding-bottom:5px;">
                              <b>B. PERALATAN KESELAMATAN</b>
                            </h5>
                          </div>
                          <!-- <div class="row" style="padding-left:15px;"> -->
                            <div class="col-md-12" style="padding-bottom:5px;">
                              <label>ALAT PELINDUNG DIRI (APD) <span style="color:red">*</span></label>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="c-inputs-stacked">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Helm" class="custom-control-input" id="item21" {{ in_array('Helm', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item21">Helm</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Sepatu Keselamatan" class="custom-control-input" id="item22" {{ in_array('Sepatu Keselamatan', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item22">Sepatu Keselamatan</label>
                                      </div>
                                    
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Kacamata" class="custom-control-input" id="item23" {{ in_array('Kacamata', $peralatan) ? "checked" : "" }} >
                                        <label class="custom-control-label" for="item23">Kacamata</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Earplug" class="custom-control-input" id="item24" {{ in_array('Earplug', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item24">Earplug</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Earmuff" class="custom-control-input" id="item31" {{ in_array('Earmuff', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item31">Earmuff</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Sarung Tangan Katun" class="custom-control-input" id="item32" {{ in_array('Sarung Tangan Katun', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item32">Sarung Tangan Katun</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Sarung Tangan Karet" class="custom-control-input" id="item33" {{ in_array('Sarung Tangan Karet', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item33">Sarung Tangan Karet</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Sarung Tangan 20KV" class="custom-control-input" id="item34" {{ in_array('Sarung Tangan 20KV', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item34">Sarung Tangan 20KV</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Pelampung / Life Vest" class="custom-control-input" id="item41" {{ in_array('Pelampung / Life Vest', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item41">Pelampung / Life Vest</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Tabung Pernafasan" class="custom-control-input" id="item42" {{ in_array('Tabung Pernafasan', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item42">Tabung Pernafasan</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Full Body Harness" class="custom-control-input" id="item43" {{ in_array('Full Body Harness', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item43">Full Body Harness</label>
                                      </div>
                                      {{--
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Other1" class="custom-control-input" id="item44" {{ in_array('Other1', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item44">Lain-lain (Sebutkan)</label>
                                        <textarea name="peralatan[]" id="participants2" rows="1" class="form-control"></textarea>
                                      </div>
                                      --}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <!-- </div> -->
                          <!-- <div class="row" style="padding-left:15px;"> -->
                            <div class="col-md-12" style="padding-bottom:5px;">
                              <label>PERLENGKAPAN KESELAMATAN & DARURAT <span style="color:red">*</span></label>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="c-inputs-stacked">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Pemadam Api (APAR dll)" class="custom-control-input" id="item01" {{ in_array('Pemadam Api (APAR dll)', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item01">Pemadam Api (APAR dll)</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="LOTO (lock out tag out)" class="custom-control-input" id="item02" {{ in_array('lock out tag out', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item02">LOTO (lock out tag out)</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Kotak P3K" class="custom-control-input" id="item11" {{ in_array('Kotak P3K', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item11">Kotak P3K</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Radio Telekomunikasi" class="custom-control-input" id="item12" {{ in_array('Radio Telekomunikasi', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item12">Radio Telekomunikasi</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="Rambu Keselamatan" class="custom-control-input" id="item1" {{ in_array('Rambu Keselamatan', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item1">Rambu Keselamatan</label>
                                      </div>
                                      {{--
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" value="other" class="custom-control-input" id="item4" {{ in_array('other', $peralatan) ? "checked" : "" }}>
                                        <label class="custom-control-label" for="item4">Lain-lain (Sebutkan)</label>
                                        <textarea name="peralatan[]" id="participants2" rows="1" class="form-control"></textarea>
                                      </div>
                                      --}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          <!-- </div> -->
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
                            <p></p>
                          </div>
                          <table id="tbl-analisa" class="table display nowrap table-striped table-bordered zero-configuration">
                            <thead>
                              <tr>
                                <th>Action</th>
                                <th>Langkah Pekerjaan</th>
                                <th>Potensi Bahaya</th>
                                <th>Resiko</th>
                                <th>Tindakan Pengendalian</th>
                              </tr>
                            </thead>
                            <tbody id="konten-analisis">
                            @foreach($tbl_jsa as $jsa) 
                              <tr class="baris_analisis">
                                <td><button type="button" class="hapus_analisis btn btn-danger btn-sm"> <i class="la la-trash-o"></i></button></td>
                                <td><input type="text" class="form-control" name="langkah_pekerjaan[]" value="{{$jsa ? $jsa->langkah_pekerjaan : ''}}"></td>
                                <td><input type="text" class="form-control" name="potensi_bahaya[]" value="{{$jsa ? $jsa->potensi_bahaya : ''}}"></td>
                                <td><input type="text" class="form-control" name="resiko[]" value="{{$jsa ? $jsa->resiko : ''}}"></td>
                                <td><input type="text" class="form-control" name="tindakan[]" value="{{$jsa ? $jsa->tindakan : ''}}"></td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <br>
                        <hr>
                      </fieldset>
                      <!-- Step 3 -->
                      <h6><i class="step-icon la la-recycle"></i>WORKING PERMIT</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="eventName2">Nama Pekerjaan <span style="color:red">*</span></label>
                              <input type="text" class="form-control" name="nama_pekerjaan" value="{{$detail ? $detail->nama_template : ''}}">
                            </div>
                            @if(Auth::user()->group_id == 7)
                            <div class="form-group">
                              <label for="eventName2">Pelaksana / Perusahaan <span style="color:red">*</span></label>
                              <input type="text" class="form-control" name="pelaksana" value="{{ Auth::user()->name ? Auth::user()->name : ''}}" readonly>
                              <input type="hidden" name="vendor_id" value="{{ Auth::user()->pers_no ? Auth::user()->pers_no : ''}}" readonly>
                            </div>
                            @else
                            <div class="form-group">
                              <label for="eventName2">Pelaksana / Perusahaan<span style="color:red">*</span></label>
                              <select id="vendor_id" name="vendor_id" class="select2 form-control" style="width: 100%">
                                <option value="none" selected="" disabled="">Select Vendor</option>
                                @foreach($getVendor as $vendor)
                                  <option value="{{ $vendor->ID }}">{{ $vendor->VENDOR_NAME }}</option>
                                @endforeach
                              </select>
                              <input type="hidden" id="vendor" name="pelaksana" readonly>
                            </div>
                            @endif
                            <div class="form-group">
                              <label for="eventName2">Alamat</label>
                              <textarea class="form-control required" id="alamat" name="alamat">{{ $getDetVendor ? $getDetVendor->ADDRESS : '' }}</textarea>
                            </div>
                            
                            <div class="form-group">
                              <div class="c-inputs-stacked">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="d-inline-block custom-control custom-radio">
                                      <input type="radio" name="status_pegawai" value="eksternal" class="custom-control-input" id="staffing2">
                                      <label class="custom-control-label" for="staffing2">Eksternal</label>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="d-inline-block custom-control custom-radio">
                                      <input type="radio" name="status_pegawai" value="internal" class="custom-control-input" id="catering2">
                                      <label class="custom-control-label" for="catering2">Internal</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <p style="font-size:smaller;padding: 5px 5px 3px 5px;">
                                <b>Internal</b> = Pegawai PLN Aceh;<br>
                                <b>Eksternal</b> = Mitra Kerja dan Pegawai diluar PLN Aceh
                              </p>
                            </div>
                            
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="eventName2">Nama Penanggung Jawab <span style="color:red">*</span></label>
                              <input type="text" class="form-control" id="pic_name" name="nama_pj" readonly value="{{ $getDetVendor ? $getDetVendor->PIC_NAME : '' }}">
                            </div>
                            <div class="form-group">
                              <label for="eventName2">Jabatan <span style="color:red">*</span></label>
                              <input type="text" class="form-control" id="pic_position" name="jabatan" readonly value="{{ $getDetVendor ? $getDetVendor->PIC_POSITION : '' }}">
                            </div>
                            <div class="form-group">
                              <label for="eventName2">No Telepon / HP <span style="color:red">*</span></label>
                              <input type="text" class="form-control" id="pic_contact" name="no_telepon" readonly value="{{ $getDetVendor ? $getDetVendor->PIC_PHONE : '' }}">
                            </div>

                            
                            <div class="form-group">
                              <label for="eventStatus2">UP3 <span style="color:red">*</span></label>
                              <input type="text" class="form-control" value="{{ $up_name }}" readonly>
                            </div>
                            
                          </div>
                          <!-- Form Permohonan Izin Kerja -->
                          <div class="col-md-12" style="text-align:center;">
                            <h4 style="padding:25px 0 15px 0;">
                              <b>PERMOHONAN IZIN KERJA</b>
                            </h4>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tanggal pengajuan <span style="color:red">*</span></label>
                              <div class='input-group'>
                                <input type="date" min="{{ $status == 'NORMAL' ? date('Y-m-d') : '' }}" class="form-control" name="tgl_pengajuan" />
                                <!-- <span class="input-group-addon">
                                  <span class="ft-calendar"></span>
                                </span> -->
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="eventStatus2" style="padding-right:15px;">Perlu Grounding :</label>
                                </div>
                                <div class="col-md-3">
                                  <div class="d-inline-block custom-control custom-radio">
                                    <input type="radio" name="grounding" value="ya" class="custom-control-input" id="staffing4">
                                    <label class="custom-control-label" for="staffing4">Ya</label>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="d-inline-block custom-control custom-radio">
                                    <input type="radio" name="grounding" value="tidak" class="custom-control-input" id="catering4">
                                    <label class="custom-control-label" for="catering4">Tidak</label>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="eventStatus2" style="padding-right:15px;">Perlu Pemadaman :</label>
                                </div>
                                <div class="col-md-3">
                                  <div class="d-inline-block custom-control custom-radio">
                                    <input type="radio" name="pemadaman" value="ya" class="custom-control-input" id="staffing5">
                                    <label class="custom-control-label" for="staffing5">Ya</label>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="d-inline-block custom-control custom-radio">
                                    <input type="radio" name="pemadaman" value="tidak" class="custom-control-input" id="catering5">
                                    <label class="custom-control-label" for="catering5">Tidak</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="eventName2">Detail Pekerjaan <span style="color:red">*</span></label>
                              <input type="text" class="form-control" name="detail_pekerjaan" value="{{$detail ? $detail->nama_template : ''}}">
                            </div>
                            <div class="form-group">
                              <label for="eventName2">Lokasi Pekerjaan <span style="color:red">*</span></label>
                              <input type="text" class="form-control" name="lokasi_pekerjaan">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Peralatan Yang Perlu Dipadamkan <span style="color:red">*</span></label>
                              <input type='text' class="form-control" name="peralatan_dipadamkan">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Pengawas Pekerjaan <span style="color:red">*</span></label>
                              <div class="row">
                                <div class="col-md-6">
                                  <input type='text' class="form-control" name="pengawas_pekerjaan">
                                </div>
                                <div class="col-md-6">
                                  <input type='text' class="form-control" name="no_pengawas_pekerjaan" placeholder="No. Telp">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Pengawas K3 <span style="color:red">*</span></label>
                              <div class="row">
                                <div class="col-md-6">
                                  <input type='text' class="form-control" name="pengawas_k3l">
                                </div>
                                <div class="col-md-6">
                                  <input type='text' class="form-control" name="no_pengawas_k3" placeholder="No. Telp">
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Form Durasi Pekerjaan -->
                          <div class="col-md-12" style="text-align:center;">
                            <h4 style="padding:25px 0 15px 0;">
                              <b>DURASI PEKERJAAN</b>
                            </h4>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Tanggal Mulai <span style="color:red">*</span></label>
                              <div class="row">
                                <div class="col-md-6">
                                  <input type='date' min="{{ $status == 'NORMAL' ? date('Y-m-d') : '' }}" class="form-control datetime" name="tgl_mulai"/>
                                </div>
                                <div class="col-md-6">
                                  <input type='time' class="form-control" name="jam_mulai">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Tanggal Selesai <span style="color:red">*</span></label>
                              <div class="row">
                                <div class="col-md-6">
                                  <input type='date' min="{{ $status == 'NORMAL' ? date('Y-m-d') : '' }}" class="form-control datetime" name="tgl_selesai"/>
                                </div>
                                <div class="col-md-6">
                                  <input type='time' class="form-control" name="jam_selesai">
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Form Klasifikasi Pekerjaan -->
                          <div class="col-md-12" style="text-align:center;">
                            <h4 style="padding:25px 0 15px 0;">
                              <b>KLASIFIKASI PEKERJAAN</b>
                            </h4>
                          </div>
                          <div class="col-md-4">
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Pemasangan LBS/Recloser/FDI" class="custom-control-input" id="item51">
                              <label class="custom-control-label" for="item51">Pemasangan LBS/Recloser/FDI</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Pemasangan Kubikel 20 KV" class="custom-control-input" id="item52">
                              <label class="custom-control-label" for="item52">Pemasangan Kubikel 20 KV</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Pemeliharaan Kubikel" class="custom-control-input" id="item53">
                              <label class="custom-control-label" for="item53">Pemeliharaan Kubikel</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Pengujian Relay Proteksi" class="custom-control-input" id="item54">
                              <label class="custom-control-label" for="item54">Pengujian Relay Proteksi</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Penggantian Relay Proteksi" class="custom-control-input" id="item61">
                              <label class="custom-control-label" for="item61">Penggantian Relay Proteksi</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Pemasangan Power Meter" class="custom-control-input" id="item62">
                              <label class="custom-control-label" for="item62">Pemasangan Power Meter</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Pemasangan KWH Meter" class="custom-control-input" id="item63">
                              <label class="custom-control-label" for="item63">Pemasangan KWH Meter</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Pemeliharaan RTU GH/GI" class="custom-control-input" id="item64">
                              <label class="custom-control-label" for="item64">Pemeliharaan RTU GH/GI</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Pemasangan Catu Daya" class="custom-control-input" id="item71">
                              <label class="custom-control-label" for="item71">Pemasangan Catu Daya</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Pemasangan Radio Komunikasi" class="custom-control-input" id="item72">
                              <label class="custom-control-label" for="item72">Pemasangan Radio Komunikasi</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Pemeliharaan Radio Komunikasi" class="custom-control-input" id="item73">
                              <label class="custom-control-label" for="item73">Pemeliharaan Radio Komunikasi</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" value="Sipil" class="custom-control-input" id="item74">
                              <label class="custom-control-label" for="item74">Sipil</label>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="klasifikasi[]" class="custom-control-input" id="item5">
                              <label class="custom-control-label" for="item5">Lain-lain (Sebutkan)</label>
                              <textarea name="participants" id="participants3" rows="1" class="form-control"></textarea>
                            </div>
                          </div>
                          <!-- Form Prosedur Pekerjaan Yang Telah Dijelaskan Kepada Pekerja -->
                          <div class="col-md-12" style="text-align:center;">
                            <h4 style="padding:25px 0 15px 0;">
                              <b>PROSEDUR PEKERJAAN YANG TELAH DIJELASKAN KEPADA PEKERJA</b>
                            </h4>
                          </div>
                          <div class="col-md-4">
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="prosedur[]" value="Pemasangan dan Penggantian Cubicle 20 KV" class="custom-control-input" id="itm1">
                              <label class="custom-control-label" for="itm1">Pemasangan dan Penggantian Cubicle 20 KV</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="prosedur[]" value="Pemeliharaan RTU dan Peripheral" class="custom-control-input" id="itm2">
                              <label class="custom-control-label" for="itm2">Pemeliharaan RTU dan Peripheral</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="prosedur[]" value="Perluasan Gardu Hubung 20 KV" class="custom-control-input" id="itm3">
                              <label class="custom-control-label" for="itm3">Perluasan Gardu Hubung 20 KV</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="prosedur[]" value="Pemeliharaan Cubicle Gardu Hubung 20 KV" class="custom-control-input" id="itm4">
                              <label class="custom-control-label" for="itm4">Pemeliharaan Cubicle Gardu Hubung 20 KV</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="prosedur[]" value="Pengujian Control Scada" class="custom-control-input" id="itm5">
                              <label class="custom-control-label" for="itm5">Pengujian Control Scada</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="prosedur[]" value="Pengujian Alat" class="custom-control-input" id="itm6">
                              <label class="custom-control-label" for="itm6">Pengujian Alat</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="prosedur[]" value="Pemasangan LBS dan Recloser" class="custom-control-input" id="itm7">
                              <label class="custom-control-label" for="itm7">Pemasangan LBS dan Recloser</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="prosedur[]" value="Pemeliharaan Repeater Komunikasi" class="custom-control-input" id="itm8">
                              <label class="custom-control-label" for="itm8">Pemeliharaan Repeater Komunikasi</label>
                            </div>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="prosedur[]" value="Pemasangan Proteksi" class="custom-control-input" id="itm9">
                              <label class="custom-control-label" for="itm9">Pemasangan Proteksi</label>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="prosedur[]" class="custom-control-input" id="itm10">
                              <label class="custom-control-label" for="itm10">Lain-lain (Sebutkan)</label>
                              <textarea name="participants" id="participants4" rows="1" class="form-control"></textarea>
                            </div>
                          </div>
                          <!-- Form Lampiran Izin Kerja -->
                          <div class="col-md-12" style="text-align:center;">
                            <h4 style="padding:25px 0 15px 0;">
                              <b>LAMPIRAN IZIN KERJA</b>
                            </h4>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>BPJS Kesehatan dan Tenaga Kerja</label>
                              <input type='file' name="bpjs" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Sertifikat Kompetensi Pekerja <span style="color:red">*</span></label>
                              <input type='file' name="sertifikat_kompetensi" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Tenaga Ahli K3 <span style="color:red">*</span></label>
                              <input type='file' name="tenaga_ahli_k3" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Single Line Diagram</label>
                              <input type='file' name="single_line_diagram" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Surat Penunjukan Pengawas dan Pelaksana Pekerjaan <span style="color:red">*</span></label>
                              <input type='file' name="surat_penunjukan" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Daftar Peralatan Kerja dan APD yang Digunakan <span style="color:red">*</span></label>
                              <input type='file' name="daftar_peralatan" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Foto Lokasi Kerja</label>
                              <input type='file' name="foto_lokasi_kerja" class="form-control">
                            </div>
                          </div>  
                        </div>
                        
                      </fieldset>
                      <!-- Step 4 -->
                      <h6><i class="step-icon la la-check-circle"></i>SIMPAN</h6>
                      <fieldset>
                        <div class="row">
                        <div class="col-md-12">
                          <p class="success text-center"><i class="la la-check-circle" style="font-size:60px;"></i></p>
                          <p class="text-center text-success">Jika semua data sudah terisi, silahkan klik tombol Simpan</p>

                          <!-- HIDDEN INPUT -->
                          <input type="hidden" name="qualification" value="{{$detail ? $detail->qualification : ''}}" readonly>
                        </div>
                        <div class="col-md-12 text-center">
                          <button type="submit" id="btnSubmit" class="btn btn-success btn-icon"><i class="la la-check-circle-o"></i> SUBMIT PERMIT</button>
                        </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Form wizard with icon tabs section end -->
        
        <div id="loading"></div>
        <!-- Modal -->   

  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="unit_id"]').on('change', function(){
      var unitap =   $(this).val();
      var token = '{{ csrf_token() }}';
   
        if(unitap) {
            $.ajax({
                url: "{{ url('master/get_user_ap/') }}/"+unitap,
                type:"GET",
                dataType:"json",
                data: {buss_area: unitap, group: 5, _token: token},

                success:function(data) {

                  $('select[name="supervisor"]').empty();
                    $.each(data, function(key, value){
                      $('select[name="supervisor"]').append('<option value="'+ value.name +'">' + value.name + '</option>');
                    });
                },
                
            });
            $.ajax({
                url: "{{ url('master/get_user_ap/') }}/"+unitap,
                type:"GET",
                dataType:"json",
                data: {buss_area: unitap, group: 4, _token: token},

                success:function(data) {

                  $('select[name="manager"]').empty();
                    $.each(data, function(key, value){
                      $('select[name="manager"]').append('<option value="'+ value.name +'">' + value.name + '</option>');
                    });
                },
                
            });
            $.ajax({
                url: "{{ url('master/get_user_ap/') }}/"+unitap,
                type:"GET",
                dataType:"json",
                data: {buss_area: unitap, group: 6, _token: token},

                success:function(data) {

                  $('select[name="pejabat"]').empty();
                    $.each(data, function(key, value){
                      $('select[name="pejabat"]').append('<option value="'+ value.name +'">' + value.name + '</option>');
                    });
                },
                
            });
        } else {
            $('select[name="supervisor"]').empty();
            $('select[name="manager"]').empty();
            $('select[name="pejabat"]').empty();
        }
    });

    $('select[name="vendor_id"]').on('change', function(){
      var b_area =   $(this).val();
      var token = '{{ csrf_token() }}';
   
        if(b_area) {
            $.ajax({
                url: "{{ url('master/get_vendor_detail') }}/"+b_area,
                type:"GET",
                dataType:"json",
                data: {buss_area: b_area, _token: token},
                success:function(html) {
                  $('#vendor').val(html.VENDOR_NAME);
                  $('#alamat').val(html.ADDRESS);
                  $('#pic_name').val(html.PIC_NAME);
                  $('#pic_position').val(html.PIC_POSITION);
                  $('#pic_contact').val(html.PIC_PHONE);
                },
            });
        }
      });
  });

$(document).ready(function() {
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
    } );
} );
</script>

<script type="text/javascript">
$('#form_menu').on('submit', function(event){
      event.preventDefault();
      
      $.ajax({
          url:"{{ route('wp_store') }}",
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          beforeSend: function(){
            $('#loading').html('<div class="loader-container"><div class="line-scale loader-warning"><div></div><div></div><div></div><div></div><div></div></div></div>');
            $('#btnSubmit').attr('disabled', true);
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
                window.location.href = '{{ $redirect_to }}';
              }, 1000);
            }
            //$('#form_result').html(html);
            if(type_toast == 'error'){
              $('#loading').html('');
              $('#btnSubmit').attr('disabled', false);
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
  potensi_bahaya = '<select class="form-control select2me paket_harga required" id="id_potensi_bahaya_hirarc+nomor" name="penilaian_konsekuensi[]"><option value="" selected="selected">PILIH POTENSI BAHAYA</option><option value="1">Bahaya Fisik (Pencahayaan, Getaran, Kebisingan, Ketinggian dll)</option><option value="2">Bahaya Kimia (Gas, Asap, Uap, Bahan Kimia Berbahaya dll)</option><option value="3">Bahaya Biologi (Micro Biologi(Virus, Bakteri, Jamur, dll); Macro Biologi(Hewan, Serangga, Tumbuhan) dll)</option><option value="4">Bahaya Ergonomi (Stress Fisik (Gerakan Berulang, Ruang Sempit, Menfosir Tenaga) dll)</option><option value="5">Bahaya Mekanis (Titik Jepit, Putaran Pulley atau Roller dll)</option><option value="6">Bahaya Elektris (Kabel terkelupas, Kabel bertegangan tanpa pengaman dll)</option><option value="7">Bahaya Psikososial (Trauma, Intimidasi, Pola promosi jabatan yang salah, Stress Mental (Jenuh/Bosan, Overload) dll)</option><option value="8">Bahaya Tingkah Laku (Tidak patuh terhadap peraturan, overconfident, sok tahu, tidak peduli dll)</option><option value="9">Bahaya Lingkungan Sekitar (Kemiringan permukaan, cuaca yang tidak ramah, permukaan jalan kecil dll)</option></select>';  
  nilai_konsekuensi_hirarc = '<select class="form-control select2me paket_harga required" id="id_nilai_konsekuensi_hirarc+nomor" name="penilaian_konsekuensi[]"><option value="" selected="selected">PILIH</option><option value="1">1 : Tidak ada cedera, kerugian materi kecil</option><option value="2">2 : Cedera ringan/P3K, kerugian cukup materi sedang</option><option value="3">3 : Hilang hari kerja, kerugian cukup besar</option><option value="4">4 : Cacat, kerugian materi besar</option><option value="5">5 : Kematian, kerugian materi sangat besar</option></select>';
  nilai_kemungkinan_hirarc = '<select class="form-control select2me paket_harga required" id="id_nilai_kemungkinan_hirarc+nomor" name="penilaian_kemungkinan[]"><option value="" selected="selected">PILIH</option><option value="A">A : Hampir pasti akan terjadi/almost certain</option><option value="B">B : Cenderung untuk terjadi/likely</option><option value="C">C : Mungkin dapat terjadi / moderate</option><option value="D">D : Kecil kemungkinan terjadi/unlikely</option><option value="E">E : Jarang terjadi/rare</option></select>';   
    
  kendali_konsekuensi_hirarc = '<select class="form-control select2me paket_harga required" id="id_kendali_konsekuensi_hirarc+nomor" name="pengendalian_konsekuensi[]"><option value="" selected="selected">PILIH</option><option value="1">1 : Tidak ada cedera, kerugian materi kecil</option><option value="2">2 : Cedera ringan/P3K, kerugian cukup materi sedang</option><option value="3">3 : Hilang hari kerja, kerugian cukup besar</option><option value="4">4 : Cacat, kerugian materi besar</option><option value="5">5 : Kematian, kerugian materi sangat besar</option></select>';
  kendali_kemungkinan_hirarc = '<select class="form-control select2me paket_harga required" id="id_kendali_konsekuensi_hirarc+nomor" name="pengendalian_kemungkinan[]"><option value="" selected="selected">PILIH</option><option value="A">A : Hampir pasti akan terjadi/almost certain</option><option value="B">B : Cenderung untuk terjadi/likely</option><option value="C">C : Mungkin dapat terjadi / moderate</option><option value="D">D : Kecil kemungkinan terjadi/unlikely</option><option value="E">E : Jarang terjadi/rare</option></select>';   
  $('#konten_hirarc').append(
    '<tr class="baris_hirarc">'
        +'<td align="center" style="text-align:center;text-align: center;vertical-align: middle;"><button type="button" id="hapus" class="hapus btn btn-danger btn-sm"><i class="la la-trash-o"></i></button></td>'
        +'<td><input type="input" name="kegiatan_hirarc[]" class="form-control"></td>'
        +'<td><input type="text" class="form-control" name="potensi_bahaya[]" /></td>'
        +'<td><input type="input" name="resiko_hirarc[]" class="form-control"></td>'
        +'<td>'+nilai_konsekuensi_hirarc+'</td>'
        +'<td>'+nilai_kemungkinan_hirarc+'</td>'
        +'<td><input type="input" name="potensi_bahaya[]" class="form-control"></td>'
        +'<td>'+kendali_konsekuensi_hirarc+'</td>'
        +'<td>'+kendali_kemungkinan_hirarc+'</td>'
        +'<td><input type="input" name="status_pengendalian[]" class="form-control"></td>'
        +'<td><input type="input" name="penanggung_jawab[]" class="form-control"></td>'
        +'</tr>'
  );
    
    $('select.select2me').select2();
  });
  

  $("#konten_hirarc").on('click', '.hapus', function () {
    $(this).parents(".baris_hirarc").hide("fast", function()
    { $(this).remove(); });
  });
    
});

$(document).ready(function() {
    var nomor1 = 0;

    $(".tambah_pelaksana").click(function(){
        nomor1 ++;
                                                                                                                                                              
      $('#konten-pelaksana').append(
      '<tr class="baris_pelaksana">'
        +'<td><input type="input" name="nama_pelaksana[]" class="form-control"></td>'
        +'<td><input type="input" name="nip_pelaksana[]" class="form-control"></td>'
        +'<td><input type="input" name="jabatan_pelaksana[]" class="form-control"></td>'
        +'<td align="center" style="vertical-align:middle;"><button type="button" id="hapus_pelaksana" class="hapus_pelaksana btn btn-danger btn-sm"><i class="la la-trash-o"></i></button></td>'
      +'</tr>'
      );
    });
    
    $("#konten-pelaksana").on('click', '.hapus_pelaksana', function () {
      $(this).parents(".baris_pelaksana").hide("fast", function()
      { $(this).remove(); });
    });
  });

  $(document).ready(function() {
    var nomor2 = 0;

    $(".tambah_analisis").click(function(){
        nomor2 ++;
                                                                                                                                                              
      $('#konten-analisis').append(
      '<tr class="baris_analisis">'
        +'<td align="center" style="vertical-align:middle;"><button type="button" id="hapus_analisis" class="hapus_analisis btn btn-danger btn-sm"><i class="la la-trash-o"></i></button></td>'
        +'<td><input type="input" name="langkah_pekerjaan[]" class="form-control"></td>'
        +'<td><input type="input" name="potensi_bahaya[]" class="form-control"></td>'
        +'<td><input type="input" name="resiko[]" class="form-control"></td>'
        +'<td><input type="input" name="tindakan[]" class="form-control"></td>'
      +'</tr>'
      );
    });	

    $("#konten-analisis").on('click', '.hapus_analisis', function () {
      $(this).parents(".baris_analisis").hide("fast", function()
      { $(this).remove(); });
    });

  });

  </script>
@endsection