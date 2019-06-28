<?php
	date_default_timezone_set("Asia/Jakarta");
	
	function buatKode($table, $Temp)
	{
		$struktur = mysql_query("Select * From $table");
		$field =  mysql_field_name($struktur,0);
		$panjang = mysql_field_len($struktur,0);
		
		$qry = mysql_query("Select Max(".$field.")From ".$table."");
		$row = mysql_fetch_array($qry);
		if($row[0]=="")
		{
			$angka = 0;
		}else {
			$angka = substr($row[0], 3, 4);
                        
		}
		$angka = intval($angka);
		$angka++;
		$temp=$Temp;
		//echo strlen(strval($angka));
		for($i=0; $i<4-strlen(strval($angka)); $i++)
		//for($i=1; $i<=3; $i++)
		{
			$temp = $temp."0";
		}
		return $temp.$angka;
	}
	
	function InggrisTgl($tanggal){
		$tgl = substr($tanggal,0,2);
		$bln = substr($tanggal,3,2);
		$thn = substr($tanggal,6,4);
		$tanggal = "$thn-$bln-$tgl";
		return $tanggal;
	}
	
	function IndonesiaTgl($tanggal){
		$tgl = substr($tanggal,8,2);
		$bln = substr($tanggal,5,2);
		$thn = substr($tanggal,0,4);
		$tanggal = "$tgl-$bln-$thn";
		return $tanggal;
	}
	
	function format_angka($angka){
		$hasil = number_format($angka,0,",",".");
		return $hasil;
	}
	

?>