<?php include 'playerid.php' ?>
<?php
session_start();
$tour=$_SESSION['tournname'];
$team=$_SESSION['teamname'];
?>
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
  select
  {
  	width:250px;
  }
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
<div class="container-fuild" style="height:662px;width:1365px;">
	<div class="container-fluid" style="height:50px;width:1365px;">
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
        <li class="active"><a href="schedule.php">Create Tournament</a></li>
        <li><a href="final.php">Schedule Tournament</a></li>
        <li><a href="venue.php">Add Venues</a></li>
        <li><a href="venuedet.php">Venue Details</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
	</div>
<div class="container-fluid" ng-app="myapp" ng-controller="ctrl" style="height:612px;width:1365px">
   <div class="tournament">
  <h1 style="text-align:center;color:grey;">Schedule Tournament</h1>
</div>
</br>
<div class="container">
    <table border="0">
    <tr>
<td><h3 style="margin-left:300px;">Tournament Name:</td><td><input type="text" ng-model="tname" ng-init="tname='<?php echo $tour ?>'" ></td>
</tr>
<tr>
  <td><h3 style="margin-left:300px;">Team Name:</td><td><input type="text" ng-model="team" ng-init="team='<?php echo $team ?>'" ></td>
</tr>
<tr>
    <td><h3 style="margin-left:300px;">Player_ID:</td><td><input type="text" ng-model="id1" ng-init="id1='<?php echo $id ?>'" ></td>
  </tr>
  <tr>
      <td><h3 style="margin-left:300px;">Player Name:</td><td><input type="text" ng-model="pname" ></h3></td>
    </tr>
    <tr>
      <td><h3 style="margin-left:300px;">Country:</td><td><input type="text" ng-model="country"></h3></td>
      </tr>
      <tr> 
        <td><h3 style="margin-left:300px;">Skill:</td><td><input type="text" ng-model="skill"></h3></td>
      </tr>
    </table>
        <button type="button" class="button1"ng-click="insert()" style="margin-left:600px;"><span class="glyphicon glyphicon-save"></span>SAVE</button> 
</div>
</div>
</body>
</html>
<script>
  var app = angular.module('myapp',[]);
    app.controller('ctrl',function($scope,$http)
{ 
$scope.insert=function()
    {  

      $http.post("playerinsert.php", {
    'tname':$scope.tname,
    'team':$scope.team,
    'id1':$scope.id1,
    'pname':$scope.pname,
    'country':$scope.country,
    'skill':$scope.skill   

    })
    .then(function(data,status,headers,config){
      window.location="teamedit.php";
      });
    }
});
 </script>