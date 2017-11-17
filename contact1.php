<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sports Scheduler</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <style>
  .jumbotron{
    width:100%;
    height: 800px;
    margin-top: -1.5cm;
  }
  body {
      font-family: 'Roboto';
      }
  </style>
</head>
<body>
  <nav class="navbar navbar-inverse">
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
        <li><a href="home.php">Home</a></li>
        <li><a href="tdetails1.php">Tournament Details</a></li>
        <li class="active"><a href="contact1.php">Contact</a></li>
        <li><a href="login.php">Login</a></li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron">
  <div style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);height:100px;padding-top:25px;margin-bottom:15px;color:#BDBDBD
;">
  <div class="container-fluid">
<h2 style="font-weight:200;padding-left:10px;"> CONTACT </h2>
</div></div>
  <div class="container-fluid">

<div class="row">
    <div class="col-md-5" style="padding-left:20px;">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Bangalore,Karnataka</p>
      <p><span class="glyphicon glyphicon-phone"></span> +91 9845256424</p>
      <p><span class="glyphicon glyphicon-envelope"></span> sports@gmail.com</p> 
    </div>
</br>
    </div>
    </div>

<div id="googleMap" style="height:400px;width:90%;"></div>
<script>
function myMap() {
var myCenter = new google.maps.LatLng(12.9716,77.5946);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf_e9kwdB8fM6q72maKOsVoyby-vgxIn4&callback=myMap"></script>
</div>
</body>
</html>