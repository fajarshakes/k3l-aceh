@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Master Data Apar </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Peta Apar</a>
                </li>
                <li class="breadcrumb-item active"> Master Data
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
              <button class="dropdown-item" name="create_record" id="create_record"><i class="la la-plus-circle"></i> Tambah Gedung</button>  
              <button class="dropdown-item" name="create_record_lantai" id="create_record_lantai"><i class="la la-plus-circle"></i> Tambah Lantai</button>  
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
                  <h4 class="card-title">Master Data </h4>
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
                <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <ul class="nav nav-tabs nav-linetriangle">
                      <li class="nav-item">
                        <a class="nav-link active" id="baseIcon-tab31" data-toggle="tab" aria-controls="tabIcon31"
                        href="#tabIcon31" aria-expanded="true"><i class="la la-bank"></i> Master Gedung</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="baseIcon-tab32" data-toggle="tab" aria-controls="tabIcon32"
                        href="#tabIcon32" aria-expanded="false"><i class="la la-building"></i> Master Lantai</a>
                      </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                      <div role="tabpanel" class="tab-pane active" id="tabIcon31" aria-expanded="true"
                      aria-labelledby="baseIcon-tab31">
                      
                      {{-- <span id="form_result"></span> --}}

                        <table id="tbl_master_gedung" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>UNIT</th>
                          <th>NAMA GEDUNG</th>
                          <th>TANGGAL INPUT</th>
                          <th>ACTION</th>
                        </tr>
                        </thead>
                        </table>
                      
                    </div>
                    
                    <div class="tab-pane" id="tabIcon32" aria-labelledby="baseIcon-tab32">
                      <table id="tbl_master_lantai" width="100%" class="table table-striped table-bordered">
                      <thead>
                      <tr>
                          <th>#</th>
                          <th>UNIT</th>
                          <th>NAMA GEDUNG</th>
                          <th>NAMA LANTAI</th>
                          <th>TANGGAL INPUT</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      </table>
                    </div>

                    </div>
                  </div>
                </div>
              </div>

              </div>
            </div>
          </div>
        </section>
        <!--/ Zero configuration table -->

        <!-- Modal -->
        <div class="modal fade text-left" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_menu" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="companyName">NAMA GEDUNG</label>
                    <input type="text" class="form-control" placeholder="Nama Gedung" id="name" name="namagedung">
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                    <h5>COMPANY CODE</h5>
                        <input class="form-control" value="{{ $my_ccode }}" readonly/>
                    </div>
                    <div class="col-md-6">
                    <h5>BUSINESS AREA</h5>
                        <input class="form-control" value="{{ $my_barea }}" readonly>
                    </div>
                  </div>
                </div>
              </div>
              
              <input type="hidden" name="action" id="action" />
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade text-left" id="formEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_edit" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="companyName">NAMA GEDUNG</label>
                    <input type="text" class="form-control" placeholder="Nama Gedung" id="namagedung" name="namagedung">
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                    <h5>COMPANY CODE</h5>
                        <input class="form-control" id="company_cd" readonly/>
                    </div>
                    <div class="col-md-6">
                    <h5>BUSINESS AREA</h5>
                        <input class="form-control" id="buss_id" readonly>
                    </div>
                  </div>
                </div>
              </div>
              
              <input type="hidden" name="id_gedung" id="id_gedung" />
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade text-left" id="modal_add_lantai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_add_lantai" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="companyName">NAMA LANTAI</label>
                    <input type="text" class="form-control" placeholder="Nama Lantai" name="namalantai">
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="projectinput5">PILIH GEDUNG</label>
                      <select id="cstatus" name="idgedung" class="form-control">
                        <option value="none" selected="" disabled="">PILIH GEDUNG</option>
                        @foreach($list_unit as $list)
                          <option value="{{ $list->ID_GEDUNG }}">{{ $list->ID_GEDUNG .' - '. $list->NAMA_GEDUNG }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              
              <input type="hidden" name="action" id="action" />
             
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" value="Add" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade text-left" id="modal_upd_lantai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_upd_lantai" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="companyName">NAMA LANTAI</label>
                    <input type="text" class="form-control" placeholder="Nama Lantai" name="namalantai" id="namalantai">
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="projectinput5">PILIH GEDUNG</label>
                      <select id="id_gedung0" name="idgedung" class="form-control">
                        <option value="none">PILIH GEDUNG</option>
                        @foreach($list_unit as $list)
                          <option value="{{ $list->ID_GEDUNG }}">{{ $list->ID_GEDUNG .' - '. $list->NAMA_GEDUNG }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              
              <input type="hidden" name="id_lantai" id="id_lantai0" />
             
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" value="Add" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>


        <div class="modal fade text-left" id="confirmModal_c" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="confirm_form_c" method="post">
              @csrf
              <div class="modal-body">
                <h5 align="center" style="margin:0;">Are you sure you want to remove this data? <p id="catname"></p></h5>
              </div>
              <input type="hidden" name="del_action" id="del_action" />
              <input type="hidden" name="del_id" id="del_id" />

              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-danger">Yes, Remove !</button>
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

  var vtable = $('#tbl_master_gedung').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    order: [[ 2, 'asc' ]],
    ajax:{
     url: "{{ route('list_master_gedung') }}",
    },
    columns:[
      { data: null, searchable:false, orderable:false, className: "text-center"},
      {
      data: 'UNIT_NAME',
      },
      {
      data: 'NAMA_GEDUNG',
      },
      {
      data: 'CREATED_AT',
      className: "text-center"
      },
      {
      "data": null,
      "searchable": false,
      "orderable": false,
      className: "text-center",
      "render": function (data, type, full, meta) {
      
      return `
      <span class='dropdown'>
          <button id='btnSearchDrop1' type='button' data-toggle='dropdown' aria-haspopup='true'
          aria-expanded='false' class='btn btn-blue dropdown-toggle btn-sm'><i class='la la-check-circle'></i></button>
          <span aria-labelledby='btnSearchDrop4' class='dropdown-menu mt-1 dropdown-menu-right'>
            <a href='#' name='edit_modal' id='${full.ID_GEDUNG}' class='edit dropdown-item'><i class='ft-edit-2'></i> EDIT DATA</a>
            <div class='dropdown-divider'></div>
            <a href='#' name='del_modal' id='${full.ID_GEDUNG}' class='delete dropdown-item'><i class='ft-trash'></i> DELETE</a>
          </span>
        </span>`;
      }
      },
      /*
      {
      data: 'action',
      //name: 'action',
      orderable: false,
      className: "text-center"
      }
      */
    ]
   });
   
  vtable.on('draw.dt', function () {
     vtable.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
       cell.innerHTML = i + 1;
       });
  }).draw();
});

$(document).ready(function() {

  var vtable = $('#tbl_master_lantai').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    order: [[ 2, 'asc' ]],
    ajax:{
     url: "{{ route('list_master_lantai') }}",
    },
    columns:[
      { data: null, searchable:false, orderable:false, className: "text-center"},
      {
      data: 'UNIT_NAME',
      },
      {
      data: 'NAMA_GEDUNG',
      },
      {
      data: 'NAMA_LANTAI',
      },
      {
      data: 'CREATED_AT',
      className: "text-center"
      },
      {
      "data": null,
      "searchable": false,
      "orderable": false,
      className: "text-center",
      "render": function (data, type, full, meta) {
      
      return `
      <span class='dropdown'>
          <button id='btnSearchDrop1' type='button' data-toggle='dropdown' aria-haspopup='true'
          aria-expanded='false' class='btn btn-blue dropdown-toggle btn-sm'><i class='la la-check-circle'></i></button>
          <span aria-labelledby='btnSearchDrop4' class='dropdown-menu mt-1 dropdown-menu-right'>
            <a href='#' name='edit_modal' id='${full.ID_LANTAI}' class='edit1 dropdown-item'><i class='ft-edit-2'></i> EDIT DATA</a>
            <div class='dropdown-divider'></div>
            <a href='#' id='${full.ID_LANTAI}' class='delete1 dropdown-item'><i class='ft-trash'></i> DELETE</a>
          </span>
        </span>`;
      }
      },
    ]
   });
   
  vtable.on('draw.dt', function () {
     vtable.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
       cell.innerHTML = i + 1;
       });
  }).draw();
  

  $('#create_record').click(function(){
      $('.modal-title').text("Tambah Data Gedung");
      $('#store_image').html("");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#formModal').modal('show');
  });

  $('#create_record_lantai').click(function(){
      $('.modal-title').text("Tambah Data Lantai");
      $('#store_image').html("");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#modal_add_lantai').modal('show');
  });

  $('#form_menu').on('submit', function(event){
      event.preventDefault();
      
      if($('#action').val() == 'Add')
      {
        $.ajax({
          url:"{{ route('apar_add_gedung') }}",
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
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
              //html = '<div class="alert alert-success">' + data.success + '</div>';
              html = data.success;
              type_toast = 'success';
              $('#form_menu')[0].reset();
              $('#formModal').modal('hide');
              $('#tbl_master_gedung').DataTable().ajax.reload();
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
      
      if($('#action').val() == "Edit")
      {
        $.ajax({
          url:"{{ route('apar_add_gedung') }}",
          method:"POST",
          data:new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          dataType:"json",
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
              //$('#formModal').html('');
              $('#formModal').modal('hide');
              $('#datamenu').DataTable().ajax.reload();
            }
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            }    
          }
        });
      }

    });

    $('#form_add_lantai').on('submit', function(event){
      event.preventDefault();
      
      if($('#action').val() == 'Add')
      {
        $.ajax({
          url:"{{ route('apar_add_lantai') }}",
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
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
              //html = '<div class="alert alert-success">' + data.success + '</div>';
              html = data.success;
              type_toast = 'success';
              $('#form_add_lantai')[0].reset();
              $('#modal_add_lantai').modal('hide');
              $('#tbl_master_lantai').DataTable().ajax.reload();
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
      
      if($('#action').val() == "Edit")
      {
        $.ajax({
          url:"{{ route('apar_add_gedung') }}",
          method:"POST",
          data:new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          dataType:"json",
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
              //$('#formModal').html('');
              $('#formModal').modal('hide');
              $('#datamenu').DataTable().ajax.reload();
            }
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            }    
          }
        });
      }

    });

    $('#form_edit').on('submit', function(event){
      event.preventDefault();

      $.ajax({
        url:"{{ route('apar_upd_gedung') }}",
        method:"POST",
        data: new FormData(this),
        contentType: false,
        cache:false,
        processData: false,
        dataType:"json",
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
            //html = '<div class="alert alert-success">' + data.success + '</div>';
            html = data.success;
            type_toast = 'success';
            $('#form_edit')[0].reset();
            $('#formEdit').modal('hide');
            $('#tbl_master_gedung').DataTable().ajax.reload();
          }
          //$('#form_result').html(html);
          if(type_toast == 'error'){
            toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
          } else if (type_toast == 'success') {
            toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
          }
        }
      })

    });

    $('#form_upd_lantai').on('submit', function(event){
      event.preventDefault();

      $.ajax({
        url:"{{ route('apar_upd_lantai') }}",
        method:"POST",
        data: new FormData(this),
        contentType: false,
        cache:false,
        processData: false,
        dataType:"json",
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
            //html = '<div class="alert alert-success">' + data.success + '</div>';
            html = data.success;
            type_toast = 'success';
            $('#form_upd_lantai')[0].reset();
            $('#modal_upd_lantai').modal('hide');
            $('#tbl_master_lantai').DataTable().ajax.reload();
          }
          //$('#form_result').html(html);
          if(type_toast == 'error'){
            toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
          } else if (type_toast == 'success') {
            toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
          }
        }
      })

    });

    $(document).on('click', '.edit', function(){
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
        type : "GET",
        url: "{{ url('apar/get_detail_gedung/') }}",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#namagedung').val(html.data.NAMA_GEDUNG);
          $('#company_cd').val(html.data.COMP_CODE);
          $('#buss_id').val(html.data.BUSS_AREA);
          $('#id_gedung').val(html.data.ID_GEDUNG);
          $('.modal-title').text("UPDATE DATA GEDUNG");
          $('#action_button').val("Edit");
          $('#action').val("Edit");
          $('#formEdit').modal('show');
        },error: function (jqXhr, textStatus, errorMessage) { // error callback 
					$('p').append('Error: ' + errorMessage);
				}
      })
    });

    $(document).on('click', '.edit1', function(){
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
        type : "GET",
        url: "{{ url('apar/get_detail_lantai/') }}",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#namalantai').val(html.data.NAMA_LANTAI);
          $('#id_lantai0').val(html.data.ID_LANTAI);
          $("#id_gedung0").val(html.data.ID_GEDUNG).attr('selected','selected');
          $('.modal-title').text("UPDATE DATA LANTAI");
          $('#action_button').val("Edit");
          $('#action').val("Edit");
          $('#modal_upd_lantai').modal('show');
        },error: function (jqXhr, textStatus, errorMessage) { // error callback 
					$('p').append('Error: ' + errorMessage);
				}
      })
    });

    $(document).on('click', '.delete', function(){
      var id = $(this).attr('id');
        $('.modal-title').text("HAPUS DATA GEDUNG");
        $('#del_action').val("DEL_GEDUNG");
        $('#del_id').val( id );
        $('#confirmModal_c').modal('show');
      });
    
    $(document).on('click', '.delete1', function(){
      var id = $(this).attr('id');
        $('.modal-title').text("HAPUS DATA LANTAI");
        $('#del_action').val("DEL_LANTAI");
        $('#del_id').val( id );
        $('#confirmModal_c').modal('show');
      });
  
    $('#confirm_form_c').on('submit', function(event){
      event.preventDefault();
      
      if($('#del_action').val() == 'DEL_LANTAI')
      {
        $.ajax({
          url:"{{ route('apar_del_lantai') }}",
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
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
              //html = '<div class="alert alert-success">' + data.success + '</div>';
              html = data.success;
              type_toast = 'success';
              $('#confirm_form_c')[0].reset();
              $('#confirmModal_c').modal('hide');
              $('#tbl_master_lantai').DataTable().ajax.reload();
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
      
      if($('#del_action').val() == "DEL_GEDUNG")
      {
        $.ajax({
          url:"{{ route('apar_del_gedung') }}",
          method:"POST",
          data:new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          dataType:"json",
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
              $('#confirm_form_c')[0].reset();
              $('#confirmModal_c').modal('hide');
              $('#tbl_master_gedung').DataTable().ajax.reload();
            }
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            }    
          }
        });
      }

    });

})
</script>
@endsection
