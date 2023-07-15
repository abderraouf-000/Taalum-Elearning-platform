<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
</body>
<div class="calendar">
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
        <li data-num-sun = "1" ></li>
        <li data-num-mon = "1" ></li>
        <li data-num-tue = "1" ></li>
        <li data-num-wed = "1" ></li>
        <li data-num-thu = "1" ></li>
        <li data-num-fri = "1" ></li>
        <li data-num-sat = "1" ></li>
    
        <li data-num-sun = "2" ></li>
        <li data-num-mon = "2" ></li>
        <li data-num-tue = "2" ></li>
        <li data-num-wed = "2" ></li>
        <li data-num-thu = "2" ></li>
        <li data-num-fri = "2" ></li>
        <li data-num-sat = "2" ></li>

        <li data-num-sun = "3"></li>
        <li data-num-mon = "3"></li>
        <li data-num-tue = "3"></li>
        <li data-num-wed = "3" ></li>
        <li data-num-thu = "3" ></li>
        <li data-num-fri = "3" ></li>
        <li data-num-sat = "3" ></li>
    
        <li data-num-sun = "4" ></li>
        <li data-num-mon = "4" ></li>
        <li data-num-tue = "4"></li>
        <li data-num-wed = "4" ></li>
        <li data-num-thu = "4" ></li>
        <li data-num-fri = "4" ></li>
        <li data-num-sat = "4" ></li>

        <li data-num-sun = "5"></li>
        <li data-num-mon = "5"></li>
        <li data-num-tue = "5"></li>
        <li data-num-wed = "5"></li>
        <li data-num-thu = "5"></li>
        <li data-num-fri = "5"></li>
        <li data-num-sat = "5"></li>

        <li data-num-sun = "6"></li>
        <li data-num-mon = "6"></li>
        <li data-num-tue = "6"></li>
        <li data-num-wed = "6"></li>
        <li data-num-thu = "6"></li>
        <li data-num-fri = "6"></li>
        <li data-num-sat = "6"></li>

        <li data-num-sun = "7"></li>
        <li data-num-mon = "7"></li>
        <li data-num-tue = "7"></li>
        <li data-num-wed = "7"></li>
        <li data-num-thu = "7"></li>
        <li data-num-fri = "7"></li>
        <li data-num-sat = "7"></li>

    </ul>

    </div>

</div>

<script>
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
const days = ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
// 01  + 1  = february
let currdaynum = new Date().getDate(); // 25 february
let currdayname = new Date().getDay(); // 6  saturday

let next = document.querySelector('.fa-chevron-right');
let prev = document.querySelector('.fa-chevron-left');

let curryear = new Date().getFullYear();
let currmonth = new Date().getMonth();

let lastMonth = currmonth;
let lastYear = curryear;

loadCalendar(lastMonth, lastYear);

let emptyClickRight = false;
let emptyClickLeft = false;

next.addEventListener('click', e => {

    if (lastMonth >= 1 && lastMonth <= 10 || emptyClickLeft === true) {
        lastMonth++;
        emptyCalendar();
        emptyClickRight = false;
        loadCalendar(lastMonth, lastYear);
        if (!(lastMonth >= 1 && lastMonth <= 10)) {
            emptyClickRight = true;
        }

    }


})

prev.addEventListener('click', e => {
    if (lastMonth >= 1 && lastMonth <= 10 || emptyClickRight === true) {
        lastMonth--;
        emptyCalendar();
        loadCalendar(lastMonth, lastYear);
        emptyClickLeft = false;
        if (!(lastMonth >= 1 && lastMonth <= 10)) {
            emptyClickLeft = true;
        }


    }


})


function emptyCalendar() {
    document.querySelectorAll('.calendar li').forEach(function (ele) {
        if (ele.className != "daysname")
            ele.textContent = '';
        ele.classList.remove('active');
    })
}

function loadCalendar(currmonth, curryear) {

    const currentDate = document.querySelector('.currentdate h2')
    currentDate.textContent = `${months[currmonth]} ${curryear}`;

    let firstdatemonth = new Date(curryear, currmonth, 1).getDate();
    let firstdaymonth = new Date(curryear, currmonth, 1).getDay();
    let lastdatemonth = new Date(curryear, currmonth + 1, 0).getDate();
    let lastdaymonth = new Date(curryear, currmonth + 1, 0).getDay();

    const filledays = [1, 1, 1, 1, 1, 1, 1];
    for (let i = firstdatemonth; i <= lastdatemonth; i++) {
        let j = new Date(curryear, currmonth, i).getDay();
        let currdate = new Date(curryear, currmonth, i).getDate();
        let curdayname = `${days[j]}`;
        let curline = filledays[j];// row number 
        // console.log(currdate,curdayname,numdayele);
        // console.log(`li[data-num-${days[j]}="${numdayele}"]`);
        let ele = document.querySelector(`li[data-num-${days[j]}="${curline}"]`);
        ele.textContent = `${currdate}`;
        // filledays[curdayname]++;
        jumpli(filledays, j, curline);

    }
}
function jumpli(filledays, j, currline) {
    for (let i = 0; i <= j; i++) {
        filledays[i] = currline + 1;
    }
    console.log(filledays);

}

let clickedDateval;
document.querySelectorAll('li:not(.daysname)').forEach(function (ele) {
    if (true) {
        ele.addEventListener('click', e => {
            clickedDateval = document.querySelector('.currentdate h2').textContent.split(" ")[0] + " " + ele.textContent + " " + document.querySelector('.currentdate h2').textContent.split(" ")[1];
            Date.parse(clickedDateval);
            console.log(new Date(Date.parse(clickedDateval)));

            document.querySelectorAll('li:not(.daysname)').forEach(function (ele) {
                ele.classList.remove('active');
            })
            ele.classList.add('active');

        })
    }
})
</script>


<style>
@import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap');
:root {
    --extra-font: 'Source Sans Pro', sans-serif;
    --btn-clr: rgb(250, 250, 250);
    --btn-clr-hover: rgb(227, 227, 227);
}

.currentdate {
    display: flex;
    /* gap: 8%; */
    font-family: var(--extra-font);

}

.calendar .calendarhead {
    display: flex;
    justify-content: center;
    align-items: center;
    border-bottom: 2px solid black;
    flex-wrap: wrap;
}

.btns {
    display: flex;
    /* gap: 7%; */
    margin: 3%;
    /* flex-wrap: wrap; */
}

.calendar i {
    background-color: var(--btn-clr);
    padding: 15%;
    margin: 3%;
    border-radius: 3px;
    border-width: 0;
    cursor: pointer;
}



.calbody {
    /* display: flex; */
    justify-content: center;
    background-color: black;
}

.calbody .days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    background-color: rgb(255, 255, 255);
    padding: 0 0%;
}

.active {
    background-color: rgb(33, 131, 211);
    color: white;
}

.calbody li {
    text-align: center;
    font-size: 1.1rem;

    margin: 1%;
    /* max-width: 50px; */
}

.calbody li:not(.daysname) {
    cursor: pointer;
}


.calendar i:hover {
    background-color: var(--btn-clr-hover);

}

.calendar {
    /* min-width: 200px; */
    border-bottom: solid 1px black;
    font-family: var(--extra-font);
    background-color: rgb(255, 255, 255);
    /* box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; */
}

li {
    list-style: none;

}
</style>



</body>

</html>