<?php
session_start();
$team=$_SESSION['teamname'];
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
	$sql="SELECT * FROM playercount WHERE teamname='$team'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		while($row= $result->fetch_assoc())
		{
			$count=$row['count'];
		}
	}
	$id="POO".$count;
}
?>