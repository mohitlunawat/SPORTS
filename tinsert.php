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
$type1 = mysql_real_escape_string($data->type1);
$sdate = mysql_real_escape_string($data->sdate);
$edate = mysql_real_escape_string($data->edate);
$sql2="INSERT INTO tournament VALUES('".$tname."','".$type1."','".$sdate."','".$edate."')";
$result2=mysqli_query($conn,$sql2);
                if($result2)
                {
                  $count=0;
                  $sql="INSERT INTO teamcount VALUES('".$tname."','".$count."')";
                  $result=mysqli_query($conn,$sql);
                }
                else
                {
                  echo "not success";
                }
}