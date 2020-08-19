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
                <li class="breadcrumb-item"><a href="#">list Apar</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Input Pemeliharaan</a>
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
        <!-- Input Mask start -->
        <section class="inputmask" id="inputmask">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">DETAIL APAR</h4>
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
                <form id="form_mesnu" action="add_store" method="post" enctype="multipart/form-data">
                @csrf  
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>NO URUT</h5>
                          <div class="form-group">
                            <input name="no_urut" type="text" class="form-control" placeholder="NO URUT APAR" readonly value="{{$detail ? $detail->NO_URUT : ''}}"
                            />
                          </div>
                        </fieldset>
                        
                        <fieldset>
                          <h5>UNIT
                          </h5>
                          <div class="form-group">
                            <input name="no_urut" type="text" class="form-control" placeholder="NO URUT APAR" readonly value="{{$detail ? $detail->BUSS_AREA : ''}}">
                          </div>
                        </fieldset>
                        
                        <fieldset>
                          <h5>LOKASI GEDUNG & LANTAI
                          </h5>
                          <div class="form-group">
                            <input name="no_urut" type="text" class="form-control" placeholder="NO URUT APAR" readonly value="{{$detail ? $detail->NAMA_GEDUNG .' - '. $detail->NAMA_LANTAI : ''}}">
                          </div>
                        </fieldset>

                        <fieldset>
                          <h5>LOKASI APAR
                            <small class="text-muted">Detail Lokasi</small>
                          </h5>
                          <div class="form-group">
                            <input name="lokasi" type="text" class="form-control" placeholder="ex : BIDANG KEUANGAN, RUANG ARSIP" readonly value="{{$detail ? $detail->LOKASI_APAR : ''}}"
                            />
                          </div>
                        </fieldset>

                      </div>

                      <div class="col-xl-6 col-lg-12">
                        
                        <fieldset>
                          <h5>MERK APAR
                          </h5>
                          <div class="form-group">
                            <input name="merk" type="text" class="form-control" placeholder="MERK APAR" readonly value="{{$detail ? $detail->MERK : ''}}"
                            />
                          </div>
                        </fieldset>

                        <fieldset>
                          <h5>TYPE APAR
                          </h5>
                          <div class="form-group">
                            <input name="type" type="text" class="form-control" placeholder="TYPE APAR" readonly value="{{$detail ? $detail->TYPE : ''}}"
                            />
                          </div>
                        </fieldset>
                        
                        <fieldset>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                            <h5>KAPASITAS</h5>
                                <input name="kapasitas" class="form-control" readonly value="{{$detail ? $detail->KAPASITAS : ''}}"/>
                            </div>
                            <div class="col-md-6">
                            <h5>MEDIA</h5>
                                <input name="media" class="form-control" readonly value="{{$detail ? $detail->MEDIA : ''}}">
                            </div>
                          </div>
                          </div>
                        </fieldset>

                        <fieldset>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                            <h5>TANGGAL EXPIRED</h5>
                              <input name="exp_date" type="date" class="form-control datetime" readonly value="{{$detail ? $detail->TGL_EXPIRED : ''}}" />
                            </div>
                            <div class="col-md-6">
                            <h5>JADWAL REFILL</h5>
                              <input name="refill_date" type="date" class="form-control datetime" readonly value="{{$detail ? $detail->TGL_REFILL : ''}}" />
                            </div>
                          </div>
                          </div>
                        </fieldset>
                      
                      </div>
                    </div>
                  </div>
              </form>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">HISTORY PEMELIHARAAN APAR <button name="create_record" id="create_record" class="btn btn-info btn-sm btn-icon"><i class="la la-plus-circle"></i> TAMBAH DATA</button></h4> 
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
                  <div class="card-body">
                    <div class="row">
                      <table id="table-history" width="100%" class="table display nowrap table-striped table-bordered zero-configuration">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">TANGGAL PEMERIKSAAN</th>
                              <th class="text-center">PETUGAS PERIKSA</th>
                              <th class="text-center">STATUS KESELURUHAN</th>
                              <th class="text-center">RINCIAN</th>
                            </tr>
                          </thead>
                      </table>
                      <p></p>
                    
                    </div>
                    </div>

                    <div class="form-group">
                      <button class="btn btn-info btn-icon"><i class="la la-arrow-circle-left"></i> Back</button>
                      <button type="submit" class="btn btn-success btn-icon"><i class="la la-check-circle-o"></i> Submit</button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Input Mask end -->
           
      </div>
</div>

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
              
              <form id="form_history" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <table width="100%" class="table display nowrap table-striped table-bordered">
                  <theat>
                  <tr>
                    <td class="text-center">NO</td>
                    <td class="text-center">CHECKLIST</td>
                  </tr>
                  </theat>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_1" value="Y" class="custom-control-input" id="item01">
                        <label class="custom-control-label" for="item01">ADA DITEMPAT SESUAI LAYOUT</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_2" value="Y" class="custom-control-input" id="item02">
                        <label class="custom-control-label" for="item02">TERPASANG 120CM DARI LANTAI</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_3" value="Y" class="custom-control-input" id="item03">
                        <label class="custom-control-label" for="item03">MUDAH TERLIHAT / DIGUNAKAN</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_4" value="Y" class="custom-control-input" id="item04">
                        <label class="custom-control-label" for="item04">PETUNJUK PENGGUNAAN DAPAT DIBACA</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_5" value="Y" class="custom-control-input" id="item05">
                        <label class="custom-control-label" for="item05">SEGEL DALAM KONDISI BAIK</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_6" value="Y" class="custom-control-input" id="item06">
                        <label class="custom-control-label" for="item06">JARUM PETUNJUK BERADA PADA AREA HIJAU</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_7" value="Y" class="custom-control-input" id="item07">
                        <label class="custom-control-label" for="item07">SELANG MULUT PANCAR TIDAK TERSUMBAT</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_8" value="Y" class="custom-control-input" id="item08">
                        <label class="custom-control-label" for="item08">BOLAK-BALIK TABUNG AGAK SERBUK TIDAK BEKU</label>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                
                </table>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="companyName">CATATAN</label>
                      <input type="text" class="form-control" placeholder="CATATAN TAMBAHAN" name="NOTE">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="projectinput5">KONDISI KESELURUHAN</label>
                      <select name="STATUS_ALL" class="form-control">
                          <option value="none" selected="" disabled="">PILIH  STATUS</option>
                          <option value="BAIK">BAIK</option>
                          <option value="TIDAK_BAIK">TIDAK BAIK</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              
              <input type="hidden" class="form-control" value="{{$detail ? $detail->ID_APAR : ''}}" name="IDAPAR" readonly>
              <input type="hidden" class="form-control" value="{{ Auth::user()->username }}" name="CHECK_BY" readonly>
              <input type="hidden" class="form-control" value="{{ date('d-m-Y') }}" name="CHECK_AT" readonly>

              
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="action_button" id="action_button" value="Add" class="btn btn-outline-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<script type="text/javascript">

  $('#create_record').click(function(){
      $('.modal-title').text("NEW DATA");
      $('#store_image').html("");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#formModal').modal('show');
  });

$('#form_history').on('submit', function(event){
      event.preventDefault();
      
      $.ajax({
          url:"{{ route('add_history') }}",
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
              type_toast = 'success';
              $('#form_history')[0].reset();
              $('#formModal').modal('hide');
              $('#table-history').DataTable().ajax.reload();

              //setTimeout(function() {
                //window.location.href = '/sosialisasi/';
              //}, 1000);
            }
            //$('#form_result').html(html);
            if(type_toast == 'error'){
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            }
          }
    });
})
$(document).ready(function() {
var vtable = $('#table-history').DataTable({
    processing: true,
    serverSide: true,
    paging: false,
    scrollX: true,
    info: false,
    searching: false,
    order: [[ 2, 'asc' ]],
    ajax:{
     url: "{{ url('apar/list_history_apar/'. $detail->ID_APAR . '') }}",
          //url('master/get_userdata/') }}",
    },
    columns:[
      { data: null, searchable:false, orderable:false, className: "text-center"},
      {
      data: 'CHECK_AT',
      },
      {
      data: 'CHECK_BY',
      className: "text-left"
      },
      {
      data: 'STATUS_ALL',
      className: "text-center"
      },
      {
      data: 'STATUS_ALL',
      className: "text-left"
      }
    ]
   });
   
  vtable.on('draw.dt', function () {
     vtable.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
       cell.innerHTML = i + 1;
       });
  }).draw();
});
</script>
@endsection