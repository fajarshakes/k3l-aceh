@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Peta Apar </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Peta Apar</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">List Apar</a>
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
              <button onclick="location.href='/apar/add'" class="dropdown-item"><i class="la la-check-circle-o"></i> Tambah Apar</button>
              <button class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#filter_modal"><i class="la la-filter"></i> Filter Data</button>

              <div class="dropdown-divider"></div>
              <button onclick="location.href='/apar/export_excel'" class="dropdown-item"><i class="la la-check-circle-o"></i> Export Excel (.xlsx)</button>
              <!-- <a href "export_excel' class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#"><i class="la la-file-text"></i> Export Excel (.xlsx)</a> -->
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
                  <h4 class="card-title">Peta Apar </h4>
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
                  <table id="table-apar" class="table display nowrap table-striped table-bordered zero-configuration">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">NO URUT</th>
                        <th class="text-center">LOKASI</th>
                        <th class="text-center">MERK</th>
                        <th class="text-center">KAPASITAS</th>
                        <th class="text-center">TGL EXPIRED</th>
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
              
              <form id="form_menu" method="post" enctype="multipart/form-data">

              @csrf
              <div class="modal-body">
              <div class="row">
              
              <div class="col-xl-12 col-md-12">
                <div class="card overflow-hidden">
                  <a id="url1">
                  <div class="card-content">
                    <div class="media align-items-stretch bg-info text-white rounded">
                      <div class="bg-info bg-darken-2 p-2 media-middle">
                        <i class="icon-flag font-large-2 text-white"></i>
                      </div>
                      <div class="media-body p-2">
                        <h4 class="text-white">INPUT PEMELIHARAAN</h4>
                      </div>
                    </div>
                  </div>
                  </a>
                </div>
                <div class="card overflow-hidden">
                  <a id="url2">
                  <div class="card-content">
                    <div class="media align-items-stretch bg-info text-white rounded">
                      <div class="bg-info bg-darken-2 p-2 media-middle">
                        <i class="icon-grid font-large-2 text-white"></i>
                      </div>
                      <div class="media-body p-2">
                        <h4 class="text-white">UPDATE INFO APAR</h4>
                      </div>
                    </div>
                  </div>
                  </a>
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

        <div class="modal fade text-left" id="qr_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-success white">
                <h4 class="modal-title white" id="myModalLabel11">SUBMIT FORM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_qr_code" method="post" enctype="multipart/form-data">
              <div class="modal-body">
              <div class="row">
              
              <div class="col-xl-12 col-md-12">
              <div class="card crypto-card-3 bg-success">
                <div class="card-content">
                  <div class="card-body cc LTC pb-1">   
                    <div class="row">
                      <div class="col-5">
                      {!! QrCode::size(100)->generate('http://saman.plnaceh.id:9000/apar/view/APR61010001') !!}
                      <span id="qrcodeTable"></span>
                      </div>
                      <div class="col-7 text-right">
                        <h4 class="text-white mb-3"><i class="la la-qrcode" title="LTC"></i> <span id="apar_id"></span></h4>
                        <h6 class="text-white">Expired Date : <span id="exp_date"></span></h6>
                        <h6 class="text-white">Location : <span id="location"></span></h6>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              
              </div>
              </div>
              </form>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
              </div>
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
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">PILIH UP (LV2)</label>
                      <select class="form-control" name="id_unit">
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
                      <select name="id_ulp" class="form-control">
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
      
        <!-- Modal -->      
      
      <div id="loading"></div>
      </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    $('#table1').DataTable( {
        "scrollX": true
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

$(document).ready(function() {

var vtable = $('#table-apar').DataTable({
   processing: true,
   serverSide: true,
   paging: true,
   //scrollX: true,
   order: [[ 2, 'asc' ]],
   ajax:{
    url: "{{ route('list_index_apar') }}",
   },
   columns:[
     { data: null, searchable:false, orderable:false, className: "text-center"},
     {
     data: 'NO_URUT',
     className: "text-center"
     },
     {
     data: 'LOKASI_APAR',
     className: "text-left"
     },
     {
     data: 'MERK',
     className: "text-left"
     },
     {
     data: 'KAPASITAS',
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

 $(document).on('click', '.button1', function(){
  var id = $(this).attr('id');
  $('.modal-title').text("DETAIL DATA");
  $("#url1").attr('href', '/apar/input_har/' + id + '');
  $("#url2").attr('href', '/apar/update/' + id + '');
  $('#id').text('/apar/input_har/' + id + '');
  $('#action_button').val("Add");
  $('#action').val("submit");
  $('#submit_form').modal('show');
});

$(document).on('click', '.qrcode', function(){
      var id = $(this).attr('id');

      $('#form_result').html('');
      $.ajax({
        type : "GET",
        url: "{{ url('apar/get_detail/') }}",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $("#apar_id").text( id );
          $("#exp_date").text( html.data.TGL_EXPIRED );
          $("#location").text( html.data.LOKASI_APAR );
          /*
          $("#qrcodeTable").append( {!! QrCode::size(100)->generate('http://saman.plnaceh.id:9000/apar/view/APR61010001') !!} );
          */
          /*
          $("#qrcodeTable").qrcode({
            width	: "100",
            height	: "100",
            //render	: "table",
            text	: "http://saman.plnaceh.id:9000/apar/view/" + id, 
          });
          */
          $('.modal-title').text("QR CODE LABEL");
          //$('#action_button').val("Edit");
          //$('#action').val("Edit");
          $('#qr_form').modal('show');
        },error: function (jqXhr, textStatus, errorMessage) { // error callback 
					$('p').append('Error: ' + errorMessage);
				}
      })
    });

$('#qr_form').on('hide.bs.modal', function (e) {
  // do something...
  $(this).removeData('bs.modal');
  $(".modal-content").empty();
  
})

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
</script>
@endsection