const ctx = document.getElementById('myChart');
let weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'thursday', 'Friday', 'Saturday'];
let paths = [];



let url = "fetchSendHome/retrnPaths.php";
fetch(url).then(function (resp) {
    return resp.json();
}).then(data => {
    paths = data;
    console.log(paths);
    pathsReCreation(paths);
});


// adding free tasks 
fetch("../Todolist/fetchSendList/fetchTasks.php").then(function (resp) {
    return resp.json();
}).then(data => {
    let tasks = data;
    console.log(tasks);
    let i = 0;
    for (let task of tasks) {
        if (task.task_accomplished == "0" && i < 3) {
            addTaskHome(task);
            console.log(task);
            i++;
        }
    }

});


function addTaskHome(task) {
    let HTML = `<div class="task">
    <h4>${task.task_content.toUpperCase()}  <span style="font-weight:100;"> ${returnPathName(task.user_path_id)?.path_name.toUpperCase()}</span></h4>
    <p>Complete the task</p>
    <i class="fa-solid fa-square"></i>
</div>`;
    document.querySelector('.tasks-container .tasks').insertAdjacentHTML('beforeend', HTML);
}

function returnPathName(id) {
    for (let path of paths) {
        if (id == path.user_path_id) return path;
    }
}





class path {
    constructor(path_name, primary_task_number, achieved_task_number, creation_date) {
        this.path_name = path_name;
        this.primary_task_number = primary_task_number;
        this.achieved_task_number = achieved_task_number;
        this.creation_date = creation_date;
        this.pathID = 0;
    }

    sendObject() {

        let url = "fetchSendHome/sendPaths.php";
        fetch(url, {
            "method": "POST",
            "headers": {
            },
            "body": JSON.stringify(this)
        }).then(function (resp) {
            return resp.text();
        }).then(resp => {
            this.pathID = Number(resp);
            pathCreation(this);
        });

    }



}


// fetching current week ALL tasks  : 

let currWeekTasks;
let countWeekAchieved = 0;

url = "fetchSendHome/fetchCurrWeek.php";
fetch(url).then(function (resp) {
    return resp.json();
}).then(data => {
    currWeekTasks = data;
    console.log("current :  ", data);
    createChart(rtrnWeekAccomplishedNumber(currWeekTasks));
    createWeeklyAchievedTasks(countWeekAchieved);
});

function createWeeklyAchievedTasks(count) {

    document.querySelector('.widget h4').textContent = `${count}`;

}


function rtrnWeekAccomplishedNumber(currWeekTasks) {
    let days = { 'Saturday': 0, 'Sunday': 0, 'Monday': 0, 'Tuesday': 0, 'Wednesday': 0, 'thursday': 0, 'Friday': 0 };
    for (let task of currWeekTasks) {
        if (task.task_accomplished == "1") {
            countWeekAchieved++;
            console.log(new Date(task.change_state_Date).getDate());

            days[weekDays[new Date(task.change_state_Date).getDay()]] += 1;
        }

    }
    console.log(days);

    return days;
}

function createChart(weekObj) {
    // console.log(Object.keys(weekObj));

    new Chart(ctx, {
        type: 'line',
        fill: true,
        data: {
            labels: ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'thursday', 'Friday'],
            datasets: [{
                label: '# Daily Tasks',
                data: Object.values(weekObj),
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}


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

    let currentPath = new path(vallist[0], vallist[1], 0, new Date().getTime());
    currentPath.sendObject();

})

function pathCreation(path) {
    console.log(path);
    document.querySelector(".projects").insertAdjacentHTML('beforeend', `<div class="project" id="path-${path.user_path_id}">
    <i class="fa-solid fa-ellipsis-vertical"></i>
    <h4>${path.path_name}</h4>
    <p>${path.primary_task_number}Tasks</p>
    <div class="progresspart">
        <label for="achievebar">${path.achieved_task_number}/${path.primary_task_number}</label>
        <progress id="achievebar" value="${path.achieved_task_number}" max="${path.primary_task_number}" ></progress>
    </div>`)
}

function pathsReCreation(paths) {
    for (let path of paths) {
        pathCreation(path);
    }
}




//Project Delete menu open
let closeddeletemenu = true;

document.querySelector(".projects")?.addEventListener('click', function (e) {
    if (e.target.classList[1] === 'fa-square-minus') {
        if (closeddeletemenu) {
            root.style.setProperty('--display-var-delete-menu', 'flex');
            closeddeletemenu = false;
        }
        else {
            root.style.setProperty('--display-var-delete-menu', 'none');
            closeddeletemenu = true;
        }
    }
})

// deleting path
document.querySelector(".projects")?.addEventListener('click', e => {
    if (e.target.classList[0] === 'project' && !closeddeletemenu) {
        deletePath(e.target.id);
        e.target.remove();
    }
})


function deletePath(pathID) {
    let url = "fetchSendHome/deletePath.php";
    fetch(url, {
        "method": "POST",
        "headers": {
        },
        "body": JSON.stringify({ user_path_id: pathID.split('-')[1] })
    }).then(function (resp) {
        return resp.text();
    }).then(resp => {
        console.log(resp);
    });

}




