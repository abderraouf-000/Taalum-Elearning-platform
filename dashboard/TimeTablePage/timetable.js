'use strict';
let categoriesObjects = [];

class category {
    constructor(category_id, category_name, category_color, creation_date, user_name) {
        this.category_id = category_id;
        this.category_name = category_name;
        this.category_color = category_color;
        this.creation_date = creation_date;
        this.user_name = user_name;
    }
    sendObject() {
        let url = 'insertCategory.php';
        fetch(url, {
            "method": "POST",
            "headers": {
            },
            "body": JSON.stringify(this)
        }).then(function (resp) {
            return resp.text();
        }).then(resp => {
            console.log(resp);
            this.category_id = Number(resp);
            categoriesObjects.push(this);
            createCatDiv(this);
            addToSelect(this);
        });
    }
}


// fetching all categories : 
const url = "fetchCategories.php";

fetch(url).then(function (resp) {
    return resp.json();
}).then(data => {
    console.log(data);
    categoriesObjects.push(...data);
    for (let cat of categoriesObjects) {
        console.log(cat.category_id);
        createCatDiv(cat);
        addToSelect(cat);
    }
});



function addToSelect(cat) {
    const select = document.querySelector('#category-name');
    const html = `<option value="${cat.category_id}">${cat.category_name}</option>
    `;
    select.insertAdjacentHTML('beforeend', html);
}






const categoryInputForm = document.querySelector("#Time-table .tablemenu .category-header form");
const categories = document.querySelector("#Time-table .tablemenu #categories");

categoryInputForm.addEventListener('submit', e => {
    e.preventDefault();
    let catNameVal = categoryInputForm.querySelectorAll('input')[0].value;
    let catColorVal = categoryInputForm.querySelectorAll('input')[1].value;
    console.log(catColorVal, catNameVal);
    let cat = new category("", catNameVal, catColorVal, new Date().getTime(), "");
    cat.sendObject();
})

function createCatDiv(cat) {
    categories.insertAdjacentHTML('afterend', ` <div class="categorie" id = "cat-${cat.category_id}">
<i class="fa-solid fa-square-check" style="color:${cat.category_color};"></i>
<h4>${cat.category_name}</h4>   
</div>`)

}

//adding a container:

const taskcontainer = document.querySelector(".tablebody .body");



let selectedTaskContainer;
let select = false;
let lastSelect;

taskcontainer.addEventListener('click', e => {

    SelectDis(e.target);

})








const SelectDis = function (selectedTaskContainer) {
    if (select) {
        lastSelect.style.border = ``;
        // lastSelect.style.borderLeft = `4px solid blue`;
        select = false;
        return;
    }

    if (selectedTaskContainer.className.includes("table-task") && !select) {

        selectedTaskContainer.style.border = "1.5px dashed rgb(10, 34, 49)";

        select = true;

        lastSelect = selectedTaskContainer;

        console.log(selectedTaskContainer);

    }

}


class Event {

    constructor(category_id, Event_time, Event_name, Event_day, creation_date, Event_week) {
        this.category_id = category_id;
        this.user_name = "";
        this.Event_name = Event_name;
        this.Event_time = Event_time;
        this.Event_week = Event_week;
        this.Event_day = Event_day;
        this.creation_date = creation_date;
    }

    sendObject() {
        let url = 'insertEvent.php';
        fetch(url, {
            "method": "POST",
            "headers": {
            },
            "body": JSON.stringify(this)
        }).then(function (resp) {
            return resp.text();
        }).then(resp => {
            console.log(resp);
        });
    }



}


let currWeek = 0;
let allEvents = [];



// fetch all events  : 

fetch("fetchEvents.php").then(function (resp) {
    return resp.json();
}).then(data => {
    console.log(data);
    allEvents.push(...data);
    for (let event of allEvents) {
        createEventDiv(event);
    }
});




function createEventDiv(event) {

    const eventLi = document.querySelector(`.table-task-${event.Event_day}-${event.Event_time}`);
    console.log(eventLi);
    if (event.Event_week == currWeek) {
        eventLi.textContent = event.Event_name;
        eventLi.style.backgroundColor = categoryByID(event.category_id).category_color;
    }
}


const nextBtn = document.querySelector('#next');
const prevBtn = document.querySelector('#prev');
const currWeekH3 = document.querySelector('.tablebody h3');

nextBtn.addEventListener('click', e => {
    currWeek++;
    currWeekH3.textContent = `Week - ${currWeek}`;
    emptyTable();
    for (let event of allEvents) {
        createEventDiv(event);
    }
})


prevBtn.addEventListener('click', e => {
    if (currWeek > 0) {
        currWeek--;
        currWeekH3.textContent = `Week - ${currWeek}`;
        emptyTable();
        for (let event of allEvents) {
            createEventDiv(event);
        }
    }
})


function emptyTable() {
    const Eventli = document.querySelectorAll('.tablebody .body li');
    for (let li of Eventli) {
        if (li.className.includes('table-task')) {
            li.textContent = '';
            li.style.backgroundColor = '';
        }
    }
}







// adding events to the selected containers

document.querySelector(".createTaskModal form ").addEventListener('submit', e => {
    e.preventDefault();

    if (select) {
        const inputs = [...document.querySelector(".createTaskModal form ").querySelectorAll('input')];
        const selectinput = document.querySelector(".createTaskModal form #category-name");
        lastSelect.textContent = `${inputs[0].value}`;// event name 
        console.log(selectinput.value);  // category id
        let category = categoryByID(selectinput.value);
        lastSelect.style.backgroundColor = category.category_color;
        let event_time = lastSelect.className.split('-')[3];
        let event_day = lastSelect.className.split('-')[2];
        let event_name = inputs[0].value;

        let currEvent = new Event(selectinput.value, event_time, event_name, event_day, new Date().getTime(), currWeek);
        //creating an event 
        currEvent.sendObject();

        allEvents.push(currEvent);
        console.log(allEvents);
    }

})




function categoryByID(id) {
    for (let cat of categoriesObjects) {
        if (cat.category_id == id) return cat;
    }
}







//adding a new row :
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



