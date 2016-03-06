<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysql_query("SELECT Employeeid,Employeename,leadname FROM `employee`");
?>

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

	<?php include_once('navigation.php') ?>

	<table class="table table-bordered" style="margin-top:5%">
		<tr>
			<td>ID</td>
			<td>Employee name</td>
			<td>Lead name</td>
			<td>Action</td>
		</tr>
		<?php
		while($res = mysql_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$res['Employeeid']."</td>";
			echo "<td>".$res['Employeename']."</td>";
			echo "<td>".$res['leadname']."</td>";
			echo '<td><a href="points.php?id='.$res['Employeeid'].'&name='.$res['Employeename'].'"<button type="button" class="btn btn-success">Enter Data</button></a></td>';
		//	echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>

	<div class="navbar navbar-default navbar-fixed-bottom" style="background-image:none;background-color:black">
	    <div class="container">
	      <p class="navbar-text pull-left">
	           <a href="" target="_blank" ></a>
	      </p>

	      <a href="" class="navbar-btn btn-danger btn pull-right">
	      <span class="glyphicon glyphicon-star"></span>Visualbi</a>
	    </div>

</body>
</html>
