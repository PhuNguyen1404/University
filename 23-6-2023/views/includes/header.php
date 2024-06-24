<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>ITEC MVC</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
        <a class="navbar-brand"><i class="fas fa-cogs    "></i> ITEC MVC</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT; ?>"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT; ?>post/create"><i class="fas fa-plus-circle    "></i> Create Post<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT; ?>contact" ><i class="fas fa-map"></i> Contact</a>
                </li>
                <?php if($_SESSION['logged_in']):?>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT; ?>user" ><i class="fas fa-user    "></i> <?php echo $_SESSION['user_name'];?></a>
                     </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT; ?>logout" ><i class="fas fa-door-open"></i> Logout</a>
                     </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT; ?>login" ><i class="fas fa-user"></i> Login</a>
                </li>
                <?php endif;?>
            </ul>
        </div>      
        </div>
    </nav>