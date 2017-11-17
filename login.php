<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sports Scheduler</title>
  <script src="angular.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
	<style>
	 td
    {
      font-size: 18px;
      height:52px;

    }
    table
    {
      margin-left: 350px;
    }
    input
    {
       border-radius:10px
    }
    #login{
    	margin-top: 150px;
    }
	</style>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand">Sports</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="tdetails.php">Tournament Details</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li class="active"><a href="login.php">LOGIN</a></li>

      </ul>
    </div>
  </div>
</nav>
		<div class="container" id="login">
		<form method="POST" action="login.php">
			<table border="0">
    <tr>
		<td><b>USERNAME:</b></td>
		<td><input type="text" name="user"></td>
	</tr>
	<tr>
		<td><b>PASSWORD:</b></td>
		<td><input type="password" name="pass"></td>
	</tr>
</table>
		<button type="submit" class="btn btn-primary" style="margin-left:600px">Login </button>
		</form>
	</div>
		</body>
		</html>
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
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$sql="SELECT * FROM login WHERE username='$user' AND password='$pass'";
		$result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
		if($count==1)
		{
			$_SESSION['admin']="admin";
			header("Location: admin.php");
			
		} 
		else
		{
			echo "<script>";
      echo "alert('alert not sucess');";
      echo "window.location='login.php';";
      echo "</script>";
		}
	}
}
?>