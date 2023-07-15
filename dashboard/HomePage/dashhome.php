<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<link rel="stylesheet" href="../dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
  require_once '../navbar/navbar.php';
  ?>

<section id="all">


    <?php
    require_once '../dashheader/dashheader.php';
echo "<script>
document.documentElement.style.setProperty(`--display-var-home`, 'block');
</script>"    
    ?>

<section class="homesection" id="homesection">

            <section class="projects">
            <i class="fa-solid fa-square-minus"></i>
                <!-- <div class="project">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                    <h4>Web Development</h4>
                    <p>10 Tasks</p>
                    <div class="progresspart">
                        <label for="achievebar">2/10</label>
                        <progress id="achievebar" value="20" max="100">20%</progress>
                    </div>
                </div> -->

            </section>
            <div class="taskstatistic">
                <div class="tasks-container">
                    <h4>Tasks Tor Today</h4>
                    <div class="tasks">
                        

                    </div>
                </div>

                <div class="stats">
                    <h4>Statistics</h4>
                    <div class="widgets">
                        <div class="widget">
                            <h4>19</h4>
                            <p>Finished Tasks</p>
                        </div>
                        <div class="widget">
                            <h4>28 h</h4>
                            <p>Working time</p>
                        </div>
                    </div>
                </div>
                <div>
                <canvas id="myChart" width="100%" style="margin:0;"></canvas>
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
                    <input type="number" required />
                    <button class="createBtn" type="submit">Create &rarr;</button>
                </form>
            </div>


          






            <div class="overlay hidden"></div>

      </section>

         </section>

<script>

</script>



<script src="dashhome.js"></script>

</body>
</html>