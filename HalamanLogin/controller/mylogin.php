<?php
	require "../utilities/connection.php";
	$name=$_POST['email'];
	$password=$_POST['password'];

	$query="select *from table_users where user_email='$name' and user_password='$password'";
	$process = $conn ->prepare($query);
	$process->execute();

	$result=$process->fetchAll();

	if (count($result)==1)
		echo "Login Berhasil";
	else
		echo "Login Gagal";



?>