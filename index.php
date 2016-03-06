<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" href="style.css">

		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<body>

	<?php
	include_once("navigation.php");
  include("connection.php");
	if(isset($_POST['submit'])) {



		$user = mysql_real_escape_string($_POST['username']);
		$pass = mysql_real_escape_string($_POST['password']);


		if($user == "" || $pass == "") {
			echo "Either username or password field is empty.";
			echo "<br/>";
			echo "<a href='index.php'>Go back</a>";
		} else {
			$result = mysql_query("SELECT * FROM login WHERE Username='$user' AND Password='$pass'",$conn)
						or die("Could not execute the select query.");
			$row = mysql_fetch_assoc($result);

			if(is_array($row) && !empty($row)) {
				$validuser = $row['Username'];
				$_SESSION['valid'] = $validuser;
				$_SESSION['name'] = $row['Name'];
				$_SESSION['id'] = $row['Id'];
			} else {
				echo "Invalid username or password.";
			}

			if(isset($_SESSION['valid'])) {
				header('Location: view.php');
			}
		}
	}

	if(isset($_SESSION['valid'])) {
		$result = mysql_query("SELECT * FROM login", $conn);

}
	// } else {
	// 	echo "You must be logged in to view this page.<br/><br/>";
	// 	echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	// }

	?>

	<div class="container" style="margin-top:5%">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Welcome</h3>
			 	</div>
			  	<div class="panel-body">
			    		<form name="form1" method="post" action="">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="yourmail@example.com" name="username" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<!--	<div class="checkbox">
			    	     <label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>-->
			    		<input class="btn btn-lg btn-success btn-block"   name="submit" type="submit" value="Login">
			    	</fieldset>
			      	</form>
                      <hr/>
                    <center><h4>OR</h4></center>
										<a href='register.php'>
                    <input class="btn btn-lg btn-facebook btn-block" type="submit"  value="Register"></a>
			    </div>
			</div>
		</div>
	</div>
</div>

<div class="navbar navbar-default navbar-fixed-bottom"= style="background-image:none;background-color:black">
    <div class="container">
      <p class="navbar-text pull-left">
           <a href="" target="_blank" ></a>
      </p>

      <a href="" class="navbar-btn btn-danger btn pull-right">
      <span class="glyphicon glyphicon-star"></span>Visualbi</a>
    </div>

</body>
</html>
