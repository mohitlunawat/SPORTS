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
$data = json_decode(file_get_contents("php://input"));
$tname = mysql_real_escape_string($data->tname);
$team = mysql_real_escape_string($data->team);
$region = mysql_real_escape_string($data->region);
$sql2="INSERT INTO t_details VALUES('".$tname."','".$team."','".$region."')";
$result2=mysqli_query($conn,$sql2);
                if($result2)
                {
                	$count=0;
                	$sql="INSERT INTO playercount VALUES('".$team."','".$count."')";
                	$result=mysqli_query($conn,$sql);
                }
                else
                {
                  echo "not success";
                }
}