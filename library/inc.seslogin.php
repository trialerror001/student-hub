<?php
try{

	if(empty($_SESSION['level'])){
			echo "<br><br> <b> Maaf Akses anda Ditolak </b> <br>
			Silahkan masukkan data login anda dengan benar untuk bisa mengakses halaman ini.";
			echo "</center>";
			header("Location: http://localhost/student-hub/");
	  	exit;
	}
}catch (Exception $ex){

}

?>
