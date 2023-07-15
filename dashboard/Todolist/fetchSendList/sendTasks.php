<?php
session_start();
require_once "../../../login page/Database.php";
$data = file_get_contents("php://input");
$task = json_decode($data, true);

function savePath_rtrnID($conn,$task){
$task_path_value = htmlentities(htmlspecialchars($task['user_path_id']));
$task_content_value = htmlentities(htmlspecialchars($task['task_content'])) ;
$task_accomplished_value = htmlentities(htmlspecialchars($task['task_accomplished']));
// $achieved_task_number_value =  htmlentities(htmlspecialchars($path['achieved_task_number'])) ;
$user_name_value = htmlentities(htmlspecialchars($_SESSION['userName']));   
$task_creation_date_value =  htmlentities(htmlspecialchars($task['creation_date'])) ;    
$task_end_date_value =  htmlentities(htmlspecialchars($task['task_end_date']));
// $task_path_value =  htmlentities(htmlspecialchars($task['task_path']));


if($task_path_value=='NULL'){
$query = "INSERT INTO User_free_task(task_content,task_accomplished,creation_date,task_end_date,user_name,change_state_date) values( '{$task_content_value}',false,$task_creation_date_value,$task_end_date_value,'{$user_name_value}',CURDATE())";
}
else{
$query = "INSERT INTO path_task(task_content,task_accomplished,creation_date,task_end_date,user_path_id,user_name,change_state_date) values('{$task_content_value}',false,$task_creation_date_value,$task_end_date_value,$task_path_value,'{$user_name_value}',CURDATE())";
}


if(mysqli_query($conn,$query))
echo mysqli_insert_id($conn);
else{
echo "problem";
}
    
}

savePath_rtrnID($conn,$task);




?>


