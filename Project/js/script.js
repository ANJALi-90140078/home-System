// let loginForm = document.querySelector('.login-form');

// document.querySelector('#login-btn').onclick = () =>{
//    loginForm.classList.add('active');
// }

// document.querySelector('#close-login-form').onclick = () =>{
//    loginForm.classList.remove('active');
// }

let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.myheader');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

// window.onscroll = () => {
//     // loginForm.classList.remove('active');
//     menu.classList.remove('fa-times');
//     navbar.classList.remove('active');

//     if (window.scrollY > 0) {
//         //document.getElementById('1').classList.add('active');
//         document.querySelector('.myheader').classList.add('active');
//     } else {
//         //document.getElementById('1').classList.remove('active');
//         document.querySelector('.myheader').classList.remove('active');
//     }
// }