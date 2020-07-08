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
                <li class="breadcrumb-item active"> List Permit
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
              <!--button onclick="location.href='create'" class="dropdown-item"><i class="la la-check-circle-o"></i> Submit Permit</button!-->
              <button class="dropdown-item" name="open_modal" id="open_modal"><i class="la la-check-circle-o"></i> Submit Permit</button>
              <button class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#submit_form"><i class="la la-filter"></i> Filter Data</button>

              <div class="dropdown-divider"></div>
              <button class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#"><i class="la la-file-text"></i> Export Excel (.xlsx)</button>  
            </div>
          </div>
        </div>
      </div>

      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Daftar Rencana Kegiatan </h4>
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
                <div class="card-content">
                  <div class="card-body">
                    <ul class="nav nav-tabs nav-underline">
                      <li class="nav-item">
                        <a class="nav-link active" id="baseIcon-tab21" data-toggle="tab" aria-controls="tabIcon21"
                        href="#tabIcon21" aria-expanded="true">
                        <i class="la la-clock-o"></i> Dalam Permohonan
                        <span class="badge badge-pill badge-glow badge-default badge-warning">3</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="baseIcon-tab22" data-toggle="tab" aria-controls="tabIcon22"
                        href="#tabIcon22" aria-expanded="false">
                        <i class="la la-dashboard"></i> Dalam Pengerjaan
                        <span class="badge badge-pill badge-glow badge-default badge-info">3</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="baseIcon-tab23" data-toggle="tab" aria-controls="tabIcon23"
                        href="#tabIcon23" aria-expanded="false">
                        <i class="la la-check-circle"></i> Pekerjaan Selesai
                        <span class="badge badge-pill badge-glow badge-default badge-success">3</span></a>
                      </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                      <div role="tabpanel" class="tab-pane active" id="tabIcon21" aria-expanded="true"
                      aria-labelledby="baseIcon-tab21">
                        <p>Oat cake marzipan cake lollipop caramels wafer pie jelly
                          beans. Icing halvah chocolate cake carrot cake. Jelly beans
                          carrot cake marshmallow gingerbread chocolate cake. Gummies
                          cupcake croissant.</p>
                      </div>
                      <div class="tab-pane" id="tabIcon22" aria-labelledby="baseIcon-tab22">
                        <p>Sugar plum tootsie roll biscuit caramels. Liquorice brownie
                          pastry cotton candy oat cake fruitcake jelly chupa chups.
                          Pudding caramels pastry powder cake soufflé wafer caramels.
                          Jelly-o pie cupcake.</p>
                      </div>
                      <div class="tab-pane" id="tabIcon23" aria-labelledby="baseIcon-tab23">
                        <p>Biscuit ice cream halvah candy canes bear claw ice cream
                          cake chocolate bar donut. Toffee cotton candy liquorice.
                          Oat cake lemon drops gingerbread dessert caramels. Sweet
                          dessert jujubes powder sweet sesame snaps.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                  <table id="table1" class="table display nowrap table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tanggal</th>
                          <th>Nama Pekerjaan</th>
                          <th>Unit</th>
                          <th>Instansi / Perusahaan</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


                        <tr>
                          <td>1</td>
                          <td>29-10-2019</td>
                          <td>PEMASANGAN DAN PENGGANTIAN KUBIKEL 20 KV</td>
                          <td><button type="button" class="btn btn-sm btn-outline-success round">UP3 SIGLI</button></td>
                          <td>PT. TEKNIK ANDALAS</td>
                          <td>
                            <button type="button" class="btn btn-icon btn-info btn-xs"
                             data-myid="" data-myunit="" data-myemail="" data-myname=""
                             data-mygroup="" data-mygname="" data-create="" data-expire=""
                             data-toggle="modal" data-backdrop="false" data-target="#user_view"><i class="la la-search-plus"></i> | View Data</button>
                          </td>
                        </tr>

                        <tr>
                          <td>2</td>
                          <td>29-10-2019</td>
                          <td>PEMASANGAN DAN PENGGANTIAN KUBIKEL 20 KV</td>
                          <td><button type="button" class="btn btn-sm btn-outline-success round">UP3 MEULABOH</button></td>
                          <td>PT. TEKNIK ANDALAS</td>
                          <td>
                            <button type="button" class="btn btn-icon btn-info btn-xs"
                             data-myid="" data-myunit="" data-myemail="" data-myname=""
                             data-mygroup="" data-mygname="" data-create="" data-expire=""
                             data-toggle="modal" data-backdrop="false" data-target="#user_view"><i class="la la-search-plus"></i> | View Data</button>
                          </td>
                        </tr>

                        <tr>
                          <td>3</td>
                          <td>29-10-2019</td>
                          <td>PEMASANGAN SOCKET PLUG HARDWIRE RTU SCADA</td>
                          <td><button type="button" class="btn btn-sm btn-outline-success round">UP3 BANDA ACEH</button></td>
                          <td>PT. TEKNIK ANDALAS</td>
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
                          <th>Tanggal</th>
                          <th>Nama Pekerjaan</th>
                          <th>Unit</th>
                          <th>Instansi / Perusahaan</th>
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
        <div class="modal fade text-left" id="submit_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">SUBMIT FORM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_menu" method="post" enctype="multipart/form-data">

              @csrf
              <div class="modal-body">
              <div class="form-group">
                  <label for="companyName">PILIH TYPE UNIT</label>
                  <select name="type" class="custom-select form-control" name="jenis_template">
                    @foreach($unitType as $type)
                      <option value="{{ $type->UNIT_TYPE }}">{{ $type->UNIT_TYPE .' - '. $type->TYPE_NAME }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="companyName">PILIH TEMPLATE PEKERJAAN</label>
                    <select name="template" class="form-control" id="eventStatus2" name="eventStatus">
                      <option value="Planning">Planning</option>
                      <option value="In Progress">In Progress</option>
                      <option value="Finished">Finished</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="companyName">PILIH UP3</label>
                    <select name="unit" class="form-control" id="eventStatus2" name="eventStatus">
                    @foreach($unitList as $list)
                      <option value="{{ $list->BUSS_AREA }}">{{ $list->BUSS_AREA .' - '. $list->UNIT_NAME }}</option>
                    @endforeach
                    </select>
                </div>
                
                <input type="hidden" name="action" id="action" />
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info btn-icon"><i class="la la-check-circle-o"></i> Submit</button>
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
</div>


<script type="text/javascript">
$(document).ready(function() {
    $('#table1').DataTable( {
        "scrollX": true
    } );
} );

$('#open_modal').click(function(){
  $('.modal-title').text("SUBMIT FORM");
  $('#action_button').val("Add");
  $('#action').val("submit");
  $('#submit_form').modal('show');
});

$('#form_menu').on('submit', function(event){
      event.preventDefault();

      if($('#action').val() == 'submit')
      {
        $.ajax({
          url: "{{ url('wp/submit_form') }}",
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          success:function(data)
          {
            //var result = JSON.parse(data);
            //var redirect = 'sales/opentable/' + result + '';
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
              
              //html = '<div class="alert alert-success">' + data.success + '</div>';
              html = data.success;
              type_toast = 'success';
              $('#form_menu')[0].reset();
              $('#formModal').modal('hide');
              $('#datamenu').DataTable().ajax.reload();
              window.location.href = '/wp/create';
              //window.location.href = 'wp/create/' + data.temp_id + '';
            }
            //$('#form_result').html(html);
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            }
          }
        })
      }

    });
</script>
@endsection