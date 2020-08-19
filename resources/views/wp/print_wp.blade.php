<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML><HEAD>
<TITLE>PRINT WORKING PERMIT</TITLE>
<style>
	/* ==== HANYA TAMPIL DI LAYAR TIDAK SAAT DICETAK ==== */
	@media screen
  { #divCetak { color:#ffffff } }
	
	@media print
  { #divCetak { display:none } }
	
	body { font-size:12px; font-family: "Trebuchet MS", sans-serif; margin: 0px; }

	h1,h2 { padding:0; margin:0; text-align:center } 
	h3 { padding:0; margin:0;} 
	h1 { font-size:20px; }
	h2 { font-size:18px; }
	h3 { font-size:14px; }
	
	td { vertical-align:top }
	
	hr {border:0px; border-top:1px solid #000000; padding:3px 0px; margin:0px}
	
	#header { padding:0px; width:100%; margin:1px auto 1px auto; }
	#header td {font-size:12px; vertical-align:middle }
	
	.tbl1 {text-align:left; width:100%; border:1px; border:1px solid black; ; border-bottom:2px solid black}
	.tbl1_n {width:100%; border:0; border:1px solid black; ; border-bottom:2px solid black}
	.tbl_sign {text-align:center; width:100%; border:0; border:1px solid black; ; border-bottom:2px solid black}
	.tbl1 .c1 { border:0; padding:3px 3px 3px 8px; width:130px; border-top:1px solid black}
	.tbl1 .c2 { border:0; padding:3px; width:20px; text-align:center; border-top:1px solid black }
	.tbl1 .c3 { border:0; padding:3px 3px 3px 8px; border-top:1px solid black }
	.tbl1 tr { border:1px; height:25px }
	
	.tbl2 { width:100%; border:1px solid black }
	.tbl2 tr { height:22px }
	.tbl2 th { border:0; border-bottom:1px solid black; font-size:12px; vertical-align:top;  }
	.tbl2 td { border-bottom:1px solid black; vertical-align:middle; font-size:12px }
	.tbl2 .c1 { border:0; border-bottom:1px solid black; }
	.tbl2 .c1, .tbl2 .c2 { vertical-align:top; padding: 0 3px; }
	.tbl2 .c1 { border-right:1px solid black; }
	.tbl2 .c2 {}
	
	#footer { font-style:italic; }
</style>
</HEAD>
<!--body onload="window.print(); window.close();"-->
<body>
<div id="divCetak">
	<table width=100% bgcolor=#800000>
		<tr>
			<td>
				dsdsds
			</td>
			<td align=right><button onclick="window.print()">Cetak Halaman Ini</button></td>
		</tr>
	</table>
</div>

<table class=tbl1_n cellpadding=2 cellspacing=2 border=0>
	<thead>
		<tr>
			<td rowspan="3" class="text-center" width="20%">
				<img width="60" src="../../../images/app_images/logo_pln.png" />
			</td>
			<td rowspan="3" class="text-left" width="20%">
				<h4>PT PLN (Persero) UNIT INDUK WILAYAH ACEH</h4>
				<h4>UP3 XXXXXX</h4>
				<p>JALAN XXXXX</p>
			</td>
			<td rowspan="3" class="text-center" width="20%"><h3>PROSEDUR SMK3</h3></td>
			<td rowspan="2" class="text-center" width="20%">NO DOKUMEN :</td>
			<td class="text-center" width="20%">HAL :</td>
      </tr>
	  <tr>
	  	<td class="text-center">FR.R.R.X.0.0 </td>
	  </tr>
	  <tr>
	  	<td class="text-center">TGL :</td>
	  	<td class="text-center">ED/REV : 00/00 </td>
	  </tr>
	</thead>
</table>
</br>
<table class=tbl1 cellpadding=3 cellspacing=0 border=1 style="width: 100%">
	<!-- <tr>
		<th colspan="12" style="text-align: center;">
		<h3>
			<b>JOB SAFETY ANALYSIS (JSA)</b>
		</h3>
		ANALISIS KESELAMATAN KERJA
		</th>
	</tr> -->
	<div class="card-content collapse show">
                  <div class="card-body">
                    <div class="row">

                    <div class="col-md-12" style="text-align:center;">
                      <h3 style="padding:25px 0 15px 0;">
                        <b>WORKING PERMIT</b>
                      </h3>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 80%">
                      <tr>
                        <td colspan="4" class="text-left"><strong>A. INFORMASI PEKERJAAN</strong></td>
                      </tr>
                      <tr>
                        <td>1. Tanggal Pengajuan</td>
                        <td colspan="3">: {{ $detailWp->tgl_pengajuan }}</td>
                      </tr>
                      <tr>
                        <td>2. Jenis Pekerjaan</td>
                        <td colspan="3">: {{ $detailWp->jenis_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>3. Detail Pekerjaan</td>
                        <td colspan="3">: {{ $detailWp->detail_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>4. Lokasi Pekerjaan</td>
                        <td colspan="3">: {{ $detailWp->lokasi_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>5. Perlu Pemadaman</td>
                        <td colspan="3">: {{ $detailWp->pemadaman }}</td>
                      </tr>
                      <tr>
                        <td>6. Perlu Grounding</td>
                        <td colspan="3">: {{ $detailWp->grounding }}</td>
                      </tr>
                      <tr>
                        <td>7. Peralatan yang perlu dipadamkan</td>
                        <td colspan="3">: {{ $detailWp->peralatan_dipadamkan }}</td>
                      </tr>
                      <tr>
                        <td>8. Pengawas Pekerjaan</td>
                        <td>: {{ $detailWp->pengawas_pekerjaan }}</td>
                        <td>No Telp</td>
                        <td>{{ $detailWp->no_pengawas_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>9. Pengawas K3L</td>
                        <td>: {{ $detailWp->pengawas_k3l }}</td>
                        <td>No Telp</td>
                        <td>{{ $detailWp->no_pengawas_k3 }}</td>
                      </tr>
                      </table>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 80%">
                      <tr>
                        <td colspan="5" class="text-left"><strong>B. DURASI PEKERJAAN</strong></td>
                      </tr>
                      <tr>
                        <td rowspan="2">Durasi Kerja</td>
                        <td>Tanggal Mulai : </td>
                        <td>{{ $detailWp->tgl_mulai }}</td>
                        <td>Jam Mulai : </td>
                        <td>{{ $detailWp->jam_mulai }}</td>
                      </tr>
                      <tr>
                        <td>Tanggal Selesai : </td>
                        <td>{{ $detailWp->tgl_selesai }}</td>
                        <td>Jam Selesai : </td>
                        <td>{{ $detailWp->jam_selesai }}</td>
                      </tr>
                      </table>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table class="table table-striped table-bordered" style="width: 100%">
                      <tr>
                        <td colspan="5" class="text-left"><strong>C. KLASIFIKASI PEKERJAAN</strong></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan LBS/Recloser/FDI', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan LBS/Recloser/FDI</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan kubikel 20KV', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan kubikel 20KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan Kubikel', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan Kubikel</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pengujian Relay Proteksi', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pengujian Relay Proteksi</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Penggantian Relay Proteksi', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Penggantian Relay Proteksi</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan Power Meter', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan Power Meter</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan KWH Meter', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan KWH Meter</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan RTU GH/GI', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan RTU GH/GI</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan Catu Daya', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan Catu Daya</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan Radio Komunikasi', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan Radio Komunikasi</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan Radio Komunikasi', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan Radio Komunikasi</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Sipil', $klasifikasi) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Sipil</label>
                          </div>
                        </td>
                      </tr>
                  
                      </table>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table class="table table-striped table-bordered" style="width: 100%">
                      <tr>
                        <td colspan="3" class="text-left"><strong>D. PROSEDUR PEKERJAAN YANG TELAH DIJELASKAN KEPADA PEKERJA</strong></td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan dan Penggantian Cubicle 20 KV', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan dan Penggantian Cubicle 20 KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan Cubicle Gardu Hub', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan Cubicle Gardu Hubung 20 KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan LBS dan Recloser', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan LBS dan Recloser</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan RTU dan Peripheral', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan RTU dan Peripheral</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pengujian Control Scada', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pengujian Control Scada</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemeliharaan Repeater Komunikasi', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemeliharaan Repeater Komunikasi</label>
                          </div>
                        </td>

                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Perluasan Gardu Hubung 20 KV', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Perluasan Gardu Hubung 20 KV</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pengujian Alat', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pengujian Alat</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                            <input type="checkbox" name="agenda2" class="custom-control-input" id="item21" {{in_array('Pemasangan Proteksi', $prosedur) ? "checked" : ""}}>
                            <label class="custom-control-label" for="item21">Pemasangan Proteksi</label>
                          </div>
                        </td>
                      </tr>
                      
                      </table>
                    </div>

                    </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
          <br></br>
          <table class="tbl_sign" cellpadding=2 cellspacing=2 border=0>
	<thead>
		<tr>
			<td class="text-center" width="20%">
				<strong>DISETUJUI OLEH :</strong>
			</td>
			<td class="text-center" width="20%">
				<strong>DIPERIKSA OLEH :</strong>
			</td>
			<td class="text-center" width="20%">
				<strong>DIPERIKSA OLEH :</strong>
			</td>
			<td class="text-center" width="20%">
				<strong>DISUSUN OLEH :</strong>
			</td>
      </tr>
	  <tr>
	  	<td>
			{!! QrCode::size(60)->generate('Manager :' . strtoupper($detailWp->manager) . '; Date :' . $detailWp->tgl_approval1 ) !!}
		</td>
		<td>
			{!! QrCode::size(60)->generate('Pejabat K3L :' . strtoupper($detailWp->pejabat_k3l) . '; Date :' . $detailWp->tgl_approval2 ) !!}
		</td>
		<td>
			{!! QrCode::size(60)->generate('Supervisor :' . strtoupper($detailWp->supervisor) . '; Date :' . $detailWp->tgl_approval3 ) !!}
		</td>
		<td>
			{!! QrCode::size(60)->generate('Pengawas :' . strtoupper($detailWp->pengawas_pekerjaan) . '; Date :' . $detailWp->tgl_pengajuan ) !!}
		</td>
	  </tr>
	  <tr>
	  	<td class="text-center"><strong>( {{ strtoupper($detailWp->manager) }} )</strong></td>
	  	<td class="text-center"><strong>( {{ strtoupper($detailWp->pejabat_k3l) }} )</strong></td>
	  	<td class="text-center"><strong>( {{ strtoupper($detailWp->supervisor) }} )</strong></td>
	  	<td class="text-center"><strong>( {{ strtoupper($detailWp->pengawas_pekerjaan) }} )</strong></td>
	  </tr>
	  <tr>
	  	<td class="text-center"><small>MANAGER BAGIAN</small></td>
	  	<td class="text-center"><small>PEJABAT K3</small></td>
	  	<td class="text-center"><small>SUPERVISOR</small></td>
	  	<td class="text-center"><small>PENGAWAS PEKERJAAN</small></td>
	  </tr>
	</thead>
</table>

<div id="footer">
	Tanggal cetak: <b><?php echo date("d F Y h:i:s"); ?></b> | 
</div>
</body>
</html>