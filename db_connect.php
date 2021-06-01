<?php

	#localhost/agency/connection.php
	
	define("host","localhost:33063");
	define("user","root");
	define("psw","Omega.000!");
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