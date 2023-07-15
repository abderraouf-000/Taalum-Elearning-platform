"use strict";


class freeTask {
    constructor(task_content, task_end_date, creation_date) {
        this.task_id = 0;
        this.user_path_id = "NULL";
        this.task_end_date = task_end_date;
        this.task_content = task_content;
        this.task_accomplished = false;
        this.creation_date = creation_date;
    }


    sendObject() {

        let url = "fetchSendList/sendTasks.php";
        fetch(url, {
            "method": "POST",
            "headers": {
            },
            "body": JSON.stringify(this)
        }).then(function (resp) {
            return resp.text();
        }).then(resp => {
            console.log(resp);
            this.task_id = Number(resp);
            allTasks.push(this);
            createTaskDiv(this.task_content, new Date(this.task_end_date).toDateString().split(" ").splice(0, 6).join(" "), "", this.task_id);
        });

    }


}





class Task {

    constructor(task_content, user_path_id, task_end_date, creation_date) {

        this.task_id = 0;
        this.task_end_date = task_end_date;
        this.task_content = task_content;
        this.user_path_id = user_path_id;
        this.task_accomplished = false;
        this.creation_date = creation_date;

    }



    sendObject() {

        let url = "fetchSendList/sendTasks.php";
        fetch(url, {
            "method": "POST",
            "headers": {
            },
            "body": JSON.stringify(this)
        }).then(function (resp) {
            return resp.json();
        }).then(resp => {
            console.log(resp);
            this.task_id = Number(resp);
            allTasks.push(this);
            console.log(allTasks);
            createTaskDiv(this.task_content, new Date(this.task_end_date).toDateString().split(" ").splice(0, 6).join(" "), returnPath(this.user_path_id).path_name, this.task_id);
        });

    }

}
























let allPaths = [];
let allPathTasks = [];
let allFreeTasks = [];
let allTasks = [];

// returning all Paths from the Database : 

let url = "../HomePage/fetchSendHome/retrnPaths.php";
fetch(url).then(function (resp) {
    return resp.json();
}).then(data => {
    allPaths = data;
    console.log(allPaths);
    pathsSelect(allPaths);
    
});

function pathsSelect(paths) {
    const selectForm = document.querySelector("#path");
    for (let path of paths) {
        let pathHTML =
            `<option value="${path.user_path_id}" id="${path.user_path_id}">${path.path_name}</option>`
        selectForm.insertAdjacentHTML('beforeend', pathHTML)
    }
}


// returning all path tasks from database : 

url = "fetchSendList/fetchTasks.php";
fetch(url).then(function (resp) {
    return resp.json();
}).then(data => {
    console.log(data);
    allPathTasks = data;
    allTasks.push(...allPathTasks);
    for (let pathTask of allPathTasks) {
        createTaskDiv(pathTask.task_content, new Date(Number(pathTask.task_end_date)).toDateString().split(" ").splice(0, 6).join(" "), fetchedTasksReturnPath(Number(pathTask.user_path_id)).path_name, Number(pathTask.task_id), Number(pathTask.task_accomplished));
    }
});

function fetchedTasksReturnPath(id) {
    for (let path of allPaths) {
        if (path.user_path_id == id) return path;
    }

}
// returning all free tasks from the database : 

url = "fetchSendList/fetchFreeTasks.php";
fetch(url).then(function (resp) {
    return resp.json();
}).then(data => {
    console.log(data);
    allFreeTasks = data;
    allTasks.push(...allFreeTasks);
    for (let freeTask of allFreeTasks) {
        freeTask.user_path_id = "NULL";
        createTaskDiv(freeTask.task_content, new Date(Number(freeTask.task_end_date)).toDateString().split(" ").splice(0, 6).join(" "), "", Number(freeTask.task_id), Number(freeTask.task_accomplished));
    }
}).catch(err => {
    console.log(err);
});






















// tasks manipulation :
//add a task  : 
let tasksArray = [];

const newTaskForm = document.querySelector(".todo-header form");
newTaskForm.addEventListener('submit', e => {
    e.preventDefault();
    let taskobj;
    let [name, time, path] = [newTaskForm.querySelectorAll("input")[0].value, newTaskForm.querySelectorAll("input")[1].value, newTaskForm.querySelector('select').value];

    console.log(name, time, path);

    if (path == "NULL") {
        taskobj = new freeTask(name, new Date(time).getTime(), new Date().getTime());
    }
    else {
        taskobj = new Task(name, Number(path), new Date(time).getTime(), new Date().getTime());
    }
    taskobj.sendObject();

    console.log(taskobj);

})


function createTaskDiv(task_content, task_end_date, task_path, task_id, checked = 0) {
    let checkSettings = ['-check', 'style  = "text-decoration : line-through;"', 'style = "border-left: solid 7px red;"'];
    console.log(`${!checked ? checkSettings[1] : ""}`, checked);
    let taskHTML = `
   <div class="todo-incompleted-task" id="path-${task_id}" ${checked === 1 ? checkSettings[2] : ""}>
     <div class="task-header">
       <h4 ${checked === 1 ? checkSettings[1] : ""}">${task_content}</h4>
     <i class="fa-regular fa-square${checked === 1 ? checkSettings[0] : ""}"></i>
   </div>
 <div class="task-settings">
     <h6>${task_path}</h6>
     <h6>${task_end_date}</h6>
     </div>
     <i class="fa-solid fa-trash"></i> 
</div>`;
    if (checked == 0) {
        document.querySelector('.incompleted-tasks').insertAdjacentHTML('beforeend', taskHTML);
    }
    else {
        document.querySelectorAll('.incompleted-tasks')[1].insertAdjacentHTML('beforeend', taskHTML);
    }
}




// changing task accomplished state : 


document.querySelectorAll('.incompleted-tasks').forEach(ele => {

    ele.addEventListener('click', e => {
        if (e.target.className === 'fa-regular fa-square') {

            const task = e.target.parentElement.parentElement;
            task.querySelector('.task-header i').classList.remove('fa-square');
            task.querySelector('.task-header i').classList.add('fa-square-check');
            task.querySelector('h4').style.textDecoration = 'line-through';
            task.style.borderLeft = "solid 7px red";
            document.querySelectorAll('.incompleted-tasks')[1].appendChild(task);
            const taskObj = returnTask(Number(task.id.split("-")[1]));
            // task.remove();
            // createTaskDiv(taskObj.task_content,taskObj.task_end_date,task.task_path,task.task_id);
            ChangeAchieved(1, returnTask(Number(task.id.split("-")[1])));

        }
        else if (e.target.className === 'fa-regular fa-square-check') {
            const task = e.target.parentElement.parentElement;
            task.querySelector('.task-header i').classList.remove('fa-square-check');
            task.querySelector('.task-header i').classList.add('fa-square');
            task.querySelector('h4').style.textDecoration = 'none';
            const taskObj = returnTask(Number(task.id.split("-")[1]));
            task.style.borderLeft = "solid 7px rgb(1, 123, 185)";
            document.querySelectorAll('.incompleted-tasks')[0].appendChild(task);
            // task.remove();
            // createTaskDiv(this.task_content, new Date(this.task_end_date).toDateString().split(" ").splice(0, 6).join(" "), returnPath(this.user_path_id).path_name, taskObj.task_id);
            ChangeAchieved(0, taskObj);
        }
    });

});


function ChangeAchieved(state, task) {
    console.log(state, task);
    let url = "fetchSendList/changeState.php";
    fetch(url, {
        "method": "POST",
        "headers": {
        },
        "body": JSON.stringify({ ...task, new_state: state })
    }).then(function (resp) {
        return resp.text();
    }).then(resp => {
        console.log(resp);
    });
}




// searching using ID  :  
function returnPath(id) {
    for (let path of allPaths) {
        if (path.user_path_id == id) return path;
    }

}

function returnTask(id) {
    for (let task of allTasks) {
        if (task?.task_id == id) return task;
    }
}


// drop down  : 
document.querySelectorAll('.Texthead').forEach((ele, i) => {

    ele.addEventListener('click', e => {
        if (e.target.className == "fa-solid fa-chevron-down") {
            e.target.classList.remove('fa-chevron-down');
            e.target.classList.add('fa-chevron-up');
            if (i == 0) {
                console.log(i);
                document.querySelectorAll('.incompleted-tasks')[i].style.display = 'none';
            }
            else {
                document.querySelectorAll('.incompleted-tasks')[i].style.display = 'none';
                console.log(i);
            }


        }

        else if (e.target.className == "fa-solid fa-chevron-up") {
            e.target.classList.remove('fa-chevron-up');
            e.target.classList.add('fa-chevron-down');
            if (i == 0) {
                document.querySelectorAll('.incompleted-tasks')[i].style.display = 'block';
                console.log(i);

            }
            else {
                document.querySelectorAll('.incompleted-tasks')[i].style.display = 'block';
                console.log(i);
            }

        }

    });

});

document.querySelectorAll('.incompleted-tasks').forEach(ele => {
    ele.addEventListener('click', e => {
        if (e.target.classList == "fa-solid fa-trash") {
            const task = e.target.parentElement;
            DeleteTask(returnTask(task.id.split('-')[1]));
            task.remove();
        }
    })
})

document.querySelector('.incompleted-tasks').addEventListener('click', e => {
    if (e.target.classList == "fa-solid fa-trash") {
        const task = e.target.parentElement;
        DeleteTask(returnTask(task.id.split('-')[1]));
        task.remove();
    }
})

function DeleteTask(task) {
    console.log(task)
    let url = "fetchSendList/DeleteTask.php";
    fetch(url, {
        "method": "POST",
        "headers": {
        },
        "body": JSON.stringify({ ...task })
    }).then(function (resp) {
        return resp.text();
    }).then(resp => {
        console.log(resp);
    });
}