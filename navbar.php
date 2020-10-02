<?php include($_SERVER['DOCUMENT_ROOT'] . "/istimeout.php"); ?>

<div class="navbar navbar-dark bg-dark navbar-expand-md fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" id="myCollaspedBtn" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
          <span class="sr-only">Toggle navigation</span>
      	  <span class="navbar-toggler-icon"></span>
	  	  <span class="icon-bar"></span>
	  	  <span class="icon-bar"></span>
	  </button>
      <a class="navbar-brand" href="main.php">CISC 158 Final Exam System</a>
	</div>

	<div>
		<ul class="nav navbar-nav ml-auto">

	        <?php
		        // if someone is logged in
		        // echo $_SESSION['username'] . "<BR>";
		        // session_start();


		        if(!empty($_SESSION['username'])) {
			        $username = $_SESSION['username'];
			      	echo "<li>Hello " . $username . "</li>";

					if($_SESSION['userRole'] == "A") { // check to see it the user is an instructor
						echo "<li class='nav-item'><a class='nav-link' href='Register.php'>Register New Users</a></li>";
						echo "<li class='nav-item'><a class='nav-link' href='editExamQuestions.php'>Edit Exam Questions</a></li>";
						//echo "<li><a href='InstructorView.php'>Instructor View</a></li>";
					} else { // must be a student
						echo "<li class='nav-item'><a class='nav-link' href='takeExam.php'>Take Exam</a></li>";
						//echo "<li><a href='StudentActivities.php'>Student Activities</a></li>";
					}
			?>

		  	<li class='nav-item'><a class='nav-link' href="logout.php">Log Out</a></li>
		</ul>
	 </div>

			<?php
				} else { // means no one is logged in
          	?>
	        <!-- <li><a href="register.php">Register</a></li> -->
	        <li class="dropdown" class='nav-item'>
	            <a  class='nav-link' class="dropdown-toggle" id="loginDropdown" href="#" data-toggle="dropdown">Log In<strong class="caret"></strong></a>

	            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 10px;">
	                <form action="checklogin.php" method="post">
	                    Email Address:<br />
	                    <input type="text" name="myusername" id="loginemail" />
	                    <a href="javascript:resetpw();">Reset Password</a>
	                    <div id="pwdiv"></div>
	                    <br /><br />
	                    Password:<br />
	                    <input type="password" name="mypassword" value="" />
	                    <br /><br/>
	                    <input type="submit" class="btn btn-info" value="Login" />
	                </form>
	            </div> <!-- class="dropdown-menu" -->
	       <?php
	       		}
           ?>
        </ul>
      </div>
  </div>
 </div>
 <!-- end navbar header -->
