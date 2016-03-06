<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
// including the database connection file
include_once("connection.php");
//getting id from url
$id = $_POST['id'];

//selecting data associated with this particular id
$result = mysql_query("SELECT Employeeid,Employeename,Date,A,B,C,D,E,Total,id FROM point WHERE id=$id");
$rows = array();
while($res = mysql_fetch_array($result))
{
    $rows[] = $res;

}
echo(json_encode($rows));
?>
