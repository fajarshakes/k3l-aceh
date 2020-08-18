@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">WORKING PERMIT</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Working Permit</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">List Permit</a>
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
                  <h4 class="card-title">HAZARD IDENTIFICATION, RISK ASSESSMENT AND RISK CONTROL (HIRARC)</h4>
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
                <div class="col-md-12">
                      <button onclick="ShowPopup('/wp/print_hirarc/{{ $detailWp->id_wp }}')" name="approve_modal" class="edit btn btn-sm btn-primary btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Print HIRARC" > <i class="la la-print"></i> PRINT</button>
                  </div>
                <form id="form_menu" method="post" enctype="multipart/form-data">
                @csrf  
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-12 col-lg-12">
                      
                      <!--table id="tbl_hazard" class="table table-striped table-bordered table-hover add-rows" style="width: 80%"-->
                      <table id="tbl_hirarc" style="width:100%" class="table display nowrap table-striped table-bordered zero-configuration">
                        <thead>
                        <tr>
                          <th colspan="12" style="text-align: center;">
                            <h3>
                              <b>HAZARD IDENTIFICATION, RISK ASSESSMENT AND RISK CONTROL (HIRARC)</b>
                            </h3>
                            IDENTIFIKASI BAHAYA, PENILAIAN, DAN PENGENDALIAN RESIKO (IBPPR)
                          </th>
                        </tr>
                        <tr>
                          <th rowspan="2" style="text-align: center; vertical-align: middle;">Kegiatan</th>
                          <th rowspan="2" style="text-align: center; vertical-align: middle;">Potensi Bahaya</th>
                          <th rowspan="2" style="text-align: center; vertical-align: middle;">Resiko</th>
                          <th colspan="3" style="text-align: center;">Penilaian Resiko</th>
                          <th rowspan="2" style="text-align: center; vertical-align: middle;">Pengendalian Resiko</th>
                          <th colspan="3" style="text-align: center;">Pengendalian Resiko</th>
                          <th rowspan="2" style="text-align: center; vertical-align: middle;">Status Pengendalian</th>
                          <th rowspan="2" style="text-align: center; vertical-align: middle;">Penanggung Jawab</th>
                        </tr>
                          <tr>
                            <td class="text-center">Konsekuensi</td>
                            <td class="text-center">Kemungkinan</td>
                            <td class="text-center">Tingkat</td>
                          
                            <td class="text-center">Konsekuensi</td>
                            <td class="text-center">Kemungkinan</td>
                            <td class="text-center">Tingkat</td>
                          </tr>
                          </thead>
										    <tbody>
                        @foreach($tbl_hirarc as $row_data)
                        <tr>
                          <td>{{ $row_data->kegiatan }}</td>
                          <td>{{ $row_data->potensi_bahaya }}</td>
                          <td>{{ $row_data->resiko }}</td>
                          <td>{{ $row_data->penilaian_konsekuensi }}</td>
                          <td>{{ $row_data->penilaian_kemungkinan }}</td>
                          <td></td>
                          <td>{{ $row_data->pengendalian_resiko }}</td>
                          <td>{{ $row_data->pengendalian_konsekuensi }}</td>
                          <td>{{ $row_data->pengendalian_kemungkinan }}</td>
                          <td></td>
                          <td>{{ $row_data->status_pengendalian }}</td>
                          <td>{{ $row_data->penanggung_jawab }}</td>

                        </tr>
                        @endforeach
                        </tbody>
									    </table>
                      </div>
                    </div>
                  </div>
              </form>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">JOB SAFETY ANALYSIS (JSA)</h4>
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
                  <div class="col-md-12">
                      <button onclick="('/wp/print_jsa/{{ $detailWp->id_wp }}')" name="approve_modal" class="edit btn btn-sm btn-primary btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Print JSA" > <i class="la la-print"></i> PRINT</button>
                  </div>

                  <div class="card-body">
                    <div class="row">
                    
                    <div class="col-md-12" style="text-align:center;">
                      <h3 style="padding:25px 0 15px 0;">
                        <b>JOB SAFETY ANALYSIS (JSA)</b>
                        </br>
                        <small class="text-muted">ANALISIS KESELAMATAN KERJA</small>
                      </h3>
                    </div>

                    <div class="col-md-12">
                      <h5 style="padding-bottom:5px;">
                        <b>A. INFORMASI PEKERJAAN</b>
                      </h5>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 80%">
                      <tr>
                        <td width="2%">1</td>
                        <td>Tanggal</td>
                        <td width="1%">:</td>
                        <td colspan="3">{{ $detailWp->tgl_mulai }}</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Jenis Pekerjaan</td>
                        <td>:</td>
                        <td colspan="3">SIPIL</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Lokasi</td>
                        <td>:</td>
                        <td colspan="3">{{ $detailWp->lokasi_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Perusahaan Pelaksana</td>
                        <td>:</td>
                        <td colspan="3">{{ $detailWp->pelaksana }}</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Pengawas Pekerjaan</td>
                        <td>:</td>
                        <td colspan="3">{{ $detailWp->pengawas_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>Nama Pelaksana Pekerjaan</td>
                        <td>:</td>
                        <td>Nama Lengkap</td>
                        <td>NIP / NIK</td>
                      </tr>
                      <tbody>
                      @foreach($pelaksana_kerja as $pelaksana)
                        <tr>
                          <td colspan="3"></td>
                          <td>{{ $pelaksana->nama_pelaksana }}</td>
                          <td>{{ $pelaksana->personal_no }}</td>
                        </tr>
                      @endforeach
                      </tbody>
                      </table>
                    </div>

                    <div class="col-md-12">
                      <h5 style="padding-bottom:5px;">
                        <b>B. PERALATAN KESELAMATAN</b>
                      </h5>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 80%">
                      <tr>
                        <td colspan="3" class="text-left">1. ALAT PELINDUNG DIRI</td>
                      </tr>
                      <!-- <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                      @foreach($mperalatan as $mper)
                      @php
                        $i = 'true';
                      @endphp
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                          @foreach($peralatan as $per)
                          @if($mper == $per->description)
                            <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mper }}" checked>
                            {{ $mper }} 
                            @php
                              $i = 'false';
                            @endphp
                          @endif
                          @endforeach

                          @if($i == 'true')
                          <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mper }}">
                          {{ $mper }} 
                          @endif
                          </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach -->

                      
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Earmuff', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Earmuff</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Sarung Tangan Karet', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Sarung Tangan Karet</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Kotak P3K', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Kotak P3K</label>
                          </div>
                        </td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Sepatu keselamatan</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Sarung tangan Katun</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Tabung pernafasan</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Kacamata</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Sarung tangan karet</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pelampung / Life Vest</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Earplug</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Sarung tangan 20kV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Lain - lain :</label>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td colspan="3" class="text-left">2. PERLENGKAPAN KESELAMATAN & DARURAT</td>
                      </tr>
                      @foreach($mkesalamatan as $mkes)
                      @php
                        $i = 'true';
                      @endphp
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                          @foreach($peralatan as $per)
                          @if($mkes == $per->description)
                            <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mkes }}" checked>
                            {{ $mkes }} 
                            @php
                              $i = 'false';
                            @endphp
                          @endif
                          @endforeach

                          @if($i == 'true')
                          <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mkes }}">
                          {{ $mkes }} 
                          @endif
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      
                      </table>
                    </div>

                    <div class="col-md-12">
                      <h5 style="padding-bottom:5px;">
                        <b>C. ANALISA KESELAMATAN KERJA</b>
                      </h5>
                    </div>
                    <div class="col-xl-12 col-lg-12">
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>LANGKAH PEKERJAAN</th>
                            <th>POTENSI BAHAYA</th>
                            <th>RESIKO</th>
                            <th>TINDAKAN PENGENDALIAN</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($tbl_jsa as $row_jsa)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row_jsa->langkah_pekerjaan }}</td>
                            <td>{{ $row_jsa->potensi_bahaya }}</td>
                            <td>{{ $row_jsa->resiko }}</td>
                            <td>{{ $row_jsa->tindakan }}</td>
                          </tr>
                        @endforeach
                        </tbody>
                      
                      </table>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">WORKING PERMIT</h4>
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
                  <div class="card-body">
                    <div class="row">

                    <div class="col-md-12" style="text-align:center;">
                      <h3 style="padding:25px 0 15px 0;">
                        <b>WORKING PERMIT</b>
                      </h3>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 80%">
                      <tr>
                        <td colspan="4" class="text-left"><strong>A. INFORMASI PEKERJAAN</strong></td>
                      </tr>
                      <tr>
                        <td>1. Tanggal Pengajuan</td>
                        <td colspan="3">: {{ $detailWp->tgl_pengajuan }}</td>
                      </tr>
                      <tr>
                        <td>2. Jenis Pekerjaan</td>
                        <td colspan="3">: {{ $detailWp->jenis_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>3. Detail Pekerjaan</td>
                        <td colspan="3">: {{ $detailWp->detail_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>4. Lokasi Pekerjaan</td>
                        <td colspan="3">: {{ $detailWp->lokasi_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>5. Perlu Pemadaman</td>
                        <td colspan="3">: {{ $detailWp->pemadaman }}</td>
                      </tr>
                      <tr>
                        <td>6. Perlu Grounding</td>
                        <td colspan="3">: {{ $detailWp->grounding }}</td>
                      </tr>
                      <tr>
                        <td>7. Peralatan yang perlu dipadamkan</td>
                        <td colspan="3">: {{ $detailWp->peralatan_dipadamkan }}</td>
                      </tr>
                      <tr>
                        <td>8. Pengawas Pekerjaan</td>
                        <td>: {{ $detailWp->pengawas_pekerjaan }}</td>
                        <td>No Telp</td>
                        <td>{{ $detailWp->no_pengawas_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>9. Pengawas K3L</td>
                        <td>: {{ $detailWp->pengawas_k3l }}</td>
                        <td>No Telp</td>
                        <td>{{ $detailWp->no_pengawas_k3 }}</td>
                      </tr>
                      </table>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 80%">
                      <tr>
                        <td colspan="5" class="text-left"><strong>B. DURASI PEKERJAAN</strong></td>
                      </tr>
                      <tr>
                        <td rowspan="2">Durasi Kerja</td>
                        <td>Tanggal Mulai : </td>
                        <td>{{ $detailWp->tgl_mulai }}</td>
                        <td>Jam Mulai : </td>
                        <td>{{ $detailWp->jam_mulai }}</td>
                      </tr>
                      <tr>
                        <td>Tanggal Selesai : </td>
                        <td>{{ $detailWp->tgl_selesai }}</td>
                        <td>Jam Selesai : </td>
                        <td>{{ $detailWp->jam_selesai }}</td>
                      </tr>
                      </table>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table class="table table-striped table-bordered" style="width: 100%">
                      <tr>
                        <td colspan="5" class="text-left"><strong>C. KLASIFIKASI PEKERJAAN</strong></td>
                      </tr>
                      <td colspan="3" class="text-left">2. PERLENGKAPAN KESELAMATAN & DARURAT</td>
                      </tr>
                      @foreach($mklasifikasi as $mklas)
                      @php
                        $i = 'true';
                      @endphp
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                          @foreach($klasifikasi as $klas)
                          @if($mklas == $klas->description)
                            <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mklas }}" checked>
                            {{ $mklas }} 
                            @php
                              $i = 'false';
                            @endphp
                          @endif
                          @endforeach

                          @if($i == 'true')
                          <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mklas }}">
                          {{ $mklas }} 
                          @endif
                          </div>
                        </td>
                      </tr>
                      @endforeach

                      </table>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table class="table table-striped table-bordered" style="width: 100%">
                      <tr>
                        <td colspan="3" class="text-left"><strong>D. PROSEDUR PEKERJAAN YANG TELAH DIJELASKAN KEPADA PEKERJA</strong></td>
                      </tr>
                      @foreach($mprosedur as $mpro)
                      @php
                        $i = 'true';
                      @endphp
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                          @foreach($prosedur as $pro)
                          @if($mpro == $pro->description)
                            <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mpro }}" checked>
                            {{ $mpro }} 
                            @php
                              $i = 'false';
                            @endphp
                          @endif
                          @endforeach

                          @if($i == 'true')
                          <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mpro }}">
                          {{ $mpro }} 
                          @endif
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      
                      </table>
                    </div>

                    

                    </div>
                  </div>
              </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">LAMPIRAN</h4>
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
                  <div class="card-body">
                    <div class="row">
                    <div class="col-md-12" style="text-align:center;">
                      <h3 style="padding:25px 0 15px 0;">
                        <b>LAMPIRAN IZIN KERJA</b>
                      </h3>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                    <table class="table table-striped table-bordered" style="width: 100%">
                    <tr>
                      <td colspan="4" class="text-left"><strong>FILE PDF</strong></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> Prosedur Kerja</button></td>
                      <td><button class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> BPJS Kesehatan dan Tenaga Kerja</button></td>
                      <td><button class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> SK Pengawas & Pelaksana Pekerjaan</button></td>
                      <td><button class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> Sertifikat Kompetensi TK</button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> List Peralatan & APD</button></td>
                      <td><button class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> Tenaga Ahli K3</button></td>
                    </tr>
                    
                    
                    </table>
                    </div>
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
$(document).ready(function() {
    $('#tbl_hirarc').DataTable( {
        scrollX: true,"scrollX": true,
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
<script type="text/javascript">
    var popup;
    function ShowPopup(url) {
        popup = window.open(url, "Popup", "toolbar=no,scrollbars=yes,location=no,statusbar=no,menubar=no,resizable=0,width=900,height=500,left = 490,top = 262");
        popup.focus();
    }
</script>

@endsection