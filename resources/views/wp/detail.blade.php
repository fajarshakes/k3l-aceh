@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">WORKING PERMIT </h3>
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
                <form id="form_menu" method="post" enctype="multipart/form-data">
                @csrf  
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-12 col-lg-12">
                      
                      <table id="tbl_hazard" class="table table-striped table-bordered table-hover add-rows" style="width: 80%">
                        <tr>
                          <th colspan="12" style="text-align: center;">
                            <h3>
                              <b>HAZARD IDENTIFICATION, RISK ASSESSMENT AND RISK CONTROL (HIRARC)</b>
                            </h3>
                            IDENTIFIKASI BAHAYA, PENILAIAN, DAN PENGENDALIAN RESIKO (IBPPR)
                          </th>
                        </tr>
                        <tr>
                          <th rowspan="2" width="15%" style="text-align: center; vertical-align: middle;">Kegiatan</th>
                          <th rowspan="2" width="15%"  style="text-align: center; vertical-align: middle;">Potensi Bahaya</th>
                          <th rowspan="2" style="text-align: center; vertical-align: middle;">Resiko</th>
                          <th colspan="3" style="text-align: center;">Penilaian Resiko</th>
                          <th rowspan="2" style="text-align: center; vertical-align: middle;">Pengendalian Resiko</th>
                          <th colspan="3" style="text-align: center;">Pengendalian Resiko</th>
                          <th rowspan="2" style="text-align: center; vertical-align: middle;">Status Pengendalian</th>
                          <th rowspan="2" style="text-align: center; vertical-align: middle;">Penanggung Jawab</th>
                        </tr>
                        <tr>
                          <th style="text-align: center;">Konsekuensi</th>
                          <th style="text-align: center;">Kemungkinan</th>
                          <th style="text-align: center;">Tingkat Resiko</th>

                          <th style="text-align: center;">Konsekuensi</th>
                          <th style="text-align: center;">Kemungkinan</th>
                          <th style="text-align: center;">Tingkat Resiko</th>
                        </tr>
										    <tbody>
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
                        <td colspan="3">20-20-2020</td>
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
                        <td colspan="3">LOKASI</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Perusahaan Pelaksana</td>
                        <td>:</td>
                        <td colspan="3">LOKASI</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Pengawas Pekerjaan</td>
                        <td>:</td>
                        <td colspan="3">LOKASI</td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>Nama Pelaksana Pekerjaan</td>
                        <td>:</td>
                        <td>Nama Lengkap</td>
                        <td>NIP / NIK</td>
                      </tr>
                      <tbody>
                      <tr>
                        <td colspan="3"></td>
                        <td>Fachrul</td>
                        <td>000000</td>
                      </tr>
                      <tr>
                        <td colspan="3"></td>
                        <td>Fachrul</td>
                        <td>000000</td>
                      </tr>
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
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Helm</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Earmuff</label>
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
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemadam Api (APAR dll)</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Kotak P3K</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Rambu keselamatan</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">LOTO (lock out tag out)</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Radio Telekomunikasi</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Lain - lain :</label>
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
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 80%">
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
                          <tr>
                            <td>s</td>
                          </tr>
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
                        <td colspan="3">: 20-20-2020</td>
                      </tr>
                      <tr>
                        <td>2. Jenis Pekerjaan</td>
                        <td colspan="3">: 20-20-2020</td>
                      </tr>
                      <tr>
                        <td>3. Detail Pekerjaan</td>
                        <td colspan="3">: 20-20-2020</td>
                      </tr>
                      <tr>
                        <td>4. Lokasi Pekerjaan</td>
                        <td colspan="3">: 20-20-2020</td>
                      </tr>
                      <tr>
                        <td>5. Perlu Pemadaman</td>
                        <td colspan="3">: 20-20-2020</td>
                      </tr>
                      <tr>
                        <td>6. Perlu Grounding</td>
                        <td colspan="3">: 20-20-2020</td>
                      </tr>
                      <tr>
                        <td>7. Peralatan yang perlu dipadamkan</td>
                        <td colspan="3">: 20-20-2020</td>
                      </tr>
                      <tr>
                        <td>8. Pengawas Pekerjaan</td>
                        <td>: 20-20-2020</td>
                        <td>No Telp</td>
                        <td>_62</td>
                      </tr>
                      <tr>
                        <td>9. Pengawas K3L</td>
                        <td>: 20-20-2020</td>
                        <td>No Telp</td>
                        <td>_62</td>
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
                        <td>15-06-2020</td>
                        <td>Jam Mulai : </td>
                        <td>08:00</td>
                      </tr>
                      <tr>
                        <td>Tanggal Mulai : </td>
                        <td>15-06-2020</td>
                        <td>Jam Mulai : </td>
                        <td>08:00</td>
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
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemasangan LBS/Recloser/FDI</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemasangan kubikel 20KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemeliharaan Kubikel</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pengujian Relay Proteksi</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Penggantian Relay Proteksi</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemasangan Power Meter</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemasangan KWH Meter</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemeliharaan RTU GH/GI</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemasangan Catu Daya</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemasangan Radio Komunikasi</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemeliharaan Radio Komunikasi</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
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
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemasangan dan Penggantian Cubicle 20 KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemeliharaan Cubicle Gardu Hubung 20 KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemasangan LBS dan RECLOSER</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemeliharaan RTU dan Peripheral</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pengujian Control Scada</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pemeliharaan Repeater Komunikasi</label>
                          </div>
                        </td>

                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Perluasan Gardu Hubung 20 KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21">Pengujian Alat</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                            <label class="custom-control-label" for="item21"> Pemasangan Proteksi</label>
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
                        <td><button class="btn btn-info btn-sm btn-icon"><i class="la la-external-link"></i> BPJS Kesehatan dan Tenaga Kerja</button></td>
                        <td>BPJS Kesehatan dan Tenaga Kerja</td>
                        <td>BPJS Kesehatan dan Tenaga Kerja</td>
                        <td>BPJS Kesehatan dan Tenaga Kerja</td>
                      </tr>
                      <tr>
                        <td>BPJS Kesehatan dan Tenaga Kerja</td>
                        <td>BPJS Kesehatan dan Tenaga Kerja</td>
                        <td>BPJS Kesehatan dan Tenaga Kerja</td>
                        <td>BPJS Kesehatan dan Tenaga Kerja</td>
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
    $('#tbl_hazard').DataTable( {
        "scrollX": true,
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
@endsection