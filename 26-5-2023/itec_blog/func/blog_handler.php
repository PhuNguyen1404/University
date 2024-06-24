<?php 
function processNewPost($post, $post_img) { 
    $title = $post['title'];
    $body = $post['body'];
    $img = $post_img['blog_img'];
    $errors = [];
    if(empty($title) || empty($body)) {
        $errors['empty_text'] = "text fields cannot be empty";
    }

    $file_name = $img['name'];
    $file_ext = explode(".", $file_name);
    $file_ext = end($file_ext);
    $temp = $img['tmp_name'];
    $file_size = $img['size'];
    $allowed_ext = ['png', 'jpg', 'jpeg', 'gif'];
    $file_error = $img['error'];

    if ($file_error == 0) {
        if(!in_array(strtolower($file_ext), $allowed_ext)) {
            $errors['file_ext'] = "improrer file extension";
        }
        if($file_size > 5000000000) {
            $errors['file_size'] = "file must be smaller than 5000000";
        }
    } else {
        $errors['img_error'] = "there was an error with the image file";
    }

    if (empty($errors)) {
        $imageDir = "images/";
        if (!is_dir($imageDir)) {
            mkdir($imageDir, 0777, true);
        }
        $newFileName = random_int(100, 10000). "_itec_". $file_name;
        $destination = $imageDir. $newFileName;
        move_uploaded_file($temp, $destination);
        $results = insertBlog($title, $body, $destination);
        return $results;
    } else {
        return $errors;
    }
}

function insertBlog($title, $body, $img) {
    echo "Inserting blog...";
    global $conn;
    $id = 1;
    $sql = "INSERT INTO posts (id, body, title, img_url, post_author, tags, date_updated, date_created) 
            VALUES (NULL,?,?,?,?, NULL, NULL, default);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss",  $body, $title, $img, $id);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
        $new_id = $stmt->insert_id;
        header("Location: post.php?id=".$new_id);
    } else { 
        return "error";
   
    }

}   

function getPost() { 
    global $conn;
    $sql = "SELECT * FROM post WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$id);
    $stmt->execute();
    $stmt = $stmt->get_result();
    $result = $stmt->fetch_assoc();
    return $result;
}
?>