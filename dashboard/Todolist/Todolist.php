<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../dash.css">
   <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>



<?php
require_once "../navbar/navbar.php";
?>


<section id="all">

<?php
require_once "../dashheader/dashheader.php";

echo "<script>
document.documentElement.style.setProperty(`--display-var-Todo-list`, 'block');
console.log('dfdfa');
</script>"
?>

<section class="todo-list">
        <div class="todo-header">
            <h1>My Task Manager</h1>
            <form>
            <button type="submit">+</button>
            <input type="text" name="taskname" required id=Taskname" placeholder="Add Task" style="background-color: rgba(128, 128, 128, 0.345);">
            <input type="datetime-local" name="" id="" required>

            <select name="path" id="path">
                <option value="NULL">Free Task</option>
            </select>


            </form>
        </div>
         




 <div class="allTasks">       
        <div class="Texthead">
        <h3>Tasks To Complete</h3>
        <i class="fa-solid fa-chevron-down"></i>
        </div>
    <div class="incompleted-tasks">
      
        <!-- <div class="todo-incompleted-task">
            <div class="task-header">
                <h4>Task 1</h4>
                <i class="fa-regular fa-square"></i>
            </div>
        <div class="task-settings">
              <h6>Event</h6>
              <h6>Fri Mar 34 2023 5:00PM</h6>
        </div>
        <i class="fa-solid fa-trash"></i> -->
    </div>
 

    <div class="Texthead">
      <h3>Completed Tasks</h3>
      <i class="fa-solid fa-chevron-down"></i>
    </div>     
<div class="incompleted-tasks">
 </div>


 </div>



        
 </section>



</section>

<script src="Todolist.js">

</script>

</body>

</html>