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

	.print {
    border-collapse: collapse;
    width: 100%
	}
	
	.print td, th {
    border: 0px solid #000000;
    padding: 3px;
    color: #000000;
	}
	
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
	
	#footer { font-style:italic; padding-top: 50px; }
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
          <h4>PT PLN (Persero) UNIT INDUK WILAYAH ACEH</h4>
          <h4>UP3 XXXXXX</h4>
          <p>JALAN XXXXX</p>
        </td>
        <td rowspan="3" width="40%">
          <p></p>
          </br>
          <p></p>
          <p></p>
          <p></p>
          <h2 vertical-align="middle">PROSEDUR SMK3</h2></td>
        <td rowspan="2" class="text-center" width="15%">NO DOKUMEN :</td>
        <td class="text-center" width="15%">HAL :</td>
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
<!-- <table class=tbl1 cellpadding=3 cellspacing=0 border=1 style="width: 100%"> -->
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
  <hr style="border-top-width: 2px;">

  <div class="col-md-12">
   <h4 style="padding-bottom:5px;">
      <b>A. INFORMASI PEKERJAAN</b>
    </h4>
  </div>
      <div class="row" style="margin-left:15px;">
        <div class="col-xl-12 col-lg-12">
                        <table id="tbl_hazard" class="print" style="">
                        <tr>
                          <td width="2%">1.</td>
                          <td>Tanggal</td>
                          <td width="1%">:</td>
                          <td colspan="3">{{ $detailWp->tgl_mulai }}</td>
                        </tr>
                        <tr>
                          <td>2.</td>
                          <td>Jenis Pekerjaan</td>
                          <td>:</td>
                          <td colspan="3">SIPIL</td>
                        </tr>
                        <tr>
                          <td>3.</td>
                          <td>Lokasi</td>
                          <td>:</td>
                          <td colspan="3">{{ $detailWp->lokasi_pekerjaan }}</td>
                        </tr>
                        <tr>
                          <td>4.</td>
                          <td>Perusahaan Pelaksana</td>
                          <td>:</td>
                          <td colspan="3">{{ $detailWp->pelaksana }}</td>
                        </tr>
                        <tr>
                          <td>5.</td>
                          <td>Pengawas Pekerjaan</td>
                          <td>:</td>
                          <td colspan="3">{{ $detailWp->pengawas_pekerjaan }}</td>
                        </tr>
                        <tr>
                          <td>6.</td>
                          <td>Nama Pelaksana Pekerjaan</td>
                          <td>:</td>
                          <td style="text-align: center;">Nama Lengkap</td>
                          <td style="text-align: center;">NIP / NIK</td>
                        </tr>
                        <tbody>
                        @foreach($pelaksana_kerja as $pelaksana)
                          <tr>
                            <td colspan="3"></td>
                            <td style="text-align: center;">{{ $pelaksana->nama_pelaksana }}</td>
                            <td style="text-align: center;">{{ $pelaksana->personal_no }}</td>
                          </tr>
                        @endforeach
                        </tbody>
                        </table>
        </div>
      </div>
  <br></br>

<div class="col-xl-12 col-lg-12">
<center>
<table id="tbl_hazard" class="table table-striped table-bordered" style="width: 80%;text-align: center;">
<!-- <td>B. Pelaksana Pekerjaan</td> -->
<!-- <td>Nama</td> -->
    <tr>
			<td class="text-center" width="20%">
				<strong>Tanda Tangan</strong>
			</td>
    </tr>
    @foreach( $pelaksana_kerja as $pel_kerja)
    <tr>
	  	<td class="text-center"><small>{!! QrCode::size(60)->generate('PELAKSANA :' . strtoupper($pel_kerja->nama_pelaksana) . '; JABATAN :' .$pel_kerja->jabatan_pelaksana ) !!}</small></td>
	  </tr>
    <tr>
	  	<td class="text-center"><strong>( {{$pel_kerja->nama_pelaksana}} )</strong></td>
	  </tr>
	  @endforeach
    <tr>
	  	<td class="text-center"><small>Pelaksana Pekerjaan</small></td>
	  </tr>

</table>
</center>
</div>

					<br>

					<div class="col-md-12">
                      <h4 style="padding-bottom:5px;">
                        <b>B. PERALATAN KESELAMATAN</b>
                      </h4>
                    </div>
                    <div class="row" style="margin-left:15px;">
                      <div class="col-xl-12 col-lg-12">
                        <table id="tbl_hazard" class="print" style="width: 100%">
                        <tr>
                          <td colspan="3" class="text-left" style="padding-bottom:10px;">1. ALAT PELINDUNG DIRI</td>
                        </tr>
                        {{--
                        <!-- <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
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
                            </div>
                          </td>
                        </tr>
                        @endforeach -->
                          --}}
                        
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item11" {{in_array('Helm', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item11">Helm</label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item12" {{in_array('Sepatu Keselamatan', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item12">Sepatu Keselamatan</label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item13" {{in_array('Kacamata', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item13">Kacamata</label>
                            </div>
                          </td>
                        </tr>
                        
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item14" {{in_array('Earmuff', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item14">Earmuff</label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item15" {{in_array('Sarung Tangan Katun', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item15">Sarung Tangan Katun</label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item16" {{in_array('Sarung Tangan Karet', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item16">Sarung Tangan Karet</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item17" {{in_array('Sarung Tangan 20KV', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item17">Sarung Tangan 20KV</label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item18" {{in_array('Pelampung / Life Vest', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item18">Pelampung / Life Vest</label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item19" {{in_array('Tabung Pernafasan', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item19">Tabung Pernafasan</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item20" {{in_array('Full Body Harness', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item20">Full Body Harness</label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item22" {{in_array('on', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item22">Lain - lain :</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td colspan="3" class="text-left" style="padding-top:10px;padding-bottom:10px;">2. PERLENGKAPAN KESELAMATAN & DARURAT</td>
                        </tr>
                        {{--
                        <!--
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
                        -->
                        --}}

                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item11" {{in_array('Pemadam Api (APAR dll)', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item11">Pemadam Api (APAR dll)</label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item12" {{in_array('LOTO (lock out tag out)', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item12">LOTO (lock out tag out)</label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item12" {{in_array('Kotak P3K', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item12">Kotak P3K</label>
                            </div>
                          </td>
                          </tr>
                          <tr>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item13" {{in_array('Radio Telekomunikasi', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item13">Radio Telekomunikasi</label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item14" {{in_array('Rambu Keselamatan', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item14">Rambu Keselamatan</label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox" style="padding-bottom: 15px;">
                              <input type="checkbox" name="agenda2" class="custom-control-input" id="item22" {{in_array('on', $peralatan) ? "checked" : ""}}>
                              <label class="custom-control-label" for="item22">Lain - lain :</label>
                            </div>
                          </td>
                          </tr>
                          
                        </table>
                      </div>
                    </div>
                    

<div id="footer">
	Tanggal cetak: <b><?php echo date("d F Y h:i:s"); ?></b> | 
</div>
</body>
</html>