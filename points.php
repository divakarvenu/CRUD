<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

//including the database connection file
include_once("connection.php");

$id= $_GET['id'];
$name=$_GET['name'];

//fetching data in descending order (lastest entry first)
$result = mysql_query("SELECT * FROM `point` where Employeeid=$id");


if(isset($_POST['submit'])) {
  $date = $_POST['date'];
	$a = $_POST['a'];
	$b = $_POST['b'];
	$c = $_POST['c'];
	$d = $_POST['d'];
	$e = $_POST['e'];
	mysql_query("INSERT INTO point(Employeeid,Employeename,Date, A, B,C,D,E) VALUES('$id', '$name', '$date','$a','$b','$c','$d','$e')", $conn)
	or die("Could not execute the insert query.");
	header("Refresh:0");
}


if(isset($_POST['edit'])) {
  $editdate = $_POST['editdate'];
	$edita = $_POST['edita'];
	$editb = $_POST['editb'];
	$editc = $_POST['editc'];
	$editd = $_POST['editd'];
	$edite = $_POST['edite'];
	$editid=$_POST['editid'];
	mysql_query("UPDATE point SET Date=$editdate, A=$edita,B=$editb,C=$editc,D=$editd,E=$edite WHERE id=$editid", $conn)
	or die("Could not execute the insert query.");
  header("Refresh:0");
}

include_once("header.php");
include_once("navigation.php");
?>




<body>
	<!-- <a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a> -->
	<br/><br/>
  <h3><button type="button" id="adddata" class="btn btn-success" style="margin-top:5%">Add Data</button></h3>
	<table class="table table-bordered" style="margin-top:5%">
		<tr>
			<td>ID</td>
			<td>Employee name</td>
			<td>Date</td>
			<td>A</td>
			<td>B</td>
			<td>C</td>
			<td>D</td>
			<td>E</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
		<?php
		while($res = mysql_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$res['Employeeid']."</td>";
			echo "<td>".$res['Employeename']."</td>";
			echo "<td>".$res['Date']."</td>";
			echo "<td>".$res['A']."</td>";
			echo "<td>".$res['B']."</td>";
			echo "<td>".$res['C']."</td>";
			echo "<td>".$res['D']."</td>";
			echo "<td>".$res['E']."</td>";
			echo '<td><button type="button" id="'.$res['id'].'" class="btn btn-default edit">Edit</button></td>';
			echo '<td><button type="button" id="'.$res['id'].'" class="btn btn-default delete">Delete</button></td>';
		//	echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add points</h4>
	      </div>
	      <div class="modal-body">
					<form name="form1" method="post" action="">
						<div class="form-group">
							<label for="Full Name">Date</label>
							<input type="text" name="date" class="form-control">
						</div>
						<div class="form-group">
							<label for="Email">A</label>
							<input type="text" name="a" class="form-control" >
						</div>
						<div class="form-group">
							<label for="Username">B</label>
							<input input type="text" name="b" class="form-control">
						</div>
						<div class="form-group">
							<label for="text">C</label>
							<input type="text" name="c" class="form-control" >
						</div>
						<div class="form-group">
							<label for="text">D</label>
							<input type="text" name="d" class="form-control" >
						</div>
						<div class="form-group">
							<label for="text">E</label>
							<input type="text" name="e" class="form-control" >
						</div>
						 <input type="submit"  name="submit" style="display:none" value="Submit" id="formsubmit" class="btn btn-default">
					</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" id="modalsubmit" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="editmyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add points</h4>
	      </div>
	      <div class="modal-body">
					<form name="form1" method="post" action="">
						<div class="form-group">
							<label for="Full Name">Date</label>
							<input type="text" id="editdate" name="editdate" class="form-control">
						</div>
						<div class="form-group">
							<label for="Email">A</label>
							<input type="text"  id="edita" name="edita" class="form-control">
						</div>
						<div class="form-group">
							<label for="Username">B</label>
							<input input type="text"id="editb" name="editb" class="form-control">
						</div>
						<div class="form-group">
							<label for="text">C</label>
							<input type="text" id="editc" name="editc" class="form-control" >
						</div>
						<div class="form-group">
							<label for="text">D</label>
							<input type="text" id="editd" name="editd" class="form-control" >
							<input type="text" id="editid" name="editid" class="form-control" style="display:none">
						</div>
						<div class="form-group">
							<label for="text">E</label>
							<input type="text" id="edite" name="edite" class="form-control" >
						</div>
						 <input type="submit"  name="edit" style="display:none" value="Submit" id="editformsubmit" class="btn btn-default">
					</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" id="editmodalsubmit" class="btn btn-primary">Save changes</button>
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

<script>
$(document).ready(function(){

	$('#adddata').click(function(){
		$('#myModal').modal('show')
	});

	$('.edit').click(function(){
			var id=$(this).attr('id');
			$.ajax({
						  method: "POST",
						  url: "edit.php",
						  data: { id:id }
						})
					  .done(function( msg ) {
					    var data=JSON.parse(msg);
							setter(data);
					  });
				});

		function setter(data){
			console.log(data);

			data[0]['A']
			data[0]['B']
			data[0]['C']
			data[0]['D']
			data[0]['E']
			data[0]['id']
			$('#editdate').val(data[0]['Date']);
			$('#edita').val(data[0]['A']);
			$('#editb').val(data[0]['B']);
			$('#editc').val(data[0]['C']);
			$('#editd').val(data[0]['D']);
			$('#edite').val(data[0]['E']);
			$('#editid').val(data[0]['id']);
			$('#editmyModal').modal('show');
		}

	$('.delete').click(function(){
		var id=$(this).attr('id');
		$.ajax({
						method: "POST",
						url: "delete.php",
						data: { id:id }
					})
					.done(function( data ) {
						window.location.reload();
					});
	});

	$('#editmodalsubmit').click(function(){
		 $('#editformsubmit').click();
	})

	$('#modalsubmit').click(function(){
		 $('#formsubmit').click();
	})


});
</script>

</html>
