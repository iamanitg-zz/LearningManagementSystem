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

    <?php
    // print_r($_POST);
    echo '<table class="center">';
    echo '<tr>
    <th> Course ID </th>
    <th> Course Name </th>
    <th> Course Description </th>
    <th> Create Assignment </th>
    <th> Get Feedback </th>
    <th> Feedbacks </th>
    </tr>';
    if (isset($_SESSION['ins_id'])) {
        try {
            $int_id = $_SESSION['ins_id'];
            // print_r($instructor_name);
            $sql = mysqli_query($conn, "select* from course where instructor_id = '$int_id'");
            while ($row = mysqli_fetch_assoc($sql)) {
                echo '<tr>';
                echo '<td>' . $row['course_id'] . '</td><td>' . $row['course_name'] . '</td><td>' . $row['course_description'] . "</td>";
                echo '<form action="create_assignment.php" method = "POST">' .
                    '<input type="text" name="cid" id="" value =' . $row["course_id"] . ' hidden >'
                    . '<input type="number" name="instructor_id" id="" value =' . $row["instructor_id"] . ' hidden >';
                echo '<td>' . '<input type="submit" name="submit" id="" value = "Create Assignment">' . '</td>';
                echo ' </form>';
                echo '<form action="create_feedback.php" method = "POST">' .
                    '<input type="text" name="cid" id="" value =' . $row["course_id"] . ' hidden >'
                    . '<input type="number" name="instructor_id" id="" value =' . $row["instructor_id"] . ' hidden >';
                echo '<td>' . '<input type="submit" name="submit" id="" value = "Create Feedback">' . '</td>';
                echo ' </form>';
                $cid = $row['course_id'];
                echo '<form action="previous_feedbacks.php" method= "POST">' .
                    '<input type="text" name = "cid" value =' . $cid . ' hidden>' .
                    '<td>' . '<input type="submit" name = "submit" value = "Feedbacks" >' . '</td>' . '</form>';
                echo '</tr>';
            }
            unset($_POST);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    echo '</table>';
    ?>
    <div><a href="instructor_profile.php"> Profile Home</a></div>
    <div><a href="logout.php">Sign Out</a></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>