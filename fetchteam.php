<?php
session_start();
$server="localhost";
$username="root"; 
$password="";
$dbname="sports";
$conn=mysqli_connect($server,$username,$password,$dbname);
if(!$conn)
{
	die('could not connect'.mysql_error());
}
else
{ 
	$tour=$_SESSION['tournname'];
	$query = "SELECT * FROM t_details WHERE tname='$tour'";
$result = mysqli_query($conn,$query);
$data = array();
if( $result)
{
	while($row = $result->fetch_assoc()){
	$data[] = $row['teamname'];
	}
}
$data1 = json_encode($data);
echo $data1;
}
?>