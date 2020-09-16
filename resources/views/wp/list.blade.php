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
              <button class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#filter_modal"><i class="la la-filter"></i> Filter Data</button>

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
                        <span class="badge badge-pill badge-glow badge-default badge-warning">{{ $countPermohonan }}</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="baseIcon-tab22" data-toggle="tab" aria-controls="tabIcon22" onclick="runTab2('3')"
                        href="#tabIcon22" aria-expanded="false">
                        <i class="la la-dashboard"></i> Dalam Pengerjaan
                        <span class="badge badge-pill badge-glow badge-default badge-info">{{ $countPengerjaan }}</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="baseIcon-tab23" data-toggle="tab" aria-controls="tabIcon23"
                        href="#tabIcon23" aria-expanded="false">
                        <i class="la la-check-circle"></i> Pekerjaan Selesai
                        <span class="badge badge-pill badge-glow badge-default badge-success">{{ $countSelesai }}</span></a>
                      </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                      <div role="tabpanel" class="tab-pane active" id="tabIcon21" aria-expanded="true"
                      aria-labelledby="baseIcon-tab21">
                      <table id="table-permohonan" class="table display nowrap table-striped table-bordered zero-configuration">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">TANGGAL</th>
                              <th class="text-center">NAMA PEKERJAAN</th>
                              <th class="text-center">UNIT</th>
                              <th class="text-center">INSTANSI / PERUSAHAAN</th>
                              <th class="text-center">STATUS</th>
                              <th class="text-center">ACTION</th>
                            </tr>
                          </thead>
                      </table>
                      </div>
                      <div class="tab-pane" id="tabIcon22" aria-labelledby="baseIcon-tab22">
                      <table id="table-pengerjaan" cellspacing="0" width="100%" class="table display nowrap table-striped table-bordered zero-configuration">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">TANGGAL</th>
                              <th class="text-center">NAMA PEKERJAAN</th>
                              <th class="text-center">UNIT</th>
                              <th class="text-center">INSTANSI / PERUSAHAAN</th>
                              <th class="text-center">STATUS</th>
                              <th class="text-center">ACTION</th>
                            </tr>
                          </thead>
                      </table> 
                      </div>
                      <div class="tab-pane" id="tabIcon23" aria-labelledby="baseIcon-tab23">
                      <table id="table-selesai" width="100%" class="table display nowrap table-striped table-bordered zero-configuration">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">TANGGAL</th>
                              <th class="text-center">NAMA PEKERJAAN</th>
                              <th class="text-center">UNIT</th>
                              <th class="text-center">INSTANSI / PERUSAHAAN</th>
                              <th class="text-center">STATUS</th>
                              <th class="text-center">ACTION</th>
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
                  <label for="companyName">PILIH UNIT</label>
                    <select name="unit" class="form-control" id="id_unit">
                    <option value="" selected disabled>PILIH UNIT</option>
                    @foreach($unitList as $list)
                      <option value="{{ $list->BUSS_AREA }}">{{ $list->BUSS_AREA .' - '. $list->UNIT_NAME }}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label for="companyName">PILIH TEMPLATE (JENIS PEKERJAAN)</label>
                    <select name="template" class="form-control" id="id_template">
                    <option value="" selected>PILIH TEMPLATE</option>
                    @if (!empty($group_id))
                      <option value="{{ $group_id }}">{{ $group_name }}</option>
                    @endif
                    </select>
                </div>

                <div class="form-group">
                  <label for="companyName">PILIH JENIS PEMELIHARAAN</label>
                    <select name="status" class="form-control" id="eventStatus2" name="eventStatus">
                      <option value="" selected disabled>PILIH JENIS PEMELIHARAAN</option>
                      <option value="NORMAL">TERENCANA</option>
                      <option value="EMERGENCY">TIDAK TERENCANA / EMERGENCY</option>
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

        <div class="modal fade text-left" id="approve_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-success white">
                <h4 class="modal-title white" id="myModalLabel11">SUBMIT FORM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_edit" method="post" enctype="multipart/form-data">

              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="companyName">ID WP</label>
                      <input type="text" class="form-control" name="id_wp" id="id_wp" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="companyName">KETERANGAN PEKERJAAN</label>
                      <input type="text" class="form-control" id="wp_desc" name="wp_desc" readonly>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="companyName">NAMA PEKERJAAN</label>
                    <textarea id="nama" class="form-control" readonly></textarea>
                </div>
              
                <div class="form-group">
                  <label for="companyName">PERUSAHAAN PELAKSANA</label>
                  <input type="text" id="pelaksana" class="form-control" readonly/>
                </div>
              
                @if(Auth::user()->group_id != '5')      
                <div class="form-group">
                  <label for="projectinput5">STATUS APPROVE </label>
                  <select id="projectinput5" name="ket_approve" class="form-control">
                    <option value="none" disabled="">[PILIH STATUS APPROVE]</option>
                    <option value="APPROVE" selected>APPROVE</option>
                    <option value="REJECT">REJECT</option>
                  </select>
                </div>
                @else
                <input type="hidden" name="ket_approve" value="APPROVE">
                @endif

                <input type="hidden" name="group_id" value="{{ Auth::user()->group_id }}">
                <input type="hidden" name="user_proses" value="{{ Auth::user()->username }}">
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-icon"><i class="la la-check-circle-o"></i> Submit</button>
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
                        {{ $last= date('Y')-5 }}
                        {{ $now = date('Y') }}
                        
                        @for ($i = $now; $i >= $last; $i--)
                        <option value='{{ $i }}'>{{ $i }}</option>
                        @endfor
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
                <button type="submit" class="btn btn-success btn-icon"><i class="la la-check-circle-o"></i> Yes, Delete</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade text-left" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-danger white">
                <h4 class="modal-title white" id="myModalLabel11">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="form_delete" method="post">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="companyName">NAMA PEKERJAAN</label>
                  <input type="text" id="nama_pekerjaan" class="form-control" readonly/>
                </div>
                <h5 class="text-center" style="margin:0;">Are you sure you want to remove this data?</h5>
                <input type="hidden" name="id_wp" id="idwp" />
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger btn-icon"><i class="la la-check-circle-o"></i> Yes, Delete</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- Modal -->      
      
      <div id="loading"></div>
      </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="unit"]').on('change', function(){
      var id_unit_ =   $(this).val();
      var token = '{{ csrf_token() }}';

        //var countryId = $(this).val();
        if(id_unit_) {
            $.ajax({
                url: "{{ url('wp/getTemplateByUnit/') }}/"+id_unit_,
                type:"GET",
                dataType:"json",
                data: {idunit: id_unit_, _token: token},

                //beforeSend: function(){
                    //$('#loader').css("visibility", "visible");
                //},

                success:function(data) {

                    $('select[name="template"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="template"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                //complete: function(){
                    //$('#loader').css("visibility", "hidden");
                //}
            });
        } else {
            $('select[name="template"]').empty();
        }

    });
  });

$(document).ready(function() {
var vtable = $('#table-permohonan').DataTable({
   processing: true,
   serverSide: true,
   scrollX: true,
   paging: true,
   order: [[ 2, 'asc' ]],
   ajax:{
    url: "{{ route('list_permohonan') }}",
   },
   columns:[
     { data: null, searchable:false, orderable:false, className: "text-center"},
     {
     data: 'tgl_pengajuan',
     },
     {
     data: 'nama_pekerjaan',
     className: "text-left"
     },
     {
     data: 'UNIT_NAME',
     className: "text-center"
     },
     {
     data: 'pelaksana',
     className: "text-left"
     },
     {
     data: 'status',
     className: "text-left"
     },
     /*
     { className: "text-center",
        //"data": null,
        "orderable": false,
        "render": function ( data, type, row ) {
        var html = ""
          if ( row.status === 'NEW') {
            html = `<badge class="badge badge-pill badge-warning"> NEW WP </badge>`
          } else if ( row.status === 'APPROVE_2') {
            html = `<badge class="badge badge-pill badge-primary"> PEJABAT K3 </badge>`
          } else if  ( row.status === 'APPROVE_1') {
            html = `<badge class="badge badge-pill badge-info"> MANAGER </badge>`
          } else {
            html = `<badge class="badge badge-pill badge-success"> APPROVED </badge>`
          }
          return html; 
        }
      },
      */
      {
      "data": null,
      "searchable": false,
      "orderable": false,
      className: "text-center",
      "render": function (data, type, full, meta) {
        return `<button onclick="location.href='/wp/detail/${full.id_wp}'" class="some-class btn btn-sm btn-blue btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Detail"> <i class="la la-external-link"></i> </button>
        <button id="${full.NOREG}" class="btn btn-sm btn-warning btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"> <i class="la la-edit"></i></button>
        <button name="approve_modal" id="${full.id_wp}" class="edit btn btn-sm btn-success btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Approve" > <i class="la la-check-circle"></i></button>
        <button name="del_modal" id="${full.id_wp}" class="delete btn btn-sm btn-danger btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Reject"> <i class="la la-close"></i></button>`;
        }
      },
   ]
  });
  vtable.on('draw.dt', function () {
    vtable.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
      cell.innerHTML = i + 1;
      });
  }).draw();
});

$(document).ready(function() {
var vtable1 =  $('#table-pengerjaan').DataTable({
//var vtable1 = $('#table-pengerjaan').removeAttr('width').DataTable({
   processing: true,
   serverSide: true,
   scrollX: true,
   paging: true,
   order: [[ 2, 'asc' ]],
   ajax:{
    url: "{{ route('list_pengerjaan') }}",
   },
   columns:[
     { data: null, searchable:false, orderable:false, className: "text-center"},
     {
       data: 'tgl_pengajuan',
     },
     {
     data: 'nama_pekerjaan',
     className: "text-left"
     },
     {
     data: 'UNIT_NAME',
     className: "text-center"
     },
     {
     data: 'pelaksana',
     className: "text-left"
     },
     {
     data: 'status',
     className: "text-left"
     },
     {
      "data": null,
      "searchable": false,
      "orderable": false,
      className: "text-center",
      "render": function (data, type, full, meta) {
        return `<button onclick="location.href='/wp/detail/${full.id_wp}'" class="some-class btn btn-sm btn-blue btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Detail"> <i class="la la-external-link"></i> </button>
        <button name="approve_modal" id="${full.id_wp}" class="edit btn btn-sm btn-success btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Approve" > <i class="la la-check-circle"></i></button>`;
        }
     },
  ]
  });
  vtable1.on('draw.dt', function () {
    vtable1.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
      cell.innerHTML = i + 1;
      });
  }).draw();

  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
         .columns.adjust();
   }); 

});

  var vtable2 = $('#table-selesai').DataTable({
   processing: true,
   serverSide: true,
   scrollX: true,
   paging: true,
   order: [[ 2, 'asc' ]],
   ajax:{
    url: "{{ route('list_selesai') }}",
   },
   columns:[
     { data: null, searchable:false, orderable:false, className: "text-center"},
     {
     data: 'tgl_pengajuan',
     },
     {
     data: 'nama_pekerjaan',
     className: "text-left"
     },
     {
     data: 'UNIT_NAME',
     className: "text-center"
     },
     {
     data: 'pelaksana',
     className: "text-left"
     },
     {
     data: 'status',
     className: "text-left"
     },
     {
      "data": null,
      "searchable": false,
      "orderable": false,
      className: "text-center",
      "render": function (data, type, full, meta) {
        return `<button onclick="location.href='/wp/detail/${full.id_wp}'" class="some-class btn btn-sm btn-blue btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Detail"> <i class="la la-external-link"></i> </button>
        <button id="${full.NOREG}" class="btn btn-sm btn-warning btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"> <i class="la la-edit"></i></button>
        <button name="approve_modal" id="${full.id_wp}" class="edit btn btn-sm btn-success btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Approve" > <i class="la la-check-circle"></i></button>
        <button name="del_modal" id="${full.id_wp}" class="delete btn btn-sm btn-danger btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Reject"> <i class="la la-close"></i></button>`;
        }
      },
   ]
  });

  vtable2.on('draw.dt', function () {
    vtable2.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
      cell.innerHTML = i + 1;
      });
  }).draw();


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
              $('#form_menu')[0].reset();
              $('#submit_form').modal('hide');
              $('#datamenu').DataTable().ajax.reload();
             //window.location.href = '/wp/create';
              type_toast = 'success';
              //window.location.href = 'wp/create/' + data.temp_id + '';
              setTimeout(function() {
                window.location.href = '/wp/create/';
              }, 1000);
            }
            //$('#form_result').html(html);
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              //toastr.options.onShown = function() { console.log('hello')};
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000, preventDuplicates: true});
            }
          }
        })
      }

    });

    $('#form_edit').on('submit', function(event){
      event.preventDefault();

      $.ajax({
          url: "{{ url('wp/approve_form') }}",
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
              html = data.success;
              $('#form_edit')[0].reset();
              $('#approve_form').modal('hide');
              $('#table-permohonan').DataTable().ajax.reload();
              type_toast = 'success';
            }
            //$('#form_result').html(html);
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              //toastr.options.onShown = function() { console.log('hello')};
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000, preventDuplicates: true});
            }
          }
        })

    });

    $('#form_delete').on('submit', function(event){
      event.preventDefault();

      $.ajax({
          url: "{{ url('wp/delete_form') }}",
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
              html = data.success;
              $('#form_delete')[0].reset();
              $('#del_modal').modal('hide');
              $('#table-permohonan').DataTable().ajax.reload();
              type_toast = 'success';
            }
            //$('#form_result').html(html);
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              //toastr.options.onShown = function() { console.log('hello')};
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000, preventDuplicates: true});
            }
          }
        })

    });

    $(document).on('click', '.edit', function(){
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
        type : "GET",
        url: "{{ url('wp/get_detail_wp/') }}",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#nama').val(html.data[0].nama_pekerjaan);
          $('#pelaksana').val(html.data[0].pelaksana);
          $('#id_wp').val(html.data[0].id_wp);
          $('#wp_desc').val(html.data[0].wp_desc);
          $('.modal-title').text("FORM APPROVAL");
          $('#action_button').val("Edit");
          $('#action').val("Edit");
          $('#approve_form').modal('show');
        },error: function (jqXhr, textStatus, errorMessage) { // error callback 
					$('p').append('Error: ' + errorMessage);
				}
      })
    });

    $(document).on('click', '.delete', function(){
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
        type : "GET",
        url: "{{ url('wp/get_detail_wp/') }}",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#nama_pekerjaan').val(html.data[0].detail_pekerjaan);
          $('#idwp').val(html.data[0].id_wp);
          $('.modal-title').text("DELETION CONFIRMATION");
          $('#del_modal').modal('show');
        },error: function (jqXhr, textStatus, errorMessage) { // error callback 
					$('p').append('Error: ' + errorMessage);
				}
      })
    });
</script>
@endsection