<?php 
include "./library/inc.library.php";
include "./fungsi/fungsi.php";
    $fungsi = new DB_Functions();

$KodePinjam = buatKode("tb_observasi","OBS");
$REQ = isset($_GET['REQ']) ? $_GET['REQ'] : '';

$myQry = $fungsi->getRequestById($REQ);
$kolomData = mysql_fetch_array($myQry);

$idRequest = $kolomData['id_request'];
$ruangan = $kolomData['kd_ruangan'];
$tanggalPinjam = $kolomData['tanggal_pinjam'];
$tanggalSelesai = $kolomData['tanggal_selesai'];
$waktuMulai = $kolomData['waktu_mulai'];
$waktuSelesai = $kolomData['waktu_selesai'];

$result = $fungsi->cekTanggal($ruangan, $tanggalSelesai, $waktuSelesai);
if(mysql_num_rows($result) >= 1){
	 $pesanError = array();
	 	$pesanError[] = "Maaf, Ruangan $ruangan Pada Jadwal Tersebut Sedang Digunakan";

	 if(count($pesanError)>=1){
	 	 echo "<div class='mssgBox'>";
			echo "<img src='images/attention.png' width='50px'> <br><hr>";
				$noPesan=0;
				foreach ($pesanError as $indeks=>$pesan_tampil) { 
				$noPesan++;
					echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
				} 
			echo "</div> <br>"; 
            echo "<a href=?page=DataRequest>Kembali Ke Form</a>";
	 }
	?>
	

	<?php
}else{
	/*echo $KodePinjam."<br/>";
	echo $idRequest."<br/>";
	echo $ruangan."<br/>";
	echo $tanggalPinjam."<br/>";
	echo $waktuMulai."<br/>";
	echo $tanggalSelesai."<br/>";
	echo $waktuSelesai."<br/>";*/
	$fungsi->insertObservasi($KodePinjam, $idRequest, $ruangan, $tanggalPinjam, $waktuMulai, $tanggalSelesai, $waktuSelesai);
	echo mysql_num_rows($result);
}
?>