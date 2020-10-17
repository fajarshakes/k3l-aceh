@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Peta Sosialisasi </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Peta Sosialisasi</a>
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
        <!-- Zero configuration table -->
        <!-- @foreach($markers as $pin)
        {{ $pin->longitude }}
        @endforeach -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Peta Sosialisasi </h4>
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
                    <div class="row">
                      <div class="col-xl-12">
                        <div id="geoloc5"></div>
                        <div id="fixedMapCont" class="height-450"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-content">
                  <table id="table-sosialisasi" width="100%" class="table display nowrap table-striped table-bordered zero-configuration">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">TANGGAL</th>
                        <th class="text-center">UNIT</th>
                        <th class="text-center">LOKASI</th>
                        <th class="text-center">JUDUL SOSIALISASI</th>
                        <th class="text-center">ACTION</th>
                      </tr>
                    </thead>
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
              
              <form action="#" id="">

              @csrf
              <div class="modal-body">
              <div class="form-group">
                  <label for="companyName">PILIH TYPE UNIT</label>
                  <select name="type" class="custom-select form-control" name="jenis_template">
                    <option value="" selected disabled>PILIH UNIT</option>
                    @foreach($list as $list1)
                    <option value="{{ $list1->UNIT_NAME }}">{{ $list1->BUSS_AREA .' - '. $list1->UNIT_NAME }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="companyName">PILIH TAHUN</label>
                    <select name="template" class="form-control" id="eventStatus2" name="eventStatus">
                      <option value="none" selected="" disabled="">PILIH TAHUN</option>
                      {{ $last= date('Y')-5 }}
                      {{ $now = date('Y') }}
                        
                      @for ($i = $now; $i >= $last; $i--)
                      <option value='{{ $i }}'>{{ $i }}</option>
                      @endfor
                    </select>
                </div>
                <input type="hidden" name="action" id="action" />
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-icon"><i class="la la-filter"></i> Filter</button>
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

        <div class="modal fade text-left" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="confirm_form" method="post">
              @csrf
              <div class="modal-body">
                <h5 align="center" style="margin:0;">Are you sure you want to remove this data? <p id="menuname"></p></h5>
              </div>
              <input type="hidden" name="del_action" id="del_action" />
              <input type="hidden" name="del_hidden_id" id="del_hidden_id" />

              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="ok_button" id="ok_button" value="Add" class="btn btn-outline-danger">Yes, Remove !</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- Modal -->      
      
      <div id="loading"></div>
      </div>
</div>

<script>
$('#geoloc5').leafletLoadLocation({
		alwaysOpen: true,
		mapContainer: "#fixedMapCont"
});
</script>

<script type="text/javascript">
$(document).ready(function() {
  // console.log('{{ $markers[0]->latitude }}');
  // console.log('{{ $markers[0]->longitude }}');
} );
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#table1').DataTable( {
        "scrollX": true
    } );
} );

$(document).ready(function() {

var vtable = $('#table-sosialisasi').DataTable({
   processing: true,
   serverSide: true,
   paging: true,
   order: [[ 2, 'asc' ]],
   ajax:{
    url: "{{ route('list_index') }}",
   },
   columns:[
     { data: null, searchable:false, orderable:false, className: "text-center"},
     {
     data: 'tanggal',
     },
     {
     data: 'nama_unit',
     className: "text-left"
     },
     {
     data: 'lokasi',
     className: "text-left"
     },
     {
     data: 'judul',
     className: "text-left"
     },
     {
      data: 'action',
      className: "text-center",
      //name: 'action',
      orderable: false
      }
     
   ]
  });
  vtable.on('draw.dt', function () {
    vtable.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
      cell.innerHTML = i + 1;
      });
      }).draw();
 });


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
              $('#table-sosialisasi').DataTable().ajax.reload();
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

    $(document).on('click', '.view', function(){
      var id = $(this).attr('id');
      location.href='/sosialisasi/view/' + id + '';
    });
    
    $(document).on('click', '.edit', function(){
      var id = $(this).attr('id');
      location.href='/sosialisasi/edit_sosialisasi/' + id + '';
    });

    $('#confirm_form').on('submit', function(event){
      event.preventDefault();

      if($('#del_action').val() == "Delete"){
        $.ajax({
          url:"{{ route('sosialisasi_delete') }}",
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
              $('#confirm_form')[0].reset();
              //$('#formModal').html('');
              $('#confirmModal').modal('hide');
              $('#table-sosialisasi').DataTable().ajax.reload();
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

    $(document).on('click', '.delete', function(){
      var id = $(this).attr('id');
      $.ajax({
        type : "GET",
        url: "{{ url('sosialisasi/get_detail_sosialisasi/') }}",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#del_hidden_id').val(html.data[0].id);
          // $('#menuname').text(html.data[0].menu_name);
          $('.modal-title').text("Delete Sosialisasi");
          $('#ok_button').val("Delete");
          $('#del_action').val("Delete");
          $('#confirmModal').modal('show');
        },error: function (jqXhr, textStatus, errorMessage) { // error callback 
          $('p').append('Error: ' + errorMessage);
        }
      })
    });

</script>
@endsection