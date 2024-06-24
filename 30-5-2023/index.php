<?php
include 'includes/header.php';
?>

<div class="jumbotron mt-5 text-light"
    style="background:url(images/memeuni.jpg); background-size:cover; background-attachment:fixed; background-position-y: bottom;">
    <div class="container pt-5 pb-5">

        <h1 class="display-4 text-weight-bold"><i class="fas fa-bomb    "></i> Meme Univerity</h1>
        <p class="lead">Keep your chin up little froggy</p>
        <hr class="my-4">
        <p>Only spicy memes allowed</p>

    </div>
</div>

<div class="container">
    <div class="row">
        <?php
        $sql = 'SELECT m.id, u.user_name, m.title, m.body, m.img_file FROM memes m JOIN users u ON m.author = u.id';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 col-sm-6 mt-4">';
            echo '<div class="card">';
            echo '<img class="card-img-top" src="images/' . $row['img_file'] . '" alt="">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title"><a href="meme.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h5>';
            echo '<p>Author: ' . $row['user_name'] . '</p>';
            echo '<p class="card-text">' . $row['body'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>


<?php
include 'includes/footer.php'
    ?>