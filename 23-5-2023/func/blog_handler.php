<?php

function getPost($id)
{
    global $conn;
    $sql = "SELECT * 
    FROM wp_posts wp
    JOIN wp_users wu ON wu.ID = wp.post_author 
    WHERE wp.ID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();
    return $post;
}


function getPosts($conn)
{
    $sql = "SELECT * FROM wp_posts WP JOIN wp_users WU ON WU.ID = WP.post_author WHERE post_type = 'post' LIMIT 20";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->get_result();
    //var_dump($results->fetch_all(MYSQLI_ASSOC));
    $posts = $results->fetch_all(MYSQLI_ASSOC);
    return $posts;
}

?>