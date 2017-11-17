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

	$query = "SELECT * FROM venue";
	$result = mysqli_query($conn,$query);
	$data = array();
	if( $result)
	{
	while($row = $result->fetch_assoc()){
	$data[] = $row['name'];
	$data[]= $row['city'];
	$data[]= $row['seat'];
	$data[]= $row['image'];
	}
}
$data1 = json_encode($data);
echo $data1;
}
?>