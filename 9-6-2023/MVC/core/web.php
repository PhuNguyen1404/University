<?php 

Routter::get("", function() { 
    $home = new Home();
    $home->index();
    //var_dump($home->req);
    //var_dump($home->params);
});

Routter::get("home", function() { 
    include 'views/home.php';
});

Routter::get("login", function() { 
    $user = new User;
    $user->getLogin();
});

Routter::get("contact", function() { 
    include 'views/contact.php';
});

Routter::post("create_user", function() { 
    $user = new User;
    $user->createUser();
});

Routter::post("login", function() { 
    $user = new User;
    $user->login();
});

if (Routter::$found === false) { 
    include 'views/404.php';
}

?>