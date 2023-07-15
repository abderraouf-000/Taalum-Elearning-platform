<?php
session_start();
require_once "../../../login page/Database.php";
$data = file_get_contents("php://input");
$task = json_decode($data, true);

function savePath_rtrnID($conn,$task){

$task_new_state= htmlentities(htmlspecialchars($task['new_state']));

$task_id= htmlentities(htmlspecialchars($task['task_id']));



if($task['user_path_id']!="NULL"){
$query = "UPDATE path_task SET task_accomplished = $task_new_state , change_state_date = CURDATE()  WHERE task_id = $task_id";
}
else{
$query = "UPDATE User_free_task SET task_accomplished = $task_new_state,change_state_date = CURDATE()  WHERE task_id = $task_id";
}

// echo isset($task['user_path_id']);

if(mysqli_query($conn,$query))
echo "SUCCESSFUL!";
else{
echo "PROBLEM!";
}
    
}

savePath_rtrnID($conn,$task);




?>