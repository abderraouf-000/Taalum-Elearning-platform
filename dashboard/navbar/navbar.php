<!DOCTYPE html>
<html lang="en">
<head>
<!-- <link rel="stylesheet" href="dash.css"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="sidebar">
   <i class="fa-solid fa-bars" style="color: #ffffff;"></i>        

     <div class="serviceicon">
            <div class="icon home">
               <a href="#"> <i class="fa-sharp fa-solid fa-house "></i></a>
            </div>
            <div class="icon statistics">
                <a href="#"><i class="fa-solid fa-chart-column "></i></a>
            </div>
            <div class="icon Todo-list">
                <a href="#"><i class="fa-solid fa-list "></i></a>
            </div>
            <div class="icon Time-table">
                <a href="#"> <i class="fa-solid fa-table-list"></i></a>
            </div>
     </div>
     

    <div class="icon Settings">
           <a href="#"> <i class="fa-solid fa-gear "></i></a>
     </div>

     <div class="setting-model hidden" style="background-color: rgba(34, 34, 34, 0.995);">
                <button class="btn--close" style="color:white;position:absolute;top:-15%;right:0%;font-size: 3rem;">&times;</button>
                
                   <div class="logout">
                    <a href="logout.php">Log out</a>
                    <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>
                   </div>

                    <div class="deleteAcc">
                    <a href="deleteAccount.php">Delete Account</a>
                    <i class="fa-solid fa-user-minus" style="color: #ffffff;"></i>
                    </div>
                    
            </div>


          


</div>




<script>

'use strict';

const homeLink = document.querySelector('.home');
const statLink = document.querySelector('.statistics');
const toDoLink = document.querySelector('.Todo-list');
const TableLink = document.querySelector('.Time-table');

let openSetting = false;
const SettingDialogue =  document.querySelector('.setting-model');

console.log('GOING TO NOTHING ');

const settingLink = document.querySelector('.fa-gear');
settingLink.addEventListener('click', e => {
    e.preventDefault();
    if(openSetting == false){
     SettingDialogue.classList.remove('hidden');
     openSetting = true;
    }
    else{
    SettingDialogue.classList.add('hidden');
     openSetting = false;
    }
})


document.querySelector('.btn--close').addEventListener('click',e=>{
    SettingDialogue.classList.add('hidden');
    openSetting = false;
})



const allLinks = [TableLink,toDoLink,statLink,homeLink];
allLinks.forEach(function(ele){
    console.log(ele);
    ele.addEventListener('click',e=>{
        console.log(ele.classList);
        if([...ele.classList].includes('home')){
        window.location.href = "../HomePage/dashhome.php";
        }
        if([...ele.classList].includes('statistics')){
        window.location.href = "../HomePage/dashhome.php";
        }
        if([...ele.classList].includes('Todo-list')){
        window.location.href = "../Todolist/Todolist.php";
        }
        if([...ele.classList].includes('Time-table')){
        window.location.href = "../TimeTablePage/timeTable.php";
        }
        // if([...ele.classList].includes('Settings')){
        // window.location.href = "../Todolist/Todolist.php";
        // }
    })
})

let sidebar = document.querySelector('.sidebar');
// adding opening the side bar and adding the the text to all icons 

// const returnarrow = document.querySelector('.fa-arrow-left-long');
const menu = document.querySelector(".fa-bars");
let isSideOpen = false;

menu.addEventListener('click', e => {
    sideAction();
});



function sideAction() {
    if (!isSideOpen){
        
        let icons = document.querySelectorAll('.sidebar .icon');
        let iconsa = document.querySelectorAll('.sidebar .icon a');
        let iconi = document.querySelectorAll('.sidebar .icon i');
        icons.forEach(function (icon, i) {
            iconsa[i].textContent = `${icon.classList[1]}`;
            iconsa[i].prepend(iconi[i]);
        })
    isSideOpen = true;

    }
else {
let icons = document.querySelectorAll('.sidebar .icon');
let iconi = document.querySelectorAll('.sidebar .icon i');
icons.forEach(function (icon, i) {
    let icona = icon.querySelector('a');
    icon.querySelector('a').textContent = '';
    icon.querySelector('a').prepend(iconi[i]);
})
isSideOpen = false;
}
}


let icons = document.querySelectorAll('.sidebar .icon');
let root = document.documentElement;
let lastclicked;

icons.forEach(function (icon, i) {
    icon.addEventListener('click', e => {
        root.style.setProperty(`--display-var-${icon.classList[1]}`, 'block');
        if (lastclicked != icon)
        root.style.setProperty(`--display-var-${lastclicked?.classList[1]}`, 'none');
        lastclicked = icon;
    })
})

</script>

</body>
</html>