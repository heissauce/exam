<?php

	// 	ob_start();
		require("config.php");

		// Define $myusername and $mypassword
		$myusername=$_POST['myusername']; // username = emailaddress
		$mypassword=$_POST['mypassword'];


		/* dfb
		for encryption go to
		http://www.phpeasystep.com/workshopview.php?id=26
		*/

		// To protect MySQL injection (more detail about MySQL injection)
		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysqli_real_escape_string($connection, $myusername);
		$mypassword = mysqli_real_escape_string($connection, $mypassword);
		//$mypassword = sha1($mypassword);

		// generate the sql and cal lthe database
		$sql="SELECT userID, firstName, lastName, role FROM user WHERE emailAddress='$myusername' and Password='$mypassword'";
		$result=mysqli_query($connection, $sql);

		// check to see if there were any errors getting from the datbase
		if(! $result )
		{
				die('Could not retrieve user data: ' . mysqli_error($connection));
		}

		$count = 0;
		$username = "";
		while ($userField = mysqli_fetch_assoc($result)) {
		 	$username = $userField['firstName']; // get the first name of the user
			$userID = $userField['userID']; // get the user ID of the user
			$userRole = $userField['role']; // get the user ID of the user
			$count++;

		}

		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count==1){
			// Register $myusername, $mypassword and redirect to file "login_success.php"
			//dfb session_register("myusername");
			//dfb session_register("mypassword");

			// set session variables to be passed to other pages
			// session_start()
			$_SESSION['myusername'] = $myusername;
			$_SESSION['mypassword'] = $mypassword;
			$_SESSION['username'] = $username;
			$_SESSION['userID'] = $userID;
			$_SESSION['userRole'] = $userRole;
			$_SESSION['timeout'] = time();


			header("location:main.php"); // reditect back to main with valid login
		} else {
			header("location:loginFailed.php");
			echo "Cannot validate username and password";
		}
		mysqli_close($connection);

	// ob_end_flush();
?>
