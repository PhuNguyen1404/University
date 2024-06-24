<?php
include 'db.php';
include 'form_process.php';

$sql = "SELECT s.student_name AS student, c.class_name AS class, t.teacher_name AS teacher 
FROM enrollment en 
JOIN classes c ON c.id = en.class_id
JOIN teachers t ON t.id = en.teacher_id
JOIN students s ON s.id = en.student_id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->get_result();
//var_dump($results->fetch_assoc());
//var_dump($results->fetch_all());

$sql = "SELECT * FROM teachers";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->get_result();
$teachers = $results->fetch_all();

$sql = "SELECT * FROM students";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->get_result();
$students = $results->fetch_all();

$sql = "SELECT * FROM classes";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->get_result();
$classes = $results->fetch_all();


if (isset($_POST['create_student'])) {
    addStudent($conn);
} elseif (isset($_POST['create_teacher'])) {
    addTeacher($conn);
} elseif (isset($_POST['create_class'])) {
    addClass($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Create Student</h2>
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label for="student_name">Student Name</label>
                                <input type="text" class="form-control" id="student_name" name="student_name" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="create_student">Create Student</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Create Teacher</h2>
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label for="teacher_name">Teacher Name</label>
                                <input type="text" class="form-control" id="teacher_name" name="teacher_name" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="create_teacher">Create Teacher</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Create Class</h2>
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label for="class_name">Class Name</label>
                                <input type="text" class="form-control" id="class_name" name="class_name" required>
                            </div>
                            <div class="form-group">
                                <label for="teacher_id">Teachers</label>
                                <select class="form-control" id="teacher_id" name="teacher_id" required>
                                    <?php
                                    foreach ($teachers as $teacher) {
                                        echo '<option value="' . $teacher['id'] . '">' . $teacher['teacher_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="create_class">Create Class</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Enroll Student</h2>
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label for="student_id">Student Name</label>
                                <select class="form-control" id="student_id" name="student_id" required>
                                    <?php foreach ($students as $student) {
                                        echo '<option value="' . $student['id'] . '">' . $student['student_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="class_id">Class Name</label>
                                <select class="form-control" id="class_id" name="class_id" required>
                                    <?php foreach ($classes as $class) {
                                        echo '<option value="' . $class['id'] . '">' . $class['class_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="create_enrollment">Create
                                Enrollment</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>