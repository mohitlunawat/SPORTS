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
	$sql2="SELECT * FROM playercount WHERE teamname='kjk'";
	$result2=mysqli_query($conn,$sql2);
	if($result2)
	{
		echo "khjh";
		while($row = $result2->fetch_assoc()){
		
			$count=$row['count'];
		}
		$count=$count+1;
	}

	}
	?>