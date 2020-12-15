@extends('layouts' . config('view.theme') . '.backend_public')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">List Apar </h3>
        </div>
        {{--
        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
              <button onclick="location.href='/apar'" class="dropdown-item"><i class="la la-chevron-circle-left"></i> Kembali</button>
            </div>
          </div>
        </div>
        --}}
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

                <div class="card collapse-icon accordion-icon-rotate">
                <div id="headingCollapse61" class="card-header border-success">
                  <a data-toggle="collapse" href="#collapse61" aria-expanded="true" aria-controls="collapse61"
                  class="card-title lead success"><i class="la la-fire-extinguisher"></i> INFORMASI APAR</a>
                </div>
                <div id="collapse61" role="tabpanel" aria-labelledby="headingCollapse61" class="card-collapse collapse show border-success"
                aria-expanded="true">
                  <div class="card-content">
                    <div class="card-body">
                      
                    <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                            <h5>NO URUT</h5>
                              <input name="no_urut" type="text" class="form-control datetime" readonly value="{{$detail ? $detail->NO_URUT : ''}}" />
                            </div>
                            <div class="col-md-6">
                            <h5>ID APAR</h5>
                              <input type="text" class="form-control datetime" readonly value="{{$detail ? $detail->ID_APAR : ''}}" />
                            </div>
                          </div>
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
                            <h5>KAPASITAS (KG)</h5>
                                <input name="kapasitas" class="form-control" readonly value="{{$detail ? $detail->KAPASITAS : ''}} KG"/>
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
                              <input type="date" class="form-control datetime" readonly value="{{$detail ? $detail->TGL_REFILL : ''}}" />
                            </div>
                          </div>
                          </div>
                        </fieldset>
                      
                      </div>
                    </div>

                    </div>
                  </div>
                </div>
                <div id="headingCollapse62" class="card-header mt-1 border-danger">
                  <a data-toggle="collapse" href="#collapse62" aria-expanded="false" aria-controls="collapse62"
                  class="card-title lead danger collapsed"><i class="la la-qrcode"></i> QR CODE & FOTO </a>
                </div>
                <div id="collapse62" role="tabpanel" aria-labelledby="headingCollapse62" class="border-danger no-border-top card-collapse collapse"
                aria-expanded="false">
                  <div class="card-content">
                    <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>FOTO APAR</h5>
                          <div class="form-group">
                            <img src="{{ url('files/apar') }}/{{ $detail ? $detail->FILE_FOTO : '' }}" alt="Holi" class="rounded img-fluid float-left mr-2 mb-1" width="400" height="300" data-action="zoom">
                          </div>
                        </fieldset>
                      </div>
                    </div>

                    </div>
                  </div>
                </div>

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
                  <h4 class="card-title">HISTORY PEMELIHARAAN APAR</h4> 
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
                              <th class="text-center">TANGGAL HAR</th>
                              <th class="text-center">NEXT HAR</th>
                              <th class="text-center">PETUGAS HAR</th>
                              <th class="text-center">STATUS KESELURUHAN</th>
                              <th class="text-center">ACTION</th>
                            </tr>
                          </thead>
                      </table>
                    
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
      <div class="modal fade text-left" id="formDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-success white">
                <h4 class="modal-title white" id="myModalLabel11">Add Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form id="form" method="post" enctype="multipart/form-data">
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
                        <input type="checkbox" name="URAIAN_1" value="Y" class="custom-control-input" id="uraian_1" disabled >
                        <label class="custom-control-label" for="uraian_1">ADA DITEMPAT SESUAI LAYOUT</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_2" value="Y" class="custom-control-input" id="uraian_2" disabled>
                        <label class="custom-control-label" for="uraian_2">TERPASANG 120CM DARI LANTAI</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_3" value="Y" class="custom-control-input" id="uraian_3" disabled>
                        <label class="custom-control-label" for="uraian_3">MUDAH TERLIHAT / DIGUNAKAN</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_4" value="Y" class="custom-control-input" id="uraian_4" disabled>
                        <label class="custom-control-label" for="uraian_4">PETUNJUK PENGGUNAAN DAPAT DIBACA</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_5" value="Y" class="custom-control-input" id="uraian_5" disabled>
                        <label class="custom-control-label" for="uraian_5">SEGEL DALAM KONDISI BAIK</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_6" value="Y" class="custom-control-input" id="uraian_6" disabled>
                        <label class="custom-control-label" for="uraian_6">JARUM PETUNJUK BERADA PADA AREA HIJAU</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_7" value="Y" class="custom-control-input" id="uraian_7" disabled>
                        <label class="custom-control-label" for="uraian_7">SELANG MULUT PANCAR TIDAK TERSUMBAT</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>
                      <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                        <input type="checkbox" name="URAIAN_8" value="Y" class="custom-control-input" id="uraian_8" disabled>
                        <label class="custom-control-label" for="uraian_8">BOLAK-BALIK TABUNG AGAK SERBUK TIDAK BEKU</label>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                
                </table>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="companyName">CATATAN</label>
                      <input type="text" id="note" class="form-control" placeholder="CATATAN TAMBAHAN" name="NOTE" readonly>
                    </div>
                  </div>
                </div>

              </div>
              
              {{--
              <div class="modal-footer">
                <button type="button" name="close" id="close" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
              </div>
              --}}
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
     url: "{{ url('apar/view_history_apar/'. $detail->ID_APAR . '') }}",
          //url('master/get_userdata/') }}",
    },
    columns:[
      { data: null, searchable:false, orderable:false, className: "text-center"},
      {
      data: 'CHECK_AT',
      className: "text-center"
      },
      {
      data: 'CHECK_DEADLINE',
      className: "text-center"
      },
      {
      data: 'CHECK_BY',
      className: "text-center"
      },
      {
      data: 'STATUS_ALL',
      className: "text-center"
      },
      {
      "data": null,
      "searchable": false,
      "orderable": false,
      className: "text-center",
      "render": function (data, type, full, meta) {
        return `<button id="${full.ID}" class="view btn btn-sm btn-success btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Approve" > <i class="la la-check-circle"></i></button>`;
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


$(document).on('click', '.view', function(){
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
        type : "GET",
        url: "{{ url('apar/view_detail_history/') }}",
        dataType:"json",
        data:{id:id},
        success: function(html) {
          $("#uraian_1").prop('checked', html.data[0].URAIAN_1);
          $("#uraian_2").prop('checked', html.data[0].URAIAN_2);
          $("#uraian_3").prop('checked', html.data[0].URAIAN_3);
          $("#uraian_4").prop('checked', html.data[0].URAIAN_4);
          $("#uraian_5").prop('checked', html.data[0].URAIAN_5);
          $("#uraian_6").prop('checked', html.data[0].URAIAN_6);
          $("#uraian_7").prop('checked', html.data[0].URAIAN_7);
          $("#uraian_8").prop('checked', html.data[0].URAIAN_8);
          $('#note').val(html.data[0].NOTE);
          $('.modal-title').text("DETAIL PEMELIHARAAN");
          $('#action_button').val("Edit");
          $('#action').val("Edit");
          $('#formDetail').modal('show');
        },error: function (jqXhr, textStatus, errorMessage) { // error callback 
					$('p').append('Error: ' + errorMessage);
				}
      })
    });


</script>
@endsection