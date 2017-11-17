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
$id1 = mysql_real_escape_string($data->id1);
$pname = mysql_real_escape_string($data->pname);
$country = mysql_real_escape_string($data->country);
$skill = mysql_real_escape_string($data->skill);
$sql="INSERT INTO player_details VALUES('".$tname."','".$team."','".$id1."','".$pname."','".$country."','".$skill."')";
$result=mysqli_query($conn,$sql);
if($result)
{
	$sql2="SELECT * FROM playercount WHERE teamname='$team'";
	$result2=mysqli_query($conn,$sql2);
	if($result2)
	{
		echo "khkj";
		while($row = $result2->fetch_assoc()){
		
			$count=$row['count'];
		}
		$count=$count+1;
	}
	else
		{
			echo "nit sucess";
		}
	$sql3="UPDATE playercount SET count='$count' WHERE teamname='$team'";
		$result3=mysqli_query($conn,$sql3);
		if($result3)
		{
			echo "dfd";
		}	
		else
		{
			echo "dfdfd";
		}

}
}
?>