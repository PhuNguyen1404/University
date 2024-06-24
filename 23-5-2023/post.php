<?php
include 'inc/header.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = getPost($id);

    var_dump($post);
}
?>

<?php 
include 'inc/footer.php';
?>

*/