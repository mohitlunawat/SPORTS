<?php
error_reporting(0);
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
	$tname=$_SESSION['tournname'];
	$sql="SELECT * FROM matchcount WHERE tour='$tname'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		while($row= $result->fetch_assoc())
		{
			$count=$row['count'];
		}
	}
	$id="MOO".$count;
}