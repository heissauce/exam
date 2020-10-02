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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	
  	<link rel="stylesheet" href="custom.css?v=1.1">

	<script>
		function setActiveFlag(qID) {

			// determined the current status of the question by the checkbox value
			// this was originally set by the dastabase but can be changed here on the fly

			//alert( $("#qActiveFlag" + qID).is(":checked") ); // jquery
			//alert( document.getElementById("qActiveFlag" + qID).checked ); // javascript
			active = ($("#qActiveFlag" + qID).is(":checked") ) ? 1: 0;  // jquery
			//alert(active);

			var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							var resp = xmlhttp.responseText; // return values go here

							if(resp == 1){
								// no response needed
							} else {
								active = (active == 1) ? false : true;
								$("#qActiveFlag" + qID).prop("checked", active);
								alert(resp); // error updating the database
							}
						} //end if
					} // end  function
				//xmlhttp.open("GET","setQuestionActive.php?questionID=" + qID + "&active=" + flag, true);
				xmlhttp.open("GET","setQuestionActive.php?active=" + active + "&questionID=" + qID, true);
				xmlhttp.send();
		} // end function setActiveFlag()
	</script>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/navbar.php"); ?>



<div class="container">
	<br><br>
    <h2>Edit Exam Questions</h2>
</div>

<div>
<?php
	// your php code here

	$query = "SELECT question,questionID,active FROM questions";
	$qresult = mysqli_query($connection, $query);

	echo "<br><br><table class='table'><thead class='thead-dark'><tr><th>Questions</th><th>Answers</th><th>Active Flag</th></tr></thead>";

	while($qrow = mysqli_fetch_assoc($qresult))
	{

		echo "<tr><td>".$qrow["question"]."</td>";
		$questionID = $qrow['questionID'];

		$query = "SELECT answerValue, correct FROM answers WHERE questionID = '$questionID' ";
		$aresult = mysqli_query($connection, $query);
		echo "<td>";

		while($arow = mysqli_fetch_assoc( $aresult))
		{
			if($arow["correct"])
				echo "<input type='checkbox' value='1' checked='checked' disabled>".$arow["answerValue"]."<br>";
			else
				echo "<input type='checkbox' value='0' disabled>".$arow["answerValue"]."<br>";
		}
		echo "</td>";

		if($qrow["active"])
			echo '<td><input id="qActiveFlag'.$questionID.'" onclick="setActiveFlag('.$questionID.')" type="checkbox" checked="checked" value="1" /></td></tr>';

		else
			echo '<td><input id="qActiveFlag'.$questionID.'" onclick="setActiveFlag('.$questionID.')" type="checkbox" value="0"/></td></tr>';
	}
	echo "</table>";

?>
</div>
<br>
<br>
<br>
<br>
<br>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/navFooter.php"); ?>


</body>
