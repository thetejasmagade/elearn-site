<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Add Course');
define('PAGE', 'courses');
include('./adminInclude/adminheader.php');
include('../dbconnection.php');
 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }

if(isset($_REQUEST['courseSubmitBtn'])){
  // Checking Empty Field
  if(($_REQUEST['course_name']=="") || ($_REQUEST['course_desc']=="") || ($_REQUEST['course_author']=="") || ($_REQUEST['course_duration']=="") || ($_REQUEST['course_price']=="") || ($_REQUEST['course_original_price']=="")){
    $msg = '<div class="alert alert-warning" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;">Fill All Fields</div>';
  } else{
    $course_name = $_REQUEST['course_name'];
    $course_desc = $_REQUEST['course_desc'];
    $course_author = $_REQUEST['course_author'];
    $course_duration = $_REQUEST['course_duration'];
    $course_price = $_REQUEST['course_price'];
    $course_original_price = $_REQUEST['course_original_price'];
    $course_image = $_FILES['course_img']['name'];
    $course_image_temp = $_FILES['course_img']['tmp_name']; 
    $img_folder = '../images/course/'.$course_image;
    move_uploaded_file($course_image_temp, $img_folder);

    $sql = "INSERT INTO course(course_name, course_desc, course_author, course_img, course_duration, course_price, course_original_price) VALUES ('$course_name', '$course_desc', '$course_author', '$img_folder', '$course_duration', '$course_price', '$course_original_price')";

    if($conn->query($sql) == TRUE){
      $msg = '<div class="alert alert-success" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;">Course Added Successfully</div>';
    } else{
      $msg = '<div class="alert alert-danger" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;">Unable to Add Course</div>';
    }
  }
}
?>

<div class="Content">
 <div class="formColor">
  <h3 class="text-center">Add New Course</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="course_name">Course Name</label>
      <input type="text" class="form-control" id="course_name" name="course_name">
    </div>
    <div class="form-group">
      <label for="course_desc">Course Description</label>
      <textarea class="form-control" id="course_desc" name="course_desc" row=2></textarea>
    </div>
    <div class="form-group">
      <label for="course_author">Author</label>
      <input type="text" class="form-control" id="course_author" name="course_author">
    </div>
    <div class="form-group">
      <label for="course_duration">Course Duration</label>
      <input type="text" class="form-control" id="course_duration" name="course_duration">
    </div>
    <div class="form-group">
      <label for="course_original_price">Course Original Price</label>
      <input type="text" class="form-control" id="course_original_price" name="course_original_price" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="course_price">Course Selling Price</label>
      <input type="text" class="form-control" id="course_price" name="course_price" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="course_img">Course Image</label>
      <input type="file" class="form-control-file" id="course_img" name="course_img">
    </div>
    <div class="courseBtn" style="text-align:right;">
      <button type="submit" class="btn btn-primary btn-lg" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
      <a href="courses.php" class="btn btn-danger btn-lg">Close</a>
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
