@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Report Data Apar </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Report</a>
                </li>
                <li class="breadcrumb-item active"> Apar
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
                <h4 class="card-title">List Apar </h4>
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
                <div class="card-body card-dashboard">
                    <table width="100%" id="list-apar" class="table table-striped table-bordered dataex-html5-export">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>B AREA</th>
                          <th>ULCODE</th>
                          <th>NO.URUT</th>
                          <th>LOKASI</th>
                          <th>EXPIRED</th>
                          <th>QRCODE</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--/ Zero configuration table -->

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
              
              <form id="form-filter">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">PILIH UP (LV2)</label>
                      <select class="form-control" id="id_unit" name="id_unit">
                        <option value="" selected disabled>PILIH UNIT</option>
                        @foreach($unitList as $list)
                          <option value="{{ $list->BUSS_AREA }}">{{ $list->BUSS_AREA .' - '. $list->UNIT_NAME }}</option>
                        @endforeach
                        @if (Auth::user()->unit == '6101')
                          <option value="6100">6100 - SEMUA UNIT</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">PILIH AP (LV3)</label>
                      <select id="id_ulp" name="id_ulp" class="form-control">
                        <option value="none" selected="" disabled="">PILIH UNIT</option>
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
                  <label for="companyName">Email</label>
                    <input type="text" class="form-control" id="u_email" readonly>
                </div>
                <div class="form-group">
                  <label for="companyName">Full Name</label>
                    <input type="text" class="form-control" id="u_name" readonly>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">Unit Code</label>
                      <input type="text" class="form-control" id="u_name" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">Group Level</label>
                      <input type="text" class="form-control" id="u_gname" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">Create at</label>
                      <input type="text" class="form-control" id="u_create" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">Expired at</label>
                      <input type="text" class="form-control" id="u_expire" readonly>
                    </div>
                  </div>
                </div>
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
        //"scrollX": true,
        "searching" : false,
        "info" : false,
        "paging" : false
    } );
} );


$(document).ready(function() {
    $('select[name="id_unit"]').on('change', function(){
      var id_up_ =   $(this).val();
      var token = '{{ csrf_token() }}';
   
        //var countryId = $(this).val();
        if(id_up_) {
            $.ajax({
                url: "{{ url('config/getLv3List/') }}/"+id_up_,
                type:"GET",
                dataType:"json",
                data: {id_up: id_up_, _token: token},

                //beforeSend: function(){
                    //$('#loader').css("visibility", "visible");
                //},

                success:function(data) {

                    $('select[name="id_ulp"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="id_ulp"]').append('<option value="'+ value.UL_CODE +'">' + value.UL_CODE + ' - ' + value.UNIT_NAME + '</option>');

                    });
                },
                //complete: function(){
                    //$('#loader').css("visibility", "hidden");
                //}
            });
        } else {
            $('select[name="id_ulp"]').empty();
        }

    });
});

//$('#list-apar').DataTable({
var vtable = $('#list-apar').DataTable({
   processing: true,
   serverSide: true,
   searching: false,
   paging: false,
   info: false,
   
   //scrollX: true,
   order: [[ 2, 'asc' ]],
   dom: 'Bfrtip',
   buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
    ],
   ajax:{
    url: "{{ route('list_apar') }}",
   },
   columns:[
     //{ data: null, searchable:false, orderable:false, className: "text-center"},
     {
     data: 'ID_APAR',
     className: "text-center"
     },
     {
     data: 'BUSS_AREA',
     className: "text-center"
     },
     {
     data: 'UL_CODE',
     className: "text-center"
     },
     {
     data: 'NO_URUT',
     className: "text-center"
     },
     {
     data: 'LOKASI_APAR',
     className: "text-left"
     },
     {
     data: 'TGL_EXPIRED',
     className: "text-center"
     },
     {
      data: 'action',
      className: "text-center",
      //name: 'action',
      //orderable: false
      },
   ]
  });

$('#form-filter').submit(function (e){
      e.preventDefault();
      //var url = "ajax_files/inbox_payment.php?unit=" + $('#unit').val() +  "&jnsangg=" + $('#jnsangg').val() +  "&jnstag=" + $('#jnstag').val();
      var url = "{{ route('list_apar') }}?unit=" + $('#id_unit').val() +  "&ulp=" + $('#id_ulp').val();
      vtable.ajax.url(url).load();
      //$('#list-apar').DataTable().ajax.url(url).reload();
      $('#filter_modal').modal('toggle');
      $('#filtertahun').html($('#tahun').val());
      return false;
    });


</script>
@endsection