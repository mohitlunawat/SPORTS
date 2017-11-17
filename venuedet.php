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
  <style>
.tournament{
box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 5px 10px 0 rgba(0, 0, 0, 0.19);
height:100px;
padding-top:25px;
margin-bottom:15px;
color:#BDBDBD;
}
.new{
  margin-left: 400px;
}
.button1 {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
</style>
<script>
$(document).ready(function()
{
	$("img").mouseenter(function()
	{
		$(this).animate({width:"250px",height:"250px"});
		
	});
	$("img").mouseleave(function()
	{
		
		$(this).animate({width:"100px",height:"100px"});
	});
});
</script>
</head>

<body>
	<div class="container-fluid" style="height:662px;width:1365px;">
  <div class="container-fluid" style="height:40px;width:1365px;">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand">Sports</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
        <li><a href="admin.php">Home</a></li>
        <li><a href="tdetails.php">Tournament Details</a></li>
        <li><a href="schedule.php">Create Tournament</a></li>
        <li><a href="final.php">Schedule Tournmaent</a></li>
        <li><a href="venue.php">Add Venues</a></li>
        <li><a href="venuedet.php">Venue Details</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  </div>
  
  <div class="tournament">
  <h2 style="text-align:center;color:grey;">Venue Details:</h2></div>
  <div class="new">
	<form method="POST" action="venuedet.php">
	Enter the venue city:<input type="text" name="city">
	<input type="submit" class="button1">	
	</form>
</div>
</body>
</html>
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
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$city=$_POST['city'];
	$query = "SELECT * FROM venue WHERE city='$city'";
	$result = mysqli_query($conn,$query);
	if( $result)
	{
	while($row = $result->fetch_assoc()){
	$name= $row['name'];
	$city= $row['city'];
	$seat= $row['seat'];
	$img= $row['image'];
	}

	}
	echo "<div class='new'>	";
	echo "<h2>NAME:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$name."<br></h2>";
	echo "<h2>CITY:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$city."<br></h2>";
	echo "<h2>SEAT CAPACITY:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$seat."<br></h2>";
	echo "<img src='$img' style='width:200px;height:100px;'>";
	echo "</div>";
}
}
?>