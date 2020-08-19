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
                <form id="form_mesnu" action="/apar/update_apar" method="post" enctype="multipart/form-data">
                @csrf  
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                            <h5>NO URUT</h5>
                              <input name="no_urut" type="text" class="form-control datetime" required value="{{$detail ? $detail->NO_URUT : ''}}" />
                            </div>
                            <div class="col-md-6">
                            <h5>ID APAR</h5>
                              <input type="text" name="id_apar" class="form-control datetime" readonly value="{{$detail ? $detail->ID_APAR : ''}}" />
                            </div>
                          </div>
                          </div>
                        </fieldset>

                        <fieldset>
                          <h5>PILIH GEDUNG
                          </h5>
                          <div class="form-group">
                            <select id="idgedung" name="idgedung" class="form-control">
                              <option value="none" disabled="">PILIH GEDUNG</option>
                              @foreach($list_unit as $list)
                                <option value="{{ $list->ID_GEDUNG }}"  {{ $detail->ID_GEDUNG == $list->ID_GEDUNG }} ? 'selected' : '' }}>{{ $list->ID_GEDUNG .' - '. $list->NAMA_GEDUNG }}</option>
                              @endforeach
                            </select>
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>PILIH LANTAI</h5>
                          <div class="form-group">
                            <select id="idlantai" name="idlantai" class="custom-select form-control">
                              @if (!empty($detail->ID_LANTAI))
                                  <option value="{{ $detail->ID_LANTAI }}" selected >{{ $detail->NAMA_LANTAI }}</option>
                              @endif
                            </select>
                          </div>
                        </fieldset>
                      
                        <fieldset>
                          <h5>LOKASI APAR
                            <small class="text-muted">Detail Lokasi</small>
                          </h5>
                          <div class="form-group">
                            <input name="lokasi" type="text" class="form-control" placeholder="ex : BIDANG KEUANGAN, RUANG ARSIP" required value="{{$detail ? $detail->LOKASI_APAR : ''}}"
                            />
                          </div>
                        </fieldset>

                      </div>

                      <div class="col-xl-6 col-lg-12">
                        
                        <fieldset>
                          <h5>MERK APAR
                          </h5>
                          <div class="form-group">
                            <input name="merk" type="text" class="form-control" placeholder="MERK APAR" required value="{{$detail ? $detail->MERK : ''}}"
                            />
                          </div>
                        </fieldset>

                        <fieldset>
                          <h5>TYPE APAR
                          </h5>
                          <div class="form-group">
                            <input name="type" type="text" class="form-control" placeholder="TYPE APAR" required value="{{$detail ? $detail->TYPE : ''}}"
                            />
                          </div>
                        </fieldset>
                        
                        <fieldset>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                            <h5>KAPASITAS</h5>
                                <input name="kapasitas" class="form-control" required value="{{$detail ? $detail->KAPASITAS : ''}}"/>
                            </div>
                            <div class="col-md-6">
                            <h5>MEDIA</h5>
                                <input name="media" class="form-control" required value="{{$detail ? $detail->MEDIA : ''}}">
                            </div>
                          </div>
                          </div>
                        </fieldset>

                        <fieldset>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                            <h5>TANGGAL EXPIRED</h5>
                              <input name="exp_date" type="date" class="form-control datetime" required value="{{$detail ? $detail->TGL_EXPIRED : ''}}" />
                            </div>
                            <div class="col-md-6">
                            <h5>JADWAL REFILL</h5>
                              <input name="refill_date" type="date" class="form-control datetime" required value="{{$detail ? $detail->TGL_REFILL : ''}}" />
                            </div>
                          </div>
                          </div>
                        </fieldset>

                        <fieldset>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                            <h5>JADWAL PEMLIHARAAN
                            </br>
                              <small class="text-muted">RUTIN TRIWULANAN</small>
                            </h5>
                              <input name="har_date" type="date" class="form-control datetime" required value="{{$detail ? $detail->JADWAL_HAR : ''}}"/>
                            </div>
                          </div>
                          </div>
                        </fieldset>
                      
                      </div>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-info btn-icon"><i class="la la-arrow-circle-left"></i> Back</button>
                      <button type="submit" class="btn btn-success btn-icon"><i class="la la-check-circle-o"></i> Submit</button>
                      </form>
                      <a class="delete btn btn-danger btn-icon white"><i class="la la-trash-o white"></i> Delete</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Input Mask end -->
           
      </div>
</div>

<div class="modal fade text-left" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-danger white">
                <h4 class="modal-title white" id="myModalLabel11">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="form_delete" method="post" action="/apar/delete_apar">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="companyName">HAPUS DATA APAR</label>
                  <input type="text" id="nama_apar" class="form-control" readonly/>
                </div>
                <h5 class="text-center" style="margin:0;">Are you sure you want to remove this data?</h5>
                <input type="hidden" name="ID" id="id" />
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger btn-icon"><i class="la la-check-circle-o"></i> Yes, Delete</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<script type="text/javascript">
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

  $(document).on('click', '.delete', function(){
  //$('#create_record').click(function(){
      $('.modal-title').text("DELETE DATA");
      $('#store_image').html("");
      $('#nama_apar').val("{{$detail ? $detail->LOKASI_APAR : ''}}");
      $('#id').val("{{$detail ? $detail->ID_APAR : ''}}");
      $('#action').val("Add");
      $('#del_modal').modal('show');
  });

</script>
@endsection