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
	$sql="SELECT count FROM count WHERE id1=1";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
			while ($row = $result->fetch_assoc())
					{
						$count=$row['count'];
					}
	}
	$value="V0".$count;

}
?>
