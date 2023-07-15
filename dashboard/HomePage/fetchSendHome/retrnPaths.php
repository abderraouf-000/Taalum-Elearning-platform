<?php
session_start();
require_once "../../../login page/Database.php";
require_once "fetchFinTasks.php";
// require_once "Relfunctions.php";
$user_name  =  $_SESSION['userName'];

function returnPaths($conn,$user_name){
    $query = "SELECT * from user_path WHERE user_name = '{$user_name}'";
    $result  = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
     $rows =[];
    while($row = mysqli_fetch_assoc($result)){

        $row['achieved_task_number'] = returnNumber($conn,$user_name,$row['user_path_id']);
    $rows[] = $row;

        // echo $row['achieved_task_number'];
}
    echo json_encode($rows);
    }
     
    else{
    echo json_encode([]);
    }
    }

returnPaths($conn,$user_name);



?>