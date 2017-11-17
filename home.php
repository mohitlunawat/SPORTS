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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script type="text/javascript">

        $(document).ready(function(){
            var width=0;
            var id = setInterval(frame, 50);

                function frame() {
                    if (width > 20) {
                            clearInterval(id);
                            $(".progress").hide();
                        } else {
                            width++;
                            $(".progress-bar").css("width", 10*(width)+"%");
                        }
                    }
                    $('#menu-toggle').click(function(){
                        $(this).toggleClass('glyphicon-chevron-up').toggleClass('glyphicon-chevron-down');
                    });

        });

        </script>
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
   <div class="progress" style="height:1px;" >
  <div class="progress-bar" role="progressbar" aria-valuenow="0"
  aria-valuemin="0" aria-valuemax="100" style="background-color: #283593;width:0%; height:1px;">
  </div>
</div>
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
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="tdetails1.php">Tournament Details</a></li>
        <li><a href="contact1.php">Contact</a></li>
        <li><a href="login.php">Login</a></li>
        <li></li>
        <li></li>

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

</div>    </div>
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
      <textarea class="cat" name="latest" disabled>
      <?php echo $news ?>
    </textarea>
    </div>
    <div class="col-sm-3" id="rating">
        <h2>Ratings <span class="glyphicon glyphicon-certificate"></span></h2>
        <textarea class="rat" name="rat" disabled  >
       <?php echo $rating ?>
    </textarea>
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
<div class="container-fluid text-center">
        <div class="w3-container w3-xlarge w3-padding">
          <i class="fa fa-facebook-official w3-hover-opacity"></i>
          <i class="fa fa-instagram w3-hover-opacity"></i>
          <i class="fa fa-snapchat w3-hover-opacity"></i>
          <i class="fa fa-pinterest-p w3-hover-opacity"></i>
          <i class="fa fa-twitter w3-hover-opacity"></i>
          <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
      </div>

<footer class="container-fluid text-center">
  <p>2017 Sports Scheduler </p>
</footer>
</form>
</body>
</html>
