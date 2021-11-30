<?php
include('connect.php');
session_start();
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
    echo '<table class="center">';
    echo '<tr>
    <th> Student Name </th>
    <th> Student Work </th>
    <th> Marks </th>
    <th> Return </th>
    </tr>';
    $assignment_id = $_POST['aid'];
    $sql = mysqli_query($conn, "select  * from submit_assignment where assignment_id = '$assignment_id' ");
    while ($row = mysqli_fetch_assoc($sql)) {
        // print_r($row);
        echo '<tr>';
        $sid =  $row['student_id'];
        $sql2 = mysqli_query($conn, "select * from student where student_id = '$sid'");
        $row2 = mysqli_fetch_assoc($sql2);
        $name = $row2['name'];
        echo '<td>' . $row2['name'] . '</td>';
        $filepath = $row['submit_file_path'];
        echo '<td>' . "<a href='$filepath' target='blank'> file </a>" . '</td>';
        $sql3 = mysqli_query($conn, "select* from submit_assignment where assignment_id = '$assignment_id' and student_id = '$sid'");
        if ($row3 = mysqli_fetch_assoc($sql3)) {
            if ($row3['if_returned'] == 1) {
                echo '<form action="give_marks.php" method= "post">' .
                    '<td>' . '<input type = "number" name= "marks" required >' . '</td>' .
                    '<input type="text" name="sid" id="" value =' . $sid . ' hidden >' .
                    '<input type="text" name="aid" value=' . $assignment_id . ' hidden>' .
                    '<td>' . '<input type="submit" name = "submit" value="Return Assignment" disabled>' . '</td>' .
                    '</form>';
            } else {
                echo '<form action="give_marks.php" method= "post">' .
                    '<td>' . '<input type = "number" name= "marks" required >' . '</td>' .
                    '<input type="text" name="sid" id="" value =' . $sid . ' hidden >' .
                    '<input type="text" name="aid" value=' . $assignment_id . ' hidden>' .
                    '<td>' . '<input type="submit" name = "submit" value="Return Assignment">' . '</td>' .
                    '</form>';
            }
        } else {
            echo '<form action="give_marks.php" method= "post">' .
                '<td>' . '<input type = "number" name= "marks" required >' . '</td>' .
                '<input type="text" name="sid" id="" value =' . $sid . ' hidden >' .
                '<input type="text" name="aid" value=' . $assignment_id . ' hidden>' .
                '<td>' . '<input type="submit" name = "submit" value="Return Assignment">' . '</td>' .
                '</form>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
    <div><a href="prev_assignments.php">Back</a></div>
</body>

</html>