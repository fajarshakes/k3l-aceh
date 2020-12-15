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
	h2 { font-size:18px;}
	h3 { font-size:14px; }
	.kecil2{font-size: 8px;}
	.kecil3{font-size: 7px;}

	.print {
    border-collapse: collapse;
    width: 100%
	}
	
	.print td, th {
    border: 1px solid #000000;
    padding: 3px;
    color: #000000;
	}
	
	td { vertical-align:top }
	
	hr {border:0px; border-top:1px solid #000000; padding:3px 0px; margin:0px}
	
	#header { padding:0px; width:100%; margin:1px auto 1px auto; }
	#header td {font-size:12px; vertical-align:middle }
	
	.tbl1 {text-align:left; width:100%; border:1px; border:1px solid black; ; border-bottom:2px solid black}
	.tbl1_n {width:100%; border:1px border:1px solid black; ; border-bottom:2px solid black}
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
				<u>Untuk Mencetak dengan sempurna, setting pada page setup yaitu:</u> <br />
				Margin --> Top : <b>0.1 inch</b>, Left/Right : <b>0.3 inch</b>, Bottom : <b>0.3 inch</b><br />
				Kertas --> A4 / Folio
			</td>
			<td align=right><button onclick="window.print()">Cetak Halaman Ini</button></td>
		</tr>
	</table>
</div>

<table class=tbl1_n cellpadding=2 cellspacing=0 border=1 width="100%">
	<thead>
		<tr>
			<td style="border-right: 1px solid #fff !important;" align="center" rowspan="3" class="text-center" width="10%">
				<img width="60" src="../../../images/app_images/logo_pln.png" />
			</td>
			<td style="border-left: 1px solid #fff !important;" rowspan="3" class="text-center" width="20%">
			<p></p>
			<span style="font-size: 12px;"><b>PT PLN (PERSERO) UIW ACEH</b><br>{{ $unit_detail->UNIT_NAME }} <br></span>
			<span style="font-size: 10px;">{{ $unit_detail->ADDRESS }}<br>{{ $unit_detail->CITY }}</span>
				
			</td>
			<td rowspan="3" width="40%">
				<p></p>
				</br>
				<p></p>
				<p></p>
				<p></p>
				<h2 vertical-align="middle">PROSEDUR SMK3</h2></td>
			<td rowspan="2" class="text-center" width="15%">NO DOKUMEN : {{$detailWp->id_wp}}-{{$detailWp->unit}}-HIRARC-2020</td>
			<td class="text-center" width="15%">HAL :</td>
      </tr>
	  <tr>
	  	<td class="text-center">FR.R.R.X.0.0 </td>
	  </tr>
	  <tr>
	  	<td class="text-center">TGL : {{ date('d-m-Y', strtotime($detailWp->tgl_pengajuan)) }}</td>
	  	<td class="text-center">ED/REV : 00/00 </td>
	  </tr>
	</thead>
</table>

</br>
<table class=print cellpadding=3 cellspacing=0 border=1 style="width: 100%">
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
	<tr class="kecil2">
		<th style="text-align: center;">Konsekuensi</th>
		<th style="text-align: center;">Kemungkinan</th>
		<th style="text-align: center;">Tingkat Resiko</th>

		<th style="text-align: center;">Konsekuensi</th>
		<th style="text-align: center;">Kemungkinan</th>
		<th style="text-align: center;">Tingkat Resiko</th>
	</tr>
	<tbody>
	@foreach($tbl_hirarc as $row_data)
		<tr class="kecil2">
			<td>{{ $row_data->kegiatan }}</td>
			<td>{{ $row_data->potensi_bahaya }}</td>
			<td>{{ $row_data->resiko }}</td>
			<td align="center">{{ $row_data->penilaian_konsekuensi }}</td>
			<td align="center">{{ $row_data->penilaian_kemungkinan }}</td>
			<td align="center">{{ $row_data->penilaian_tingkat_resiko }}</td>
			<td>{{ $row_data->pengendalian_resiko }}</td>
			<td align="center">{{ $row_data->pengendalian_konsekuensi }}</td>
			<td align="center">{{ $row_data->pengendalian_kemungkinan }}</td>
			<td align="center">{{ $row_data->pengendalian_tingkat_resiko }}</td>
			<td>{{ $row_data->status_pengendalian }}</td>
			<td>{{ $row_data->penanggung_jawab }}</td>

		</tr>
    @endforeach
	</tbody>
</table>
</br>

<table style="width:100%">
	<tr>
		<td align="left" width="50%">
			<table style="width:99%" style="margin: 10px;"  class="print">
				<thead>
					<tr class="kecil2">
						<th colspan="3" style="text-align: center;border-bottom: 1px solid #000;">PENJELASAN</th>
					</tr>
					<tr class="kecil3">
						<th style="text-align: center;">TINGKAT RESIKO</th>
						<th style="text-align: center;">KEMUNGKINAN</th>
						<th style="text-align: center;">KONSEKUENSI</th>
					</tr>
				</thead>
				<tbody>
					<tr class="kecil3">
						<td>E = Extreme Risk</td>
						<td>A = Hampir pasti akan terjadi / Almost Certain</td>
						<td>1 = Tidak ada cedera, Kerugian materi kecil</td>
					</tr>
					<tr class="kecil3">
						<td>H = High Risk</td>
						<td>B = Cenderung untuk terjadi / Likely</td>
						<td>2 = Cedera ringan / P3K, Kerugian cukup materi sedang</td>
					</tr>

					<tr class="kecil2">
						<td>M = Moderate Risk</td>
						<td>C = Mungkin dapat terjadi / Moderate</td>
						<td>3 = Hilang hari kerja, kerugian cukup besar</td>
					</tr>

					<tr class="kecil2">
						<td>L = Low Risk</td>
						<td>D = Kecil kemungkinan terjadi / Unlikely</td>
						<td>4 = Cacat, Kerugian materi besar</td>
					</tr>

					<tr class="kecil2">
						<td></td>
						<td>E = Jarang Terjadi / Rare</td>
						<td>5 = Kematian, Kerugian materia sangat besar</td>
					</tr>
					
				</tbody>
			</table>
		</td>
		<td align="right" width="50%">
			<table style="width:99%" style="margin: 10px;" class="print">
				<thead>
					<tr class="kecil2">
						<th colspan="2" style="text-align: center;">DAFTAR POTENSI BAHAYA</th>
					</tr>
				</thead>
				<tbody>
					<tr class="kecil3">
						<td width="30%">Bahaya Fisik</td>
						<td width="70%">Pencahayaan, Getaran, Kebisingan, Ketinggian</td>
					</tr>

					<tr class="kecil3">
						<td width="30%">Bahaya Kimia</td>
						<td width="70%">Gas, Asap, Uap, Bahan Kimia Berbahaya</td>
					</tr>

					<tr class="kecil3">
						<td width="30%">Bahaya Biologi</td>
						<td width="70%">Micro Biologi(Virus, Bakteri, Jamur, dll); Macro Biologi(Hewan, Serangga, Tumbuhan)</td>
					</tr>

					<tr class="kecil3">
						<td width="30%">Bahaya Ergonomi</td>
						<td width="70%">Stress Fisik (Gerakan Berulang, Ruang Sempit, Menfosir Tenaga)</td>
					</tr>

					<tr class="kecil3">
						<td width="30%">Bahaya Mekanis</td>
						<td width="70%">Titik Jepit, Putaran Pulley atau Roller</td>
					</tr>

					<tr class="kecil3">
						<td width="30%">Bahaya Elektris</td>
						<td width="70%">Kabel terkelupas, Kabel bertegangan tanpa pengaman dll</td>
					</tr>

					<tr class="kecil3">
						<td width="30%">Bahaya Psikososial</td>
						<td width="70%">Trauma, Intimidasi, Pola promosi jabatan yang salah, Stress Mental (Jenuh/Bosan, Overload)</td>
					</tr>

					<tr class="kecil3">
						<td width="30%">Bahaya Tingkah Laku</td>
						<td width="70%">Tidak patuh terhadap peraturan, overconfident, sok tahu, tidak peduli</td>
					</tr>

					<tr class="kecil3">
						<td width="30%">Bahaya Lingkungan Sekitar</td>
						<td width="70%">Kemiringan permukaan, cuaca yang tidak ramah, permukaan jalan kecil.</td>
					</tr>
					
				</tbody>
			</table>
		</td>
	</tr>
</table>
</br>
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
<P></P>

<BR/>
<div id="footer">
	Tanggal cetak: <b><?php echo date("d F Y h:i:s"); ?></b> | 
</div>
</body>
</html>