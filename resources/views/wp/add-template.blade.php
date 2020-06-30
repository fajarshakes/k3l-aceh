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
                <li class="breadcrumb-item active"> Create
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
                  <h4 class="card-title">Form wizard with icon tabs</h4>
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
                    <form action="#" class="icons-tab-steps wizard-circle">
                      <!-- Step 1 -->
                      <h6><i class="step-icon la la-exclamation-triangle"></i> HIRARC </h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="location2">Jenis Template :</label>
                              <select class="custom-select form-control" name="jenis_template">
                                <option value="">Pilih Unit</option>
                                @foreach($unitType as $type)
                                    <option value="{{ $type->UNIT_TYPE }}">{{ $type->UNIT_TYPE .' - '. $type->TYPE_NAME }}</option>
                                @endforeach
                              </select>
                            </div>
                         
                            <div class="form-group">
                              <label for="location2">Nama Template :</label>
                              <input type="text" class="form-control" name="nama_template">
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
                                <select class="custom-select form-control" name="jenis_template">
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
                                <select class="custom-select form-control" name="jenis_template">
                                <option value="">PILIH</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                               </select>
                              </td>
                              <td>
                                <select class="custom-select form-control" name="jenis_template">
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
                        <hr>
                        
                      </fieldset>
                      <!-- Step 2 -->
                      <h6><i class="step-icon la la-fire-extinguisher"></i>JSA</h6>
                      <fieldset>
                      <h4><i class="step-icon la la-fire-extinguisher"></i> JSA - JOB SAFETY ANALYSIS (JSA)</h4>
                      <hr>
                      <h5>B. PERALATAN KESELAMATAN</h5>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="proposalTitle2">Alat Pelindung Diri (APD)</label>  
                            </div>

                            <div class="row skin skin-flat">
                            <div class="col-md-4 col-sm-12">
                              <fieldset>
                                  <input type="checkbox" id="input-11">
                                  <label for="input-11">Helm</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-12">
                                  <label for="input-12">Sepatu Keselamatan</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-13">
                                  <label for="input-13">Kacamata</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-14">
                                  <label for="input-14">Earplug</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset>
                                  <input type="checkbox" id="input-21">
                                  <label for="input-15">Earmuff</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-22">
                                  <label for="input-22">Sarung Tangan Katun</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-23">
                                  <label for="input-23">Sarung Tangan Karet</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-24">
                                  <label for="input-24">Sarung Tangan 20KV</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset>
                                  <input type="checkbox" id="input-31">
                                  <label for="input-31">Pelampung / Life Vest</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-32">
                                  <label for="input-32">Tabung Pernafasan</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-33">
                                  <label for="input-33">Full Body Harness</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-24">
                                  <label for="input-24">Lain - Lain</label></br>
                                  <textarea placeholder="isi"></textarea>
                                </fieldset>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="proposalTitle2">Perlengkapan Keselamatan & Darurat</label>  
                            </div>

                            <div class="row skin skin-flat">
                            <div class="col-md-4 col-sm-12">
                              <fieldset>
                                  <input type="checkbox" id="input-101">
                                  <label for="input-101">Pemadam Api (APAR dll)</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-102">
                                  <label for="input-102">LOTO (lock out tag out)</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset>
                                  <input type="checkbox" id="input-201">
                                  <label for="input-201">Kotak P3K</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-202">
                                  <label for="input-202">Radio Telekomunikasi</label>
                                </fieldset>

                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset>
                                  <input type="checkbox" id="input-301">
                                  <label for="input-301">Rambu Keselamatan</label>
                                </fieldset>

                                <fieldset>
                                  <input type="checkbox" id="input-304">
                                  <label for="input-304">Lain - Lain</label></br>
                                  <textarea placeholder="isi"></textarea>
                                </fieldset>
                            </div>
                            </div>
                        </div>
                        </div>

                        <h5>C. ANALISIS KESELAMATAN KERJA</h5>
                        <div class="row">
                        <div class="form-group">
															<div class="col-sm-12">
																<button type="button" class="tambah_jsa btn btn-primary">
																	<i class="fa fa-plus"></i> Tambah
																</button>

																<table style="width:100%" class="table table-striped table-bordered table-hover">
								                                    <thead>
								                                      <tr>
								                                      	<th width="1%" style="text-align:center;"><i class="fa fa-trash-o"></i></th>	
								                                        <th style="font-size: 11px;" width="25%">LANGKAH PEKERJAAN</th>
								                                        <th style="font-size: 11px;" width="25%">POTENSI BAHAYA</th>
								                                        <th style="font-size: 11px;" width="25%">RESIKO</th>
								                                        <th style="font-size: 11px;" width="25%">TINDAKAN PENGENDALIAN</th>
								                                        
								                                      </tr>
								                                    </thead>
								                                    <tbody id="konten_jsa">
								                                    	<tr>
								                                    		<td></td>
								                                    		<td><input type="text" class="form-control" name="langkah_pekerjaan_jsa[]"></td>
								                                    		<td><input type="text" class="form-control" name="potensi_bahaya_jsa[]"></td>
								                                    		<td><input type="text" class="form-control" name="resiko_jsa[]"></td>
								                                    		<td><input type="text" class="form-control" name="tindakan_pengendalian_jsa[]"></td>
								                                    	</tr>
								                                    </tbody>
								                                </table>
															</div>
														</div>
                        </div>
                          
                      </fieldset>
                      <!-- Step 3 -->
                      <h6><i class="step-icon la la-recycle"></i>WORKING PERMIT</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="eventName2">Event Name :</label>
                              <input type="text" class="form-control" id="eventName2">
                            </div>
                            <div class="form-group">
                              <label for="eventType2">Event Type :</label>
                              <select class="custom-select form-control" id="eventType2" data-placeholder="Type to search cities"
                              name="eventType2">
                                <option value="Banquet">Banquet</option>
                                <option value="Fund Raiser">Fund Raiser</option>
                                <option value="Dinner Party">Dinner Party</option>
                                <option value="Wedding">Wedding</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="eventLocation2">Event Location :</label>
                              <select class="custom-select form-control" id="eventLocation2" name="location">
                                <option value="">Select City</option>
                                <option value="Amsterdam">Amsterdam</option>
                                <option value="Berlin">Berlin</option>
                                <option value="Frankfurt">Frankfurt</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Event Date - Time :</label>
                              <div class='input-group'>
                                <input type='text' class="form-control datetime" />
                                <span class="input-group-addon">
                                  <span class="ft-calendar"></span>
                                </span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="eventStatus2">Event Status :</label>
                              <select class="custom-select form-control" id="eventStatus2" name="eventStatus">
                                <option value="Planning">Planning</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Finished">Finished</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Requirements :</label>
                              <div class="c-inputs-stacked">
                                <div class="d-inline-block custom-control custom-checkbox">
                                  <input type="checkbox" name="status2" class="custom-control-input" id="staffing2">
                                  <label class="custom-control-label" for="staffing2">Staffing</label>
                                </div>
                                <div class="d-inline-block custom-control custom-checkbox">
                                  <input type="checkbox" name="status2" class="custom-control-input" id="catering2">
                                  <label class="custom-control-label" for="catering2">Catering</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <!-- Step 4 -->
                      <h6><i class="step-icon la la-image"></i>Step 4</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="meetingName2">Name of Meeting :</label>
                              <input type="text" class="form-control" id="meetingName2">
                            </div>
                            <div class="form-group">
                              <label for="meetingLocation2">Location :</label>
                              <input type="text" class="form-control" id="meetingLocation2">
                            </div>
                            <div class="form-group">
                              <label for="participants2">Names of Participants</label>
                              <textarea name="participants" id="participants2" rows="4" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="decisions2">Decisions Reached</label>
                              <textarea name="decisions" id="decisions2" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                              <label>Agenda Items :</label>
                              <div class="c-inputs-stacked">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                                  <label class="custom-control-label" for="item21">1st item</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" name="agenda2" class="custom-control-input" id="item22">
                                  <label class="custom-control-label" for="item22">2nd item</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" name="agenda2" class="custom-control-input" id="item23">
                                  <label class="custom-control-label" for="item23">3rd item</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" name="agenda2" class="custom-control-input" id="item24">
                                  <label class="custom-control-label" for="item24">4th item</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" name="agenda2" class="custom-control-input" id="item25">
                                  <label class="custom-control-label" for="item25">5th item</label>
                                </div>
                              </div>
                            </div>
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
        </div>
      
  
        <!-- Modal -->
        <div class="modal fade text-left" id="user_view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Detail Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form method="POST" action="{{ route('user_store') }}">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="companyName">Unit</label>
                    <input type="text" class="form-control" id="u_email" name="email" readonly>
                </div>
                <div class="form-group">
                  <label for="companyName">No RKA</label>
                    <input type="text" class="form-control" value="001.IKU.00000.2020" readonly>
                </div>
                <div class="form-group">
                  <label for="companyName">Deskripsi Kegiatan</label>
                    <input type="text" class="form-control" value="Pengadaan 000000000" readonly>
                </div>
                <div class="form-group">
                  <label for="companyName">Nilai Usulan</label>
                    <input type="text" class="form-control" value="500.000.000" readonly>
                </div>
                

                <input type="hidden" name="id" id="u_id">
                <input type="hidden" name="unit" id="u_unit">
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div>
        </div>

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
                      <select id="projectinput5" name="group_id" class="form-control select2me">
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
        
        <div class="modal fade text-left" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Upload File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form action="#">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="projectinput5">Tahun Anggaran</label>
                      <select id="projectinput5" name="group_id" class="form-control">
                        <option value="none" selected="" disabled="">Select Group</option>
                        <option value="9">2020</option>
                        <option value="10">2021</option>
                        <option value="11">2022</option>
                        <option value="12">2023</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="form-group">
                    <label for="projectinput5">File Upload</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                    </fieldset>
                  </div>
                </div>

                <div class="row">
                <div class="col-md-12">
                  <fieldset class="form-group">
                  <div class="form-group mt-1">
                      <input type="checkbox" id="switcherySize3" class="switchery" checked/>
                      <label for="switcherySize3" class="font-medium-2 text-bold-600 ml-1">Data sudah sesuai !
                        <p class="text-muted"><code>Centang untuk melanjutkan</code></p></label>
                    </div>
                    </fieldset>
                  </div>
                  
                </div>
                
                <input type="hidden" name="unit" value="1000">
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-info">Upload Data</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade text-left" id="user_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Update User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form method="POST" action="">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="companyName">Email</label>
                    <input type="text" class="form-control" id="u_email" name="email" readonly>
                </div>
                <div class="form-group">
                  <label for="companyName">Full Name</label>
                    <input type="text" class="form-control" id="u_name" name="name">
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="projectinput5">Group Level</label>
                      <select id="projectinput5" name="group_id" class="form-control">
                        <option value="none" selected="" disabled="">Select Group</option>
                        <option value="9">Manager</option>
                        <option value="10">Sekretaris</option>
                        <option value="11">Bendahara</option>
                        <option value="12">Pengawas</option>
                      </select>
                    </div>
                  </div>
                </div>

                <input type="hidden" name="id" id="u_id">
                <input type="hidden" name="unit" id="u_unit">
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade text-left" id="user_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Delete User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form method="POST" action="">
              @csrf
              <div class="modal-body">
              <div class="bs-callout-danger callout-border-left mt-1 p-1">
                      <strong>Delete User !</strong>
                      <p>Anda yakin akan menghapus user  ?</p>
                      <input type="text" class="form-control" id="u_email" readonly>
              </div>

                <input type="hidden" name="id" id="u_id">
                <input type="hidden" name="unit" id="u_unit">
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-info">Submit</button>
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
    
    $("#hapus").live('click', function () {
      $(this).parents(".baris_hirarc").hide("fast", function(){ $(this).remove(); });
    });
    });

	$(document).ready(function() {

    var nomor1 = 0;
		var status="";
		
        $(".tambah_jsa").click(function(){
            nomor1 ++;
                                                                                                                                                                  
          $('#konten_jsa').append(
          '<tr class="baris_jsa">'
            +'<td align="center" style="vertical-align:middle;"><button type="button" id="hapus" class="btn hapus_in btn-xs red"><i class="fa fa-trash-o"></i></button></td>'
            +'<td><input type="input" name="langkah_pekerjaan_jsa[]" class="form-control"></td>'
            +'<td><input type="input" name="potensi_bahaya_jsa[]" class="form-control"></td>'
            +'<td><input type="input" name="resiko_jsa[]" class="form-control"></td>'
            +'<td><input type="input" name="tindakan_pengendalian_jsa[]" class="form-control"></td>'
          +'</tr>'
          );
          
          $('select.select2me').select2();
        });
				
        $("#hapus").live('click', function () {
			  $(this).parents(".baris_jsa").hide("fast", function(){ $(this).remove(); });
        });		

    });
</script>
@endsection