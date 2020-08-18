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
          <div class="modal-dialog modal-lg" role="document">
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
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="companyName">CHECK AT</label>
                      <input type="text" class="form-control" value="{{ date('d-m-Y') }}" name="check_at" readonly>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="companyName">CHECK BY</label>
                      <input type="text" class="form-control" value="{{ Auth::user()->username }}" name="check_at" readonly>
                    </div>
                  </div>
                </div>
                <table width="100%" class="table display nowrap table-striped table-bordered zero-configuration">
                  <theat>
                  <tr>
                    <td class="text-center">NO</td>
                    <td class="text-center">URAIAN</td>
                    <td class="text-center">CHECKLIST</td>
                  </tr>
                  </theat>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td class="text-left">ADA DITEMPAT SESUAI LAYOUT</td>
                    <td>s</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td class="text-left">TERPASANG 120CM DARI LANTAI</td>
                    <td>s</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td class="text-left">MUDAH TERLIHAT / DIGUNAKAN</td>
                    <td>s</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td class="text-left">PETUNJUK PENGGUNAAN DAPAT DIBACA</td>
                    <td>s</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td class="text-left">SEGEL DALAM KONDISI BAIK</td>
                    <td>s</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td class="text-left">JARUM PETUNJUK BERADA PADA AREA HIJAU</td>
                    <td>s</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td class="text-left">SELANG MULUT PANCAR TIDAK TERSUMBAT</td>
                    <td>s</td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td class="text-left">BOLAK-BALIK TABUNG AGAK SERBUK TIDAK BEKU</td>
                    <td>s</td>
                  </tr>
                  </tbody>
                
                </table>
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
                <div class="form-group">
                  <label for="companyName">Sebutan Jabatan</label>
                    <input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">Unit</label>
                      <select id="unit_id" name="unit_id" class="form-control">
                        <option value="none" selected="" disabled="">Select Category</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput5">User Group</label>
                      
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

<script type="text/javascript">

  $('#create_record').click(function(){
      $('.modal-title').text("NEW DATA");
      $('#store_image').html("");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#formModal').modal('show');
  });


$(document).ready(function() {
    $('#table-history').DataTable( {
        "scrollX": true,
        "paging": false,
        "info": false,
        "searching": false
    } );
});

  $(document).ready(function() {
    $('select[name="idgedung"]').on('change', function(){
      var idgedung_ =   $(this).val();
      var token = '{{ csrf_token() }}';
   
        //var countryId = $(this).val();
        if(idgedung_) {
            $.ajax({
                url: "{{ url('apar/getLantaiByGedung/') }}/"+idgedung_,
                type:"GET",
                dataType:"json",
                data: {idgedung: idgedung_, _token: token},

                //beforeSend: function(){
                    //$('#loader').css("visibility", "visible");
                //},

                success:function(data) {

                    $('select[name="idlantai"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="idlantai"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                //complete: function(){
                    //$('#loader').css("visibility", "hidden");
                //}
            });
        } else {
            $('select[name="idlantai"]').empty();
        }

    });
  });


$('#form_menu').on('submit', function(event){
      event.preventDefault();
      
      $.ajax({
          url:"{{ route('sosialisasi_store') }}",
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
              $('#form_menu')[0].reset();
              setTimeout(function() {
                window.location.href = '/sosialisasi/';
              }, 1000);
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
</script>
@endsection