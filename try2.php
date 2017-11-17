<?php
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
	$query = "SELECT * FROM tournament";
$result = mysqli_query($conn,$query);
$data = array();
if( $result)
{
	while($row = $result->fetch_assoc()){
	$data[] = $row['name'];
	}
}
$data1 = json_encode($data);
echo $data1;
}
?>