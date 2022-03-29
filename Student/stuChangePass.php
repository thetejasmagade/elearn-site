<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Change Password');
define('PAGE', 'changepass');
include('./Include/header.php'); 
include_once('../dbConnection.php');

 if(isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }

 if(isset($_REQUEST['stuPassUpdatebtn'])){
  if(($_REQUEST['stuNewPass'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning" role="alert" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -35px; margin-left: 160px;"> Fill All Fileds </div>';
  } else {
    $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
     $stuPass = $_REQUEST['stuNewPass'];
     $sql = "UPDATE student SET stu_pass = '$stuPass' WHERE stu_email = '$stuEmail'";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $passmsg = '<div class="alert alert-success " role="alert" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -35px; margin-left: 160px;"> Updated Successfully </div>';
      } else {
       // below msg display on form submit failed
       $passmsg = '<div class="alert alert-danger" role="alert" style="width:fit-content;font-size: 14px;
    padding: 5px 30px;
    margin-top: -35px; margin-left: 160px;"> Unable to Update </div>';
      }
    }
   }
}
?>

<div class="stuContent">
 <div class="formContent">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="inputemail">Email</label>
      <input type="email" class="form-control" id="inputEmail" value=" <?php echo $stuEmail ?>" readonly>
    </div>
    <div class="form-group">
      <label for="inputnewpassword">New Password</label>
      <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="stuNewPass">
    </div>
    <button type="submit" class="signinbutton" name="stuPassUpdatebtn" style="padding:8px 8px;font-size:16px;border-radius: 20px;">Update</button>
    <button type="reset" class="btn btn-secondary " style="margin-left:5px;padding:8px 8px;font-size:16px;border-radius: 20px;">Reset</button>
         <?php if(isset($passmsg)) {echo $passmsg; } ?>
  </form>
 </div>
</div>
</div>


<?php
include('./Include/footer.php'); 
?>