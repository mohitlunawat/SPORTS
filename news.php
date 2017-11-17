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
	$data=json_decode(file_get_contents("php://input"));
	$news=mysql_real_escape_string($data->latest);
	$topic='news';
	$sql="INSERT INTO info VALUES('".$topic."','".$news."')";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
	
	}
}
?>