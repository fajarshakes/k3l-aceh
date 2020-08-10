<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML><HEAD>
<TITLE>PRINT HIRARC</TITLE>
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
	<tr>
		<th colspan="12" style="text-align: center;">
		<h3>
			<b>HAZARD IDENTIFICATION, RISK ASSESSMENT AND RISK CONTROL (HIRARC)</b>
		</h3>
		IDENTIFIKASI BAHAYA, PENILAIAN, DAN PENGENDALIAN RESIKO (IBPPR)
		</th>
	</tr>
	<tr>
		<th rowspan="2" width="15%" style="text-align: center; vertical-align: middle;">Kegiatan</th>
		<th rowspan="2" width="15%"  style="text-align: center; vertical-align: middle;">Potensi Bahaya</th>
		<th rowspan="2" style="text-align: center; vertical-align: middle;">Resiko</th>
		<th colspan="3" style="text-align: center;">Penilaian Resiko</th>
		<th rowspan="2" style="text-align: center; vertical-align: middle;">Pengendalian Resiko</th>
		<th colspan="3" style="text-align: center;">Pengendalian Resiko</th>
		<th rowspan="2" style="text-align: center; vertical-align: middle;">Status Pengendalian</th>
		<th rowspan="2" style="text-align: center; vertical-align: middle;">Penanggung Jawab</th>
	</tr>
	<tr>
		<th style="text-align: center;">Konsekuensi</th>
		<th style="text-align: center;">Kemungkinan</th>
		<th style="text-align: center;">Tingkat Resiko</th>

		<th style="text-align: center;">Konsekuensi</th>
		<th style="text-align: center;">Kemungkinan</th>
		<th style="text-align: center;">Tingkat Resiko</th>
	</tr>
	<tbody>
	@foreach($tbl_hirarc as $row_data)
		<tr>
			<td>{{ $row_data->kegiatan }}</td>
			<td>{{ $row_data->potensi_bahaya }}</td>
			<td>{{ $row_data->resiko }}</td>
			<td align="center">{{ $row_data->penilaian_konsekuensi }}</td>
			<td>{{ $row_data->penilaian_kemungkinan }}</td>
			<td></td>
			<td>{{ $row_data->pengendalian_resiko }}</td>
			<td>{{ $row_data->pengendalian_konsekuensi }}</td>
			<td>{{ $row_data->pengendalian_kemungkinan }}</td>
			<td></td>
			<td>{{ $row_data->status_pengendalian }}</td>
			<td>{{ $row_data->penanggung_jawab }}</td>

		</tr>
    @endforeach
	</tbody>
</table>
</br>
<table class=tbl_sign cellpadding=2 cellspacing=2 border=0>
	<thead>
		<tr>
			<td class="text-center" width="20%">
				<strong>DISETUJUI OLEH :</strong>
			</td>
			<td class="text-center" width="20%">
				<strong>DIPERIKSA OLEH :</strong>
			</td>
			<td class="text-center" width="20%">
				<strong>DISETUJUI OLEH :</strong>
			</td>
			<td class="text-center" width="20%">
				<strong>DISUSUN OLEH :</strong>
			</td>
      </tr>
	  <tr>
	  	<td>
			<img width="80" src="../../../images/app_images/qr_code.png" />
		</td>
		<td>
			<img width="80" src="../../../images/app_images/qr_code.png" />
		</td>
		<td>
			<img width="80" src="../../../images/app_images/qr_code.png" />
		</td>
		<td>
			<img width="80" src="../../../images/app_images/qr_code.png" />
		</td>
	  </tr>
	  <tr>
	  	<td class="text-center"><strong>( NAMA 1 )</strong></td>
	  	<td class="text-center"><strong>( NAMA 2 )</strong></td>
	  	<td class="text-center"><strong>( NAMA 3 )</strong></td>
	  	<td class="text-center"><strong>( NAMA 4 )</strong></td>
	  </tr>
	  <tr>
	  	<td class="text-center"><small>SEBUTAN JABATAN 1</small></td>
	  	<td class="text-center"><small>SEBUTAN JABATAN 2</small></td>
	  	<td class="text-center"><small>SEBUTAN JABATAN 3</small></td>
	  	<td class="text-center"><small>SEBUTAN JABATAN 4</small></td>
	  </tr>
	</thead>
</table>
<P></P>

<BR/>
<div id="footer">
	Tanggal cetak: <b><?php echo date("d F Y h:i:s"); ?></b> | 
</div>
</body>
</html>