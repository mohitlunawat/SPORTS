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
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$to=$_POST['to'];
		$ti = explode(':', $to);
		$to1 = (int)$ti[0];
		echo $to1;


		$end=$_POST['tt'];
		$ti2 = explode(':', $end);
		$end1 = (int)$ti2[0];
		echo $end1;


		$sql="SELECT * FROM try";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			while($row=$result->fetch_assoc())
			{
				$time=$row['to'];
				$ens=$row['time'];

			}
		}
		$time1 = explode(':', $time);
		$hour1 = (int)$time1[0];
		
		$time2 = explode(':', $ens);
		$hour2 = (int)$time2[0];
		$number=range($hour1,$hour2);
		if(!(in_array($to1,$number))&&!(in_array($end1,$number)))
		{
			echo "possible"; 
		}
		else
		{
			echo "not possible";
		}
    	}
		//$sql="INSERT INTO try VALUES('".$to."','".$end."')";
		//$result=mysqli_query($conn,$sql);

	}
?>
<html>
<body>
	<form method="POST" action="time.php">
	to<input type="time" name="to">
	time<input type="time" name="tt">
	<input type="submit" value="submit">
</form>
</body>
</html>