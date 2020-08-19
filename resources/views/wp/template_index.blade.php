@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Template WP </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Seuramoe</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Working Permit</a>
                </li>
                <li class="breadcrumb-item active"> Template
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
              <button onclick="location.href='/wp/add_template'" class="dropdown-item"><i class="la la-plus-circle"></i> Add Template</button>
              <!--button onclick="location.href='/wp/add_template'" class="dropdown-item" name="create_record" id="create_record"><i class="la la-plus-circle"></i> Add Template</button-->  
              <!--button class="dropdown-item" name="create_record_2" id="create_record_2"><i class="la la-plus-circle"></i> Add User Category</button -->  
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
                  <h4 class="card-title">LIST TEMPLATE </h4>
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
                    
                    <div class="tab-content px-1 pt-1">
                    <table id="list_template" width="100%" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">#</th>
                          <th width="8%">COMP CODE</th>
                          <th width="69%">NAMA TEMPLATE</th>
                          <th width="18%">ACTION</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                        <th>#</th>
                          <th>COMP CODE</th>
                          <th>NAMA TEMPLATE</th>
                          <th>ACTION</th>
                        </tr>
                      </tfoot>
                    </table>
                    </div>
                </div>
              </div>

            </div>
            </div>
          </div>
        </section>
        <!--/ Zero configuration table -->

        <!-- Modal -->

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
                <h5 class="text-center" style="margin:0;">Are you sure you want to delete this data?</h5>
              </div>
              <input type="hidden" name="del_action" id="del_action" />
              <input type="hidden" name="del_hidden_id" id="del_hidden_id" />

              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="ok_button" id="ok_button" value="Add" class="btn btn-outline-danger">Yes, Delete !</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal -->      
</div>


<script type="text/javascript">

  $(document).ready(function() {
    $('select[name="unit_id"]').on('change', function(){
      var b_area =   $(this).val();
      var token = '{{ csrf_token() }}';
   
        //var countryId = $(this).val();
        if(b_area) {
            $.ajax({
                url: "{{ url('master/get_group/') }}/"+b_area,
                type:"GET",
                dataType:"json",
                data: {buss_area: b_area, _token: token},

                //beforeSend: function(){
                    //$('#loader').css("visibility", "visible");
                //},

                success:function(data) {

                    $('select[name="user_group"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="user_group"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                //complete: function(){
                    //$('#loader').css("visibility", "hidden");
                //}
            });
        } else {
            $('select[name="user_group"]').empty();
        }

    });
  });

$(document).ready(function() {

 var vtable = $('#list_template').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    order: [[ 2, 'asc' ]],
    ajax:{
     url: "{{ route('list_template') }}",
    },
    columns:[
      { data: null, searchable:false, orderable:false, className: "text-center"},
      {
      data: 'comp_code',
      name: 'comp_code',
      className: "text-center"
      },
      {
      data: 'nama_template',
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


    $('#confirm_form').on('submit', function(event){
      event.preventDefault();

    if($('#del_action').val() == "Delete")
      {
        $.ajax({
          url:"{{ route('template_delete') }}",
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
              $('#list_template').DataTable().ajax.reload();
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

    $(document).on('click', '.edit', function(){
      var id = $(this).attr('id');
      location.href='/wp/edit_template/' + id + '';
    });

    $(document).on('click', '.delete', function(){
      var id = $(this).attr('id');
      //$('#form_result').html('');
      $.ajax({
        type : "GET",
        url: "{{ url('wp/get_detail_template/') }}",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#del_hidden_id').val(html.data[0].id_template);
          $('.modal-title').text("Delete Template");
          $('#ok_button').val("Delete");
          $('#del_action').val("Delete");
          $('#confirmModal').modal('show');
        },error: function (jqXhr, textStatus, errorMessage) { // error callback 
					$('p').append('Error: ' + errorMessage);
				}
      })
    });

    
$('[data-dismiss=modal]').on('click', function (e) {
  $('#form_menu')[0].reset();
})

$('[data-dismiss=modal]').on('click', function (e) {
  $('#form_menu_2')[0].reset();
})
</script>
@endsection
