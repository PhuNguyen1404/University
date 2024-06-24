const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});



let menuBar = document.querySelector('.icon-menu img');
let navBar = document.querySelector('header nav');

menuBar.addEventListener('click', function () { 
    navBar.classList.toggle('visable');
});