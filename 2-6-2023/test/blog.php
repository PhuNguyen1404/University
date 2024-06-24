<?php 

class Blog {
    //property name
    public $title;
    public $body;
    public $author;
    public $conn;
    public $blog = [];
    public $blogs = [];
    public $id;

    //constructor function
    public function __construct($conn) { 
        $this->conn = $conn;
        var_dump($this->conn);
    }

    public function getMeme($id) { 
        $this->id = $id;

        $sql = "SELECT * FROM memes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $this->id);
        $stmt->execute();
        $stmt = $stmt->get_result();
        $result = $stmt->fetch_assoc();
        $this->blog = $result;
    }

    public function getMemes() {
        $sql = "SELECT * FROM memes";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt = $stmt->get_result();
        $results = $stmt->fetch_all();
        $this->blogs = $results;
    }
}



?>