'use strict';

// alert("Js IS USED !!");




let sidebar = document.querySelector('.sidebar');
let dimarrow = document.querySelector('.fa-arrow-right-long');
let returnarrow = document.querySelector('.fa-arrow-left-long');
// adding opening the side bar and adding the the text to all icons 
let issideopen = 0;
dimarrow.addEventListener('click', e => {
    if (!issideopen) {
        let icons = document.querySelectorAll('.sidebar .icon');
        let iconsa = document.querySelectorAll('.sidebar .icon a');
        let iconi = document.querySelectorAll('.sidebar .icon i');
        icons.forEach(function (icon, i) {
            iconsa[i].textContent = `${icon.classList[1]}`;
            iconsa[i].prepend(iconi[i]);
            console.log();
        })
    }
    dimarrow.classList.add("displaynone");
    returnarrow.classList.remove("displaynone")
    issideopen = 1;
})
//adding the closing of the sidebar
returnarrow.addEventListener('click', e => {
    if (issideopen) {
        let icons = document.querySelectorAll('.sidebar .icon');

        let iconi = document.querySelectorAll('.sidebar .icon i');
        icons.forEach(function (icon, i) {
            let icona = icon.querySelector('a');
            icon.querySelector('a').textContent = '';
            icon.querySelector('a').prepend(iconi[i]);

        })
    }
    dimarrow.classList.remove("displaynone");
    returnarrow.classList.add("displaynone")
    issideopen = 0;
})


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


let welcomedate = document.querySelector(' header p');

welcomedate.textContent = `Today is, ${new Date().toDateString()}`;


// settings pop up model 












//////////pop up modal window creation 
const projectModal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");

document.querySelector(".btn--close-modal").addEventListener('click', function (e) {
    e.preventDefault();
    projectModal.classList.add('hidden');
    overlay.classList.add('hidden');
})

document.querySelector(".newprojectbtn").addEventListener('click', function (e) {
    e.preventDefault();
    projectModal.classList.remove('hidden');
    overlay.classList.remove('hidden');
})

document.querySelector(".modal__form").addEventListener('submit', function (e) {
    e.preventDefault();
    projectModal.classList.add('hidden');
    overlay.classList.add('hidden');
    let vallist = [];
    document.querySelectorAll('.modal input').forEach(function (inp) {
        vallist.push(inp.value);
    });

    console.log(vallist);
    document.querySelector(".projects").insertAdjacentHTML('beforeend', `<div class="project">
    <i class="fa-solid fa-ellipsis-vertical"></i>
    <h4>${vallist[0]}</h4>
    <p>${vallist[1]} Tasks</p>
    <div class="progresspart">
        <label for="achievebar">0/${vallist[1]}</label>
        <progress id="achievebar" value="0" max="100">20%</progress>
    </div>`)


})







//Project Delete menu open
let closeddeletemenu = true;

document.querySelector(".projects")?.addEventListener('click', function (e) {
    if (closeddeletemenu) {


        if (e.target.classList[1] === 'fa-ellipsis-vertical') {
            console.log(root.style.getPropertyValue('--display-var-delete-menu'));

            root.style.setProperty('--display-var-delete-menu', 'flex');
            closeddeletemenu = false;
        }

    }

})
document.querySelector("body")?.addEventListener('click', function (e) {
    if (!closeddeletemenu) {
        if (e.target.classList[1] != 'fa-ellipsis-vertical') {
            console.log(root.style.getPropertyValue('--display-var-delete-menu'));
            root.style.setProperty('--display-var-delete-menu', 'none');
            closeddeletemenu = true;

        }
    }

})

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
        console.log('asfdfdas');
        document.querySelector(' header .notification-modal').style.display = closeOpen;
        notifclosed = false;
    }
}






// const ctx = document.getElementById('myChart');
// new Chart(ctx, {
//     type: 'line',
//     fill: 'true',
//     data: {
//         labels: ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'thursday', 'Friday'],
//         datasets: [{
//             label: '# Daily Tasks',
//             data: [12, 19, 3, 5, 2, 3],
//             borderWidth: 3
//         }]
//     },
//     options: {
//         scales: {
//             y: {
//                 beginAtZero: true
//             }
//         }
//     }
// });







// creating the time table section

// creating calendar : 

// const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
// const days = ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
// // 01  + 1  = february
// let currdaynum = new Date().getDate(); // 25 february
// let currdayname = new Date().getDay(); // 6  saturday

// let next = document.querySelector('.fa-chevron-right');
// let prev = document.querySelector('.fa-chevron-left');

// let curryear = new Date().getFullYear();
// let currmonth = new Date().getMonth();

// let lastMonth = currmonth;
// let lastYear = curryear;

// loadCalendar(lastMonth, lastYear);

// let emptyClickRight = false;
// let emptyClickLeft = false;

// next.addEventListener('click', e => {

//     if (lastMonth >= 1 && lastMonth <= 10 || emptyClickLeft === true) {
//         lastMonth++;
//         emptyCalendar();
//         emptyClickRight = false;
//         emptyClickLeft = false;
//         loadCalendar(lastMonth, lastYear);
//         if (!(lastMonth >= 1 && lastMonth <= 10)) {
//             emptyClickRight = true;
//         }

//     }


// })

// prev.addEventListener('click', e => {
//     if (lastMonth >= 1 && lastMonth <= 10 || emptyClickRight === true) {
//         lastMonth--;
//         emptyCalendar();
//         loadCalendar(lastMonth, lastYear);
//         emptyClickRight = false;
//         emptyClickLeft = false;

//         if (!(lastMonth >= 1 && lastMonth <= 10)) {
//             emptyClickLeft = true;
//         }


//     }


// })


// function emptyCalendar() {
//     document.querySelectorAll('.calbody .days li').forEach(function (ele) {
//         if (ele.className != "daysname")
//             ele.textContent = '';
//         ele.classList.remove('active');
//     })
// }






// function loadCalendar(currmonth, curryear) {

//     const currentDate = document.querySelector('.currentdate h2')
//     currentDate.textContent = `${months[currmonth]} ${curryear}`;

//     let firstdatemonth = new Date(curryear, currmonth, 1).getDate();
//     let firstdaymonth = new Date(curryear, currmonth, 1).getDay();
//     let lastdatemonth = new Date(curryear, currmonth + 1, 0).getDate();
//     let lastdaymonth = new Date(curryear, currmonth + 1, 0).getDay();

//     const filledays = [1, 1, 1, 1, 1, 1, 1];
//     for (let i = firstdatemonth; i <= lastdatemonth; i++) {
//         let j = new Date(curryear, currmonth, i).getDay();
//         let currdate = new Date(curryear, currmonth, i).getDate();
//         let curdayname = `${days[j]}`;
//         let curline = filledays[j];// row number 
//         // console.log(currdate,curdayname,numdayele);
//         // console.log(`li[data-num-${days[j]}="${numdayele}"]`);
//         let ele = document.querySelector(`li[data-num-${days[j]}="${curline}"]`);
//         ele.textContent = `${currdate}`;
//         // filledays[curdayname]++;
//         jumpli(filledays, j, curline);

//     }
// }
// function jumpli(filledays, j, currline) {
//     for (let i = 0; i <= j; i++) {
//         filledays[i] = currline + 1;
//     }
//     console.log(filledays);

// }

// let clickedDateval;
// document.querySelectorAll('.calbody li:not(.daysname)').forEach(function (ele) {
//     if (true) {
//         ele.addEventListener('click', e => {
//             clickedDateval = document.querySelector('.currentdate h2').textContent.split(" ")[0] + " " + ele.textContent + " " + document.querySelector('.currentdate h2').textContent.split(" ")[1];
//             Date.parse(clickedDateval);
//             console.log(new Date(Date.parse(clickedDateval)));

//             document.querySelectorAll('.calbody li:not(.daysname)').forEach(function (ele) {
//                 ele.classList.remove('active');
//             })
//             ele.classList.add('active');

//         })
//     }
// })


// adding a category


// const categoryInputForm = document.querySelector("#Time-table .tablemenu .category-header form");
// const categories = document.querySelector("#Time-table .tablemenu #categories");

// categoryInputForm.addEventListener('submit', e => {
//     e.preventDefault();
//     let catNameVal = categoryInputForm.querySelectorAll('input')[0].value;
//     let catColorVal = categoryInputForm.querySelectorAll('input')[1].value;
//     console.log(catColorVal, catNameVal);
//     categories.insertAdjacentHTML('afterend', ` <div class="categorie">
// <i class="fa-solid fa-square-check" style="color:${catColorVal};"></i>
// <h4>${catNameVal}</h4>   
// </div>`)

// })

// //adding a task  : 

// const taskcontainer = document.querySelector(".tablebody .body");
// let selectedTaskContainer;
// // let selectedItems = [];
// let select = false;
// let lastSelect;
// taskcontainer.addEventListener('click', e => {

//     SelectDis(e.target);
// })
// const SelectDis = function (selectedTaskContainer) {
//     if (select) {
//         lastSelect.style.border = "";
//         select = false;
//         return;
//     }
//     if (selectedTaskContainer.className === "table-task" && !select) {
//         selectedTaskContainer.style.border = "1.5px dashed rgb(10, 34, 49)";
//         select = true;
//         lastSelect = selectedTaskContainer;
//         console.log(selectedTaskContainer);
//     }

// }

// // adding tasks to the selected containers
// document.querySelector(".createTaskModal form ").addEventListener('submit', e => {
//     e.preventDefault();
//     if (select) {
//         const inputs = [...document.querySelector(".createTaskModal form ").querySelectorAll('input')];
//         const selectinput = document.querySelector(".createTaskModal form #category-name");
//         lastSelect.textContent = `${inputs[0].value}`;
//         console.log(selectinput.value);//select value
//         lastSelect.style.color = `rgb(10, 34, 49)`;
//         console.log(inputs);
//         lastSelect.style.backgroundColor = "rgba(10, 34, 49,.7)";
//     }

// })

// //adding a new row :
// let currTableTime = 5;
// const addrow = document.querySelector(".tablebody .add-row");
// addrow.addEventListener('click', e => {
//     if (currTableTime <= 23) {
//         const tablebodyul = document.querySelector(".tablebody .body ul");
//         addrow.insertAdjacentHTML('beforebegin', `<li class="table-hour">${currTableTime}:00-${++currTableTime}:00</li>
// <li class="table-task"></li>
// <li class="table-task"></li>
// <li class="table-task"></li>
// <li class="table-task"></li>
// <li class="table-task"></li>
// <li class="table-task"></li>
// <li class="table-task"></li>`);
//     }

// })


// tasks manipulation :

//add a task  : 
let tasksArray = [];
const newTaskForm = document.querySelector(".todo-header form");
newTaskForm.addEventListener('submit', e => {
    e.preventDefault();
    let [name, time, event] = [newTaskForm.querySelectorAll("input")[0].value, newTaskForm.querySelectorAll("input")[1].value, newTaskForm.querySelector('select').value];
    const taskobj = new Task(name, event, time);
    time = new Date(time).toDateString() + " " + new Date(time).toTimeString().split(" ")[0];
    tasksArray.push(taskobj);
    createTaskDiv(name, time, event);
    console.log(tasksArray);

})


function createTaskDiv(name, time, event) {
    let taskHTML = `
   <div class="todo-incompleted-task">
     <div class="task-header">
       <h4>${name}</h4>
     <i class="fa-regular fa-square"></i>
   </div>
 <div class="task-settings">
     <h6>${event}</h6>
     <h6>${time}</h6>
</div>
   </div>
   `;
    document.querySelector('.incompleted-tasks').insertAdjacentHTML('beforeend', taskHTML);
}


class Task {
    #taskName;
    #taskCategory;
    #taskTime;
    #taskEvent;
    #achieved;

    constructor(taskName, taskEvent, taskTime) {
        this.#taskTime = taskTime;
        this.#taskName = taskName;
        this.#taskEvent = taskEvent;
        this.#achieved = false;
    }

    setAchieved() {
        this.#achieved = true;
    }
}

document.querySelector('.incompleted-tasks').addEventListener('click', e => {
    if (e.target.className === 'fa-regular fa-square') {
        const task = e.target.parentElement.parentElement;
        task.querySelector('.task-header i').classList.remove('fa-square');
        task.querySelector('.task-header i').classList.add('fa-square-check');

    }

})

