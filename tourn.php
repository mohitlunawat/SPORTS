<?php
session_start();
if(isset($_GET['tournname']))
  {
    $_SESSION['tournname'] = $_GET['tournname'];
  }
  else
  {
  	echo "not set";
  }
  $tname=$_SESSION['tournname'];
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
<div class="container-fluid" style="height:662px;width:1365px;">
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
        <li><a href="schedule.php">Create Tournament</a></li>
        <li class="active"><a href="final.php">Schedule Tournament</a></li>
        <li><a href="venue.php">Add Venues</a></li>
        <li><a href="venuedet.php">Venue Details</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="Logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  </div>
  <?php include 'matchcount.php' ?>
<div class="container-fluid" ng-app="myapp"  ng-controller="ctrl" style="height:612px;width:1365px">
	<form method="POST" action="tourn.php">
    <div class="tournament">
  <h1 style="text-align:center;color:grey;">Schedule Tournament</h1>
</div>
  <br>
  <div class="container">
    <table border="0">
    <tr>
		<td><h3 style="margin-left:200px;">TOURNAMENT NAME:</td><td><input type="text" value="<?php echo $tname ?>" name="tt"></h3></td>
</tr>
		<td><h3 style="margin-left:200px;">MATCH NO:</td><td><input type="text" value="<?php echo $id ?>" name="no"></h3></td>
</tr>
		<td><h3 style="margin-left:200px;">TEAM 1:</td><td><select name="team1">
		<option ng-repeat="names in names track by $index" value="{{names}}">{{names}}</option>
	</select></h3></td>
</tr>
	<td><h3 style="margin-left:200px;">TEAM 2:</td><td><select name="team2">
		<option ng-repeat="names in names track by $index" value="{{names}}">{{names}}</option>
	</select></h3></td>
</tr>
	<td><h3 style="margin-left:200px;">DATE:</td><td><input type="date" name="tdate"></h3></td>
</tr>
	<td><h3 style="margin-left:200px;">TIME: &nbsp;&nbsp; FROM:&nbsp;</td><td><input type="time" name="from">&nbsp;&nbsp;&nbsp;&nbsp;TO&nbsp;&nbsp;<input type="time" name="to"></h3></td>
</tr>
	<td><h3 style="margin-left:200px;">VENUE:</td><td><select name="venue">
		<option ng-repeat="name in ven" value="{{name}}">{{name}}</option>
	</select></h3></td>
</tr>
</table>
  <input type="submit" class="button1" value="submit" style="margin-left:600px;">
	</form>
</div>
</body>
</html>
<script>
  var app = angular.module('myapp',[]);
    app.controller('ctrl',function($scope,$http)
{ 
 $http({method:'GET', url:'fetchteam.php'}).then(function(response){
    $scope.names = response.data;
    });
 
 $http({method:'GET', url:'fetchvenue.php'}).then(function(response){
    $scope.ven = response.data;
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
   if ($_SERVER["REQUEST_METHOD"] == "POST")
   {
    $tname=$_POST['tt'];
    $mno=$_POST['no'];
    $t1=$_POST['team1'];
    $t2=$_POST['team2'];
    $date=$_POST['tdate'];
    $frm=$_POST['from'];
    $to=$_POST['to'];
    $ven=$_POST['venue'];
    $s="SELECT * FROM tournament WHERE name='$tname'";
    $r=mysqli_query($conn,$s);
    if($r)
    {
    while($re = $r->fetch_assoc()){
    $type = $re['TYPE'];
    }
    }
    if($type=='cricket')
{      
    $sql9="SELECT * FROM booked WHERE venue='$ven' AND date1='$date'";
    $result9=mysqli_query($conn,$sql9);
    if($result9)
    {
      while($ro=$result9->fetch_assoc())
      {
        $frmt=$ro['fromt'];
        $tot=$ro['tot'];
      }
    }

    if(!$frmt || !$tot)
    {
     $sql6="INSERT INTO matches VALUES('".$tname."','".$mno."','".$t1."','".$t2."','".$date."','".$frm."','".$to."','".$ven."')";
    $result6=mysqli_query($conn,$sql6);
    if($result6)
    {
      echo "<script>";
      echo "alert('MATCH INSERTED')";
      echo "</script>";
      $count=$count+1;
      $sql8="UPDATE matchcount SET count='$count' WHERE tour='$tname'";
      $result8=mysqli_query($conn,$sql8);
      $sql7="INSERT INTO booked VALUES('".$ven."','".$date."','".$frm."','".$to."')";
      $result7=mysqli_query($conn,$sql7);
      if($result7)
      {
  
        exit('venue booked');
      }
    } 
    }
    else   
    { 
      $frm2 = explode(':', $frmt);
      $frmd = (int)$frm2[0];
     
      $ti = explode(':', $tot);
      $tod = (int)$ti[0];
     
      $frmf = explode(':', $frm);
      $frmc = (int)$frmf[0];
     
      $tof = explode(':', $to);
      $toc = (int)$tof[0];
     
      $number=range($frmd,$tod);
      if(!(in_array($frmc,$number))&&!(in_array($frmc,$number)))
      { 

        $sql6="INSERT INTO matches VALUES('".$tname."','".$mno."','".$t1."','".$t2."','".$date."','".$frm."','".$to."','".$ven."')";
        $result6=mysqli_query($conn,$sql6);
        if($result6)
        {
          echo "<script>";
          echo "alert('MATCH INSERTED')";
          echo "</script>";
          $count=$count+1;
          $sql8="UPDATE matchcount SET count='$count' WHERE tour='$tname'";
          $result8=mysqli_query($conn,$sql8);
          $sql7="INSERT INTO booked VALUES('".$ven."','".$date."','".$frm."','".$to."')";
          $result7=mysqli_query($conn,$sql7);
          if($result7)
          {
            exit('venue booked');
          }
        }
      }
      else
      {
    
      exit("time not available");
      }
    }
  }
else
{ 
    $flag=0;
    $sl="SELECT * FROM booked1 WHERE venue='$ven' AND date1='$date'";
    $rl=mysqli_query($conn,$sl);
    if($rl)
    {
      while($ro=$rl->fetch_assoc())
      {
        $frmt=$ro['fromt'];
        $tot=$ro['tot'];
      }
    }
    if(!$frmt || !$tot)
    {
     $sql6="INSERT INTO matches VALUES('".$tname."','".$mno."','".$t1."','".$t2."','".$date."','".$frm."','".$to."','".$ven."')";
    $result6=mysqli_query($conn,$sql6);
    if($result6)
    {
      $flag=1;
      echo "<script>";
      echo "alert('MATCH INSERTED')";
      echo "</script>";
      $count=$count+1;
      $sql8="UPDATE matchcount SET count='$count' WHERE tour='$tname'";
      $result8=mysqli_query($conn,$sql8);
      $sql7="INSERT INTO booked1 VALUES('".$ven."','".$date."','".$frm."','".$to."')";
      $result7=mysqli_query($conn,$sql7);
      if($result7)
      {
        echo "<script>";
        echo "alert('VENUE BOOKED ON PART1 emoty')";
        echo "</script>";
        exit("inserted");
      }
    } 
    }
    else
    {
        $frm2 = explode(':', $frmt);
        $frmd = (int)$frm2[0];    
        $ti = explode(':', $tot);
        $tod = (int)$ti[0];
        $frmf = explode(':', $frm);
        $frmc = (int)$frmf[0];
        $tof = explode(':', $to);
        $toc = (int)$tof[0];
        $number=range($frmd,$tod);
        if(!(in_array($frmc,$number))&&!(in_array($toc,$number)))
        {  
          $sql6="INSERT INTO matches VALUES('".$tname."','".$mno."','".$t1."','".$t2."','".$date."','".$frm."','".$to."','".$ven."')";
          $result6=mysqli_query($conn,$sql6);
          if($result6)
          {
            $flag=1;
            echo "<script>";
            echo "alert('MATCH INSERTED')";
            echo "</script>";
            $count=$count+1;
            $sql8="UPDATE matchcount SET count='$count' WHERE tour='$tname'";
            $result8=mysqli_query($conn,$sql8);
            $sql7="INSERT INTO booked1 VALUES('".$ven."','".$date."','".$frm."','".$to."')";
            $result7=mysqli_query($conn,$sql7);
            if($result7)
            {
               exit('venue booked part1');
            }
          }
        }

      }
      if($flag==0)
      {
            $sl4="SELECT * FROM booked2 WHERE venue='$ven' AND date1='$date'";
            $rl4=mysqli_query($conn,$sl4);
            if($rl4)
            {
              while($ro=$rl4->fetch_assoc())
              {
                $frmo=$ro['fromt'];
                $too=$ro['tot'];
              }
            }
   
            if(!$frmo || !$too)
            {
              $tr="INSERT INTO matches VALUES('".$tname."','".$mno."','".$t1."','".$t2."','".$date."','".$frm."','".$to."','".$ven."')";
              $rt=mysqli_query($conn,$tr);
              if($rt)
              {
                echo "<script>";
                echo "alert('MATCH INSERTED')";
                echo "</script>";
                $count=$count+1;
                $tr1="UPDATE matchcount SET count='$count' WHERE tour='$tname'";
                $rt1=mysqli_query($conn,$tr1);
                $tr2="INSERT INTO booked2 VALUES('".$ven."','".$date."','".$frm."','".$to."')";
                $rt2=mysqli_query($conn,$tr2);
                if($rt2)
                {
                  echo "<script>";
                  echo "alert('VENUE BOOKED ON PART2')";
                  echo "</script>";
                  exit("inserts");
                }
              }    
            }
            $frm3 = explode(':', $frmo);
            $frmd1 = (int)$frm3[0];
            $ti1 = explode(':', $too);
            $tod1 = (int)$ti1[0];
            $frmf1 = explode(':', $frm);
            $frmc1 = (int)$frmf1[0];
            $tof1 = explode(':', $to);
            $toc1 = (int)$tof1[0];
            $number1=range($frmd1,$tod1);
            if(!(in_array($frmc1,$number1))&&!(in_array($toc1,$number1)))
            {            
              $tr3="INSERT INTO matches VALUES('".$tname."','".$mno."','".$t1."','".$t2."','".$date."','".$frm."','".$to."','".$ven."')";
              $rt3=mysqli_query($conn,$tr3);
              if($rt3)
              {
               echo "<script>";
               echo "alert('MATCH INSERTED')";
               echo "</script>";
              $count=$count+1;
              $tr4="UPDATE matchcount SET count='$count' WHERE tour='$tname'";
              $rt4=mysqli_query($conn,$tr4);
              $tr5="INSERT INTO booked2 VALUES('".$ven."','".$date."','".$frm."','".$to."')";
              $rt5=mysqli_query($conn,$tr5);
              if($rt5)
              {
              echo "<script>";
              echo "alert('VENUE BOOKED ON PART2')";
              echo "</script>";
              exit("inserted");
              }
            }
          }
          else
          {
            echo "<script>";
            echo "alert('SLOT NOT AVAILABLE')";
            echo "</script>";
            exit("no");
          }
      }


      }



    }
}
?>