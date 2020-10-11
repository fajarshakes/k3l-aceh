@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'CAREER PAGE')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Manualbook </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active"> Manualbook
                </li>
              </ol>
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
                  <h4 class="card-title">Manualbook </h4>
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
                <div class="col-xl-12 col-lg-12">
                <table width="100%" id="table1" class="table display nowrap table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th width="5%" class="text-center">#</th>
                          <th width="80%" class="text-center">Nama File</th>
                          <th width="15%" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                        <tr>
                          <td>1</td>
                          <td>MANUALBOOK WORKING PERMIT</td>
                          <td align="center">
                            <a type="button" target="_blank" href="{{ url('app_files/manualbook/MANUAL_WP_V1.pdf') }}" data-toggle="tooltip" data-original-title="Download File" class="btn text-white btn-icon btn-info btn-xs"><i class="la la-cloud-download"></i> DOWNLOAD</a>
                          </td>
                        </tr>

                        <tr>
                          <td>2</td>
                          <td>MANUALBOOK PETA SOSIALISASI</td>
                          <td align="center">
                            <a type="button" target="_blank" href="{{ url('app_files/manualbook/MANUAL_SOSIALISASI_V1.pdf') }}" data-toggle="tooltip" data-original-title="Download File" class="btn text-white btn-icon btn-info btn-xs"><i class="la la-cloud-download"></i> DOWNLOAD</a>
                          </td>
                        </tr>

                        <tr>
                          <td>3</td>
                          <td>MANUALBOOK PETA APAR</td>
                          <td align="center">
                            <a type="button" target="_blank" href="{{ url('app_files/manualbook/MANUAL_APAR_V1.pdf') }}" data-toggle="tooltip" data-original-title="Download File" class="btn text-white btn-icon btn-info btn-xs"><i class="la la-cloud-download"></i> DOWNLOAD</a>
                          </td>
                        </tr>
                        
                      </tbody>
                      <tfoot>
                          <th class="text-center">#</th>
                          <th class="text-center">Nama File</th>
                          <th class="text-center">Action</th>
                      </tfoot>
                    </table>
            </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ Zero configuration table -->
    
      </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    $('#table1').DataTable( {
        //"scrollX": true,
        "searching" : false,
        "info" : false,
        "paging" : false
    } );
} );

</script>
@endsection