<?php
include('connect.php');
session_start();
// print_r($_SESSION);
// print_r($_POST['cname']);
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

    echo "<h1>" . "SUBMIT FEEDBACKS" . "</h1>";
    echo "<h3 style='text-align: center;'>" . $_SESSION['name'] . "</h3>";
    // echo "<h3 style='text-align: center;'>" . $_SESSION['student_id'] . "</h3>";
    ?>
    <?php
    if (isset($_POST['submit_f']))
        echo '<table class="center">';
    echo '<tr>
    <th> Course ID </th>
    <th> Feedback ID </th>
    <th> Content  </th>
    <th> Answer </th>
    <th> Submit </th>
    </tr>';
    $student_id = $_SESSION['student_id'];
    $course_id = $_POST['cid'];
    $sql = mysqli_query($conn, "select* from feedback where course_id ='$course_id'");
    while ($row = mysqli_fetch_assoc($sql)) {
        $fid = $row['feedback_id'];
        echo '<tr>';
        echo '<td>' . $course_id . '</td>';
        echo '<td>' . $row['feedback_id'] . '</td>';
        echo '<td>' . $row['content'] . '</td>';
        $sql2 = mysqli_query($conn, "select* from takes_feedback where feedback_id ='$fid' and student_id = '$student_id'");
        $count = mysqli_num_rows($sql2);
        if ($count == 0) {
            echo '<form action = "send_feedback.php" method = "POST">
        <input type="number" name = "sid" value= ' . $student_id . ' hidden>' .
                '<input type="text" name = "fid" value= ' . $fid . ' hidden>' .
                '<input type="text" name = "cid" value= ' . $course_id . ' hidden>' .
                '<td>' . '<input type="text" name = "f_send" required>' . '</td>' .
                '<td>' . '<input type="submit" name = "submit_send" >' . '</td>' .
                '</form>';
            echo '</tr>';
        } else {
            echo '<form action = "send_feedback.php" method = "POST">
        <input type="number" name = "sid" value= ' . $student_id . ' hidden>' .
                '<input type="text" name = "fid" value= ' . $fid . ' hidden>' .
                '<input type="text" name = "cid" value= ' . $course_id . ' hidden>' .
                '<td>' . '<input type="text" name = "f_send" required>' . '</td>' .
                '<td>' . '<input type="submit" name = "submit_send" disabled>' . '</td>' .
                '</form>';
            echo '</tr>';
        }
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