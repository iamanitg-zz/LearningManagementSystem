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
    echo "<h1>" . "INSTRUCTOR" . "</h1>";
    echo "<h1 style='text-align: center;'>" . $_SESSION['name'] . "</h1>";
    // echo "<h1 style='text-align: center;'> " . $_SESSION['ins_id'] . "</h1>";
    ?>
    <div>
        <a href="create_course.php">Create New Coures</a>
    </div>
    <div>
        <a href="instructor_courses.php"> Create New Assignment</a>
    </div>
    <div>
        <a href="instructor_courses.php">Courses </a>
    </div>
    <div>
        <a href="prev_assignments.php">Previous Assignments</a>
    </div>
    <div>
        <a href="instructor_profile.php"> Profile Home</a>
    </div>
    <div>
        <a href="logout.php">Sign Out</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>