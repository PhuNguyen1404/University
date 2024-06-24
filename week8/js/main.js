console.log("Hello World");

let header = document.querySelector("header");
let frontBlock = document.querySelector(".front-block");
let navbar = document.querySelector("nav");
let iconn = document.querySelector("img.iconn");

frontBlock.addEventListener("mouseover", function() {
    frontBlock.style.background = "red";
});
frontBlock.addEventListener("mouseout", function() {
    frontBlock.style.background = "white";
});

header.addEventListener("click",function() {
    header.classList.toggle("blue");
    console.log("header clicked");
});

iconn.addEventListener("click",function() {
    navbar.classList.toggle("slide");
});

