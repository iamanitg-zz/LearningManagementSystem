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
    // echo "<h1>" . $_SESSION['student_id'] . "</h1>";
    ?>

    <?php
    // print_r($_POST);
    echo '<table class="center">';
    echo '<tr>
    <th> Course ID </th>
    <th> Course Name </th>
    <th> Description </th>
    <th> Enroll </th>
  </tr>';
    if (isset($_SESSION['student_id'])) {
        try {
            $student_id = $_SESSION['student_id'];
            // print_r($instructor_name);
            $sql = mysqli_query($conn, "select* from course");

            while ($row = mysqli_fetch_assoc($sql)) {
                echo '<tr>';
                $student_id = $_SESSION['student_id'];
                $cid = $row['course_id'];
                $sql2 = mysqli_query($conn, "select * from enroll where student_id='$student_id' and course_id = '$cid'");
                if ($row2 = mysqli_fetch_assoc($sql2)) {
                    echo '<td>' . $row['course_id'] . '</td><td>' . $row['course_name'] . '</td><td>' . $row['course_description'] . '</td>';
                    echo '<form action="enroll_course.php" method = "POST">' .
                        '<input type="text" name="cid" id="" value =' . $row["course_id"] . ' hidden >';
                    echo '<td>' . '<input type="submit" name="submit" id="" value = "Enroll" disabled>' . '</td>';
                    echo ' </form>';
                } else {
                    echo '<td>' . $row['course_id'] . '</td><td>' . $row['course_name'] . '</td><td>' . $row['course_description'] . '</td>';
                    echo '<form action="enroll_course.php" method = "POST">' .
                        '<input type="text" name="cid" id="" value =' . $row["course_id"] . ' hidden >';
                    echo '<td>' . '<input type="submit" name="submit" id="" value = "Enroll">' . '</td>';
                    echo ' </form>';
                }
                echo '</tr>';
            }

            unset($_POST);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    echo '</table>'
    ?>
    <br>
    <div>
        <a href="student_profile.php"> Profile Home</a>
    </div>
    <div>
        <a href="logout.php"> Sign Out </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>