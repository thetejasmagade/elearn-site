<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Feedback');
define('PAGE', 'feedback');
include('./Include/header.php'); 
include_once('../dbConnection.php');

 if(isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }

 $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
 $result = $conn->query($sql);
 if($result->num_rows == 1){
 $row = $result->fetch_assoc();
 $stuId = $row["stu_id"];
 $stuName = $row["stu_name"];
}

 if(isset($_REQUEST['submitFeedbackBtn'])){
  if(($_REQUEST['f_content'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning" role="alert" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -35px; margin-left: 90px;" > Fill All Fileds </div>';
  } else {
   $fcontent = $_REQUEST["f_content"];
   $sql = "INSERT INTO feedback (f_content, stu_id,stu_name) VALUES ('$fcontent', '$stuId','$stuName')";
   if($conn->query($sql) == TRUE){
   // below msg display on form submit success
   $passmsg = '<div class="alert alert-success" role="alert" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -35px; margin-left: 90px;"> Submitted Successfully </div>';
   } else {
   // below msg display on form submit failed
   $passmsg = '<div class="alert alert-danger " role="alert" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -35px; margin-left: 90px;"> Unable to Submit </div>';
      }
    }
 }

?>


<div class="stuContent">
    <div class="formContent">
      <form class="mx-5" method="POST" enctype="multipart/form-data">
       <div class="form-group">
        <label for="stuId">Student ID</label>
        <input type="text" class="form-control" id="stuId" name="stuId" value=" <?php if(isset($stuId)) {echo $stuId;} ?>" readonly>
       </div>
       <div class="form-group">
        <label for="stuName">Student Name</label>
        <input type="text" class="form-control" id="stu_name" name="stuId" value=" <?php if(isset($stuName)) {echo $stuName;} ?>" readonly>
       </div>
       <div class="form-group">
        <label for="course_desc">Write Feedback</label>
        <textarea class="form-control" id="f_content" name="f_content" row=2></textarea>
       </div>
       <button type="submit" class="signinbutton" name="submitFeedbackBtn">Submit</button>
       <?php if(isset($passmsg)) {echo $passmsg; } ?>
      </form>
     </div>
</div>
</div>

<?php
include('./Include/footer.php'); 
?>