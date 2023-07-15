

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