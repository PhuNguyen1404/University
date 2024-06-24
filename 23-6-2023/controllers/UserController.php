<?php

class UserController extends Controller {

    public $errors = [];

    public function __construct() {

        parent::__construct();
    }

    public function getLogin() {
        $user = new User($this->conn);
        $user->initAdmin();
        include "views/login.php";
    }

    public function login() {
        echo "<br>logging in user<br>";
        var_dump($this->req);
    }

    public function create() {
        //extract out vars from $this->req  username = $this->req['username']
        $user = new User($this->conn);
        $username = $this->req['username']; // req == $_POST['username']
        $pw = $this->req['password'];
        $email = $this->req['email'];
        $pw_confirm = $this->req['password-confirm'];
        // to check if username exists create a new User model, (check existing methods)
       // check if username exists (it shouldn't)
        if($user->userExists($username)) {
            $this->errors['username'] = "Username already taken!";
        }

        // check username and pw are > 5 chars
        if(strlen($username) < 5 || strlen($pw) < 5) {
            $this->errors['length'] = "All inputs must be more than 5 characters!";
        }

        // validate user email filter_var($email, FILTER_VALIDATE_EMAIL)
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors['email'] = "Invalid email submitted!";
        }

        // check passwords match
        if($pw != $pw_confirm) {
            $this->errors['password_match'] = "The passwords must match!";
        }
        if(empty($this->errors)) {
            // call createNewUser method on the User Model
            // don't forget to hash the password before insert
            $result = $user->createNewUser($username, $pw, $email);
            if($result !== true) {
                var_dump($result);
            } else {
                $_SESSION['logged_in'] = true;
                $_SESSION['user_name'] = $username;
                $_SESSION['user_role'] = 2;
                header("Location:" . ROOT . "?msg=Successful-login");
            }
        } else {
            
            header("Location:" . ROOT . "login");
        }
        
    }

    public function validateLogin()
    {
        // the $this->req === $_POST
        $user = new User($this->conn);
        if ($user->userExists($this->req['username'])) {
            if (password_verify($this->req['password'], $user->user['user_password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['user_name'] = $user->user['user_name'];
                $_SESSION['user_role'] = $user->user['user_role'];
                $_SESSION['user_id'] = $user->user['id'];
                header("Location:" . ROOT . "?msg=Successful-login");
            } else {
                echo "Login failed";
            }
        } else {
            // user not found error
            echo "user not found";
        }
    }
}