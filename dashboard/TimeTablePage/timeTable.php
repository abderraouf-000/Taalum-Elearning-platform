<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
document.documentElement.style.setProperty(`--display-var-Time-table`, 'block');
</script>"
?>




<section id="Time-table">

<div class="tablemenu">
<?php
require_once "../../calendar/calendar.php";
?>

    <div id="table-categorie">
        <div class="category-header">
            <h3>Categories<span>+</span></h3>
            <form>
                <input type="text" name="cat-name" id="cat-name" placeholder="New Category" required>
                <input type="color" name="cat-color" id="cat-color" required>
                <input type="submit" value="+">
            </form>
        </div>
        <div id="categories">
            <div class="categorie">
                <i class="fa-solid fa-square-check"></i>
                <h4>Interview</h4>
            </div>
            <div class="categorie">
                <i class="fa-solid fa-square-check" style="color : red
                "></i>
                <h4>University</h4>
            </div>
        </div>
    </div>

    <div class="createTaskModal">
        <h3 style="padding:10%;">New Event</h3>
        <form>
            <label for="event-name">Event Name</label>
            <input type="text" name="event-name" id="event-name">
            <label for="">Category</label>
            <select name="category-name" id="category-name">
                <!-- <option value="University">University</option>
                <option value="interview">interview</option> -->
            </select>
            <button type="submit" style="padding:2%;margin:5%;"> Create</button>
        </form>

    </div>


</div>
<div class="tablebody">
    <div class="timeheader">
        <h2>Time Table</h2>
        <div class="btnhead">
            <button id="prev">&#60;</button>
            <button id="next">&#62;</button>
            <button class="addSelectedTask">&plus;</button>
        </div>
    </div>
    <h3>This Week</h3>
    <div class="body">

        <ul>
            <li class="table-day">Hours</li>
            <li class="table-day">Sunday</li>
            <li class="table-day">Monday</li>
            <li class="table-day">Tuesday</li>
            <li class="table-day">Wednesday</li>
            <li class="table-day">Thursday</li>
            <li class="table-day">Friday</li>
            <li class="table-day">Saturday</li>

    <li class="table-hour">5:00-6:30AM</li>
    <li class="table-task-sunday-500"></li>
    <li class="table-task-monday-500"></li>
    <li class="table-task-tuesday-500"></li>
    <li class="table-task-wednesday-500"></li>
    <li class="table-task-thursday-500"></li>
    <li class="table-task-friday-500"></li>
    <li class="table-task-saturday-500"></li>

    <li class="table-hour">6:30-8:00AM</li>
    <li class="table-task-sunday-630"></li>
    <li class="table-task-monday-630"></li>
    <li class="table-task-tuesday-630"></li>
    <li class="table-task-wednesday-630"></li>
    <li class="table-task-thursday-630"></li>
    <li class="table-task-friday-630"></li>
    <li class="table-task-saturday-630"></li>


    <li class="table-hour">8:00-9:30AM</li>
    <li class="table-task-sunday-800"></li>
    <li class="table-task-monday-800"></li>
    <li class="table-task-tuesday-800"></li>
    <li class="table-task-wednesday-800"></li>
    <li class="table-task-thursday-800"></li>
    <li class="table-task-friday-800"></li>
    <li class="table-task-saturday-800"></li>


    <li class="table-hour">9:30-11:00AM</li>
    <li class="table-task-sunday-930"></li>
    <li class="table-task-monday-930"></li>
    <li class="table-task-tuesday-930"></li>
    <li class="table-task-wednesday-930"></li>
    <li class="table-task-thursday-930"></li>
    <li class="table-task-friday-930"></li>
    <li class="table-task-saturday-930"></li>


    <li class="table-hour">11:00-12:30PM</li>
    <li class="table-task-sunday-1100"></li>
    <li class="table-task-monday-1100"></li>
    <li class="table-task-tuesday-1100"></li>
    <li class="table-task-wednesday-1100"></li>
    <li class="table-task-thursday-1100"></li>
    <li class="table-task-friday-1100"></li>
    <li class="table-task-saturday-1100"></li>


    <li class="table-hour">12:30PM-14:00PM</li>
    <li class="table-task-sunday-1230"></li>
    <li class="table-task-monday-1230"></li>
    <li class="table-task-tuesday-1230"></li>
    <li class="table-task-wednesday-1230"></li>
    <li class="table-task-thursday-1230"></li>
    <li class="table-task-friday-1230"></li>
    <li class="table-task-saturday-1230"></li>


    <li class="table-hour">14:00PM-15:30PM</li>
    <li class="table-task-sunday-1400"></li>
    <li class="table-task-monday-1400"></li>
    <li class="table-task-tuesday-1400"></li>
    <li class="table-task-wednesday-1400"></li>
    <li class="table-task-thursday-1400"></li>
    <li class="table-task-friday-1400"></li>
    <li class="table-task-saturday-1400"></li>


    <li class="table-hour">15:30PM-17:00PM</li>
    <li class="table-task-sunday-1530"></li>
    <li class="table-task-monday-1530"></li>
    <li class="table-task-tuesday-1530"></li>
    <li class="table-task-wednesday-1530"></li>
    <li class="table-task-thursday-1530"></li>
    <li class="table-task-friday-1530"></li>
    <li class="table-task-saturday-1530"></li>

    <li class="table-hour">17:00PM-18:30PM</li>
    <li class="table-task-sunday-1700"></li>
    <li class="table-task-monday-1700"></li>
    <li class="table-task-tuesday-1700"></li>
    <li class="table-task-wednesday-1700"></li>
    <li class="table-task-thursday-1700"></li>
    <li class="table-task-friday-1700"></li>
    <li class="table-task-saturday-1700"></li>

    <li class="table-hour">18:30PM-20:00PM</li>
    <li class="table-task-sunday-1830"></li>
    <li class="table-task-monday-1830"></li>
    <li class="table-task-tuesday-1830"></li>
    <li class="table-task-wednesday-1830"></li>
    <li class="table-task-thursday-1830"></li>
    <li class="table-task-friday-1830"></li>
    <li class="table-task-saturday-1830"></li>

    <li class="table-hour">20:00PM-21:30PM</li>
    <li class="table-task-sunday-2000"></li>
    <li class="table-task-monday-2000"></li>
    <li class="table-task-tuesday-2000"></li>
    <li class="table-task-wednesday-2000"></li>
    <li class="table-task-thursday-2000"></li>
    <li class="table-task-friday-2000"></li>
    <li class="table-task-saturday-2000"></li>


    <li class="table-hour">21:30PM-23:00PM</li>
    <li class="table-task-sunday-2130"></li>
    <li class="table-task-monday-2130"></li>
    <li class="table-task-tuesday-2130"></li>
    <li class="table-task-wednesday-2130"></li>
    <li class="table-task-thursday-2130"></li>
    <li class="table-task-friday-2130"></li>
    <li class="table-task-saturday-2130"></li>


            <!-- <li class="add-row"> + </li> -->
        </ul>
    </div>

</div>



</section>

</section>

<script src="timeTable.js">

</script>


</body>
</html>