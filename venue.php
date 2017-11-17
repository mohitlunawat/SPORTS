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
</head>
<body>
	
 
<nav class="navbar navbar-inverse navbar-fixed-top">
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
        <li><a href="admin.php">Home</a></li>
        <li><a href="tdetails.php">Tournament Details</a></li>
        <li><a href="schedule.php">Create Tournament</a></li>
        <li><a href="final.php">Schedule Tournament</a></li>
        <li class="active"><a href="venue.php">Add Venues</a></li>
        <li><a href="venuedet.php">Venue Details</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
</div>
</nav>
		<div class="container-fluid" style="margin-top:40px; width:1365px">
			<form method="POST" action="venue.php">
			<?php include 'count.php' ?>
			<div class="tournament">
	<h1 style="text-align:center;color:grey;">Add Venues</h1>
</div>
	<br>
		<div class="container-fluid">
			<table border=0>
				<tr>
					<td><h3 style="margin-left:400px;">Venue Id:</h3></td>
					<td><input type="text"   name="id" value="<?php echo $value ?>">
				</tr>
				<tr>
					<td><h3 style="margin-left:400px;">Select The Type</h3></td>
					<td><select name="venue">
						<option value="cricket">CRICKET</option>
						<option value="tennisbadminton">TENNIS&BADMINTON</option>
						</select></td>
				</tr>
				<tr>
					<td><h3 style="margin-left:400px;">Venue Name</h3></td>
					<td><input type="text" name="vname"></td>
				</tr>
				<tr>
					<td><h3 style="margin-left:400px;">City</h3></td>
					<td><input type="text" name="city"></td>
				</tr>
				<tr>
					<td><h3 style="margin-left:400px;">Seating Capacity</h3></td>
					<td><input type="text" name="seat"></td>
				</tr>
				<tr>
					<td><h3 style="margin-left:400px;">Upload an Image</h3></td>
					<td><input type="text" id="img" name="image">
					<td><input type="file" id="image" ></td>
				</tr>
			</table>
			<button type="submit" class="btn btn-primary" style="margin-left:700px;">SAVE</button>
		</div>
	</div>
</form>

</body>
</html>
<script type="text/javascript">

    $(function()
    {
        $('#image').on('change',function ()
        {
            var filePath = $(this).val();
            var path=filePath.split(/(\\|\/)/g).pop()
            document.getElementById("img").value = path;
        });
    });

</script>
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
	$id=$_POST['id'];
	$type=$_POST['venue'];
	$name=$_POST['vname'];
	$city=$_POST['city'];
	$seat=$_POST['seat'];
	$img=$_POST['image'];
	$sql="INSERT INTO venue VALUES('".$id."','".$type."','".$name."','".$city."','".$seat."','".$img."')";
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
		echo "<script>";
		echo "alert('success')";
		echo "</script>";
}
}
}

	?>