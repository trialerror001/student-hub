<?php
	/*$myHost = "mysql.idhostinger.com";
	$myUser = "u284822025_root";
	$myPass = "ferbynia";
	$myDbs = "u284822025_st";*/
        
        $myHost = "localhost";
	$myUser = "root";
	$myPass = "";
	$myDbs = "surat_tugas";
	
	
	$koneksidb = @mysql_connect($myHost, $myUser, $myPass) ;
	
	if (!$koneksidb)
	{
		echo " Failed Connection";
	}
	mysql_select_db($myDbs) or die ("Database not Found");
	
?>