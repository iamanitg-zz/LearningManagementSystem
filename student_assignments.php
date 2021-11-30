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
    echo "<h1>" . "STUDENT" . "</h1>";
    echo "<h3 style='text-align: center;'>" . $_SESSION['name'] . "</h3>";
    // echo "<h3 style='text-align: center;'>" . $_SESSION['student_id'] . "</h3>";
    ?>
    <?php
    $student_id  = $_SESSION['student_id'];
    $sql = mysqli_query($conn, "select* from enroll where student_id = '$student_id'");
    echo '<table class="center">';
    echo '<tr>
    <th> Assignment ID </th>
    <th> Course ID </th>
    <th> Description </th>
    <th> Question Paper </th>
    <th> Upload Work </th>
    <th> Due Time</th>
    <th> Submit </th>
    <th> Marks </th>
  </tr>';
    while ($row = mysqli_fetch_assoc($sql)) {
        $course_id = $row['course_id'];
        $sql2 = mysqli_query($conn, "select* from assignment where course_id = '$course_id'");
        while ($row2 = mysqli_fetch_assoc($sql2)) {
            // print_r($row2);
            echo '<tr>';
            $file_path = $row2['file_path'];
            // print_r($file_path);
            echo '<td>' . $row2['assignment_id'] . '</td><td>' . $row2['course_id'] . '</td><td>' . $row2['description'] . '</td>';
            echo '<td>' . "<a href=$file_path> Download </a>" . '</td>';
            $ass_id = $row2['assignment_id'];
            $due_time = $row2['due_time'];
            $flag = false;
            $sql3 = mysqli_query($conn, "select* from submit_assignment where assignment_id = '$ass_id' and student_id = '$student_id'");
            // $timenow = 1;
            if (mysqli_num_rows($sql3) === 1) {
                $row = mysqli_fetch_assoc($sql3);
                if ($row['if_returned'] == 1) {
                    echo '<form action="submit_assignment.php"  id= "submit_file"method = "POST" enctype="multipart/form-data">' .
                        '<input type="text" name="aid" id="" value =' . $row2["assignment_id"] . ' hidden >'
                        . '<input type="text" name="cid" id="" value =' . $row2["course_id"] . ' hidden >'
                        . '<input type="number" name="student_id" id="" value =' . $student_id . ' hidden >'
                        . '<td>' . '<input type="file" name="file" id="submit_file" required >' . '</td>';
                    echo '<td>' . $due_time . '</td><td>' . '<input type="submit" name="submit" id="" value = "Submit" disabled>' . '</td>';
                    echo ' </form>';
                    echo '<td>' . $row['marks'] . '</td>';
                } else {
                    echo '<form action="submit_assignment.php"  id= "submit_file"method = "POST" enctype="multipart/form-data">' .
                        '<input type="text" name="aid" id="" value =' . $row2["assignment_id"] . ' hidden >'
                        . '<input type="text" name="cid" id="" value =' . $row2["course_id"] . ' hidden >'
                        . '<input type="number" name="student_id" id="" value =' . $student_id . ' hidden >'
                        . '<td>' . '<input type="file" name="file" id="submit_file" required >' . '</td>';
                    echo '<td>' . $due_time . '</td><td>' . '<input type="submit" name="submit" id="" value = "Submit">' . '</td>';
                    echo '<td>' . ' - ' . '</td>';
                    echo ' </form>';
                }
            } else {
                echo '<form action="submit_assignment.php"  id= "submit_file"method = "POST" enctype="multipart/form-data">' .
                    '<input type="text" name="aid" id="" value =' . $row2["assignment_id"] . ' hidden >'
                    . '<input type="text" name="cid" id="" value =' . $row2["course_id"] . ' hidden >'
                    . '<input type="number" name="student_id" id="" value =' . $student_id . ' hidden >'
                    . '<td>' . '<input type="file" name="file" id="submit_file" required >' . '</td>';
                echo '<td>' . $due_time . '</td><td>' . '<input type="submit" name="submit" id="" value = "Submit">' . '</td>';
                echo '<td>' . ' - ' . '</td>';
                echo ' </form>';
            }
            echo '</tr>';
        }
        // print_r($row);
    }
    echo '</table>';
    ?>
    <div> <a href="student_profile.php">Profile</a></div>

    <div> <a href="logout.php">Sign Out</a> </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>