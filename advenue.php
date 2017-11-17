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
$id1 = mysql_real_escape_string($data->id);
$select = mysql_real_escape_string($data->select);
$vname = mysql_real_escape_string($data->vname);
$city = mysql_real_escape_string($data->city);
$sql="INSERT INTO venue VALUES('".$id1."','".$select."','".$vname."','".$city."')";
$result=mysqli_query($conn,$sql);
if($result)
{

		$sql1="SELECT count FROM count WHERE id1=1";
		$result1=mysqli_query($conn,$sql1);
		if($result1)
		{
			while ($row = $result1->fetch_assoc())
					{
						$count=$row['count'];
					}
		}
		else
		{
			echo "not fetched";
		}
		$count=$count+1;
		$sql2="UPDATE count SET count='$count' WHERE id1=1";
		$result2=mysqli_query($conn,$sql2);
		if(!$result2)
		{
			echo "not updates";
		}
}
}

?>

