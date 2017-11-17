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
$data = json_decode(file_get_contents("php://input"));
$o = mysql_real_escape_string($data->lone);
$ro = mysql_real_escape_string($data->rone);
$te = mysql_real_escape_string($data->ltwo);
$rte = mysql_real_escape_string($data->rtwo);
$th = mysql_real_escape_string($data->lthree);
$rth = mysql_real_escape_string($data->rthree);
$sql2="UPDATE carousal set one='$o',one1='$ro',two='$te',two2='$rte',three='$th',three3='$rth' where id=1";
$result2=mysqli_query($conn,$sql2);
                if($result2)
                {
                  echo "success";
                }
                else
                {
                  echo "not success";
                }
}