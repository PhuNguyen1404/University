let N_User_btn = document.querySelector('button.btn-lg');
let userImg = document.querySelector('.user-img');
let nameEL = document.querySelector('.jumbotron h1');
let contactEL = document.querySelector('p.contact');



N_User_btn.addEventListener('click', function() {
    console.log("Next user clicked");
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://randomuser.me/api/', true);
    xhr.send();
    xhr.onload = function() {
        if (this.status === 200) {
            console.log(this.response);
            let result = JSON.parse(this.response);
            console.log(result);
            let user = result.results[0];
            outputUser(user);
        } else {
            console.log("Error");
        }
    } 

});

function outputUser(user) { 
    let usernames = `${user.name.title} ${user.name.first} ${user.name.last}`;
    let imgUrl = user.picture.medium;
    let contactDetails = `${user.phone} ${user.email}`;
    let gender = user.gender;
    userImg.setAttribute("src", imgUrl);
    nameEL.textContent = usernames;
    contactEL.textContent = contactDetails;
}

