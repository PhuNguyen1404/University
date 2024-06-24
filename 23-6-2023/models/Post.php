<?php


class Post {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function fetchPost($id) {
        $sql = "SELECT * FROM posts WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function fetchAll() {
        $sql = "SELECT * FROM posts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    public function create($post) {
        $title = $post['title'];
        $body = $post['body'];
        $img = "images/default.jpg";
        $sql = "INSERT INTO posts (title, body, img_url, post_author) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $title, $body, $img, $_SESSION['user_id']);
        $stmt->execute();
        if($stmt->insert_id != 0) {
            return $stmt->insert_id;
        } else { 
            return false;
        }
    }
}