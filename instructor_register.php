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
    <h1 style="text-align: center;"> Instructor Registration </h1>
    <form action="" method="POST">
        <div>
            <label for="name">Enter your Full Name </label>
            <input type="text" name="fullname" required>
        </div>
        <div>
            <label for="email">Enter your Email </label>
            <input type="email" name="email_id" required>
        </div>
        <div>
            <label for="password">Enter Password</label>
            <input type="password" name="password" id="" required>
        </div>
        <div>
            <label for="contact">Enter Contact Number</label>
            <input type="number" name="contact_no" id="" required>
        </div>
        <div>
            <label for="studend_id">Enter your Instructor_ID </label>
            <input type="number" name="instructor_id" required>
        </div>
        <div>
            <input type="submit" value="Register" name="register">
        </div>
    </form>
    <?php
    include('connect.php');
    if (isset($_POST['fullname']) && isset($_POST['contact_no']) && isset($_POST['email_id']) && isset($_POST['instructor_id']) && isset($_POST['password'])) {
        $fullname =  $_POST['fullname'];
        $contact_no =  $_POST['contact_no'];
        $email_id =  $_POST['email_id'];
        $instructor_id =  $_POST['instructor_id'];
        $password =  $_POST['password'];
        $sql = mysqli_query($conn, "select* from instructor where email_id = '$email_id'");
        if (mysqli_num_rows($sql)) {
            echo 'Email Already Exists ';
            exit;
        } else {
            $query = "insert into instructor(contact_no , instructor_name , instructor_id ,email_id , password)  values('$contact_no' ,'$fullname' , '$instructor_id', '$email_id' ,'$password' )";
            $sql = mysqli_query($conn, $query) or die("Couldn't Perform Query");
            echo '<script>alert("Registration Successfull");</script>';
            echo "<script>location.replace('index.php')</script>";
        }
    }
    unset($_POST);
    ?>
    <div>
        <a href="index.php"> HomePage </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
