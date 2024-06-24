<?php

class UserController extends Controller {

    public $errors = [];

    public function __construct() {

        parent::__construct();
    }

    public function getLogin() {
        $user = new User($this->conn);
        include "views/login.php";
    }

    public function login() {
        echo "<br>logging in user<br>";
        var_dump($this->req);
    }

    /*
    public function create1() {
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
            echo "create new user!";
        } else {
            var_dump($this->req); /// $this->req === $_POST
            var_dump($this->errors);
        }
        
    }
    */

    public function create() {
        // Extract variables from $this->req
        $username = $this->req['username'];
        $password = $this->req['password'];
        $email = $this->req['email'];
    
        // Check if username already exists
        $userModel = new User($this->conn);
        $userExists = $userModel->userExists($username);
    
        if ($userExists) {
            // Username already exists, return an error message
            $this->errors['username'] = 'Username already exists';
        }
    
        // Check if username and password are greater than 5 characters
        if (strlen($username) < 5 || strlen($password) < 5) {
            // Username or password is less than 5 characters, return an error message

            $this->errors['length'] = "All inputs must be more than 5 characters!";
        }
    
        // Validate email using filter_var function
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Invalid email address, return an error message
            $this->errors['email'] = "Invalid email submitted!";
        }
    
        // Check if password matches
        if ($password!= $this->req['password-confirm']) {
            // Passwords do not match, return an error message
            $this->errors['password_match'] = "The passwords must match!";
        }
    
        // Create a new user
        if(empty($this->errors)) {
            //$userModel->createUser($username, $password, $email);
            $userModel->createUser($username, $email, $password);
            $_SESSION['logged_in'] = true;
            $_SESSION['user_name'] = $username;
            $_SESSION['user_role'] = 2;
            
            header("Location:".ROOT."?msg-Successful-login");
        } else { 
            header("Location:".ROOT."login");
        }
    }


    public function validateLogin() {
        var_dump($this->req); // the $this->req === $_POST
        $user = new User($this->conn);
        if($user->userExists($this->req['username'])) {
            echo "user found!<br>";
               if(password_verify($this->req['password'],$user->user['user_password'])) {
                   $_SESSION['logged_in'] = true;
                   $_SESSION['user_name'] = $user->user['user_name'];
                   $_SESSION['user_role'] = $user->user['user_role'];
                   header("Location:" . ROOT . "?msg=Successful-login");
               } else {
                
               }
        } else {
            // user not found error
            echo "user not found";
        }
    }
}