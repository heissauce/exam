<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<title>Main Login Page</title>

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


<div class="container">
	<br><br>
    <h2>Main page</h2>
    <!--<?php echo '<p>Hello ' . $_SESSION['username'] . '<p>'; ?>-->
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/navFooter.php"); ?>


</body>
