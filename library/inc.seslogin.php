<?php
try{

if(empty($_SESSION['level'])){
	echo "<center>";
	echo "<br><br> <b> Maaf Akses anda Ditolak </b> <br>
	Silahkan masukkan data login anda dengan benar untuk bisa mengakses halaman ini.";
	echo "</center>";
	header("location:index.php");
        exit;
} 
}catch (Exception $ex){
      
}

?>