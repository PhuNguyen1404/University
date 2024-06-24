console.log("hello world!");

let sildeImg = document.querySelectorAll(".silder img");
let prevBtn = document.querySelector(".controlsl li.prev");
let nextBtn = document.querySelector(".controls li.next");
sildeImg[0].classList.add("active");
let index = 0;
let slideLenght = sildeImg.length;

console.log(sildeImg);

prevBtn.addEventListener("click", function() {
    console.log("prev button clicked");
});

nextBtn.addEventListener("click", function() {
    console.log("next button clicked");
    sildeImg[index].classList.remove("active");

    if (index >= slideLenght - 1)
    {
        index = 0;
    } else {
        index++;
    }

    sildeImg[index].classList.add("active");
});