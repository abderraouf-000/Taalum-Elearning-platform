<?php
session_start();
require_once "../login page/Database.php";
$data = file_get_contents("php://input");
$user_name  =  $_SESSION['userName'];

function taskNum($conn,$user_name,$table){
$query = "SELECT count(task_id) as num FROM $table
where  user_name = '$user_name' AND task_accomplished = '0'";

if($result = mysqli_query($conn,$query)){
$result = mysqli_fetch_assoc($result);
return number_format($result['num']);
}
else{
return 0;
}
    
}

$PathTaskCount = taskNum($conn,$user_name,'path_task');
$freeTaskCount = taskNum($conn,$user_name,'user_free_task');

echo $freeTaskCount + $PathTaskCount;