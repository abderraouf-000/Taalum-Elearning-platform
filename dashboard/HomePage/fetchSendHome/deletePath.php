<?php
session_start();
require_once "../../../login page/Database.php";

$data = file_get_contents("php://input");
$path = json_decode($data, true);

$user_name  =  $_SESSION['userName'];
$pathID = $path['user_path_id'];
function deletePath($conn,$user_name,$pathID){
    $query = "DELETE FROM user_path WHERE user_name = '{$user_name}' AND user_path_id = '{$pathID}'";
    $result  = mysqli_query($conn,$query);

    if($result  = mysqli_query($conn,$query)){
    echo'successfully deleted';
    }
    else{
    echo 'Not Deleted';
    }

 }
deletePath($conn,$user_name,$pathID);



?>