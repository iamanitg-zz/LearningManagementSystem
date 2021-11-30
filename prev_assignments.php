<?php
include('connect.php');
session_start();
// print_r($_SESSION);
// print_r($_POST);
// $_SESSION['course_id'] = $_POST['cid'];
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
    <th> Assignment ID  </th>
    <th> Assignment Descriptions </th>
    <th> Student Works </th>
    </tr>';
    $instructor_id  = $_SESSION['ins_id'];
    $sql = mysqli_query($conn, "select* from assignment where instructor_id = '$instructor_id'");
    echo '<br>';
    while ($row = mysqli_fetch_assoc($sql)) {
        echo '<tr>';
        echo '<td>' . $row['assignment_id'] . '</td>';
        echo '<td>' . $row['description'] . '</td>';
        $assignment_id = $row['assignment_id'];
        echo '<form action="student_uploads.php" method = "POST"> 
        <input type="number" name = "aid" value=' . $assignment_id . ' hidden>' .
            '<td>' . '<input type="submit" value = "Files">' . '</td>' .
            '</form>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
    <br>
    <div><a href="instructor_profile.php"> Profile Home </a></div>
    <div><a href="logout.php">Sign Out</a></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>