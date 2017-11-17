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
</head>
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
<body>
<div class="container-fluid">
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
        <li class="active"><a href="tournament.php">Schedule Tournament</a></li>
        <li><a href="venue.php">Add Venues</a></li>
        <li><a href="venuedet.php">Venue Details</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </div>
  </div>
</nav>
</div>
<div class="container-fluid" ng-app="myapp" ng-controller="ctrl" style="margin-top:70px; width:1365px">
	<form  id="my" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="tournament">
	<h1 style="text-align:center;color:grey;">Schedule Tournament</h1>
</div>
	<br>
  <div class="container">
    <table border="0">
    <tr>
	<td><h3 style="margin-left:200px;">Enter the name of the Tournament:</td><td><input type="text" ng-model="tname" name="tname"></h3></td>
</tr>
<tr>
	<td><h3 style="margin-left:200px;">Type of Tournament:</td><td><select ng-model="type1"><option value="cricket">CRICKET</option>
    <option value="badmintion">BADMINTION</option>
    <option value="tennis">TENNIS</option>
</select></h3><td>
</tr>
  <tr>
    <td><h3 style="margin-left:200px;">Enter starting date:</td><td><input type="date" ng-model="sdate" name="sdate"></h3></td>
  </tr>
  <tr>
  <td><h3 style="margin-left:200px;">Enter ending date:</td><td><input type="date" ng-model="edate" name="edate"></h3></td>
  </tr>
  </table>
</br>
	<button type="button"class="button1" style="margin-left:600px;" ng-click="insert()"><span class="glyphicon glyphicon-save"></span>SAVE</button>
</div>
</form>
</div>
</body>
</html>
 <script>
  var app = angular.module('myapp',[]);
    app.controller('ctrl',function($scope,$http)
{ 
 
    $scope.insert=function()
    {   
      $http.post("tinsert.php", {
    'tname':$scope.tname,
    'type1':$scope.type1,
    'sdate':$scope.sdate,
    'edate':$scope.edate
    })
    .then(function(data,status,headers,config){
      alert("TOURNAMENT SUCCESSFULLY CREATED CLICK EDIT TO ADD TEAM");
      document.getElementById('my').submit();
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      header("Location:schedule.php");
    }
      ?>
      });
    }
});
</script>
