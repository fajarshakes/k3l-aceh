@extends('layouts' . config('view.theme') . '.backend')
@section('pagetitle', 'MONITORING ANGGARAN INVESTASI')
@section('content')

<div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Revenue, Hit Rate & Deals -->
        <div class="row">
          <div class="col-xl-6 col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">.</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body pt-0">
                  <iframe width="490" height="390" src="https://www.youtube.com/embed/hf6zoUOQq2w?list=PLrWpVAgJjrg2YInviHI133lburxsy6BtV" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-12">
          <div class="row">
              <div class="col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h6 class="text-muted">Dalam Permohonan </h6>
                          <h3>{{ $countPermohonan }}</h3>
                        </div>
                        <div class="align-self-center">
                          <i class="icon-fire info font-large-2 float-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h6 class="text-muted">Dalam Pengerjaan </h6>
                          <h3>{{ $countPengerjaan }}</h3>
                        </div>
                        <div class="align-self-center">
                          <i class="icon-rocket success font-large-2 float-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-header bg-hexagons">
                    <h4 class="card-title">Hit Rate
                      <span class="danger">-12%</span>
                    </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                      <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-content collapse show bg-hexagons">
                    <div class="card-body pt-0">
                      <div class="chartjs">
                        <canvas id="hit-rate-doughnut" height="275"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content collapse show bg-gradient-directional-danger ">
                    <div class="card-body bg-hexagons-danger">
                      <h4 class="card-title white">Deals
                        <span class="white">-55%</span>
                        <span class="float-right">
                          <span class="white">152</span>
                          <span class="red lighten-4">/200</span>
                        </span>
                      </h4>
                      <div class="chartjs">
                        <canvas id="deals-doughnut" height="275"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!--/ Revenue, Hit Rate & Deals -->
        <!-- Emails Products & Avg Deals -->
        <!--div class="row">
          <div class="col-12 col-md-3">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Emails</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body pt-0">
                  <p>Open rate
                    <span class="float-right text-bold-600">89%</span>
                  </p>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 80%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="pt-1">Sent
                    <span class="float-right">
                      <span class="text-bold-600">310</span>/500</span>
                  </p>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 48%"
                    aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-3">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Penyerapan Terbaik</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a href="#">Show all</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table mb-0">
                      <tbody>
                        <tr>
                          <th scope="row" class="border-top-0">T. SIPIL</th>
                          <td class="border-top-0">2245</td>
                        </tr>
                        <tr>
                          <th scope="row">T. ELEKTRO</th>
                          <td>1850</td>
                        </tr>
                        <tr>
                          <th scope="row">T. KIMIA</th>
                          <td>1550</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-center">Average Deal Size</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-md-6 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                      <h6 class="danger text-bold-600">-30%</h6>
                      <h4 class="font-large-2 text-bold-400">$12,536</h4>
                      <p class="blue-grey lighten-2 mb-0">Per rep</p>
                    </div>
                    <div class="col-md-6 col-12 text-center">
                      <h6 class="success text-bold-600">12%</h6>
                      <h4 class="font-large-2 text-bold-400">$18,548</h4>
                      <p class="blue-grey lighten-2 mb-0">Per team</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div!-->
        <!--/ Emails Products & Avg Deals -->
        <!-- Total earning & Recent Sales  -->
        <div class="row">
          <div class="col-12 col-md-4">
            <div class="card">
              <div class="card-content">
                <div class="earning-chart position-relative">
                  <div class="chart-title position-absolute mt-2 ml-2">
                    <h1 class="display-4">Rp. 1,596</h1>
                    <span class="text-muted">Total Realisasi Anggaran (x1000)</span>
                  </div>
                  <canvas id="earning-chart" class="height-450"></canvas>
                  <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3">
                    <a href="#" class="btn round btn-danger mr-1 btn-glow">Statistics <i class="ft-bar-chart"></i></a>
                    <span class="text-muted">for the <a href="#" class="danger darken-2">last year.</a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="recent-sales" class="col-12 col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Working Permit dalam Pengerjaan</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                      href="wp/list-permit" target="_blank">View all</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content mt-1">
                <div class="table-responsive">
                  <table id="recent-orders" class="table table-hover table-xl mb-0">
                    <thead>
                      <tr>
                        <th class="border-top-0">Unit</th>
                        <th class="border-top-0">Nama Pekerjaan</th>
                        <th class="border-top-0">Tanggal Mulai</th>
                        <th class="border-top-0">Progress</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($getList as $list)
                      <tr>
                        <td class="text-truncate">{{ $list->UNIT_NAME }}</td>
                        <td class="text-truncate">{{ $list->nama_pekerjaan }}</td>
                        
                        <td>
                          <button type="button" class="btn btn-sm btn-outline-danger round">{{ $list->tgl_mulai }}</button>
                        </td>

                        <td>
                          <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 50%"
                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Total earning & Recent Sales  -->
        <!-- Analytics map based session -->
        <div class="row">
          <div class="col-12">
            <div class="card box-shadow-0">
              <div class="card-content">
                <div class="row">
                  <div class="col-md-9 col-12">
                    <div id="geoloc5"></div>
                    <div id="fixedMapCont" class="height-450"></div>
                    <input id="geolat" type="text" value="" size="20"  class="form-control"/>
                    <br>
                    <input id="geolng" type="text" value="" size="20"  class="form-control"/>
                  </div>
                  <div class="col-md-3 col-12">
                    <div class="card-body text-center">
                      <h4 class="card-title mb-0">Visitors Sessions</h4>
                      <div class="row">
                        <div class="col-12">
                          <p class="pb-1">Sessions by Browser</p>
                          <div id="sessions-browser-donut-chart" class="height-200"></div>
                        </div>
                        <div class="col-12">
                          <div class="sales pr-2 pt-2">
                            <div class="sales-today mb-2">
                              <p class="m-0">Today's
                                <span class="success float-right"><i class="ft-arrow-up success"></i> 6.89%</span>
                              </p>
                              <div class="progress progress-sm mt-1 mb-0">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="sales-yesterday">
                              <p class="m-0">Yesterday's
                                <span class="danger float-right"><i class="ft-arrow-down danger"></i> 4.18%</span>
                              </p>
                              <div class="progress progress-sm mt-1 mb-0">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Analytics map based session -->
      </div>
    </div>


    <!-- Modal Popup Login-->
    <div class="modal fade text-left" id="filter_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-danger white">
                <h4 class="modal-title white" id="myModalLabel11">Warning . !</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form action="#">
              @csrf
              <div class="modal-body">

              <div class="card-content">
                  <div class="card-body text-center">
                    
                    <div class="loader-wrapper">
                      <div class="loader-container">
                        <div class="line-scale loader-warning">
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                        </div>
                      </div>
                    </div>

                    <p class="bg-red text-white">Perhatian . !</p>
                    <p>Seluruh <i>content</i> pada aplikasi ini masih bersifat <i>prototype</i>. Data unit, tampilan, bentuk form, logo, grafik, dan bentuk pelaporan akan disesuaikan sesuai dengan kebutuhan.
                    Tampilan dan data saat ini hanya untuk kebutuhan <i>demo</i>.
                    </p>

                  </div>
                </div>


              </div>
              
              <div class="modal-footer">
                <button class="btn btn-danger btn-icon" data-dismiss="modal"><i class="la la-check-circle-o"></i> Oke, Saya mengerti.</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<script>

$('#geoloc5').leafletLocationPicker({
		alwaysOpen: true,
		mapContainer: "#fixedMapCont"
}).on('changeLocation', function(e) {
	$(this)
	.siblings('#geolat').val( e.latlng.lat )
	.siblings('#geolng').val( e.latlng.lng )
	.siblings('#address').text('"'+e.location+'"');
console.log(e.location);
});
</script>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#filter_modal').modal('sshow');
    });
</script>
    
@endsection