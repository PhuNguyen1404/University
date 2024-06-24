console.log("hello world!");
getPager();
getArticles(0,9);

function getArticles(start = 0, limit = 10) {
    let url = `https://jsonplaceholder.typicode.com/posts?_start=${start}&_limit=${limit}`;
    let xhr = new XMLHttpRequest();
    xhr.open('get', url, true);
    xhr.send;
    xhr.onload = function () {
        if (this.status == 200) {
            let results = JSON.parse(this.responseText);
            outputArticles(results);
        } else {
            console.log("error");
        }
    }
}

function outputArticles(results) { 
    let output = "";
    let articlesDiv = document.querySelector("div.articles");
    results.forEach(function (item) { 
        output += `<div class="col-md-4" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">${item.title}</h5>
          <h6 class="card-subtitle mb-2 text-muted">${item.body}</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
      `;
    });
    console.log(output);
    articlesDiv.innerHTML = output;
}

function getPager() {
    let xhr = new XMLHttpRequest();
    let url = `https://jsonplaceholder.typicode.com/posts?_start=0&_limit=1000`;
    xhr.open("get", url, true);
    xhr.send();
    xhr.onload = function () {
        if (this.status == 200) {
            let result = JSON.parse(this.response);
            outputPager(result);
        }
    }
}

function outputPager(result) {
    console.log(result.length);
    let numPages = Math.ceil(result.length / 9);
    let previous = document.querySelector(".pagination li.previous");
    console.log(numPages);
    let output = "";
    for (let i = 0; i < numPages; i++) {
        let pageNum = i + 1;
        output += `<li class="page-item"><a class="page-link" data-offset="${i}" href="#"> ${pageNum} </a></li>`;
    }
    previous.insertAdjacentHTML("afterend", output);
    console.log(output);
}
