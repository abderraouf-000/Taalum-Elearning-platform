<?php
session_start();
require_once "../../login page/Database.php";
$user_name  =  $_SESSION['userName'];

function returnEvents($conn,$user_name){
    $query = "SELECT * from User_event WHERE user_name = '{$user_name}'";
    $result  = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
     $rows =[];
    while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
    }
    echo json_encode($rows);
    }
     
    else{
    echo json_encode([]);
    }
    }
returnEvents($conn,$user_name);



?>