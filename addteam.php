<?php
session_start();
$tour=$_SESSION['tournname'];
echo $tour;
?>
<!DOCTYPE html>

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
<div class="container-fuild">
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
        <li class="active"><a href="final.php">Schedule Tournament</a></li>
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
	<form  method="POST" id="my" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="tournament">
	<h1 style="text-align:center;color:grey;">Add Team</h1>
</div>
	<br>
  <div class="container">
    <table border="0">
    <tr>
 <td><h3 style="margin-left:300px;">Select the Tournament:</td><td><input type="text" ng-model="tname" ng-init="tname='<?php echo $tour ?>'"></td>
  </tr>
  <tr>
  <td><h3 style="margin-left:300px;">Enter the name of the Team:</td><td><input type="text" ng-model="team" name="name"></td>
</tr>
<tr>
  <td><h3 style="margin-left:300px;">Enter the region/state:</td><td><input type="text" ng-model="region" name="pno"></td>
</tr>
</table>
</br>
 <button type="button" class="button1"ng-click="insert()" style="margin-left:600px;"><span class="glyphicon glyphicon-save"></span>SAVE</button>
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

      $http.post("teaminsert.php", {
    'tname':$scope.tname,
    'team':$scope.team,
    'region':$scope.region,
    })
    .then(function(data,status,headers,config){
      
      document.getElementById('my').submit();
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = json_decode(file_get_contents("php://input"));
      $team = mysql_real_escape_string($data->team);
      session_start();
      $_SESSION['teamname']=$team;

      header("Location:edit.php");
      }
      ?>
      });
    }
    $http({method:'GET', url:'try2.php'}).then(function(response){
    $scope.names = response.data;
    });
});
    </script>