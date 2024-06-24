console.log("login loaded");

/* Global vars */

let username = document.querySelector("#username");
let email = document.querySelector("#email");
let pw2 = document.querySelector("#pw2");
let pw1 = document.querySelector("#pw1");
let theForm = document.querySelector("form");
let searchSpinner = document.querySelector(".username img");
let usernameError = document.querySelector(".username-error");


/* Event Listeners */

username.addEventListener("focusout", () => {
    console.log("username focus out event");
    searchSpinner.classList.add("show");
    searchUsername(username.value);
});



/* Script Functions */
function searchUsername(val) {
    console.log(val);
    let url = "https://dummyjson.com/users";
    let xhr = new XMLHttpRequest();
    xhr.open("get", url, true);
    xhr.send();
    xhr.onload = function() {
        if(this.status == 200) {
            let results = JSON.parse(this.response);
            console.log(results);
            searchSpinner.classList.remove("show");
            let existingUsernames = results.users.map((item) => {
                return item.firstName.toLowerCase();
            });
            console.log(existingUsernames);
            if(existingUsernames.includes(val.toLowerCase())) {
                console.log("this username is taken!");
                usernameError.classList.add("show");
                usernameError.textContent = "This username is taken!";
                username.classList.add('border');
                username.classList.add('border-danger');
                username.classList.remove('border-success');
            } else {
                console.log("this username is FREE!");
                usernameError.classList.remove("show");
                username.classList.add('border');
                username.classList.add('border-success');
                username.classList.remove('border-danger');
            }
        }
    }
}
