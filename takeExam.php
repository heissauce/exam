<?php require('config.php'); ?>
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
  	<link rel="stylesheet" href="custom.css?v=1.1">

	<script>

	</script>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/navbar.php"); ?>

<div class="container">
	<br><br>
    <h2>Take Exam</h2>
</div>

<div>
  <?php
  	$query = "SELECT question,questionID,active FROM questions";
  	$qresult = mysqli_query($connection, $query);

  	echo "<br><br><table class='table'><thead class='thead-dark'><tr><th>Questions</th><th>Answers</th></tr></thead>";

  	while($qrow = mysqli_fetch_assoc($qresult))
  	{

  		echo "<tr><td>".$qrow["question"]."</td>";
  		$questionID = $qrow['questionID'];

  		$query = "SELECT questionID, answerValue FROM answers WHERE questionID = '$questionID' ";
  		$aresult = mysqli_query($connection, $query);
  		echo "<td>";

  		while($arow = mysqli_fetch_assoc( $aresult))
  		{
  				echo "<input type='radio' name ='".$arow["questionID"]."'>".$arow["answerValue"]."<br>";
  		}
  		echo "</td>";

  	}
  	echo "</table>";

    echo '<button type="button" class="btn btn-dark" type="submit">Submit</button>'

  ?>

</div>
<br>
<br>
<br>
<br>
<br>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/navFooter.php"); ?>


</body>
