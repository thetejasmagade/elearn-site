<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Add Lesson');
define('PAGE', 'lessons');
include('./adminInclude/adminheader.php');
include('../dbconnection.php');
 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }

if(isset($_REQUEST['lessonSubmitBtn'])){
  // Checking Empty Field
  if(($_REQUEST['lesson_name']=="") || ($_REQUEST['lesson_desc']=="") || ($_REQUEST['lesson_content']=="") || ($_REQUEST['course_id']=="") || ($_REQUEST['course_name']=="")){
    $msg = '<div class="alert alert-warning" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;">Fill All Fields</div>';
  } else{
    $lesson_name = $_REQUEST['lesson_name'];
    $lesson_desc = $_REQUEST['lesson_desc'];
    $lesson_content = $_REQUEST['lesson_content'];
    $course_id = $_REQUEST['course_id'];
    $course_name = $_REQUEST['course_name'];
    $lesson_link = $_FILES['lesson_link']['name'];
    $lesson_link_temp = $_FILES['lesson_link']['tmp_name']; 
    $link_folder = '../lessonvid/'.$lesson_link;
    move_uploaded_file($lesson_link_temp, $link_folder);

    $sql = "INSERT INTO lesson (lesson_name, lesson_desc, lesson_content, lesson_link, course_id, course_name) VALUES ('$lesson_name', '$lesson_desc', '$lesson_content', '$link_folder', '$course_id', '$course_name')";

    if($conn->query($sql) == TRUE){
      $msg = '<div class="alert alert-success" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;">Lesson Added Successfully</div>';
    } else{
      $msg = '<div class="alert alert-danger" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;">Unable to Add Lesson</div>';
    }
  }
}
?>


    <div class="Content">
       <div class="formColor">
  <h3 class="text-center">Add New Lesson</h3>
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
      <label for="lesson_name">lesson Name</label>
      <input type="text" class="form-control" id="lesson_name" name="lesson_name" >
    </div>
    <div class="form-group">
      <label for="lesson_desc">Lesson Description</label>
      <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2></textarea>
    </div>
    <div class="form-group">
      <label for="lesson_content">Lesson Content</label>
      <textarea class="form-control" id="lesson_content" name="lesson_content" row=2></textarea>
    </div>
    <div class="form-group">
      <label for="lesson_link">Lesson Video Link</label>
      <input type="file" class="form-control" id="lesson_link" name="lesson_link">
    </div>
    <div class="lessonBtn" style="text-align:right;">
      <button type="submit" class="btn btn-primary btn-lg" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
      <a href="lessons.php" class="btn btn-danger btn-lg">Close</a>
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