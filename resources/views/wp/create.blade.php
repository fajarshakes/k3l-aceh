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
              <button onclick="location.href='/wp/list-permit'" class="dropdown-item"><i class="la la-arrow-circle-left"></i> Kembali</button>
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
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="location2">MANAGER BAGIAN / UL :</label>
                              <select class="form-control" id="manager" name="manager">
                              @foreach($getManager as $manager)
                                <option value="{{ $manager->name }}">{{ $manager->name .' - '. $manager->position_desc }}</option>
                              @endforeach
                              </select>
                            </div>
                         
                            <div class="form-group">
                              <label for="location2">SUPERVISOR UP / UL :</label>
                              <select class="form-control" id="supervisor" name="supervisor">
                              @foreach($getSpv as $spv)
                                <option value="{{ $spv->name }}">{{ $spv->name .' - '. $spv->position_desc }}</option>
                              @endforeach
                              </select>
                            </div>
                         
                            <div class="form-group">
                              <label for="location2">PEJABAT PELAKSANA K3L :</label>
                              <select class="form-control" id="pejabat" name="pejabat">
                              @foreach($getPj as $pj)
                                <option value="{{ $pj->name }}">{{ $pj->name .' - '. $pj->position_desc }}</option>
                              @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <br>
                        <hr>

                        <button type="button" class="tambah_hirarc btn btn-primary">
												  <i class="fa fa-plus"></i> Tambah
												</button>

                        <table id="tbl-hirac" style="width:100%" class="table table-striped table-bordered table-hover add-rows">
								          <thead>
                            <tr>
                              <th rowspan="2" width="1%" style="text-align:center;text-align: center;vertical-align: middle;"><i class="fa fa-trash-o"></i></th>	
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
                            <tr>
                              <td></td>
                              <td><input type="text" class="form-control" name="nama_template"></td>
                              <td><input type="text" class="form-control" name="nama_template"></td>
                              <td><input type="text" class="form-control" name="nama_template"></td>
                              <td>
                                <select class="form-control select2me" name="jenis_template">
                                <option value="">PILIH</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                               </select>
                              </td>
                              <td>
                                <select class="form-control" name="jenis_template">
                                <option value="">PILIH</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                               </select>
                              </td>
                              <td><input type="text" class="form-control" name="nama_template"></td>
                              <td>
                                <select class="form-control" name="jenis_template">
                                <option value="">PILIH</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                               </select>
                              </td>
                              <td>
                                <select class="form-control" name="jenis_template">
                                <option value="">PILIH</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                               </select>
                              </td>
                              <td><input type="text" class="form-control" name="nama_template"></td>
                              <td><input type="text" class="form-control" name="nama_template"></td>
                            </tr>
                          </tbody>
                        </table>
                        
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
                          <table id="tbl-pelaksana" class="table display nowrap table-striped table-bordered add-rows">
                            <thead>
                              <tr>
                                <th>NO</th>
                                <th>NAMA PELAKSANA</th>
                                <th>NIP / NIK</th>
                                <th>JABATAN</th>
                                <th>ACTION</th>
                              </tr>
                            </thead>
                            <tbody id="konten-pelaksana">
                              <tr>
                                <td></td>
                                <td><input type="text" name="nama_pelaksana[]" class="form-control"></td>
                                <td><input type="text" name="nip_pelaksana[]" class="form-control"></td>
                                <td><input type="text" name="jabatan_pelaksana[]" class="form-control"></td>
                                <td class="text-center" style="vertical-align:middle;"></td>
                              </tr>
                            </tbody>
                          </table>
                          <button type="button" class="tambah_pelaksana btn btn-primary btn-icon">
												  <i class="la la-user-plus"></i> Tambah Pelaksana
												  </button>
                          
                        </div>
                        <br><br>
                        <!-- <div class="row"> -->
                          <div class="col-md-12">
                            <h5 style="padding-bottom:5px;">
                              <b>B. PERALATAN KESELAMATAN</b>
                            </h5>
                          </div>
                          <div class="row" style="padding-left:15px;">
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
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item24">
                                        <label class="custom-control-label" for="item24">Earplug</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item31">
                                        <label class="custom-control-label" for="item31">Earmuff</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item32">
                                        <label class="custom-control-label" for="item32">Sarung Tangan Katun</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item33">
                                        <label class="custom-control-label" for="item33">Sarung Tangan Karet</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item34">
                                        <label class="custom-control-label" for="item34">Sarung Tangan 20KV</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item41">
                                        <label class="custom-control-label" for="item41">Pelampung / Life Vest</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item42">
                                        <label class="custom-control-label" for="item42">Tabung Pernafasan</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item43">
                                        <label class="custom-control-label" for="item43">Full Body Harness</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item44">
                                        <label class="custom-control-label" for="item44">Lain-lain (Sebutkan)</label>
                                        <textarea name="participants" id="participants2" rows="1" class="form-control"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" style="padding-left:15px;">
                            <div class="col-md-12" style="padding-bottom:5px;">
                              <label>PERLENGKAPAN KESELAMATAN & DARURAT <span style="color:red">*</span></label>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="c-inputs-stacked">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item01">
                                        <label class="custom-control-label" for="item01">Pemadam Api (APAR dll)</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item02">
                                        <label class="custom-control-label" for="item02">LOTO (lock out tag out)</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item11">
                                        <label class="custom-control-label" for="item11">Kotak P3K</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item12">
                                        <label class="custom-control-label" for="item12">Radio Telekomunikasi</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item1">
                                        <label class="custom-control-label" for="item1">Rambu Keselamatan</label>
                                      </div>
                                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                                        <input type="checkbox" name="peralatan[]" class="custom-control-input" id="item4">
                                        <label class="custom-control-label" for="item4">Lain-lain (Sebutkan)</label>
                                        <textarea name="participants" id="participants2" rows="1" class="form-control"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- </div> -->
                        <br><br>
                        <div class="row">
                          <div class="col-md-12">
                            <h5 style="padding-bottom:5px;">
                              <b>C. ANALISIS KESELAMATAN KERJA</b>
                            </h5>
                          </div>
                          <table id="table1" class="table display nowrap table-striped table-bordered zero-configuration">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Langkah Pekerjaan</th>
                                <th>Potensi Bahaya</th>
                                <th>Resiko</th>
                                <th>Tindakan Pengendalian</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </fieldset>
                      <!-- Step 3 -->
                      <h6><i class="step-icon la la-recycle"></i>WORKING PERMIT</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="eventName2">Nama Pekerjaan <span style="color:red">*</span></label>
                              <input type="text" class="form-control" name="nama_pekerjaan">
                            </div>
                            <div class="form-group">
                              <label for="eventName2">Pelaksana / Perusahaan<span style="color:red">*</span></label>
                              <input type="text" class="form-control" name="pelaksana">
                            </div>
                            <div class="form-group">
                              <label for="eventName2">Alamat</label>
                              <input type="text" class="form-control" name="alamat">
                            </div>
                            <div class="form-group">
                              <label for="eventName2">Nama Penanggung Jawab <span style="color:red">*</span></label>
                              <input type="text" class="form-control" name="nama_pj">
                            </div>
                            <div class="form-group">
                              <label for="eventName2">Jabatan <span style="color:red">*</span></label>
                              <input type="text" class="form-control" name="jabatan">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="eventName2">No Telepon / HP <span style="color:red">*</span></label>
                              <input type="text" class="form-control" name="no_telepon">
                            </div>
                            <div class="form-group">
                              <label>Upload Tanda Tangan</label>
                              <input type='file' class="form-control" name="tanda_tangan">
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
                            <div class="form-group">
                              <label for="eventStatus2">UP3 <span style="color:red">*</span></label>
                              <input type="text" class="form-control" value="{{ $up_name }}" readonly>
                            </div>
                            <div class="form-group">
                              <label for="eventStatus2">ULP <span style="color:red">*</span></label>
                              <select class="form-control" id="eventStatus2" name="ulp">
                                <option value="Planning">Planning</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Finished">Finished</option>
                              </select>
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
                                <input type='date' class="form-control datetime" name="tgl_pengajuan"/>
                                <!-- <span class="input-group-addon">
                                  <span class="ft-calendar"></span>
                                </span> -->
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="eventStatus2">Jenis Pekerjaan <span style="color:red">*</span></label>
                              <select class="form-control" id="eventStatus2" name="jenis_pekerjaan">
                                <option value="Planning">Planning</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Finished">Finished</option>
                              </select>
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
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="eventName2">Detail Pekerjaan <span style="color:red">*</span></label>
                              <input type="text" class="form-control" name="detail_pekerjaan">
                            </div>
                            <div class="form-group">
                              <label for="eventName2">Lokasi Pekerjaan <span style="color:red">*</span></label>
                              <input type="text" class="form-control" name="lokasi_pekerjaan">
                            </div>
                            <div class="form-group">
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
                                  <input type='date' class="form-control datetime" name="tgl_mulai"/>
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
                                  <input type='date' class="form-control datetime" name="tgl_selesai"/>
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
                          <b><span style="color:red">*</span> WAJIB DI ISI</b>
                        </div>
                        
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
        
        <div id="loading"></div>
        
        <!-- Modal -->
        <div class="modal fade text-left" id="filter_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Filter Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form action="#">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="projectinput5">Tahun Anggaran</label>
                      <select id="projectinput5" name="group_id" class="form-control">
                        <option value="none" selected="" disabled="">Select Year</option>
                        <option value="9">2020</option>
                        <option value="10">2021</option>
                        <option value="11">2022</option>
                        <option value="12">2023</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="projectinput5">Unit Kerja</label>
                      <select id="projectinput5" name="group_id" class="form-control">
                        <option value="none" selected="" disabled="">Select Unit</option>
                        <option value="9">SEMUA UNIT</option>
                        <option value="9">T. SIPIL</option>
                        <option value="10">SATKER ULP</option>
                        <option value="11">UPT PERPUS</option>
                        <option value="12">..dst</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="projectinput5">Indikator</label>
                      <select id="projectinput5" name="group_id" class="form-control">
                        <option value="none" selected="" disabled="">Select Indikator</option>
                        <option value="9">SEMUA INDIKATOR</option>
                        <option value="10">IKU ULP</option>
                        <option value="11">IKK</option>
                        <option value="12">IKT</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="projectinput5">Pos Anggaran</label>
                      <select id="projectinput5" name="group_id" class="form-control">
                        <option value="none" selected="" disabled="">Select Pos Anggaran</option>
                        <option value="9">SEMUA POS</option>
                        <option value="10">PERALATAN</option>
                        <option value="11">KEGIATAN</option>
                        <option value="12">PELATIHAN</option>
                      </select>
                    </div>
                  </div>
                  
                </div>

              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info btn-icon"><i class="la la-check-circle-o"></i> Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal -->   

</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#tbl-hirac').DataTable( {
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
          url:"{{ route('wp_store') }}",
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
                window.location.href = '/wp/list-permit/';
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
  
  kendali_konsekuensi_hirarc = '<select class="form-control select2me paket_harga required" id="id_kendali_konsekuensi_hirarc+nomor" name="kendali_konsekuensi_hirarc[]"><option value="" selected="selected">PILIH</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>';
  kendali_kemungkinan_hirarc = '<select class="form-control select2me paket_harga required" id="id_kendali_konsekuensi_hirarc+nomor" name="kendali_kemungkinan_hirarc[]"><option value="" selected="selected">PILIH</option><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option></select>';
  $('#konten_hirarc').append(
    '<tr class="baris_hirarc">'
        +'<td align="center" style="vertical-align:middle;"><button type="button" id="hapus" class="btn hapus_in btn-xs red"><i class="fa fa-trash-o"></i></button></td>'
        +'<td><input type="input" name="kegiatan_hirarc[]" class="form-control"></td>'
        +'<td><input type="text" class="form-control" name="potensi_bahaya_hirarc[]" /></td>'
        +'<td><input type="input" name="resiko_hirarc[]" class="form-control"></td>'
        +'<td>'+nilai_konsekuensi_hirarc+'</td>'
        +'<td>'+nilai_kemungkinan_hirarc+'</td>'
        +'<td><input type="input" name="pengendalian_resiko_hirarc[]" class="form-control"></td>'
        +'<td>'+kendali_konsekuensi_hirarc+'</td>'
        +'<td>'+kendali_kemungkinan_hirarc+'</td>'
        +'<td><input type="input" name="status_pengendalian_hirarc[]" class="form-control"></td>'
        +'<td><input type="input" name="penanggung_jawab_hirarc[]" class="form-control"></td>'
        +'</tr>'
  );
    
    $('select.select2me').select2();
  });
  
  /*
  $("#hapus").live('click', function () {
    $(this).parents(".baris_hirarc").hide("fast", function(){ $(this).remove(); });
  });
  */

    var nomor1 = 0;

    $(".tambah_pelaksana").click(function(){
        nomor1 ++;
                                                                                                                                                              
      $('#konten-pelaksana').append(
      '<tr class="baris_pelaksana">'
        +'<td></td>'
        +'<td><input type="input" name="nama_pelaksana[]" class="form-control"></td>'
        +'<td><input type="input" name="nip_pelaksana[]" class="form-control"></td>'
        +'<td><input type="input" name="jabatan_pelaksana[]" class="form-control"></td>'
        +'<td align="center" style="vertical-align:middle;"><button type="button" id="hapus_pelaksana" class="btn btn-danger btn-sm"><i class="la la-trash-o"></i></button></td>'
      +'</tr>'
      );
    });
    
    $("#hapus_pelaksana").live('click', function () {
      $(this).parents(".baris_pelaksana").hide("fast", function(){ $(this).remove(); });
    });		

  });
</script>
@endsection