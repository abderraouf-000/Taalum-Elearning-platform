let welcomedate = document.querySelector(' header p');

welcomedate.textContent = `Today is, ${new Date().toDateString()}`;

//////////pop up modal window creation 
// const projectModal = document.querySelector(".modal");
// const overlay = document.querySelector(".overlay");
// document.querySelector(".btn--close-modal").addEventListener('click', function (e) {
//     e.preventDefault();
//     projectModal.classList.add('hidden');
//     overlay.classList.add('hidden');
// })

// document.querySelector(".newprojectbtn").addEventListener('click', function (e) {
//     e.preventDefault();
//     projectModal.classList.remove('hidden');
//     overlay.classList.remove('hidden');
// })

// document.querySelector(".modal__form").addEventListener('submit', function (e) {
//     e.preventDefault();
//     projectModal.classList.add('hidden');
//     overlay.classList.add('hidden');
//     let vallist = [];
//     document.querySelectorAll('.modal input').forEach(function (inp) {
//         vallist.push(inp.value);
//     });

//     console.log(vallist);
//     document.querySelector(".projects").insertAdjacentHTML('beforeend', `<div class="project">
//     <i class="fa-solid fa-ellipsis-vertical"></i>
//     <h4>${vallist[0]}</h4>
//     <p>${vallist[1]} Tasks</p>
//     <div class="progresspart">
//         <label for="achievebar">0/${vallist[1]}</label>
//         <progress id="achievebar" value="0" max="100">20%</progress>
//     </div>`)


// })

// //Project Delete menu open
// let closeddeletemenu = true;

// document.querySelector(".projects")?.addEventListener('click', function (e) {
//     if (closeddeletemenu) {


//         if (e.target.classList[1] === 'fa-ellipsis-vertical') {
//             console.log(root.style.getPropertyValue('--display-var-delete-menu'));

//             root.style.setProperty('--display-var-delete-menu', 'flex');
//             closeddeletemenu = false;
//         }

//     }

// })
// document.querySelector("body")?.addEventListener('click', function (e) {
//     if (!closeddeletemenu) {
//         if (e.target.classList[1] != 'fa-ellipsis-vertical') {
//             console.log(root.style.getPropertyValue('--display-var-delete-menu'));
//             root.style.setProperty('--display-var-delete-menu', 'none');
//             closeddeletemenu = true;

//         }
//     }

// })

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
    }
}