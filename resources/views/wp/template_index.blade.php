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
              <button onclick="location.href='add_template'" class="dropdown-item" name="create_record" id="create_record"><i class="la la-plus-circle"></i> Add Template</button>  
              <button class="dropdown-item" name="create_record_2" id="create_record_2"><i class="la la-plus-circle"></i> Add User Category</button>  
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
                  <h4 class="card-title">LIST USERS </h4>
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
                    <table id="datamenu" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>BUSS AREA</th>
                          <th>PERS NO</th>
                          <th>EMAIL</th>
                          <th>FULLNAME</th>
                          <th>GROUP</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>BUSS AREA</th>
                          <th>PERS NO</th>
                          <th>EMAIL</th>
                          <th>FULLNAME</th>
                          <th>GROUP</th>
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
                  <label for="companyName">Email</label>
                    <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                </div>
                <div class="row">
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="companyName">Full Name</label>
                      <input type="text" class="form-control" placeholder="Full Name" id="name" name="name">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="companyName">Pers Number</label>
                      <input type="text" class="form-control" placeholder="Pers Number / NIP" id="pers_no" name="pers_no">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">Unit</label>
                      <select id="unit_id" name="unit_id" class="form-control">
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">User Group</label>
                      <select id="user_group" name="user_group" class="form-control">
                      
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              
              <input type="hidden" name="action" id="action" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="action_button" id="action_button" value="Add" class="btn btn-outline-info">Submit</button>
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

 var vtable = $('#datamenu').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    order: [[ 2, 'asc' ]],
    ajax:{
     url: "{{ route('user_datatables') }}",
    },
    columns:[
      { data: null, searchable:false, orderable:false, className: "text-center"},
      {
      data: 'UNIT_NAME',
      name: 'UNIT_NAME'
      },
      {
      data: 'pers_no',
      className: "text-left"
      },
      {
      data: 'email',
      className: "text-center"
      },
      {
      data: 'name',
      className: "text-center"
      },
      {
      data: 'GROUP_NAME',
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

      
    $('#create_record').click(function(){
      $('.modal-title').text("Add New User");
      $('#store_image').html("");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#formModal').modal('show');
    });


    $('#form_menu').on('submit', function(event){
      event.preventDefault();
      
      if($('#action').val() == 'Add')
      {
        $.ajax({
          url:"{{ route('user_store') }}",
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
              $('#datamenu').DataTable().ajax.reload();
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
          url:"{{ route('menu_update') }}",
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

    $('#confirm_form').on('submit', function(event){
      event.preventDefault();

    if($('#del_action').val() == "Delete")
      {
        $.ajax({
          url:"{{ route('menu_destroy') }}",
          //url:"http://127.0.0.1:8000/master/menu_destroy/"+user_id,
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

    $(document).on('click', '.edit', function(){
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
        type : "GET",
        url: "{{ url('master/get_userdata/') }}",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#email').val(html.data[0].email);
          $('#name').val(html.data[0].name);
          $('#pers_no').val(html.data[0].pers_no);
          //$('#cost_of_sales').val(html.data[0].cost_of_sales.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
          $("#unit_id").val(html.data[0].unit).attr('selected','selected');
          $('#group_id').val(html.data[0].group_id);
          $('#group_name').val(html.data[0].GROUP_NAME);
          $("#user_group").val(html.data[0].group_id).attr('selected','selected');
          //$('#store_image').html("<img src={{ URL::to('/') }}/images/pic_menu/" + html.data[0].image + " width='70' class='img-thumbnail' />");
          //$('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data[0].image+"' />");
          $('#hidden_id').val(html.data[0].id);
          $('.modal-title').text("Edit Users");
          $('#action_button').val("Edit");
          $('#action').val("Edit");
          $('#formModal').modal('show');
        },error: function (jqXhr, textStatus, errorMessage) { // error callback 
					$('p').append('Error: ' + errorMessage);
				}
      })
    });

    $(document).on('click', '.delete', function(){
      var id = $(this).attr('id');
      //$('#form_result').html('');
      $.ajax({
        type : "GET",
        url: "{{ url('master/get_userdata/') }}",
        //url:"http://127.0.0.1:8000/master/menu_edit2",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#del_hidden_id').val(html.data[0].id);
          $('#menuname').text(html.data[0].menu_name);
          $('.modal-title').text("Delete User");
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
