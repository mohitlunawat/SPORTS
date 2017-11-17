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
           $sql="SELECT * FROM carousal";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
              while($row = $result->fetch_assoc()) 
              {
                $lone=$row['one'];
                $rone=$row['one1'];
                $ltwo=$row['two'];
                $rtwo=$row['two2'];
                $lthree=$row['three'];
                $rthree=$row['three3']; 
              }

            }
            else
            {
              echo "not success";
            }
            
              
          }
        ?>