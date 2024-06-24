<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Week 5: File Uploads</title>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="jumbotron">
            <h1 class="display-4">Upload Files</h1>
            <p class="lead">The $_FILES super global structure is as follows</p>
            <hr class="my-4">   
            <ul>
                <li>
                array (size=1)
                'file' => 
                <li?>
                <ul>
                array (size=5)
                    <li>'name' => string 'cnn.json'</li>
                    <li>'type' => string 'application/json'</li>
                    <li>'tmp_name' => string 'C:\wamp\tmp\phpE9E1.tmp'</li>
                    <li>'error' => int 0</li>
                    <li>size' => int 19002</li>
                </ul>
            </ul>
            <!-- create a form and make sure to set enctype="multipart/form-data" -->
            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="file" name="blog_img" id="form-control">
                <button type="submit" class="btn btn-primary btn-lg mt-4"> Submit </button>
            </form>
        </div>
        <!-- use file_get_contents('tmp_name') to get the contents of a file -->
        <?php 
            var_dump($_POST);
            var_dump($_FILES);

            function validdateImg($img) { 
                $file_name = $img['name'];
                $file_error = $img['error'];
                $file_type = explode('.', $file_name);
                $file_type = end($file_type);
                $file_temp = $img['tmp_name'];
                $file_size = $img['size'];
                $errors = [];
                $max_size = 50000000;
                $allowed_ext = ['jpg', 'png', 'gif', 'jpeg'];


                if($file_error == 0) {
                    if(!in_array($file_type, $allowed_ext)) {
                        $errors['extension'] = "Invalid file extension";
                    }

                    if ($file_size > $max_size) { 
                        $errors['file_size'] = "File exceeds maximum size";
                    }
                } else {
                    $errors['error'] = "file error encountered";
                }

                if(empty($errors)) {
                    echo "file is good";
                    $new_name = random_int(100, 10000) . "_" . $file_name;
                    $destination = "images/".$new_name;
                    move_uploaded_file($file_temp, $destination);
                } else {   
                    echo "file is not good";
                    var_dump($errors); 
                }
            }

            if(isset($_FILES['blog_img'])) {
                validdateImg($_FILES['blog_img']);
            }
        ?>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>