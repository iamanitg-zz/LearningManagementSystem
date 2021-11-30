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
</style>

<body>
    <h1 style="text-align: center;">Welcome to Easy Learning</h1>
    <form action="" method="POST">
        <br>
        <div>
            <label for="email">Enter your email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Enter your password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="login" name="login">
        </div>
        <div><a href="student_register.php" class="button"> Register As Student</a></div>
        <div><a href="instructor_register.php" class="button"> Register As Instructor</a></div>
    </form>
    <?php

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email_id =  $_POST['email'];
        $password =  $_POST['password'];
        $_SESSION['email'] = $email_id;
        $sql = "select *from instructor where email_id = '$email_id' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // echo $count;
        if (mysqli_num_rows($result) === 1) {
            $flag = true;
            $_SESSION['name'] = $row['instructor_name'];
            $_SESSION['ins_id'] = $row['instructor_id'];
            unset($row);
            unset($result);
            echo "<script>location.replace('instructor_profile.php')</script>";
        } else {
            $sql = "select *from student where email_id = '$email_id' and password = '$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if (mysqli_num_rows($result) === 1) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['student_id'] = $row['student_id'];
                unset($row);
                unset($result);
                echo "<script>location.replace('student_profile.php')</script>";
            } else {
                echo "<h1><center>Login failed. Invalid username or password </center></h1>";
            }
        }
        unset($_POST);
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>