
<?php

function savePath_rtrnID($conn,$path){
$path_name_value = htmlentities(htmlspecialchars($path['path_name'])) ;
$primary_task_number_value =  htmlentities(htmlspecialchars($path['primary_task_number']));
$achieved_task_number_value =  htmlentities(htmlspecialchars($path['achieved_task_number'])) ;
$creation_date_value =  htmlentities(htmlspecialchars($path['creation_date'])) ;    
$user_name_value = htmlentities(htmlspecialchars($_SESSION['userName']));    
$query = "INSERT INTO user_path(path_name,primary_task_number,achieved_task_number,creation_date,user_name) values('{$path_name_value}',$primary_task_number_value,$achieved_task_number_value,$creation_date_value,'{$user_name_value}')";
if(mysqli_query($conn,$query))
echo mysqli_insert_id($conn);
else{
     echo "problem";
}


}



?>


