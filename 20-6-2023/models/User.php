<?php

class User {
    public $conn;
    public $errors = [];
    public $user = [];
    public $users = [];
    public $username;
    public $user_email;
    private $hash;
    public $user_role;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    /*
    public function initAdmin() {
        $sql = "SELECT * from user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows < 1) {
            $this->username = "admin";
            $this->hash = password_hash("itec2023", PASSWORD_DEFAULT);
            $this->user_email = "admin@gmail.com";
            $this->user_role = "1";
            $this->createUser();
        }
    }
    */
    
    /*
    public function createNewUser() {
        $sql = "INSERT INTO user(user_name, user_role, user_password) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $this->username, $this->user_role, $this->hash);
        $stmt->execute();
        if($stmt->affected_rows == 1) {
            header("Location:" . ROOT);
        }
    }
    */

    public function userExists($username) {
        $sql = "SELECT * FROM user WHERE user_name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->user = $result->fetch_assoc(); // grab assoc array if user exists else empty
        if(!empty($this->user)) {
            return true; // user found
        }  else {
            return false; // user not found
        }
    }

    public function createUser($username, $email, $password) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Create SQL statement with placeholders
        $sql = "INSERT INTO user (user_name, user_email, user_password) VALUES (?,?,?)";
    
        // Create statement and prepare it
        $stmt = $this->conn->prepare($sql);
    
        // Bind parameters
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
    
        // Execute statement
        $stmt->execute();
    
        // Check if affected rows are 1
        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return false;
        }
    }
}