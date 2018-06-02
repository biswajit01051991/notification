<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
insertGCM($_GET['rid']);
function insertGCM($rid) {
  
  $check = true;
  
  
  if($check){
    $con=mysqli_connect("localhost","root","","notification");
     $sql1 = "SELECT * FROM GMC WHERE rid='$rid'";
    
     $result=mysqli_query($con,$sql1);
$mainCount=mysqli_num_rows($result);
     if($mainCount < 1){
        $sql = "INSERT INTO GMC(rid) VALUES ('$rid')";
        mysqli_query($con,$sql);
        echo '{"success":{"text":"done"}}';
     }
  else{
    echo '{"success":{"text":"already users"}}';
  }
  }
  else{
     echo '{"error":{"text":"No access"}}';
  }
  }
?>