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

</style>

<body>
    <?php
    echo "<h1>" . "STUDENT" . "</h1>";
    echo "<h3 style='text-align: center;'>" . $_SESSION['name'] . "</h3>";
    echo "<h3 style='text-align: center;'>" . $_SESSION['student_id'] . "</h3>";
    ?>
    <?php
    if(isset($_POST['cid']) && isset($_SESSION['student_id'])){
        $course_id = $_POST['cid'] ;
        $student_id = $_SESSION['student_id'] ;
        $query = "insert into enroll (student_id , course_id) values('$student_id' , '$course_id')";
        $sql = mysqli_query($conn, $query) or die("Couldn't Perform Query");
        echo "<script>location.replace('student_profile.php')</script>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>