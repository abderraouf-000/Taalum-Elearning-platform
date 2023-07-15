'use strict';

let hero = document.querySelector(".hero");



// adding animations to hero overlay :

let handler = null;
let opa = 0.5;

hero.addEventListener("mouseover", e => {

    clearInterval(handler);
    handler = setInterval(changeOpacity, 10);
    function changeOpacity() {
        if (opa == 0.3) {
            clearInterval(handler);
        }
        if (opa > 0.3) {
            opa = opa - 0.01;
            hero.style.backgroundImage = 'linear-gradient(0deg,rgba(0, 57, 127,' + opa + '),rgba(0, 36, 77,' + opa + ')), url("pakata-goh-EJMTKCZ00I0-unsplash.jpg")';
            console.log(hero.style.backgroundImage);
        }
    }
})

hero.addEventListener("mouseleave", e => {
    clearInterval(handler);
    handler = setInterval(changeOpacity, 10);
    function changeOpacity() {
        if (opa == 0.5) {
            clearInterval(handler);
        }
        if (opa < 0.5) {
            opa = opa + 0.01;
            hero.style.backgroundImage = 'linear-gradient(0deg,rgba(0, 57, 127,' + opa + '),rgba(0, 36, 77,' + opa + ')), url("pakata-goh-EJMTKCZ00I0-unsplash.jpg")';
        }
    }
})


let scroll = document.querySelector('.scroll-down');

scroll.addEventListener('click', e => {
    document.querySelector(".services").style.display = 'flex';
    document.getElementById("serv").scrollIntoView({ behavior: 'smooth' });
    document.querySelector("#about").style.display = 'block';
    document.querySelector("footer").style.display = 'flex';
})
let container = document.querySelector('.container');
let serviceN = document.querySelectorAll('.container .service');
let serviceinnerhtmls = [
    '<i class="fa-solid fa-user-group"></i> <h2> Challenge</h2>'
    , '<i class="fa-sharp fa-solid fa-list-check"></i><h2>TO-DO List </h2>',
    '<i class="fa-solid fa-book"></i><h2>Learning Books</h2>',
    '<i class="fa-solid fa-table-list"></i><h2>Time Table</h2>',
    '<i class="fa-solid fa-chart-column"></i><h2>Statistics</h2>',
    '<i class="fa-solid fa-trophy"></i><h2>Achievements</h2>'
];


// services mouse out event : 
serviceN.forEach(function (ele, i, arr) {
    ele.addEventListener('mouseout', () =>
        setTimeout(function () {
            console.log('dfdfdfdfdf');
            ele.children[0].classList.add('displayblock');
            ele.innerHTML = `${serviceinnerhtmls[i]}`;
        }, 420)

    )
})

// services mouse over event  : 

let mouseoverinnerhtmls = ['<h2>Challenge</h2><p> Compete With Your Friends </p>',
    '<h2>TO-DO List </h2><p>Improve Your Productivity</p>',
    '<h2>Learning Books</h2><p>Add your favourite learning books</p>',
    '<h2>Time Table</h2><p>Organize your Working days</p>',
    '<h2>Statistics</h2><p>Keep tracking your achievements</p>',
    '<h2>Achievements</h2><p> Be proud of your self </p>'
];

serviceN.forEach(function (ele, i, arr) {
    ele.addEventListener('click', () =>
        setTimeout(function () {
            console.log('dfdfdfdfdf');
            ele.children[0].classList.add('displaynone');
            ele.innerHTML = `${mouseoverinnerhtmls[i]}`;
        }, 320)
    )
})
