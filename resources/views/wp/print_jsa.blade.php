<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML><HEAD>
<TITLE>PRINT JSA</TITLE>
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
	<div class="col-md-12" style="text-align:center;">
                      <h3 style="padding:25px 0 15px 0;">
                        <b>JOB SAFETY ANALYSIS (JSA)</b>
                        </br>
                        <small class="text-muted">ANALISIS KESELAMATAN KERJA</small>
                      </h3>
                    </div>

                    <div class="col-md-12">
                      <h5 style="padding-bottom:5px;">
                        <b>A. INFORMASI PEKERJAAN</b>
                      </h5>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 80%">
                      <tr>
                        <td width="2%">1</td>
                        <td>Tanggal</td>
                        <td width="1%">:</td>
                        <td colspan="3">{{ $detailWp->tgl_mulai }}</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Jenis Pekerjaan</td>
                        <td>:</td>
                        <td colspan="3">SIPIL</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Lokasi</td>
                        <td>:</td>
                        <td colspan="3">{{ $detailWp->lokasi_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Perusahaan Pelaksana</td>
                        <td>:</td>
                        <td colspan="3">{{ $detailWp->pelaksana }}</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Pengawas Pekerjaan</td>
                        <td>:</td>
                        <td colspan="3">{{ $detailWp->pengawas_pekerjaan }}</td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>Nama Pelaksana Pekerjaan</td>
                        <td>:</td>
                        <td>Nama Lengkap</td>
                        <td>NIP / NIK</td>
                      </tr>
                      <tbody>
                      @foreach($pelaksana_kerja as $pelaksana)
                        <tr>
                          <td colspan="3"></td>
                          <td>{{ $pelaksana->nama_pelaksana }}</td>
                          <td>{{ $pelaksana->personal_no }}</td>
                        </tr>
                      @endforeach
                      </tbody>
                      </table>
                    </div>
<br></br>

<div class="col-xl-12 col-lg-12">
<table id="tbl_hazard" class="table table-striped table-bordered" style="width: 80%">
<td>B. Pelaksana Pekerjaan</td>
<td>Nama</td>
<td>Tanda Tangan</td>
@foreach( $pelaksana_kerja as $pel_kerja)
<tr>
	  	<td></td>
	  	<td class="text-center"><small>{{$pel_kerja->nama_pelaksana}}</small></td>
	  	<td class="text-center"><small>{!! QrCode::size(60)->generate('PELAKSANA :' . strtoupper($pel_kerja->nama_pelaksana) . '; JABATAN :' .$pel_kerja->jabatan_pelaksana ) !!}</small></td>
	  </tr>
	  @endforeach

</table>
                    </div>

					<br></br>

					<div class="col-md-12">
                      <h5 style="padding-bottom:5px;">
                        <b>B. PERALATAN KESELAMATAN</b>
                      </h5>
                    </div>

                    <div class="col-xl-12 col-lg-12">
                      <table id="tbl_hazard" class="table table-striped table-bordered" style="width: 80%">
                      <tr>
                        <td colspan="3" class="text-left">1. ALAT PELINDUNG DIRI</td>
                      </tr>
                      @foreach($mperalatan as $mper)
                      @php
                        $i = 'true';
                      @endphp
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                          @foreach($peralatan as $per)
                          @if($mper == $per->description)
                            <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mper }}" checked>
                            {{ $mper }} 
                            @php
                              $i = 'false';
                            @endphp
                          @endif
                          @endforeach

                          @if($i == 'true')
                          <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mper }}">
                          {{ $mper }} 
                          @endif
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="3" class="text-left">2. PERLENGKAPAN KESELAMATAN & DARURAT</td>
                      </tr>
                      @foreach($mkesalamatan as $mkes)
                      @php
                        $i = 'true';
                      @endphp
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                          @foreach($peralatan as $per)
                          @if($mkes == $per->description)
                            <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mkes }}" checked>
                            {{ $mkes }} 
                            @php
                              $i = 'false';
                            @endphp
                          @endif
                          @endforeach

                          @if($i == 'true')
                          <input type="checkbox" id="item25" name="peralatan[]" class="custom-control-label" value = "{{ $mkes }}">
                          {{ $mkes }} 
                          @endif
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      
                      </table>
                    </div>

<div id="footer">
	Tanggal cetak: <b><?php echo date("d F Y h:i:s"); ?></b> | 
</div>
</body>
</html>