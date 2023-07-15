<?php
session_start();
require_once "../../../login page/Database.php";
$data = file_get_contents("php://input");
$task = json_decode($data, true);




function savePath_rtrnID($conn,$task){
    
    $user_name  =  $_SESSION['userName'];

$task_id= htmlentities(htmlspecialchars($task['task_id']));



if($task['user_path_id'] != 'NULL'){
$query = "DELETE FROM path_task WHERE task_id = $task_id AND user_name = '$user_name'";
}
else{
$query = "DELETE FROM User_free_task  WHERE task_id = $task_id AND user_name = '$user_name'";
}

if(mysqli_query($conn,$query))
echo "SUCCESSFUL!";
else{
echo "PROBLEM!";
}
    
}

savePath_rtrnID($conn,$task);




?>