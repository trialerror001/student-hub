<?php

   	
	/*$myHost = "localhost";
	$myUser = "studenth_root001";
	$myPass = "sistemruangan";
	$myDbs = "studenth_sistemruangan";*/	
   	
        $myHost = "localhost";
	$myUser = "root";
	$myPass = "";
	$myDbs = "sistem_ruangan";
	
	
	$koneksidb = @mysql_connect($myHost, $myUser, $myPass,$myDbs) ;
	
	if (!$koneksidb)
	{
		echo " Failed Connection";
	}
	mysql_select_db($myDbs) or die ("Database not Found");
	
?>