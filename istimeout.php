<?php
	$filename = $_SERVER["SCRIPT_NAME"];
	//echo "<script> alert('$filename'); </script>";

	if(isset($_SESSION['timeout'])) {

		$then = $_SESSION['timeout'];
	    $now = time();
	    $diff = $now - $then;
	    //echo "<script> alert($diff); </script>";

	    if($diff > (60 * 60)) {
	        unset($_SESSION['username']);
	        unset($_SESSION['timeout']);
	        // header('Location: main.php');
	        echo "<script> alert('User Timeout, please login again!'); </script>";
	        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=main.php">';
	        exit();
	    }
	} //else { // if the timeout is not set - then always recirect
		//if($filename != "/finalexam/main.php") {
		  //  echo "<script> alert('No active session, routing to the main screen!'); </script>";
		  //  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=main.php">';
	//	}
	//}// end if
?>
