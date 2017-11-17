
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
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  .ss
  {
    margin-bottom: 70px;
    border:none;
    height:200px;
    width:250px;
    background: transparent;
    font-size: 25px;
    color:white;
    float:left;

  }
  .sr
  {
    margin-bottom: 70px;
    border:none;
    height:200px;
    width:250px;
    background: transparent;
    font-size: 25px;
    color:white;
    float:right;

  }
  .rat
  {
    height: 200px;
    width:300px;
    background: transparent;
    border:none;
    font-size: 20px;
  }
  .cat
  {
    height: 500px;
    width:200px;
    background: transparent;
    border:none;
    font-size: 20px;
    padding-left: 0.5cm;
  }
  .sidenav {
      background-color: #f1f1f1;
      font-size: 18px;
    }
    .sidenav > p{
      padding-left: 0.5cm;
    }
    #latest{
      padding-right: 3cm;
    }
    #caro1
    {
      height: 200px;
      width: 100%;
      margin: auto;
    }
    #rating
    {
      padding-left: 6cm;
    }
    .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%; 
      margin: auto;
      height:400px;
  }
  .item
  {
    background-color: green;
  }
  
  .item h3 {
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
}
#i1
{
  opacity: 0.6;
  font: black;
}
.jumbotron
{
  width: 100%;
  height: 400px;
}
.col-sm-4{
  float: right;
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="tdetails.php">Tournament Details</a></li>
        <li><a href="schedule.php">Create Tournament</a></li>
        <li><a href="final.php">Schedule Tournament</a></li>
        <li><a href="venue.php">Add Venues</a></li>
        <li><a href="contact.php">Contact</a></li>
         <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

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
    $sql3="SELECT * FROM carousal";
    $result3=mysqli_query($conn,$sql3);
    if($result3)
    {
        while ($row3 = $result3->fetch_assoc()){
          $first=$row3['one'];
          $rfirst=$row3['one1'];
          $second=$row3['two'];
          $rsecond=$row3['two2'];
          $third=$row3['three'];
          $rthird=$row3['three3'];
          }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['save']))
    {
      $latest=$_POST['latest'];
      $rating=$_POST['rat'];
      $sql="UPDATE latest SET news='$latest',rating='$rating' WHERE id1=1";
      $result=mysqli_query($conn,$sql);
      if($result)
      {
        echo "<script>";
        echo "alert('suvcess')";
        echo "</script>";
      } 
    }
  }

}
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
       <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div id="myCarousel" class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="1.jpeg" alt="cricket">
        <div class="carousel-caption">
          <textarea disabled class="ss"><?php echo $first ?></textarea>
          <textarea disabled class="sr"><?php echo $rfirst ?></textarea>
        </div>      
      </div>

      <div class="item">
        <img src="2.jpeg" alt="">
        <div class="carousel-caption">
          <textarea disabled class="ss"><?php echo $second ?></textarea>
          <textarea disabled class="sr"><?php echo $rsecond ?></textarea>
        </div>      
      </div>

       <div class="item">
        <img src="3.jpeg" alt="">
        <div class="carousel-caption">
          <textarea disabled class="ss"><?php echo $third ?></textarea>
          <textarea disabled class="sr"><?php echo $rthird ?></textarea>
        </div>      
      </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

</div>
<button type="button" class="btn btn-default btn-lg" id="myBtn">EDIT</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> EDIT</h4>
        </div>

          
        <div class="modal-body" style="padding:40px 50px;">
          <?php include 'cfetch.php' ?>
          <div ng-app="myapp" ng-controller="ctrl">
          <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
              CAROUSEL LONE:<textarea ng-model="lone" ng-init="lone='<?php echo $lone ?>'"></textarea>
            </div>
            <div class="form-group">
              CAROUSEL RONE:<textarea ng-model="rone" ng-init="rone='<?php echo $rone ?>'"></textarea>
            </div>
            <div class="form-group">  
              CAROUSEL LTWO:<textarea ng-model="ltwo" ng-init="ltwo='<?php echo $ltwo ?>'"></textarea>
             </div>
             <div class="form-group">  
              CAROUSEL RTWO:<textarea ng-model="rtwo" ng-init="rtwo='<?php echo $rtwo ?>'"></textarea>
             </div>
             <div class="form-group"> 
              CAROUSEL LTHREE:<textarea ng-model="lthree" ng-init="lthree='<?php echo $lthree ?>'"></textarea>
              </div>
              <div class="form-group"> 
              CAROUSEL RTHREE:<textarea ng-model="rthree" ng-init="rthree='<?php echo $rthree ?>'"></textarea>
              </div>
              <button type="button" value="EDIT" ng-click="insert()"><span class="glyphicon glyphicon-save"></span>SAVE</button>
          </div>
          </form>
           
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
      </div>
    </div>
    <script>
  var app = angular.module('myapp',[]);
    app.controller('ctrl',function($scope,$http)
{ 
 
    $scope.insert=function()
    {   
      $http.post("cinsert.php", {
    'lone':$scope.lone,
    'rone':$scope.rone,
    'ltwo':$scope.ltwo,
    'rtwo':$scope.rtwo,
    'lthree':$scope.lthree,
    'rthree':$scope.rthree
    })
    .then(function(data,status,headers,config){
      console.log("Data Inserted Successfully");
      });
    }
});
</script>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>  
<?php include 'latest.php' ?>
<form method="POST" action="admin.php">
<div class="container-fluid text-center">    
</br>
 <div class="row content">
    <div class="col-sm-2 sidenav">
      <h2> Latest News </h2>
      <textarea class="cat" name="latest">
      <?php echo $news ?>
    </textarea>
    </div>
    <div class="col-sm-3" id="rating">
        <h2>Ratings <span class="glyphicon glyphicon-certificate"></span></h2>
        <textarea class="rat" name="rat">
       <?php echo $rating ?>
    </textarea>
    <input type="submit" name="save">
    </div>
    <div class="col-sm-4" id="latest"> 
      <h2>Latest Results <span class="glyphicon glyphicon-flash"></span></h2>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
       <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner"id="caro1" role="listbox">
    <div class="item active">
      <img src="4.jpeg" alt="Chania">
    </div>

    <div class="item">
      <img src="5.jpeg" alt="">
    </div>

    <div class="item">
      <img src="6.jpeg" alt="">
    </div>
     <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
      <h4>  RCB won by 5 wickets agianst KKR  </h4>
      <h4>  Pv Sindhu defeated Marlin 21-10,21-17</h4>
      <h4>  Rogerer Federer is in win streak 6-4,6-2</h4>    
    </div>
  </div>

</div><br>

<footer class="container-fluid text-center">
  <p>2017 Sports Scheduler </p>
</footer>
</form>
</body>
</html>
