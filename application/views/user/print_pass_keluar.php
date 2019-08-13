<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PASS KELUAR</title>
</head>

<body onload="window.print()">
<style type="text/css" media="print">
 @media print{
    .sera{
    background:url(img/line.png);
    }
    }
</style>
<style type="text/css">
body {
  -webkit-print-color-adjust: exact;
}
.loginbox {
    border-collapse: collapse;
    border-width: 1px;
	
    border-style: solid;
	display: inline-table;
	border-color: #000;
	border-s
}
.sera {
background-color:#ccc;
}
   
.tt { margin-right:10px;
text-align:center;
}
</style>
 <?php 
for ($x = 1; $x <= 2; $x++) {

foreach($print as $row);

  ?>
<table width="100%" align="center" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:13px">
  <tr>
    <td width="1%">&nbsp;</td>
    <td colspan="2" rowspan="5"><img src="<?=base_url()?>img/logonew.png" width="168" height="74"></td>
    <td width="2%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="28%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>POOL</td>
    <td>:</td>
    <td>TRAC PALEMBANG</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td rowspan="2"><table width="78%" border="1" align="right" class="loginbox" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px">
      <tr align="center">
        <td colspan="2">TRAC-DOC-FMS-01-5</td>
        </tr>
      <tr align="center">
        <td>Rev : 00</td>
        <td>Date : 01-07-2006</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Jln.</td>
    <td>:</td>
    <td colspan="3">Jl. Soekarno Hatta No. 135 Palembang</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Telp/Fax</td>
    <td>:</td>
    <td colspan="3">(62) 711- 444999 / Fax. (62) 711 - 441188</td>
    <td>&nbsp;</td>
    <td rowspan="3" align="right"><h2 style="letter-spacing:0.2em; font-weight:900; margin:0; padding:0">PASS KELUAR</h2></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td colspan="3"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="11" class="sera"><strong> &nbsp; &nbsp; PT. SERASI AUTORAYA</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="10">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"><b>Mohon diberikan ijin keluar, kendaraan :</b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">No. Polisi / Type</td>
    <td>:</td>
    <td colspan="3" style="border-bottom:1px solid #000"><?=strtoupper($row->nopol);?> / <?=strtoupper($row->type);?></td>
    <td>&nbsp;</td>
    <td>Warna</td>
    <td>:</td>
    <td style="border-bottom:1px solid #000"><?=strtoupper($row->warna);?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Tanggal Keluar</td>
    <td>:</td>
    <td colspan="3" ><table width="58" border="1" class="loginbox">
      <tr align="center">
        <td width="21"><?=substr($row->tglkeluar,8,1);?></td>
        <td width="21"><?=substr($row->tglkeluar,9,1);?></td>
      </tr>
    </table>
      <table width="58" border="1" class="loginbox">
        <tr align="center">
          <td width="21"><?=substr($row->tglkeluar,5,1);?></td>
          <td width="21"><?=substr($row->tglkeluar,6,1);?></td>
        </tr>
      </table>
      <table width="133" border="1" class="loginbox">
        <tr align="center">
          <td width="24"><?=substr($row->tglkeluar,0,1);?></td>
          <td width="28"><?=substr($row->tglkeluar,1,1);?></td>
          <td width="29"><?=substr($row->tglkeluar,2,1);?></td>
          <td width="24"><?=substr($row->tglkeluar,3,1);?></td>
        </tr>
      </table></td>
    <td>&nbsp;</td>
    <td>Jam</td>
    <td>:</td>
    <td><table width="58" border="1" class="loginbox">
      <tr align="center">
        <td width="21"><?=substr($row->jamkeluar,0,1);?></td>
        <td width="21"><?=substr($row->jamkeluar,1,1);?></td>
      </tr>
    </table>
      <table width="58" border="1" class="loginbox">
        <tr align="center">
          <td width="21"><?=substr($row->jamkeluar,3,1);?></td>
          <td width="21"><?=substr($row->jamkeluar,4,1);?></td>
        </tr>
      </table> 
      wib / wit / wita</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">BBM</td>
    <td>:</td>
    <td colspan="3"><table width="31" border="1" class="loginbox tt">
      <tr>
        <td width="21"><?=$row->bbm1;?></td>
        </tr>
    </table>
     </td>
    <td>&nbsp;</td>
    <td>Kilometer</td>
    <td>:</td>
    <td style="border-bottom:1px solid #000"><?=$row->kilometer1;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Dibawa Oleh</td>
    <td>:</td>
    <td colspan="3"style="border-bottom:1px solid #000"><?=strtoupper($row->driver);?></td>
    <td>&nbsp;</td>
    <td>Dibuat Oleh</td>
    <td>:</td>
    <td style="border-bottom:1px solid #000"><?=strtoupper($row->dibuatoleh);?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Tujuan</td>
    <td>:</td>
    <td colspan="3" style="border-bottom:1px solid #000"> <?=substr($row->tujuan,0,55);?>  </td>
    <td>&nbsp;</td>
    <td>No. Ref. Doc</td>
    <td>&nbsp;</td>
    <td style="border-bottom:1px solid #000"> <?=strtoupper($row->nomor_rdo);?>   </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" style="border-bottom:1px solid #000"><?=substr($row->tujuan,55,100);?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">Pemberi Ijin, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td rowspan="4" align="right">  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />
      <table width="100%" border="0">
        <tr>
          <td align="center" width="20%">&nbsp;</td>
          <td align="right" style="padding-right:50px">  <?=$row->approved;?> </td>
        </tr>
      </table>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr style="font-size:11px;">
    <td>&nbsp;</td>
    <td>Asli</td>
    <td>: Security</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr style="font-size:11px;">
    <td>&nbsp;</td>
    <td>Merah</td>
    <td>: Customer/User </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">  </td>
  </tr>
  <tr >
    <td>&nbsp;</td>
    <td style="font-size:11px;">Kuning</td>
    <td style="font-size:11px;">: Arsip After Sales Dept.</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <td align="right"><span style="border-top:1px solid #000; padding-top:3px"> &nbsp; &nbsp; &nbsp; &nbsp;  After Sales Head &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> </td>
    <td>&nbsp;</td>
  </tr>
</table>

<br><br> <br><br>

<?php } ?>

</body>
</html>
