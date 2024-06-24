console.log("hello guys");


/* Declare vars */
let submitBtn = document.querySelector("form #sumbit-button-form");
let className = document.querySelector("form #classmate-name");
let classAge = document.querySelector("form #classmate-age");
let classMajor = document.querySelector("form #classmate-major");



/* Event List */
submitBtn.addEventListener("click", function(event) {
    event.preventDefault();
    console.log("submit clicked!");
    
    let nameVal = className.value;
    let ageVal = classAge.value;
    let majorVal = classMajor.value;

});

function createClassmate(nameVal, ageVal, majorVal) {
    
    let output =`
    <tr>
        <td>${nameVal}</td>
        <td>${ageVal}</td>
        <td>${majorVal}</td>
    </tr>
    `;
    console.log(output);
}