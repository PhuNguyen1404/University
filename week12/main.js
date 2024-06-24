console.log("async example loading");



let searchInput = document.querySelector("input");
let searchBtn = document.querySelector("button");
let alertDiv = document.querySelector(".alert");


searchBtn.addEventListener("click", function() {
    let searchVal = searchInput.value;
    console.log(searchVal);
    searchAPI(searchVal);
});

async function getPost() {
    let post = await fetch("https://jsonplaceholder.typicode.com/posts")
    .then(res => res.json())
    .then(json => json);
    return post;
}

async function getUsers() { 
    let users  = await fetch("https://jsonplaceholder.typicode.com/users")
    .then(res => res.json())
    .then(json => json);
    return users;
}

async function joinArr() {
    let users = await getUsers();
    let posts = await getPost();
    console.log(users);
    let completePost = posts.map((post) => {
       let postAuthors = users.filter((user) => {
            if (post.userId == user.id) { 
                return user; 
            }
       });
       post.username = postAuthors[0].name;
       return post;
    });
    console.log(completePost);
}

async function combineArr(articals, users) {
    let results = articals.map((post) => {
        let username = users.filter((user) => {
            if (user.id == post.userId) { 
                return user;
            }
        });
        post.username = username[0].name;
        return post;
    });
    return results;
}

function outputSearchResults(arr) {
    
}

async function searchAPI(val) { 
    let posts = await getPost();
    let filterPosts = posts.filter((post) => {
        if (post.title.includes(val) || post.body.includes(val)) {
            return post;
        }
    });
    console.log(filterPosts);
    let numArticals = filterPosts.length;
    alertDiv.textcontent = `${numArticals} articals were found`;
    alertDiv.classList.add("show");
    let user = await getUser();
    let combineArrs = combineArr(filterPosts, user);
    console.log(combineArrs);
}

joinArr();
