<?php
include_once 'includes/header.php';

if (isset($_GET['id'])) {
    $memeId = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM memes WHERE id = ?");
    $stmt->bind_param("i", $memeId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo '<div class="container">';
        echo '<h2>' . $row['title'] . '</h2>';
        echo '<img src="images/' . $row['img_file'] . '" alt="Meme Image">';
        echo '<p>Author: ' . $row['author'] . '</p>';
        echo '<p>Body: ' . $row['body'] . ';</p>';
        echo '<p>Date: ' . $row['date_created'] . ';</p>';
        echo '</div>';
        
        echo '<a href="index.php" class="back-btn">
        <button type="button" class="btn btn-lg btn-block btn-primary" style="background-color: #FFD700; color: #FFFFFF;">Back</button></a>';
    } else {
        echo 'Meme not found.';
    }
} else {
    echo 'Invalid request.';
}

include_once 'includes/footer.php';
?>