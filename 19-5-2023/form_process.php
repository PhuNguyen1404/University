<?php

function addStudent($conn)
{
    // Get the values from the form
    $studentName = $_POST['student_name'];
    $gender = $_POST['gender'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO students (student_name, gender, date_created) VALUES (?, ?, default)");

    // Bind the parameters to the statement
    $stmt->bind_param("ss", $studentName, $gender);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'> Student created successfully</div>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

function addTeacher($conn)
{
    // Get the values from the form
    $teacherName = $_POST['teacher_name'];
    $gender = $_POST['gender'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO teachers (teacher_name, gender, date_created) VALUES (?, ?, default)");

    // Bind the parameters to the statement
    $stmt->bind_param("ss", $teacherName, $gender);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'> Teacher created successfully</div>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

}

function addClass($conn)
{
    // Get the values from the form
    $className = $_POST['class_name'];
    $teacherID = $_POST['teacher_id'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO classes (class_name, teacher_id, date_created) VALUES (?,?, default)");

    // Bind the parameters to the statement
    $stmt->bind_param("ss", $className, $teacherID);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'> Class created successfully</div>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

}

?>