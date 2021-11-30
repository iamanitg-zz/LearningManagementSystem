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

    echo "<h1>" . "My Courses" . "</h1>";
    echo "<h3 style='text-align: center;'>" . $_SESSION['name'] . "</h3>";
    // echo "<h3 style='text-align: center;'>" . $_SESSION['student_id'] . "</h3>";
    ?>
    <?php
    echo '<table class="center">';
    echo '<tr>
    <th> Course ID </th>
    <th> Course Name </th>
    <th> Feedbacks </th>
    </tr>';
    $student_id = $_SESSION['student_id'];
    $sql = mysqli_query($conn, "select* from enroll where student_id ='$student_id'");
    while ($row = mysqli_fetch_assoc($sql)) {
        echo '<tr>';
        echo '<td>' . $row['course_id'] . '</td>';
        $course_id = $row['course_id'];
        $sql2 = mysqli_query($conn, "select* from course where course_id ='$course_id'");
        $row2 = mysqli_fetch_assoc($sql2);
        echo '<td>' . $row2['course_name'] . '</td>';
        $course_name = $row2['course_name'];
        echo '<form action="student_feedback.php" method = "POST">
        <input type="text" name = "cid" value=' . $course_id . ' hidden>' .
            '<input type="text" name = "cname" value=' . $course_name . ' hidden>';
        echo '<td>' . '<input type="submit" value = "Feedbacks" name = "submit_f">' . '</td>';
        echo '</form>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
    <div>
        <a href="student_profile.php"> Profile Home</a>
    </div>
    <div>
        <a href="logout.php">Sign Out</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>