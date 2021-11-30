<?php
include('connect.php');
session_start();
// print_r($_SESSION);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Learning Management System</title>

</head>
<style>
    h1 {
        text-align: center;
    }

    div {
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: center
    }

    a {
        text-align: center;
    }

    .table {
        text-align: center;
        padding: 10px;
    }

    table,
    th,
    td {
        text-align: center;
        padding: 10px;
        border: 1px solid black;
    }

    .center {
        padding: 10px;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid black;
    }
</style>

<body>
    <?php
    echo "<h1>" . $_SESSION['name'] . "</h1>";
    // echo "<h1>" . $_SESSION['ins_id'] . "</h1>";
    ?>
    <form action="create_course.php" method="POST">
        <div>
            <label for="Course Name">Course Name : </label>
            <input type="text" name="course_name">
        </div>
        <div>
            <label for="Course Description">Course Description : </label>
            <input type="text" name="course_description">
        </div>
        <div>
            <label for="Course Duration">Course Duration (Months) : </label>
            <input type="number" name="course_duration">
        </div>
        <div>
            <label for="Course Starting Date">Course Starting Date : </label>
            <input type="date" name="course_start">
        </div>
        <div>
            <label for="Course ID">Course ID : </label>
            <input type="text" name="course_id">
        </div>
        <div>
            <input type="submit" name="Create" id="" value="Create">
        </div>
    </form>

    <?php
    // print_r($_POST);
    if (isset($_POST['course_name']) && isset($_POST['course_description']) && isset($_POST['course_duration']) && isset($_POST['course_start']) && isset($_POST['course_id'])) {
        try {
            $course_name =  $_POST['course_name'];
            $course_description =  $_POST['course_description'];
            $course_start = $_POST['course_start'];
            $course_id = $_POST['course_id'];
            $course_duration = $_POST['course_duration'];
            $int_id = $_SESSION['ins_id'];
            // print_r($instructor_name);
            $sql = mysqli_query($conn, "select* from course where course_id = '$course_id'");
            if (mysqli_num_rows($sql)) {
                echo 'Course Already Exists ';
                exit;
            } else {
                $query = "insert into course values ('$course_duration' , '$course_id' , '$course_name' , '$int_id' , '$course_description' , '$course_start')";
                $sql = mysqli_query($conn, $query) or die("Couldn't Perform Query");
            }
            echo '<script>alert("Course Created");</script>';
            echo "<script>location.replace('instructor_profile.php')</script>";
            unset($_POST);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>
    <div>
        <a href="instructor_profile.php"> Profile Home</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>