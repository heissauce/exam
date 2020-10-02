<?php
		// localhost - flashdrive
		$host="localhost"; // Host name
		$username="root"; // Mysql username
		$password=""; // Mysql password
		$db_name="cisc158Exam"; // Database name




		// To use the online database comment the avobe 4 lines and uncomment the below 4 lines
		//
		//
		//$host="107.180.2.3"; // Host name
		//$username="cisc158Student"; // Mysql username
		//$password="cisc158Student"; // Mysql password
		//$db_name="cisc158Exam"; // Database name

		// to use the command line interface with the onoine database use the following
		// from your xampp/mysql/bin folder
		//
		// mysql -h 107.180.2.3 -u cisc158Student -p
		// password = cisc158Student
		// Connect to server and select databse.
		$connection =  mysqli_connect("$host", "$username", "$password")or die("cannot connect");
		mysqli_select_db($connection , "$db_name")or die("cannot select DB");

		session_start();
?>
