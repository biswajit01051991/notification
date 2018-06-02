<?php
include('config.php');


 getNotification();
function getNotification(){
    $db = getDB();
    $con=mysqli_connect("localhost","root","","notification");
    $sql1 = "SELECT title, msg, logo, url, name FROM notifications ORDER BY nid DESC LIMIT 1";
    $result=mysqli_query($con,$sql1);
    // Associative array
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

    /*
    $stmt1 = $db->prepare($sql1);
    $stmt1->execute();
    $notification = $stmt1->fetch(PDO::FETCH_OBJ); 
    $notification->action = $notification->url;
    $notification->click_action = $notification->url;
    */
    if($row){
      $notification = json_encode($row);
      echo '{"data": ' .$notification . '}';
    }
 }
?>