<?php


function returnNumber($conn,$user_name,$id){

$query = "SELECT count(task_id) as num FROM taalum.path_task
where user_path_id = '$id' AND user_name = '$user_name' AND task_accomplished = '1'";
$result  = mysqli_query($conn,$query);
$assoc = mysqli_fetch_assoc($result); 
return $assoc['num'];

}



?>