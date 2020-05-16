@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Menu </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Master Data</a>
                </li>
                <li class="breadcrumb-item active"> Master Menu
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
              <button class="dropdown-item" name="create_record" id="create_record"><i class="la la-plus-circle"></i> Add Menu</button>  
              <button class="dropdown-item" name="create_record_2" id="create_record_2"><i class="la la-plus-circle"></i> Add Category</button>  
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
                  <h4 class="card-title">Master Menu </h4>
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
                        href="#tabIcon31" aria-expanded="true"><i class="la la-play"></i> Menu List</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="baseIcon-tab32" data-toggle="tab" aria-controls="tabIcon32"
                        href="#tabIcon32" aria-expanded="false"><i class="la la-flag"></i> Product Category</a>
                      </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                      <div role="tabpanel" class="tab-pane active" id="tabIcon31" aria-expanded="true"
                      aria-labelledby="baseIcon-tab31">
                      
                      {{-- <span id="form_result"></span> --}}

                      <table id="datamenu" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Pic</th>
                          <th>Menu Name</th>
                          <th>Category</th>
                          <th>COS</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                        <th>#</th>
                          <th>Pic</th>
                          <th>Menu Name</th>
                          <th>Category</th>
                          <th>COS</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                      
                      </div>
                      <div class="tab-pane" id="tabIcon32" aria-labelledby="baseIcon-tab32">
                      <table id="cdatamenu" width="100%" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Unit</th>
                          <th>CatCode</th>
                          <th>Category Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Unit</th>
                          <th>CatCode</th>
                          <th>Category Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
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
                  <label for="companyName">Menu Name</label>
                    <input type="text" class="form-control" placeholder="Menu Name" id="name" name="name">
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="projectinput5">Category</label>
                      <select id="catcd" name="catcd" class="form-control">
                        <option value="none" selected="" disabled="">Select Category</option>
                        @foreach($categoryData as $c)
                          <option value="{{ $c->cat_cd }}">{{ $c->cat_text }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="companyName">Cost Of Sales</label>
                    <input type="text" class="rupiah form-control" id="cost_of_sales" name="cost_of_sales" style="text-align: right" placeholder="Harga Pokok">
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="companyName">Price</label>
                    <input type="text" class="rupiah form-control" id="price" name="price" style="text-align: right" placeholder="Price">
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="companyName">Picture</label>
                  <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image">
                        <label class="custom-file-label" for="inputGroupFile01">Choose Picture</label>
                        <span id="store_image"></span>
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

        <div class="modal fade text-left" id="formModal_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Product Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form_menu_2" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="companyName">Category Name</label>
                    <input type="text" class="form-control" placeholder="Category Name" id="cname" name="cname">
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="projectinput5">Category Status</label>
                      <select id="cstatus" name="cstatus" class="form-control">
                        <option value="none" selected="" disabled="">Select Category</option>
                        <option value="1">ACTIVE</option>
                        <option value="2">NON ACTIVE</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              
              <input type="hidden" name="action" id="action" />
              <input type="hidden" name="chidden_id" id="chidden_id" />
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="c_action_button" id="c_action_button" value="Add" class="btn btn-outline-info">Submit</button>
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
</div>



<script type="text/javascript">
$(document).ready(function() {

 var vtable = $('#datamenu').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    order: [[ 2, 'asc' ]],
    ajax:{
     url: "{{ route('menu_datatables') }}",
    },
    columns:[
      { data: null, searchable:false, orderable:false, className: "text-center"},
      {
      data: 'image',
      //name: 'image',
      render: function(data, type, full, meta){
       return "<img src={{ URL::to('/') }}/images/pic_menu/" + data + " width='70' class='img-thumbnail' />";
      },
      orderable: false
      },
      {
      data: 'menu_name',
      name: 'menu_name'
      },
      {
      data: 'cat_text',
      className: "text-center"
      },
      {
      data: 'cost_of_sales',
      render: function (toFormat) {
              return toFormat.toString().replace(
                /\B(?=(\d{3})+(?!\d))/g, "." );
      },
      className:"text-right",
      },
      {
      data: 'menu_price',
      render: function (toFormat) {
              return toFormat.toString().replace(
                /\B(?=(\d{3})+(?!\d))/g, "." );
      },
      className:"text-right",
      },
      {
        searching: true,
        sortable: true,
       className: "text-center",
       render: function ( data, type, full, meta ) {
         var status = full.menu_status;
         //var nogm = full.nogm;
         //var datakolom = nose +" / "+ nogm;
         if(status == '1'){
          badge = 'badge badge-success';
          span = 'Active';
          iclass = 'la la-check-circle-o font-medium-2'; }
          else if(status == '2'){
          badge = 'badge badge-danger';
          span = 'Non Active';
          iclass = 'la la-bell-o font-medium-2';
          }
        return "<div class='badge "+badge+"'><span>"+span+"</span><i class='"+iclass+"'></i></div>";

       }
      },
      {
      data: 'action',
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

  $(document).ready(function() {

  var vtable = $('#cdatamenu').DataTable({
   processing: true,
   serverSide: true,
   paging: true,
   order: [[ 2, 'asc' ]],
   ajax:{
    url: "{{ route('c_menu_datatables') }}",
   },
   columns:[
     { data: null, searchable:false, orderable:false, className: "text-center"},
     {
     data: 'cat_unit',
     className: "text-center"
     },
     {
     data: 'cat_cd',
     className: "text-center"
     },
     {
     data: 'cat_text',
     },
     {
        searching: true,
        sortable: true,
       className: "text-center",
       render: function ( data, type, full, meta ) {
         var status = full.cat_status;
         //var nogm = full.nogm;
         //var datakolom = nose +" / "+ nogm;
         if(status == '1'){
          badge = 'badge badge-success';
          span = 'Active';
          iclass = 'la la-check-circle-o font-medium-2'; }
          else if(status == '2'){
          badge = 'badge badge-danger';
          span = 'Non Active';
          iclass = 'la la-bell-o font-medium-2';
          }
        return "<div class='badge "+badge+"'><span>"+span+"</span><i class='"+iclass+"'></i></div>";

       }
      },
     {
     data: 'action',
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
      $('.modal-title').text("Add New Menu");
      $('#store_image').html("");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#formModal').modal('show');
    });

    $('#create_record_2').click(function(){
      $('.modal-title').text("Add Menu Category");
      $('#c_action_button').val("Add");
      $('#action').val("Add");
      $('#formModal_2').modal('show');
    });

    $('#form_menu').on('submit', function(event){
      event.preventDefault();
      
      if($('#action').val() == 'Add')
      {
        $.ajax({
          url:"{{ route('menu_store') }}",
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

    $('#form_menu_2').on('submit', function(event){
      event.preventDefault();
      
      if($('#action').val() == 'Add')
      {
        $.ajax({
          url:"{{ route('c_menu_store') }}",
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
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
            }
            if(data.success)
            {
              html = data.success;
              type_toast = 'success';
              //html = '<div class="alert alert-success">' + data.success + '</div>';
              $('#form_menu_2')[0].reset();
              $('#formModal_2').modal('hide');
              $('#cdatamenu').DataTable().ajax.reload();
            }
            if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } 
          }
        })
      }
      
      if($('#action').val() == "Edit")
      {
        $.ajax({
          url:"{{ route('c_menu_update') }}",
          method:"POST",
          data:new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          dataType:"json",
          success:function(data)
          {
            var html = '';
            var type_toast = '';
            if(data.errors)
            {
              html = ''+ data.errors + '';
              type_toast = 'error';
            }
            if(data.success)
            {
              html = data.success;
              type_toast = 'success';
              $('#form_menu_2')[0].reset();
              $('#formModal_2').modal('hide');
              $('#cdatamenu').DataTable().ajax.reload();
            }
            if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            }
          }
        });
      }
    });

    $('#confirm_form_c').on('submit', function(event){
      event.preventDefault();

    if($('#del_action').val() == "Delete")
      {
        $.ajax({
          url:"{{ route('c_menu_destroy') }}",
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
              $('#confirm_form_c')[0].reset();
              //$('#formModal').html('');
              $('#confirmModal_c').modal('hide');
              $('#cdatamenu').DataTable().ajax.reload();
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
        //url:"http://127.0.0.1:8000/master/menu_edit/"+id,
        url:"http://127.0.0.1:8000/master/menu_edit2",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          var rupiah = html.data[0].menu_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." );
          $('#name').val(html.data[0].menu_name);
          $('#price').val(rupiah);
          $('#cost_of_sales').val(html.data[0].cost_of_sales.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
          $("#catcd").val(html.data[0].cat_cd).attr('selected','selected');
          $('#store_image').html("<img src={{ URL::to('/') }}/images/pic_menu/" + html.data[0].image + " width='70' class='img-thumbnail' />");
          $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data[0].image+"' />");
          $('#hidden_id').val(html.data[0].id);
          $('.modal-title').text("Edit Menu");
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
        //url:"http://127.0.0.1:8000/master/menu_edit/"+id,
        url:"http://127.0.0.1:8000/master/menu_edit2",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#del_hidden_id').val(html.data[0].id);
          $('#menuname').text(html.data[0].menu_name);
          $('.modal-title').text("Delete Menu");
          $('#ok_button').val("Delete");
          $('#del_action').val("Delete");
          $('#confirmModal').modal('show');
        },error: function (jqXhr, textStatus, errorMessage) { // error callback 
					$('p').append('Error: ' + errorMessage);
				}
      })
    });

    $(document).on('click', '.c_edit', function(){
      var id = $(this).attr('id');
      $.ajax({
        type : "GET",
        url:"http://127.0.0.1:8000/master/menu_edit_c",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#cname').val(html.data[0].cat_text);
          $("#cstatus").val(html.data[0].cat_status).attr('selected','selected');
          $('#chidden_id').val(html.data[0].id);
          $('.modal-title').text("Edit Category Menu");
          $('#c_action_button').val("Edit");
          $('#action').val("Edit");
          $('#formModal_2').modal('show');
          },error: function (jqXhr, textStatus, errorMessage) { // error callback 
					$('p').append('Error: ' + errorMessage);
				}
      })
    });

    $(document).on('click', '.c_delete', function(){
      var id = $(this).attr('id');
      //$('#form_result').html('');
      $.ajax({
        type : "GET",
        //url:"http://127.0.0.1:8000/master/menu_edit/"+id,
        url:"http://127.0.0.1:8000/master/menu_edit_c",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#del_hidden_id').val(id);
          $('#catname').text(html.data[0].cat_text);
          $('.modal-title').text("Delete Menu Category");
          $('#ok_button').val("Delete");
          $('#del_action').val("Delete");
          $('#confirmModal_c').modal('show');
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
