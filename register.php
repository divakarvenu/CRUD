<html>
<head>
	<title>Register</title>

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
include_once('navigation.php') ;
include_once("connection.php");


if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysql_query("INSERT INTO login(Name, Email, Username, Password) VALUES('$name', '$email', '$user','$pass')", $conn)
			or die("Could not execute the insert query.");

		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='index.php'>Login</a>";
	}
} else {
?>

<div class="container">
		<div class="col-md-12" style="margin: 0 auto;margin-top: 5%;">
			<div id="register">
			<form name="form1" method="post" action="">
			  <div class="form-group">
			    <label for="Full Name">Full Name</label>
			    <input type="text" name="name" class="form-control" placeholder="Full Name">
			  </div>
			  <div class="form-group">
			    <label for="Email">Email</label>
			    <input type="text" name="email" class="form-control" placeholder="Email">
			  </div>
				<div class="form-group">
					<label for="Username">Username</label>
					<input input type="text" name="username" class="form-control" placeholder="Username">
				</div>
				<div class="form-group">
					<label for="Password">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>
				<input type="submit" name="submit" value="Submit" class="btn btn-default">
			</form>
		</div>
		</div>
	</form>
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
		
</div>
<?php
}
?>
</body>
</html>
