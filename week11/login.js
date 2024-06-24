console.log("login loaded");

let theForm = document.querySelector("form");
let username = document.querySelector("#username");
let email = document.querySelector("#email");
let pws1 = document.querySelector("#pws1");
let pws2 = document.querySelector("#pws2");



theForm.addEventListener("submit", (event) => { 
    event.preventDefault();
    console.log("form submitted");
});

username.addEventListener("focusout", () => { 
    checkUsername(username.value);
});

email.addEventListener("focusout", () => { 
    console.log(email.value);
});

pws1.addEventListener("focusout", () => { 
    checkPws1(pws1.value);
});

pws2.addEventListener("focusout", () => { 
    checkPws2(pws1.value, pws2.value);
});




function checkPws1(val) {
    let error = false;
    if (val.length < 5 || val.length >20) { 
        error = true;
    }
    if (error == true) { 
        addErr(".pws1-err");
    } else {
        removeErr(".pws1-err");
    }
}

function checkPws2(val1, val2) {
    let error = false;
    if (val1 != val2) { 
        error = true;
    }
    if (error == true) { 
        addErr(".pws2-err");
    } else {
        removeErr(".pws2-err");
    }
}

function checkUsername(val) {
    let error = false;
    if (val.length < 5 || val.length >20) { 
        error = true;
    }
    if (error == true) { 
        addErr(".username-err");
    } else {
        removeErr(".username-err");
    }
    console.log("error state: " + error);
}

function addErr(className) { 
    document.querySelector(className).classList.add("error");
}
function removeErr(className) { 
    document.querySelector(className).classList.remove("error");
}
