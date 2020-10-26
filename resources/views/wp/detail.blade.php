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
              <a href="javascript:history.back()" class="dropdown-item"><i class="la la-chevron-circle-left"></i> Kembali</a>

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
                      <button onclick="ShowPopup('/wp/print_hirarc/{{ $detailWp->id_wp }}')" name="approve_modal" class="edit btn btn-sm btn-primary btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Print HIRARC" {{ $detailWp->status == 'APPROVED' || $detailWp->status == 'CLOSED' ? '' : 'disabled'  }} > <i class="la la-print"></i> PRINT</button>
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
                          <td class="text-center">{{ $row_data->penilaian_konsekuensi }}</td>
                          <td class="text-center">{{ $row_data->penilaian_kemungkinan }}</td>
                          <td class="text-center">{{ $row_data->penilaian_tingkat_resiko }}</td>
                          <td>{{ $row_data->pengendalian_resiko }}</td>
                          <td class="text-center">{{ $row_data->pengendalian_konsekuensi }}</td>
                          <td class="text-center">{{ $row_data->pengendalian_kemungkinan }}</td>
                          <td class="text-center">{{ $row_data->pengendalian_tingkat_resiko }}</td>
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
                  <button onclick="ShowPopup('/wp/print_jsa/{{ $detailWp->id_wp }}')" name="approve_modal" class="edit btn btn-sm btn-primary btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Print JSA" {{ $detailWp->status == 'APPROVED' || $detailWp->status == 'CLOSED' ? '' : 'disabled'  }} > <i class="la la-print"></i> PRINT</button>
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
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 100%">
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
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 100%">
                      <tr>
                        <td colspan="3" class="text-left">1. ALAT PELINDUNG DIRI</td>
                      </tr>
                       
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item11" {{in_array('Helm', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item11">Helm</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item12" {{in_array('Sepatu Keselamatan', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item12">Sepatu Keselamatan</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item13" {{in_array('Kacamata', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item13">Kacamata</label>
                          </div>
                        </td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item14" {{in_array('Earmuff', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item14">Earmuff</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item15" {{in_array('Sarung Tangan Katun', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item15">Sarung Tangan Katun</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item16" {{in_array('Sarung Tangan Karet', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item16">Sarung Tangan Karet</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item17" {{in_array('Sarung Tangan 20KV', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item17">Sarung Tangan 20KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item18" {{in_array('Pelampung / Life Vest', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item18">Pelampung / Life Vest</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item19" {{in_array('Tabung Pernafasan', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item19">Tabung Pernafasan</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item20" {{in_array('Full Body Harness', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item20">Full Body Harness</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item22" {{in_array('on', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item22">Lain - lain :</label>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td colspan="3" class="text-left">2. PERLENGKAPAN KESELAMATAN & DARURAT</td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item11" {{in_array('Pemadam Api (APAR dll)', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item11">Pemadam Api (APAR dll)</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item12" {{in_array('LOTO (lock out tag out)', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item12">LOTO (lock out tag out)</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item12" {{in_array('Kotak P3K', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item12">Kotak P3K</label>
                          </div>
                        </td>
                        </tr>
                        <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item13" {{in_array('Radio Telekomunikasi', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item13">Radio Telekomunikasi</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item14" {{in_array('Rambu Keselamatan', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item14">Rambu Keselamatan</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item22" {{in_array('on', $peralatan) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item22">Lain - lain :</label>
                          </div>
                        </td>
                        </tr>

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
                            <td class="text-center">{{ $no++ }}</td>
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

                <div class="col-md-12">
                      <button onclick="ShowPopup('/wp/print_wp/{{ $detailWp->id_wp }}')" name="approve_modal" class="edit btn btn-sm btn-primary btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Print Working Permit" {{ $detailWp->status == 'APPROVED' || $detailWp->status == 'CLOSED' ? '' : 'disabled'  }}> <i class="la la-print"></i> PRINT</button>
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
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 100%">
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
                        <td colspan="2" class="text-center" class="text-right">No Telp. ({{ $detailWp->no_pengawas_pekerjaan }})</td>
                      </tr>
                      <tr>
                        <td>9. Pengawas K3L</td>
                        <td>: {{ $detailWp->pengawas_k3l }}</td>
                        <td colspan="2" class="text-center">No Telp. ({{ $detailWp->no_pengawas_k3 }})</td>
                      </tr>
                      </table>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 100%">
                      <tr>
                        <td colspan="5" class="text-left"><strong>B. DURASI PEKERJAAN</strong></td>
                      </tr>
                      <tr>
                        <td rowspan="2">Durasi Kerja</td>
                        <td colspan="2" class="text-center">Tanggal Mulai : {{ $detailWp->tgl_mulai }}</td>
                        <td colspan="2" class="text-center">Jam Mulai : {{ $detailWp->jam_mulai }}</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text-center">Tanggal Selesai : {{ $detailWp->tgl_selesai }}</td>
                        <td colspan="2" class="text-center">Jam Selesai : {{ $detailWp->jam_selesai }}</td>
                      </tr>
                      </table>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table class="table table-striped table-bordered" style="width: 100%">
                      <tr>
                        <td colspan="5" class="text-left"><strong>C. KLASIFIKASI PEKERJAAN</strong></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan LBS/Recloser/FDI', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan LBS/Recloser/FDI</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan kubikel 20KV', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan kubikel 20KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan Kubikel', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan Kubikel</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pengujian Relay Proteksi', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pengujian Relay Proteksi</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Penggantian Relay Proteksi', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Penggantian Relay Proteksi</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan Power Meter', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan Power Meter</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan KWH Meter', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan KWH Meter</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan RTU GH/GI', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan RTU GH/GI</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan Catu Daya', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan Catu Daya</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan Radio Komunikasi', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan Radio Komunikasi</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan Radio Komunikasi', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan Radio Komunikasi</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Sipil', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Sipil</label>
                          </div>
                        </td>
                      </tr>
                  
                      </table>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table class="table table-striped table-bordered" style="width: 100%">
                      <tr>
                        <td colspan="3" class="text-left"><strong>D. PROSEDUR PEKERJAAN YANG TELAH DIJELASKAN KEPADA PEKERJA</strong></td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan dan Penggantian Cubicle 20 KV', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan dan Penggantian Cubicle 20 KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan Cubicle Gardu Hub', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan Cubicle Gardu Hubung 20 KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan LBS dan Recloser', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan LBS dan Recloser</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan RTU dan Peripheral', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan RTU dan Peripheral</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pengujian Control Scada', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pengujian Control Scada</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan Repeater Komunikasi', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan Repeater Komunikasi</label>
                          </div>
                        </td>

                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Perluasan Gardu Hubung 20 KV', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Perluasan Gardu Hubung 20 KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pengujian Alat', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pengujian Alat</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan Proteksi', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan Proteksi</label>
                          </div>
                        </td>
                      </tr>
                      
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
                    
                      <td>
                      <button class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> Prosedur Kerja</button>
                      </td>
                      <td><a target="_blank" href="{{ URL::to('/') }}/files/working_permit/2020/{{ $detailWp->file_bpjs }}" }}" class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> BPJS Kesehatan dan Tenaga Kerja</a></td>
                      <td><a target="_blank" href="{{ URL::to('/') }}/files/working_permit/2020/{{ $detailWp->file_sk_pengawas }}" }}" class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> SK Pengawas & Pelaksana Pekerjaan</a></td>
                      <td><a target="_blank" href="{{ URL::to('/') }}/files/working_permit/2020/{{ $detailWp->file_sertifikat_kompetensi }}" }}" class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> Sertifikat Kompetensi TK</a></td>

                    </tr>
                    <tr>
                    <td><a target="_blank" href="{{ URL::to('/') }}/files/working_permit/2020/{{ $detailWp->file_list_peralatan }}" }}" class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> List Peralatan & APD</a></td>
                    <td><a target="_blank" href="{{ URL::to('/') }}/files/working_permit/2020/{{ $detailWp->file_ak3 }}" }}" class="btn btn-info btn-sm btn-icon btn-block"><i class="la la-external-link"></i> Tenaga Ahli K3</a></td>
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