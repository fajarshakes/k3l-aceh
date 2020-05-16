@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Detail Usulan </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active"> Detail Usulan
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
              <a class="dropdown-item" href="#"><i class="la la-filter"></i> Filter Data</a>
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
                  <h4 class="card-title">Detail Usulan Anggaran</h4>
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
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Unit Usulan
                          </h5>
                          <div class="form-group">
                            <input type="text" class="form-control date-inputmask" id="date-mask" value="T. SIPIL" readonly/>
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>Tahun Anggaran
                          </h5>
                          <div class="form-group">
                            <input type="text" class="form-control date-inputmask" id="date-mask" value="2020" readonly/>
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>Total Usulan
                          </h5>
                          <div class="form-group">
                            <input type="text" class="form-control date-inputmask" id="date-mask" value="500.000.000" readonly/>
                          </div>
                        </fieldset>
                        <fieldset>
                        <button type="button" onclick="window.location='/planning/rekap_usulan';" class="btn btn-icon btn-danger btn-xs"><i class="la la-chevron-circle-left"></i>  Kembali </button>
                        </fieldset>
                      </div>
                      <div class="col-xl-6 col-lg-12">
                      <fieldset>
                          <h5>History Usulan
                          </h5>
                          <div class="form-group">

                          <table id="table11" class="table display nowrap table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>IP</th>
                          <th>Datetime</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>User001</td>
                          <td>10.10.10.10</td>
                          <td>19-03-2020 09.00</td>
                          <td>Upload RKA Sukses</td>
                        </tr>
                        <tr>
                          <td>User001</td>
                          <td>10.10.10.10</td>
                          <td>19-03-2020 09.00</td>
                          <td>Upload RKA Sukses</td>
                        </tr>
                        <tr>
                          <td>User001</td>
                          <td>10.10.10.10</td>
                          <td>19-03-2020 09.00</td>
                          <td>Upload RKA Sukses</td>
                        </tr>

                      </tbody>
                      </table>

                          </div>
                      </fieldset>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Input Mask end -->
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">List Usulan </h4>
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
                <div class="col-xl-12 col-lg-12">
                <table id="table12" class="table display nowrap table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Unit Kerja</th>
                          <th>Indikator</th>
                          <th>Pos Anggaran</th>
                          <th>No RKA</th>
                          <th>Deskripsi Kegiatan</th>
                          <th>Nilai</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                       
                        <tr>
                          <td>1</td>
                          <td>T. SIPIL</td>
                          <td>IKU</td>
                          <td>Pos Kegiatan</td>
                          <td><code>001.IKU.00000.2020</code></td>
                          <td>Rehab Gedung Utama Jurusan T Sipil</td>
                          <td>500.000.000</td>
                          <td>
                            <button type="button" class="btn btn-icon btn-info btn-xs"
                             data-myid="" data-myunit="" data-myemail="" data-myname=""
                             data-mygroup="" data-mygname="" data-create="" data-expire=""
                             data-toggle="modal" data-backdrop="false" data-target="#user_view"><i class="la la-search-plus"></i> | View Data</button>
                          </td>
                        </tr>

                        <tr>
                          <td>2</td>
                          <td>T. SIPIL</td>
                          <td>IKK</td>
                          <td>Pos Peralatan</td>
                          <td><code>002.IKK.00000.2020</code></td>
                          <td>Pengadaan 000000000</td>
                          <td>500.000.000</td>
                          <td>
                            <button type="button" class="btn btn-icon btn-info btn-xs"
                             data-myid="" data-myunit="" data-myemail="" data-myname=""
                             data-mygroup="" data-mygname="" data-create="" data-expire=""
                             data-toggle="modal" data-backdrop="false" data-target="#user_view"><i class="la la-search-plus"></i> | View Data</button>
                          </td>
                        </tr>

                        <tr>
                          <td>3</td>
                          <td>T. SIPIL</td>
                          <td>IKK</td>
                          <td>Pos Peralatan</td>
                          <td><code>003.IKK.00000.2020</code></td>
                          <td>Pengadaan 000000000</td>
                          <td>500.000.000</td>
                          <td>
                            <button type="button" class="btn btn-icon btn-info btn-xs"
                             data-myid="" data-myunit="" data-myemail="" data-myname=""
                             data-mygroup="" data-mygname="" data-create="" data-expire=""
                             data-toggle="modal" data-backdrop="false" data-target="#user_view"><i class="la la-search-plus"></i> | View Data</button>
                          </td>
                        </tr>

                        <tr>
                          <td>3</td>
                          <td>T. SIPIL</td>
                          <td>IKK</td>
                          <td>Pos Peralatan</td>
                          <td><code>003.IKK.00000.2020</code></td>
                          <td>Pengadaan 000000000</td>
                          <td>500.000.000</td>
                          <td>
                            <button type="button" class="btn btn-icon btn-info btn-xs"
                             data-myid="" data-myunit="" data-myemail="" data-myname=""
                             data-mygroup="" data-mygname="" data-create="" data-expire=""
                             data-toggle="modal" data-backdrop="false" data-target="#user_view"><i class="la la-search-plus"></i> | View Data</button>
                          </td>
                        </tr>

                        <tr>
                          <td>3</td>
                          <td>T. SIPIL</td>
                          <td>IKK</td>
                          <td>Pos Peralatan</td>
                          <td><code>003.IKK.00000.2020</code></td>
                          <td>Pengadaan 000000000</td>
                          <td>500.000.000</td>
                          <td>
                            <button type="button" class="btn btn-icon btn-info btn-xs"
                             data-myid="" data-myunit="" data-myemail="" data-myname=""
                             data-mygroup="" data-mygname="" data-create="" data-expire=""
                             data-toggle="modal" data-backdrop="false" data-target="#user_view"><i class="la la-search-plus"></i> | View Data</button>
                          </td>
                        </tr>

                        <tr>
                          <td>3</td>
                          <td>T. SIPIL</td>
                          <td>IKK</td>
                          <td>Pos Peralatan</td>
                          <td><code>003.IKK.00000.2020</code></td>
                          <td>Pengadaan 000000000</td>
                          <td>500.000.000</td>
                          <td>
                            <button type="button" class="btn btn-icon btn-info btn-xs"
                             data-myid="" data-myunit="" data-myemail="" data-myname=""
                             data-mygroup="" data-mygname="" data-create="" data-expire=""
                             data-toggle="modal" data-backdrop="false" data-target="#user_view"><i class="la la-search-plus"></i> | View Data</button>
                          </td>
                        </tr>

                        <tr>
                          <td>3</td>
                          <td>T. SIPIL</td>
                          <td>IKK</td>
                          <td>Pos Peralatan</td>
                          <td><code>003.IKK.00000.2020</code></td>
                          <td>Pengadaan 000000000</td>
                          <td>500.000.000</td>
                          <td>
                            <button type="button" class="btn btn-icon btn-info btn-xs"
                             data-myid="" data-myunit="" data-myemail="" data-myname=""
                             data-mygroup="" data-mygname="" data-create="" data-expire=""
                             data-toggle="modal" data-backdrop="false" data-target="#user_view"><i class="la la-search-plus"></i> | View Data</button>
                          </td>
                        </tr>

                        <tr>
                          <td>3</td>
                          <td>T. SIPIL</td>
                          <td>IKK</td>
                          <td>Pos Peralatan</td>
                          <td><code>003.IKK.00000.2020</code></td>
                          <td>Pengadaan 000000000</td>
                          <td>500.000.000</td>
                          <td>
                            <button type="button" class="btn btn-icon btn-info btn-xs"
                             data-myid="" data-myunit="" data-myemail="" data-myname=""
                             data-mygroup="" data-mygname="" data-create="" data-expire=""
                             data-toggle="modal" data-backdrop="false" data-target="#user_view"><i class="la la-search-plus"></i> | View Data</button>
                          </td>
                        </tr>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                        <th>#</th>
                          <th>Unit Kerja</th>
                          <th>Indikator</th>
                          <th>Pos Anggaran</th>
                          <th>No RKA</th>
                          <th>Deskripsi Kegiatan</th>
                          <th>Nilai</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
            </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ Zero configuration table -->



        <!-- Modal -->
        <div class="modal fade text-left" id="user_view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">View User</h4>
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
              
              <form method="POST" action="{{ route('user_update') }}">
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
              
              <form method="POST" action="{{ route('user_delete') }}">
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
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#table11').DataTable( {
        "scrollX": true,
        "searching" : false,
        "info" : false,
        "paging" : false
    } );
} );

$(document).ready(function() {
    $('#table12').DataTable( {
        "scrollX": true
        //"searching" : false
        //"info" : false
    } );
} );
</script>
@endsection