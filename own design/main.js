let menuBar = document.querySelector('.icon-menu img');
let navBar = document.querySelector('header nav');


menuBar.addEventListener('click', function () { 
    navBar.classList.toggle('visable');
});