<?php

	#localhost/agency/connection.php
	
	define("host","localhost");
	define("user","root");
	define("psw","");
	define("db","myblog");
	define("msg","Database connection error");
	
	$connection = mysqli_connect(host, user, psw, db);
	
	if(!$connection){
		echo msg;
		exit();
	}else{
		#echo "Sucess!";
	}
	
?>