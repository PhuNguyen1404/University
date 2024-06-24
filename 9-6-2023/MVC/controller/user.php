<?php 

class User extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function getLogin() { 
        include 'views/login.php';
    }

    public function login() {
        var_dump($this->req);
    }

    public function createUser() { 
        echo '<br> CREATING USER' ;
        var_dump($this->req);
    }
}

?>