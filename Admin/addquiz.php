<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Add Quiz');
define('PAGE', 'quiz');
include('./adminInclude/adminheader.php');
include('../dbconnection.php');
 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }

if(isset($_REQUEST['quizSubmitBtn'])){
  // Checking Empty Field
  if(($_REQUEST['quiz_link']=="") || ($_REQUEST['course_id']=="") || ($_REQUEST['course_name']=="")){
    $msg = '<div class="alert alert-warning" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;">Fill All Fields</div>';
  } else{
    $quiz_link = $_REQUEST['quiz_link'];
    $course_id = $_REQUEST['course_id'];
    $course_name = $_REQUEST['course_name'];

    $sql = "INSERT INTO quiz (quiz_link, course_id, course_name) VALUES ('$quiz_link', '$course_id', '$course_name')";

    if($conn->query($sql) == TRUE){
      $msg = '<div class="alert alert-success" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;">Quiz Added Successfully</div>';
    } else{
      $msg = '<div class="alert alert-danger" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;">Unable to Add Quiz</div>';
    }
  }
}
?>


    <div class="Content">
       <div class="formColor">
  <h3 class="text-center">Add New Quiz</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="course_id">Course ID</label>
      <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];} ?>" readonly>
    </div>
    <div class="form-group">
      <label for="course_name">Course Name</label>
      <input type="text" class="form-control" id="course_name" name="course_name" value ="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];} ?>" readonly>
    </div>
    <div class="form-group">
      <label for="quiz_link">Quiz Link</label>
      <input type="text" class="form-control" id="quiz_link" name="quiz_link" >
    </div>
    <div class="quizBtn" style="text-align:right;">
      <button type="submit" class="btn btn-primary btn-lg" id="quizSubmitBtn" name="quizSubmitBtn">Submit</button>
      <a href="quiz.php" class="btn btn-danger btn-lg">Close</a>
    </div>
  </form>
  <?php
  if(isset($msg)){echo $msg;} 
  ?>
  </div>
    </div>


<?php
include('./adminInclude/adminfooter.php'); 
?>