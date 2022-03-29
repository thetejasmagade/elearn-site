<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Edit Lesson');
define('PAGE', 'lessons');
include('./adminInclude/adminheader.php');
include('../dbconnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } 
 else {
  echo "<script> location.href='../index.php'; </script>";
 }

// UPDATE
 if(isset($_REQUEST['requpdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['lesson_name']=="") || ($_REQUEST['lesson_desc']=="") || ($_REQUEST['lesson_content']=="") || ($_REQUEST['course_id']=="") || ($_REQUEST['course_name']=="")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning " role="alert" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $lid = $_REQUEST['lesson_id'];
    $lname = $_REQUEST['lesson_name'];
    $ldesc = $_REQUEST['lesson_desc'];
    $lcontent = $_REQUEST['lesson_content'];
    $cid = $_REQUEST['course_id'];
    $cname = $_REQUEST['course_name'];
    $llink = '../lessonvid/'. $_FILES['lesson_link']['name'];
    
   $sql = "UPDATE lesson SET lesson_id = '$lid', lesson_name = '$lname', lesson_desc = '$ldesc', lesson_content = '$lcontent', course_id='$cid', course_name='$cname', lesson_link='$llink' WHERE lesson_id = '$lid'";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success"  role="alert" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger " role="alert" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;"> Unable to Update </div>';
    }
  }
  }

?>

<div class="Content">
 <div class="formColor">
  <h3 class="text-center">Update Lesson Details</h3>
  
  <?php 
   if(isset($_REQUEST['view'])){
       $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
   }
  ?>


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
      <label for="lesson_id">Lesson ID</label>
      <input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id'])) {echo $row['lesson_id']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="lesson_name">lesson Name</label>
      <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($row['lesson_name'])) {echo $row['lesson_name']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="lesson_desc">Lesson Description</label>
      <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2 ><?php if(isset($row['lesson_desc'])) {echo $row['lesson_desc']; }?></textarea>
    </div>
    <div class="form-group">
      <label for="lesson_content">Lesson Content</label>
      <textarea class="form-control" id="lesson_content" name="lesson_content" row=2 ><?php if(isset($row['lesson_content'])) {echo $row['lesson_content']; }?></textarea>
    </div>
    <div class="form-group">
      <label for="lesson_link">Lesson Video Link</label>
      <div class="embed-responsive embed-responsive-16by9">
       <iframe class="embed-responsive-item" src="<?php if(isset($row['lesson_link'])) {echo $row['lesson_link']; }?>" allowfullscreen></iframe>
      </div>
      <input type="file" class="form-control" id="lesson_link" name="lesson_link" value="<?php if(isset($row['lesson_link'])) {echo $row['lesson_link']; }?>">
    </div>
    <div class="courseBtn" style="text-align:right;">
      <button type="submit" class="btn btn-primary btn-lg" id="requpdate" name="requpdate">Update</button>
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