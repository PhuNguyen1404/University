<?php
include "includes/header.php";
?>

<div class="container map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.63171131475!2d106.6799021102663!3d10.762840859400578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1c06f4e1dd%3A0x43900f1d4539a3d!2sUniversity%20of%20Science%20-%20VNUHCM!5e0!3m2!1sen!2s!4v1682406206498!5m2!1sen!2s"
        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="https://phys.hcmus.edu.vn/uploads/khoa-vat-ly/Trang%20ch%E1%BB%A7/Gi%E1%BB%9Bi%20thi%E1%BB%87u%20khoa/bn2%20(1)-min.png"
                    alt="" style="object-fit:cover;width:100%; height:100%;">

            </div>
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <form action="contact.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="Your name...">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email" placeholder="Your email...">
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason for Contact</label>
                        <select name="reason" id="">
                            <option value="complain">Complaint</option>
                            <option value="feedback">Feedback</option>
                            <option value="praise">Praise</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="" class="form-control" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Submit Feedback</button>
                </form>
            </div>
        </div>
    </div>
</main>

<div class="container">
    <?php
        $form_recieved = false;
        $form_errors = [];

        if(isset($_POST['name'])) {
            $form_recieved = true;
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email address";
                array_push($form_errors, $error);
            }
        } 

        if(!empty($form_errors)){
            var_dump($form_errors);
        }
        //var_dump(!empty($_POST));
        //var_dump(isset($_POST["name"]));

        //var_dump($_POST);

        //var_dump($GLOBALS)
    ?>

    <?php if($form_recieved == true && empty($form_errors)): ?>
        <div class="alert alert-success" role="alert">
            Form received successfully!
        </div>
    <?php elseif($form_recieved == false && empty($form_errors) == true): ?>
        <div class="alert alert-danger" role="alert">
            Form error!
        </div>
    <?php endif; ?>
</div>


<?php
include "includes/footer.php";
?>