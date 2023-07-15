'use strict';

const homeLink = document.querySelector('.fa-house');
const statLink = document.querySelector('.fa-chart-column');
const toDoLink = document.querySelector('.fa-list');
const TableLink = document.querySelector('.fa-table-list');
const settingLink = document.querySelector('.fa-gear');

const allLinks = [settingLink, TableLink, toDoLink, statLink, homeLink];

allLinks.forEach(function (ele) {

    ele.addEventListener('click', e => {
        console.log(ele.classList);
        if ([...ele.classList].includes('fa-house')) {
            window.location.href = "../HomePage/dashhome.php";
        }
        if ([...ele.classList].includes('fa-chart-column')) {
            window.location.href = "../HomePage/dashhome.php";
        }
        if ([...ele.classList].includes('fa-table-list')) {
            window.location.href = "../TimeTablePage/timeTable.php";
        }
        // if ([...ele.classList].includes('fa-gear')) {
        //     window.location.href = "../TimeTablePage/timeTable.php";
        // }
        if ([...ele.classList].includes('fa-list')) {
            window.location.href = "../TimeTablePage/timeTable.php";
        }
    })
})


let sidebar = document.querySelector('.sidebar');
// adding opening the side bar and adding the the text to all icons 

const menu = document.querySelector(".fa-bars");
let isSideOpen = false;

menu.addEventListener('click', e => {
    sideAction();
});



function sideAction() {
    if (!isSideOpen) {

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