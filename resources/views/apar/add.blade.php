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
                <li class="breadcrumb-item active"><a href="#">Add Apar</a>
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
              <button onclick="location.href='/apar'" class="dropdown-item"><i class="la la-chevron-circle-left"></i> Kembali</button>
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
                  <h4 class="card-title">PENAMBAHAN LOKASI APAR</h4>
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
                <form id="form_menu" method="post" enctype="multipart/form-data">
                @csrf  
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>PILIH GEDUNG
                          </h5>
                          <div class="form-group">
                            <select id="idgedung" name="idgedung" class="form-control">
                              <option value="none" selected="" disabled="">PILIH GEDUNG</option>
                              @foreach($list_unit as $list)
                                <option value="{{ $list->ID_GEDUNG }}">{{ $list->ID_GEDUNG .' - '. $list->NAMA_GEDUNG }}</option>
                              @endforeach
                            </select>
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>PILIH LANTAI</h5>
                          <div class="form-group">
                            <select id="idlantai" name="idlantai" class="custom-select form-control">
                              @if (!empty($group_id))
                                  <option value="{{ $group_id }}">{{ $group_name }}</option>
                              @endif
                            </select>
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>LOKASI APAR
                            <small class="text-muted">Detail Lokasi</small>
                          </h5>
                          <div class="form-group">
                            <input name="lokasi" type="text" class="form-control" placeholder="ex : BIDANG KEUANGAN, RUANG ARSIP"
                            />
                          </div>
                        </fieldset>
                        <fieldset>
                          <h5>NO URUT</h5>
                          <div class="form-group">
                            <input name="no_urut" type="text" class="form-control" placeholder="NO URUT APAR"
                            />
                          </div>
                        </fieldset>

                      </div>

                      <div class="col-xl-6 col-lg-12">
                        
                        <fieldset>
                          <h5>MERK APAR
                          </h5>
                          <div class="form-group">
                            <input name="merk" type="text" class="form-control" placeholder="MERK APAR"
                            />
                          </div>
                        </fieldset>

                        <fieldset>
                          <h5>TYPE APAR
                          </h5>
                          <div class="form-group">
                            <input name="type" type="text" class="form-control" placeholder="TYPE APAR"
                            />
                          </div>
                        </fieldset>
                        
                        <fieldset>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                            <h5>KAPASITAS (KG)</h5>
                                <input type="number" name="kapasitas" class="form-control" />
                            </div>
                            <div class="col-md-6">
                            <h5>MEDIA</h5>
                                <select name="media" class="form-control">
                                  <option value="none" selected="" disabled="">PILIH MEDIA</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="ABC">ABC</option>
                              </select>
                            </div>
                          </div>
                          </div>
                        </fieldset>

                        <fieldset>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                            <h5>TANGGAL EXPIRED</h5>
                              <input name="exp_date"  type="date" class="form-control datetime" />
                            </div>
                            <div class="col-md-6">
                            <h5>JADWAL REFILL</h5>
                              <input name="refill_date"  type="date" class="form-control datetime" />
                            </div>
                          </div>
                          </div>
                        </fieldset>

                        <fieldset>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                            <h5>JADWAL HAR
                              <small class="text-muted">RUTIN TRIWULANAN</small>
                            </h5>
                              <input name="har_date"  type="date" class="form-control datetime" />
                            </div>
                          </div>
                          </div>
                        </fieldset>
                      
                      </div>
                    </div>

                    <div class="form-group">
                      <a href="javascript:history.back()"  class="btn btn-info btn-icon"><i class="la la-arrow-circle-left"></i> Back</a>
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
           
      <div id="loading"></div>
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


$('#form_menu').on('submit', function(event){
      event.preventDefault();
      
      $.ajax({
          url:"{{ route('add_store') }}",
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
                window.location.href = '/apar/';
              }, 1000);
            }
            //$('#form_result').html(html);
            if(type_toast == 'error'){
              $('#loading').html('');
              toastr.error(html, 'Error !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            } else if (type_toast == 'success') {
              toastr.success(html, 'Success !', {"showMethod": "slideDown", "hideMethod": "slideUp", "progressBar": true, timeOut: 2000});
            }
          }
    });
})
</script>
@endsection