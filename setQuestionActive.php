<?php require('config.php');
	$active = $_GET['active'];
	$questionID = $_GET['questionID'];

	/* Simply find one questionID at a time and set it to the $active variable.
	   The setActiveFlag() function already inverts the current active state. */
	$sql = "UPDATE questions SET active='$active' WHERE questionID = '$questionID'";


	$result = mysqli_query($connection, $sql);

	if($result) {
		echo true;
	} else {
		echo $mysqli_error($connection);
	}
?>
