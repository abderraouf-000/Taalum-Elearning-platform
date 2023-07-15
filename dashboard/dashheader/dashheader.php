
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<header>
            <div class="welcome">
           <?php
            echo "<h4>Hello ,".$_SESSION['userName']."</h4>";
            ?>
                <p>today is </p>
            </div>
            <div class="searchbar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search" name="" id="">
            </div>
            <i class="fa-solid fa-bell"></i>
            <div class="newprojectbtn">
                <span>Add Learning Path</span>
                <i class="fa-solid fa-plus"></i>
            </div>

            <div class="notification-modal">
                <h3 style="color:white">Notification</h3>
            </div>
            

</header>
<script>
let welcomedate = document.querySelector(' header p');

welcomedate.textContent = `Today is, ${new Date().toDateString()}`;


// notifications model open / close
const notifIcon = document.querySelector(' header .fa-bell ');
let notifclosed = true;
notifIcon.addEventListener('click', e => {
    notifAction('block');
}
)

function notifAction(closeOpen) {
    if (!notifclosed) {
        document.querySelector('header .notification-modal').style.display = 'none';
        notifclosed = true;
    }
    else {
        document.querySelector('header .notification-modal').style.display = closeOpen;
       notifclosed = false;
    }
}
        fetch("../gettingNotifications.php", {
            "method": "POST",
            "headers": {
            },
            "body": {type:'taskCount'}
        }).then(function (resp) {
            return resp.text();
        }).then(resp => {
            const notify = document.querySelector('header .notification-modal');
            notify.insertAdjacentHTML('beforeend',`<p style="color:white;"> - you have ${resp} Unachieved Tasks</p>`);
        });

document.documentElement.style.setProperty('--notification', "'1'");




</script>

</body>
</html>