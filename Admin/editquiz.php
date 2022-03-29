<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Edit Quiz');
define('PAGE', 'quiz');
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
  if(($_REQUEST['quiz_link']=="") || ($_REQUEST['course_id']=="") || ($_REQUEST['course_name']=="")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning " role="alert" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -32px;"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $qid = $_REQUEST['quiz_id'];
    $qlink = $_REQUEST['quiz_link'];
    $cid = $_REQUEST['course_id'];
    $cname = $_REQUEST['course_name'];
    
   $sql = "UPDATE quiz SET quiz_id = '$qid', quiz_link = '$qlink',  course_id='$cid', course_name='$cname'  WHERE quiz_id = '$qid'";
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
  <h3 class="text-center">Update Quiz Details</h3>
  
  <?php 
   if(isset($_REQUEST['view'])){
       $sql = "SELECT * FROM quiz WHERE quiz_id = {$_REQUEST['id']}";
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
      <label for="quiz_id">Quiz ID</label>
      <input type="text" class="form-control" id="quiz_id" name="quiz_id" value="<?php if(isset($row['quiz_id'])) {echo $row['quiz_id']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="quiz_link">Quiz Link</label>
      <input type="text" class="form-control" id="quiz_link" name="quiz_link" value="<?php if(isset($row['quiz_link'])) {echo $row['quiz_link']; }?>">
    </div>
    <div class="quizBtn" style="text-align:right;">
      <button type="submit" class="btn btn-primary btn-lg" id="requpdate" name="requpdate">Update</button>
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