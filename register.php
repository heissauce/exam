<?php
	require('config.php');

	if($_SESSION['userRole'] != "A") {
		echo "<script> alert('THis page requires Admin Role!'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=main.php">';

	}

	if(!empty($_POST)) {
        // Ensure that the user fills out the fields - cheacking against the name value
        // this step should not be needed in this code since we also use javascript validation
        // on the form - so if any of these trigger, there is something wrong other than
        // the user did not key the data
        if(empty($_POST['fname'])) die("Please enter your first name.");
	    if(empty($_POST['lname'])) die("Please enter your last name.");
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) die("Invalid E-Mail Address");
	    if(empty($_POST['password'])) die("Please enter a password.");

		// check to see if this email address is used already
        $query = "SELECT 1 FROM user WHERE emailAddress = '" . $_POST['email'] . "'";
        $result = mysqli_query($connection, $query);
		if(! $result ) die('Could not reach database for email check: ' . mysqli_error($connection));

		if ($userRow = mysqli_fetch_assoc($connection, $result)) {
			// if the row exist we need to get out and promt the user the email already exists
			//die("This email address is already registered");
			echo "<script> alert('This email address is already registered!'); </script>";
		} else {

	        // Otherwise, try Add a row to database
	        $query = " INSERT INTO user (
	        						firstName,
    								lastName,
    								role,
    								emailAddress,
    								password,
    								rawpassword )
    							VALUES ( '" . $_POST['fname'] . "', '" .
    										$_POST['lname'] . "', '" .
    										$_POST['userRole'] . "', '" .
    										$_POST['email'] . "', '" .
    										$_POST['password'] . "', '" .
    										$_POST['password'] .  "' )";

	        // echo "<BR><BR><BR>" . $query . "<BR<";

	        // send the query to the database
	        $retval = mysqli_query($connection, $query);

			   if(! $retval )
			   {
			      die('Could not enter data: ' . mysqli_error($connection));
			   }

			   // echo "Entered data successfully\n";
			   // javascript alert from php - yeah!
			   echo "<script> alert('User Registered Sucessfully!'); </script>";

			   //mysql_close($connection);
			   // not needed here since the script required an open db connection for major dropdown.

        } // end else on email check
    } // end if $_POST
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--	<script type='text/javascript' src='assets/jquery.min.js'></script> -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  	<link href="custom.css" rel="stylesheet">

  	<!-- sourcing in some jquery to validate input text fields -->
  	<script src="validateText.js"></script>

	<script>
	    // get the email from the login email field and send to resetpw.php file
		function resetpw()
		{
			alert("need to code the reset password function");
		}
	</script>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/navbar.php"); ?>
<?php
		//echo "<br><br><br>" . $_POST['major'] . "<br>";
?>


<div class="container">
	<br><br>

</div>
<div class="container">
     <h2>Register Student</h2>
		<form class="form-horizontal" role="form" id="regForm" action="register.php" method="post">

			<div class="form-group">
				<label for="reg_fname" class="control-label col-sm-3">First Name:<strong style="color:darkred;">*</strong></label>
				<div class="col-sm-6">
					<input class="form-control" type="text" id="reg_fname" name="fname" placeholder="First Name">
					<span class="error">This field is required</span>
				</div>
			</div>


			<div class="form-group">
				<label for="reg_lname" class="control-label col-sm-3">Last Name:<strong style="color:darkred;">*</strong></label>
				<div class="col-sm-6">
					<input class="form-control" type="text" id="reg_lname" name="lname" placeholder="Last Name">
					<span class="error">This field is required</span>
				</div>
			</div>

			<div class="form-group">
				<label for="reg_email" class="control-label col-sm-3">Email:<strong style="color:darkred;">*</strong></label>
				<div class="col-sm-6">
					<input class="form-control" type="text" id="reg_email" name="email" value="" placeholder="email@domain.com (this will be your user name">
					<span class="error">This field is required</span>
				</div>
        	</div>

			<div class="form-group">
				<label for="reg_password" class="control-label col-sm-3">Password:<strong style="color:darkred;">*</strong></label>
				<div class="col-sm-6">
					<input class="form-control" type="password" id="reg_password" name="password" placeholder="password"/>
					<span class="error">This field is required</span>
				</div>
        	</div>

			<div class="form-group">
				<label for="reg_userRole" class="col-sm-3 control-label">Role:<strong style="color:darkred;">*</strong></label>
				<div class="col-sm-6">

					<input type="radio" id="reg_userRole" name="userRole" value="A" checked> Administrator<br>
					<input type="radio" id="reg_userRole" name="userRole" value="U"> Student

				</div>
        	</div>

			<div id="contact_submit">
				<!-- <button type="submit">Submit</button> -->
				<input type="submit" class="btn btn-info" value="Register">
			</div>
    </form>
</div>

<br>
<br>
<br>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/navFooter.php"); ?>

</body>
</html>
