<?php
//CONNECTION INFORMATION
$host = "localhost";
$user = "root";
$password = "";
$db = "2023_cs204_week4";

//CREATE A NEW CONNECTION
$conn = new mysqli($host, $user, $password, $db);

if (isset($_POST['author'])) {
    $sql = "SELECT post_title, display_name 
    FROM wp_posts
    JOIN wp_users ON wp_users.ID = wp_posts.post_author
    WHERE post_type = 'post' AND display_name = ? LIMIT 20";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['author']);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $sql = "SELECT post_title, display_name 
    FROM wp_posts
    JOIN wp_users ON wp_users.ID = wp_posts.post_author
    WHERE post_type = 'post' LIMIT 20";
    // two methods to query the db
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
}

?>

<h1>ITEC NEWS</h1>
<form action="index.php" method="post">
    <input type="text" name="author" id="">
    <button type="submit"> SEARCH</button>
</form>
<ul>
    <?php foreach ($result as $item): ?>
        <li>
            <?php echo $item['post_title']; ?>
            <br>
            <?php echo $item['display_name']; ?>
        </li>
    <?php endforeach; ?>
</ul>