<?php
include('connect.php');
session_start();
// print_r($_SESSION);
// print_r($_POST);
?>
<?php
if (isset($_POST['submit_feedback'])) {
    $course_id = $_SESSION['course_id'];
    $instructor_id = $_SESSION['ins_id'];
    $feedback_id = $_POST['feedback_id'];
    $content = $_POST['description'];
    $due_date = $_POST['due_time'];
    $sql = mysqli_query($conn, "insert into feedback ( feedback_id , course_id , instructor_id ,  ending_time ,content) values('$feedback_id','$course_id' ,'$instructor_id' ,'$due_date' , '$content' )");
    echo "<script>alert('Feedback Uploaded Successfully');</script>";
    echo "<script>location.replace('instructor_courses.php')</script>";
}
?>