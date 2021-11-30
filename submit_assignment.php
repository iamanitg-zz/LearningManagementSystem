<?php
include('connect.php');
session_start();
?>
<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $filename = $file['name'];
    $fileTempName = $file['tmp_name'];
    $filesize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($filesize < 10000000) {
                $filenamenew = uniqid('', true) . "." . $fileActualExt;
                $filedestination = 'uploads/' . $filenamenew;
                move_uploaded_file($fileTempName, $filedestination);
                // echo 'File Uploaded Successfully';
                $course_id = $_POST['cid'];
                $student_id = $_POST['student_id'];
                $filepath = $filedestination;
                $assignment_id = $_POST['aid'];
                // $description = $_POST['description'];
                // $due_time = $_POST['due_time'];
                // $start_time = 
                $sql = mysqli_query($conn, "insert into submit_assignment (student_id , course_id ,  assignment_id , submit_file_path) values('$student_id' ,'$course_id' ,'$assignment_id' , '$filepath')");
                echo "<script>alert('Uploaded Successfully');</script>";
                echo "<script>location.replace('student_assignments.php')</script>";
            } else {
                echo 'File is too large !';
            }
        } else {
            echo 'Ther was an Error Uploading The File ';
        }
    } else {
        echo 'File Type Not Allowed';
    }
    // print_r($file);
}
?>