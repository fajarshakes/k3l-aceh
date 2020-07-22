<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML><HEAD>
<TITLE>SIPAT PRINT</TITLE>
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
	
	.tbl1 {text-align:left; width:100%; border:0; border:1px solid black; ; border-bottom:2px solid black}
	.tbl1 .c1 { border:0; padding:3px 3px 3px 8px; width:130px; border-top:1px solid black}
	.tbl1 .c2 { border:0; padding:3px; width:20px; text-align:center; border-top:1px solid black }
	.tbl1 .c3 { border:0; padding:3px 3px 3px 8px; border-top:1px solid black }
	.tbl1 tr { height:25px }
	
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
<table id="header">
	<tr>
		<td width=50><img width="50" src="assets/images/Logo_pln.png" /></td>
		<td>PT. PLN (PERSERO)<br/>NAMA</td>
		<td align=right style="padding-right:5px">
		</td>
	</tr>
</table>
<h1>FORM PENGENDALIAN PROSES PEMBAYARAN</h1>
<table class=tbl1 cellpadding=0 cellspacing=0 border=1>
	<thead>
		<tr>
			<td align="center"><h4><strong>SSSS</strong></td>
			<td align="center"><h4><strong>S</strong></td>
			<td align="center"><h4><strong>S</strong></td>
			<td> </td> 
      </tr>
	</thead>
</table>
</BR>
<h3>RINCIAN PROGRESS</h3>
<table class=tbl1 cellpadding=3 cellspacing=0 border=1>
	<thead>
		<tr>
			<td rowspan="2" align="center"><h4><strong>NO</strong></td>
			<td rowspan="2" align="center"><h4><strong>PROSES</strong></td>
			<td colspan="2" align="center"><h4><strong>TERIMA</strong></td>
			<td colspan="2" align="center"><h4><strong>KIRIM</strong></td>
		</tr>
		<tr>
			<td width="85" align="center"><strong>TANGGAL</strong></td>
			<td width="85" align="center"><strong>PARAF</strong></td>
			<td width="85" align="center"><strong>TANGGAL</strong></td>
			<td width="85" align="center"><strong>PARAF</strong></td>
		</tr>
	</thead>
	<tbody>
	
	<tr>
		<td align="center"><strong>1</strong></td>
		<td align="left"><strong>TERIMA DI BAGIAN ANGGARAN (AGENDA SIPAT)</strong></td>
		
	</tr>
	
	
	</tbody>

</table>
<p></p>
<h3>RINCIAN PRK - PROGRAM RENCANA KERJA</h3>
<table class=tbl2 cellpadding=0 cellspacing=0 border=1>
	<thead>
		<tr>
			<td align="center"><h4><strong>NO</strong></td>
			<td align="center"><h4><strong>PRK</strong></td>
			<td align="center"><h4><strong>URAIAN</strong></td>
			<td align="center"><h4><strong>JUMLAH</strong></td>
		</tr>
	</thead>
	<tbody>	
	<tr>
		<td align="center">1</td>
</tr>
	</tbody>
</table>

<table class=tbl1 cellpadding=0 cellspacing=0 border=1>
	<thead>
		<tr>
			<td align="center"><h4><strong>NO</strong></td>
			<td align="center"><h4><strong>PRK</strong></td>
			<td align="center"><h4><strong>URAIAN</strong></td>
			<td align="center"><h4><strong>JUMLAH</strong></td>
		</tr>
	</thead>
	<tbody>
	

	</tbody>
</table>
<BR/>
<table class=tbl1 cellpadding=0 cellspacing=0>
	<tr>
		<td class="c1">NOREG / NODIN</td>
		<td class="c2">:</td>
	</tr>
	<tr>
		<td class="c1">VENDOR</td>
		<td class="c2">:</td>
	</tr>
	<tr>
		<td class="c1">DOC / MIRO</td>
		<td class="c2">:</td>
		<td class="c3"></td>
	</tr>
	<tr>
		<td class="c1">DOC BAYAR</td>
		<td class="c2">:</td>
		<td class="c3"></td>
	</tr>
	<tr>
		<td class="c1">FAKTUR PAJAK</td>
		<td class="c2">:</td>
		<td border="1" class="c3">ada / tidak ada </td>
	</tr>
	<tr>
		<td class="c1">PPN</td>
		<td class="c2">:</td>
		<td border="1" class="c3">pungut / tidak pungut </td>
	</tr>
	<tr>
		<td class="c1">DPP PPH</td>
		<td class="c2">:</td>
		<td class="c3"></td>
	</tr>
	<tr>
		<td class="c1">TAX CODE</td>
		<td class="c2">:</td>
		<td class="c3"></td>
	</tr>
	
	<tr>
		<td class="c1">ACCOUNT CODE</td>
		<td class="c2">:</td>
		<td class="c3"></td>
	</tr>
	<tr>
		<td class="c1">COST CENTER</td>
		<td class="c2">:</td>
		<td class="c3"></td>
	</tr>
	
</table>
<BR/>
<div id="footer">
	Tanggal cetak: <b><?php echo date("d F Y h:i:s"); ?></b> | 
</div>
</body>
</html>