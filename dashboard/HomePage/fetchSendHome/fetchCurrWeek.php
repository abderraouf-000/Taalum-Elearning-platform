<?php
session_start();
require_once "../../../login page/Database.php";
// require_once "Relfunctions.php";
$user_name  =  $_SESSION['userName'];

function returnTasks($conn,$user_name,$table){
    $query = "SELECT * from $table WHERE user_name = '{$user_name}' AND WEEK(change_state_date) = WEEK(NOW()) ";
    $result  = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
     $rows =[];
    while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
    }
    return $rows;
    }
     
    else{
     return [];
    }
    }

$result1 = returnTasks($conn,$user_name,"path_task");
$result2 = returnTasks($conn,$user_name,"User_free_task");
echo json_encode(array_merge($result1,$result2));

?>