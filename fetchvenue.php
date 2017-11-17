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
	$sql="SELECT * FROM tournament WHERE name='$tour'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		while($row = $result->fetch_assoc()){
		$type = $row['TYPE'];
	}
	}
	if($type=='cricket')
	{
	$sql1="SELECT * FROM venue WHERE type='$type'";
	$result1=mysqli_query($conn,$sql1);
	if($result1)
	{
		while($row = $result1->fetch_assoc()){
		$data[] = $row['name'];
	}
	}
	$data1 = json_encode($data);
	echo $data1;
	}
	else
	{
		$sql1="SELECT * FROM venue WHERE type='tennisbadminton'";
		$result1=mysqli_query($conn,$sql1);
		if($result1)
		{
		while($row = $result1->fetch_assoc()){
		$data[] = $row['name'];
		}
		}
		$data1 = json_encode($data);
		echo $data1;

	}



}
	?>