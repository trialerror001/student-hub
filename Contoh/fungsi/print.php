<?php
include_once "library/inc.library.php";
include 'fungsi/fungsi.php';

$fungsi = new DB_Functions();


	$kodeNIP= isset($_GET['NIP']) ? $_GET['NIP'] : '' ; 
 
	$qry = $fungsi ->getDataSuratByNIP($kodeNIP);
        $dataShow = mysql_fetch_array($qry);
  
  $dataNomor = $dataShow['no_surat'];
  $dataNIP = $dataShow['nip'];
  $dataNama = $dataShow['nama'];
  $dataJabatan = $dataShow['jabatan'];
  $dataPangkat = $dataShow['pangkat'];
  $dataKegiatan = $dataShow['kegiatan'];
  $dataTempatAsal = $dataShow['asal'];
  $dataTempatTujuan = $dataShow['tujuan'];
  $dataTanggalBerangkat = $dataShow['tanggal_berangkat'];
  $dataTanggalPulang = $dataShow['tanggal_pulang'];
  $dataLamaHari = $dataShow['lama_hari'];
  $dataKendaraan = $dataShow['kendaraan'];
$content = "
<table width='600' border='1'>
  <tr>
    <td colspan='2'><div align='center'>
      <p><strong>SURAT TUGAS</strong></p>
      <p><strong>Nomor : ... / ".$dataNomor." /.../.../... </strong></p>
    </div></td>
  </tr>";

  
  $content .="
  <tr>
    <td width='292'>Pejabat berwenang yang memberikan tugas </td>
    <td width='392'><strong>KEPALA DINAS KESEHATAN PROPINSI KALIMANTAN BARAT </strong></td>
  </tr>
  <tr>
    <td>Nama Pegawai yang ditugaskan </td>
    <td>".$dataNama."</td>
  </tr>
  <tr>
    <td>NIP Pegawai yang ditugaskan </td>
    <td>".$dataNIP."</td>
  </tr>
  <tr>
    <td>Golongan Pegawai yang ditugaskan </td>
    <td>".$dataPangkat."</td>
  </tr>
  <tr>
    <td>Jabatan Pegawai yang ditugaskan </td>
    <td>".$dataJabatan."</td>
  </tr>
  <tr>
    <td>Tempat Berangkat </td>
    <td>".$dataTempatAsal."</td>
  </tr>
  <tr>
    <td>Tempat Tujuan </td>
    <td>".$dataTempatTujuan."</td>
  </tr>
  <tr>
    <td>Untuk Tugas </td>
    <td>".$dataKegiatan."</td>
  </tr>
  <tr>
    <td>Tanggal Berangkat </td>
    <td>".IndonesiaTgl($dataTanggalBerangkat)."</td>
  </tr>
  <tr>
    <td>Lama Penugasan </td>
    <td>".$dataLamaHari."</td>
  </tr>
  <tr>
    <td>Tanggal Harus Kembali </td>
    <td>".IndonesiaTgl($dataTanggalPulang)."</td>
  </tr>
  <tr>
    <td>Alat Angkutan yang dipergunakan </td>
    <td>".$dataKendaraan."</td>
  </tr>";
 
$content .= "</table> <br><br><br>

<div align='right' style='padding-left:75%'>DIKELUARKAN DI &nbsp;: PONTIANAK <br>
		        <div><u>PADA TANGGAL &nbsp; &nbsp; : ".date('d-M-Y')."</u></div>
				  
				         <div style='padding-left:55px'><br />Kepala Dinas Kesehatan</div>
						<div style='padding-left:51px;'>Provinsi Kalimantan Barat </div>
						
						
						<div style='padding-left:57px;'><br><br><br><br><br />
						<u> dr.ANDY JAP, M.Kes</u></div>
						<div style='padding-left:61px;'> 
						   Pembina Utama Muda</div> 
						<div style='padding-left:30px;'> NIP. 19620828 198801 1 004</div>
</div>
";
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=Surat_Tugas.doc");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $content;



?>