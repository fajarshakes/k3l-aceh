@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Master Vendor </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Seuramoe</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Administrator</a>
                </li>
                <li class="breadcrumb-item active"> Master Vendor
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
              <button class="dropdown-item" name="create_record" id="create_record"><i class="la la-plus-circle"></i> Add Vendor</button>  
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
                  <h4 class="card-title">LIST VENDOR </h4>
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
                    <table id="list-vendor" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">DPT</th>
                          <th class="text-center">VENDOR</th>
                          <th class="text-center">EMAIL</th>
                          <th class="text-center">ACTION</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">DPT</th>
                          <th class="text-center">VENDOR</th>
                          <th class="text-center">EMAIL</th>
                          <th class="text-center">ACTION</th>
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
        <div class="modal fade text-left" id="formModal" role="dialog" aria-labelledby="myModalLabel11"
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
              <div class="row">
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="projectinput5">PILIH VENDOR</label>
                      <div class="form-group"> 
                        <select id="vendor_id" name="vendor_id" class="select2 form-control" style="width: 100%">
                        <option value="none" selected="">PILIH VENDOR</option>
                        @foreach($vendor_json as $json)
                          <option value="{{ $json['id'] }}">{{ $json['vendor'] }}</option>
                        @endforeach
                      </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="projectinput5">KUALIFIKASI</label>
                      <select name="qualification" class="form-control">
                        <option value="">-PILIH KUALIFIKASI-</option>
                        <option value="DPT_BILLMAN">DPT BILLMAN</option>
                        <option value="DPT_EBT">DPT EBT</option>
                        <option value="DPT_SKTM">DPT SKTM</option>
                        <option value="DPT_SUTM">DPT SUTM</option>
                        <option value="DPT_SUTR">DPT SUTR</option>
                        <option value="DPT_SIPIL">DPT SIPIL</option>
                        <option value="DPT_SR">DPT SR</option>
                      </select>
                    </div>
                  </div>
              </div>
                
              <div class="row">
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="companyName">NO SAP</label>
                      <input type="text" class="form-control" placeholder="Full Name" id="nosap" name="nosap" readonly>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="companyName">SIPAT NO</label>
                      <input type="text" class="form-control" placeholder="Pers Number / NIP" id="nosipat" name="nosipat" readonly>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="companyName">ALAMAT</label>
                    <input type="text" class="form-control" placeholder="Alamat Perusahaan" id="alamat" name="alamat">
              </div>
              <div class="form-group">
                  <label for="companyName">EMAIL PERUSAHAAN</label>
                    <input type="text" class="form-control" placeholder="Email Perusahaan" name="email">
              </div>
              <div class="form-group">
                  <label for="companyName">NAMA PIC</label>
                    <input type="text" class="form-control" placeholder="Nama PIC" id="pic_name" name="pic_name" required>
              </div>
              <div class="row">
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="companyName">JABATAN PIC</label>
                      <input type="text" class="form-control" placeholder="Jabatan PIC" id="pic_position" name="pic_position" required>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="companyName">CONTACT PIC</label>
                      <input type="text" class="form-control" placeholder="Contact PIC" id="pic_contact" name="pic_contact" required>
                    </div>
                  </div>
              </div>

              </div>
              
              <input type="hidden" name="nama_perusahaan" id="nama_perusahaan" />
              <input type="hidden" name="action" id="action" />
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="action_button" id="action_button" value="Add" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal -->
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
              <div class="row">
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="projectinput5">NAMA VENDOR</label>
                      <input type="text" class="form-control" id="nm_vendor" name="nm_vendor" readonly>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="projectinput5">KUALIFIKASI</label>
                      <select name="qualification" id="qualification" class="form-control">
                        <option value="">-PILIH KUALIFIKASI-</option>
                        <option value="DPT_BILLMAN">DPT BILLMAN</option>
                        <option value="DPT_EBT">DPT EBT</option>
                        <option value="DPT_SKTM">DPT SKTM</option>
                        <option value="DPT_SUTM">DPT SUTM</option>
                        <option value="DPT_SUTR">DPT SUTR</option>
                        <option value="DPT_SIPIL">DPT SIPIL</option>
                        <option value="DPT_SR">DPT SR</option>
                      </select>
                    </div>
                  </div>
              </div>
                
              <div class="row">
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="companyName">NO SAP</label>
                      <input type="text" class="form-control" placeholder="Full Name" id="nosap0" name="nosap" readonly>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="companyName">SIPAT NO</label>
                      <input type="text" class="form-control" placeholder="Pers Number / NIP" id="nosipat0" name="nosipat" readonly>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="companyName">ALAMAT</label>
                    <input type="text" class="form-control" placeholder="Alamat Perusahaan" id="alamat0" name="alamat">
              </div>
              <div class="form-group">
                  <label for="companyName">EMAIL PERUSAHAAN</label>
                    <input type="text" class="form-control" placeholder="Alamat Perusahaan" name="email" id="email0" readonly>
              </div>
              <div class="form-group">
                  <label for="companyName">NAMA PIC</label>
                    <input type="text" class="form-control" placeholder="Nama PIC" id="pic_name0" name="pic_name" required>
              </div>
              <div class="row">
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="companyName">JABATAN PIC</label>
                      <input type="text" class="form-control" placeholder="Jabatan PIC" id="pic_position0" name="pic_position" required>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="companyName">CONTACT PIC</label>
                      <input type="text" class="form-control" placeholder="Contact PIC" id="pic_contact0" name="pic_contact" required>
                    </div>
                  </div>
              </div>

              </div>
              
              <input type="hidden" name="id_perusahaan" id="id_perusahaan0" />
              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="action_button" id="action_button0" value="Add" class="btn btn-outline-info">Update</button>
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
    $('select[name="vendor_id"]').on('change', function(){
      var b_area =   $(this).val();
      var token = '{{ csrf_token() }}';
   
        if(b_area) {
            $.ajax({
                url: "{{ url('master/api_vendor_detail') }}/"+b_area,
                type:"GET",
                dataType:"json",
                data: {buss_area: b_area, _token: token},
                success:function(html) {
                  $('#nosap').val(html.data[0].nosap);
                  $('#nosipat').val(html.data[0].id);
                  $('#alamat').val(html.data[0].alamat);
                  $('#direktur').val(html.data[0].direktur);
                  $('#nama_perusahaan').val(html.data[0].vendor);
                },
            });
        }
      });
  });

$(document).ready(function() {

 var vtable = $('#list-vendor').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    order: [[ 2, 'asc' ]],
    ajax:{
     url: "{{ route('vendor_datatables') }}",
    },
    columns:[
      { data: null, searchable:false, orderable:false, className: "text-center"},
      {
      data: 'QUALIFICATION',
      name: 'QUALIFICATION'
      },
      {
      data: 'VENDOR_NAME',
      name: 'VENDOR_NAME'
      },
      {
      data: 'EMAIL',
      className: "text-left"
      },
      {
      "data": null,
      "searchable": false,
      "orderable": false,
      className: "text-center",
      "render": function (data, type, full, meta) {
        /*
        return `<button name="edit_modal" id="${full.id_wp}" class="edit0 btn btn-sm btn-primary btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit" > <i class="la la-edit"></i></button>
       <button name="approve_modal" id="${full.id_wp}" class="edit btn btn-sm btn-success btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Approve" > <i class="la la-check-circle"></i></button>
        <button name="del_modal" id="${full.id_wp}" class="delete btn btn-sm btn-danger btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Reject"> <i class="la la-close"></i></button>`;
        */
      
      return `
      <span class='dropdown'>
          <button id='btnSearchDrop1' type='button' data-toggle='dropdown' aria-haspopup='true'
          aria-expanded='false' class='btn btn-blue dropdown-toggle btn-sm'><i class='la la-check-circle'></i></button>
          <span aria-labelledby='btnSearchDrop4' class='dropdown-menu mt-1 dropdown-menu-right'>
            <a href='#' name='edit' id='${full.ID}' class='edit dropdown-item'><i class='ft-edit-2'></i> EDIT DATA</a>
            <div class='dropdown-divider'></div>
            <a href='#' name='delete' id='${full.ID}' class='delete dropdown-item'><i class='ft-trash'></i> DELETE</a>
          </span>
        </span>`;
      }
      },
      /*
      {
      data: 'action',
      className: "text-center",
      //name: 'action',
      orderable: false
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

      
    $('#create_record').click(function(){
      $('.modal-title').text("Add New Vendor");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#formModal').modal('show');
    });


    $('#form_menu').on('submit', function(event){
      event.preventDefault();
      
      if($('#action').val() == 'Add')
      {
        $.ajax({
          url:"{{ route('vendor_store') }}",
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
              $('#list-vendor').DataTable().ajax.reload();
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
      
    $('#form_edit').on('submit', function(event){
      event.preventDefault();
      
        $.ajax({
          url:"{{ route('vendor_update') }}",
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
              $('#form_edit')[0].reset();
              //$('#formModal').html('');
              $('#formEdit').modal('hide');
              $('#list-vendor').DataTable().ajax.reload();
            }
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            }    
          }
        });
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
        url: "{{ url('master/get_vendordata/') }}",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $('#nm_vendor').val(html.VENDOR_NAME);
          //$('#qualification').val(html.QUALIFICATION);
          $('#nosap0').val(html.SAP_NO);
          $('#nosipat0').val(html.SIPAT_ID);
          $('#alamat0').val(html.ADDRESS);
          $('#email0').val(html.EMAIL);
          $('#pic_name0').val(html.PIC_NAME);
          $('#pic_position0').val(html.PIC_POSITION);
          $('#pic_contact0').val(html.PIC_PHONE);
          $('#id_perusahaan0').val(html.ID);
          //$('#cost_of_sales').val(html.data[0].cost_of_sales.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "." ));
          $("#qualification").val(html.QUALIFICATION).attr('selected','selected');
          //$("#user_group").val(html.data[0].group_id).attr('selected','selected');
          //$('#store_image').html("<img src={{ URL::to('/') }}/images/pic_menu/" + html.data[0].image + " width='70' class='img-thumbnail' />");
          //$('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data[0].image+"' />");
          $('.modal-title').text("Edit Data Vendor");
          $('#action_button0').val("Edit");
          $('#action0').val("Edit");
          $('#formEdit').modal('show');
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
</script>
@endsection
