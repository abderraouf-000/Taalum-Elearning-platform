<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <script defer src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="/calendar/calendar.css">
</head>

<body>
<?php
  require_once 'navbar.php';

?>

    <section id="all">

<?php
    require_once 'dashheader.php';

?>


        <!-- <section class="homesection" id="homesection">
            

            <section class="projects">
                <div class="project">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                    <h4>Web Development</h4>
                    <p>10 Tasks</p>
                    <div class="progresspart">
                        <label for="achievebar">2/10</label>
                        <progress id="achievebar" value="20" max="100">20%</progress>
                    </div>
                </div>

            </section>
            <div class="taskstatistic">
                <div class="tasks-container">
                    <h4>Tasks Tor Today</h4>
                    <div class="tasks">

                        <div class="task">
                            <h4>Project name</h4>
                            <p>Complete the task</p>
                            <i class="fa-solid fa-square-check"></i>
                        </div>
                        <div class="task">
                            <h4>Project name</h4>
                            <p>Complete the task</p>
                            <i class="fa-solid fa-square-check"></i>
                        </div>
                        <div class="task">
                            <h4>Project name</h4>
                            <p>Complete the task</p>
                            <i class="fa-solid fa-square-check"></i>
                        </div>

                    </div>
                </div>

                <div class="stats">
                    <h4>Statistics</h4>
                    <div class="widgets">
                        <div class="widget">
                            <h4>28 h</h4>
                            <p>Working time</p>
                        </div>
                        <div class="widget">
                            <h4>19</h4>
                            <p>Finished Tasks</p>
                        </div>
                    </div>
                </div>
                <div>
                    <canvas id="myChart" width="100%">
                    </canvas>
                </div>
            </div>



            <div class="modal hidden">
                <button class="btn--close-modal">&times;</button>
                <h2 class="modal__header">
                    Create A New Learning Path
                </h2>
                <form class="modal__form">
                    <label>Path Name</label>
                    <input type="text" required />
                    <label>Primary Tasks Number</label>
                    <input type="text" required />
                    <button class="createBtn" type="submit">Create &rarr;</button>
                </form>
            </div>
            <div class="overlay hidden"></div>
        </section> -->


        <section id="Time-table">

            <div class="tablemenu">
                <!-- <div class="calendar">
                    <div class="calendarhead">
                        <div class="currentdate">
                            <h2>February 2023</h2>
                        </div>
                        <div class="btns">
                            <i class="fa-solid fa-chevron-left"></i>
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>

                    <div class="calbody">




                        <ul class="days">
                            <li class="daysname">Sun</li>
                            <li class="daysname">Mon</li>
                            <li class="daysname">Tue</li>
                            <li class="daysname">Wed</li>
                            <li class="daysname">Thu</li>
                            <li class="daysname">Fri</li>
                            <li class="daysname">Sat</li>
                            <li data-num-sun="1"></li>
                            <li data-num-mon="1"></li>
                            <li data-num-tue="1"></li>
                            <li data-num-wed="1"></li>
                            <li data-num-thu="1"></li>
                            <li data-num-fri="1"></li>
                            <li data-num-sat="1"></li>

                            <li data-num-sun="2"></li>
                            <li data-num-mon="2"></li>
                            <li data-num-tue="2"></li>
                            <li data-num-wed="2"></li>
                            <li data-num-thu="2"></li>
                            <li data-num-fri="2"></li>
                            <li data-num-sat="2"></li>

                            <li data-num-sun="3"></li>
                            <li data-num-mon="3"></li>
                            <li data-num-tue="3"></li>
                            <li data-num-wed="3"></li>
                            <li data-num-thu="3"></li>
                            <li data-num-fri="3"></li>
                            <li data-num-sat="3"></li>

                            <li data-num-sun="4"></li>
                            <li data-num-mon="4"></li>
                            <li data-num-tue="4"></li>
                            <li data-num-wed="4"></li>
                            <li data-num-thu="4"></li>
                            <li data-num-fri="4"></li>
                            <li data-num-sat="4"></li>

                            <li data-num-sun="5"></li>
                            <li data-num-mon="5"></li>
                            <li data-num-tue="5"></li>
                            <li data-num-wed="5"></li>
                            <li data-num-thu="5"></li>
                            <li data-num-fri="5"></li>
                            <li data-num-sat="5"></li>

                            <li data-num-sun="6"></li>
                            <li data-num-mon="6"></li>
                            <li data-num-tue="6"></li>
                            <li data-num-wed="6"></li>
                            <li data-num-thu="6"></li>
                            <li data-num-fri="6"></li>
                            <li data-num-sat="6"></li>

                            <li data-num-sun="7"></li>
                            <li data-num-mon="7"></li>
                            <li data-num-tue="7"></li>
                            <li data-num-wed="7"></li>
                            <li data-num-thu="7"></li>
                            <li data-num-fri="7"></li>
                            <li data-num-sat="7"></li>

                        </ul>

                    </div>

                </div> -->
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
                        <label for="">Categorie</label>
                        <select name="category-name" id="category-name">
                            <option value="University">University</option>
                            <option value="interview">interview</option>
                        </select>
                        <button type="submit" style="padding:2%;margin:5%;"> Create</button>
                    </form>

                </div>


            </div>
            <div class="tablebody">
                <div class="timeheader">
                    <h2>Time Table</h2>
                    <div class="btnhead">
                        <button>&#60;</button>
                        <button>&#62;</button>
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
                        <!-- <li class="table-hour">5:00-6:30AM</li>
                <li class="table-task">
                </li>
                <li class="table-task"></li>
                <li class="table-task"></li>
                <li class="table-task"></li>
                <li class="table-task"></li>
                <li class="table-task">                 
 
            </li>
                <li class="table-task">

                </li>

                <li class="table-hour">6:30-8:00AM</li>
                <li class="table-task">

                </li>
                <li class="table-task">

                </li>
                <li class="table-task">

                </li>
                <li class="table-task">

                </li>
                <li class="table-task">

                </li>
                <li class="table-task">

                </li>
                <li class="table-task">

                </li>


                <li class="table-hour">8:00-9:30AM</li>
                <li class="table-task"></li>
                <li class="table-task"></li>
                <li class="table-task"></li>
                <li class="table-task"></li>
                <li class="table-task"></li>
                <li class="table-task"></li>
                <li class="table-task"></li> -->


                        <li class="add-row"> + </li>
                    </ul>
                </div>

            </div>



        </section>

        <section class="todo-list">
        <div class="todo-header">
            <h1>My Task Manager</h1>
            <form>
            <button type="submit">+</button>
            <input type="text" name="taskname" required id=Taskname" placeholder="Add Task" style="background-color: rgba(128, 128, 128, 0.345);">
            <input type="datetime-local" name="" id="" required>
            <select name="category-name" id="category-name">
                <option value="University">University</option>
                <option value="interview">interview</option>
            </select>
            </form>
        </div>
         
        <div class="incompleted-tasks">
            <h3>All Tasks</h3>
            <div class="todo-incompleted-task">
            <div class="task-header">
                <h4>Task 1</h4>
                <i class="fa-regular fa-square"></i>
            </div>
        <div class="task-settings">
              <h6>Event</h6>
              <h6>Fri Mar 34 2023 5:00PM</h6>
        </div>
            </div>
        </div>

        
        </section>

    </section>


</body>

</html>