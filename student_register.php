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
    <h1 style="text-align: center;"> Student Registration </h1>
    <form action="student_register.php" method="POST">
        <div>
            <label for="name">Enter your Full Name </label>
            <input type="text" name="fullname" required>
        </div>
        <div>
            <label for="email">Enter your Email </label>
            <input type="email" name="email_id" required>
        </div>
        <div>
            <label for="studend_id">Enter your Student_ID </label>
            <input type="number" name="student_id" required>
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
            <label for="address">Enter Your Address</label>
            <input type="text" name="address" id="" required>
        </div>
        <div>
            <label for="dob">Enter Your Date of Birth</label>
            <input type="date" name="dob" id="" required>
        </div>
        <div>
            <label for="gender">Select Your Gender : </label>
            <input type="radio" name="gender" value="Male" required>
            <label for="male">Male</label>
            <input type="radio" name="gender" value="Female" required>
            <label for="male">Female</label>
        </div>
        <div>
            <input type="submit" value="Register" name="register">
        </div>
    </form>
    <?php
    include('connect.php');
    session_start();
    if (isset($_POST['fullname']) && isset($_POST['contact_no']) && isset($_POST['address']) && isset($_POST['email_id']) && isset($_POST['email_id']) && isset($_POST['student_id']) && isset($_POST['dob']) && isset($_POST['password']) && isset($_POST['gender'])) {
        $fullname =  $_POST['fullname'];
        $contact_no =  $_POST['contact_no'];
        $address =  $_POST['address'];
        $email_id =  $_POST['email_id'];
        $student_id =  $_POST['student_id'];
        $dob =  $_POST['dob'];
        $password =  $_POST['password'];
        $gender =  $_POST['gender'];
        $sql = mysqli_query($conn, "select* from student where email_id = '$email_id'");
        if (mysqli_num_rows($sql)) {
            // echo 'Email Already Exists ';
            echo '<script>alert(" Email Already Exists");</script>';
            exit;
        } else {
            $query = "insert into student(name , contactno , address ,email_id , dob ,password , gender , student_id) values('$fullname' ,'$contact_no' ,'$address' , '$email_id' , '$dob' , '$password' , '$gender' , '$student_id')";
            $sql = mysqli_query($conn, $query) or die("Couldn't Perform Query");
            echo '<script>alert("Registration Successfull");</script>';
            echo "<script>location.replace('index.php')</script>";
        }
    }
    unset($_POST);
    ?>
    <div>
        <a href="index.php">Home</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>