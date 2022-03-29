<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'My Course');
define('PAGE', 'mycourse');
include('./Include/header.php'); 
include_once('../dbConnection.php');

 if(isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
?>



<div class="stuContent" style="width: 75%; margin: auto;margin-top: 60px; flex-direction:column; padding:20px;    background: linear-gradient(rgb(175, 219, 245), rgb(201, 255, 229));">
    <h4 style=" text-align: center; width: 100%; font-size: 30px; text-transform:uppercase; color: #333;">All Course</h4>
    <?php 
   if(isset($stuLogEmail)){
    $sql = "SELECT co.order_id, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_author, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.stu_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
     while($row = $result->fetch_assoc()){ ?>
    <div class="myCourse-container">
        <h3 style="background: rgb(175, 219, 245); padding:10px;font-size:18px"><?php echo $row['course_name']; ?></h3>
        <div class="myCourse-row">
            <div class="myCourse-img">
                <img src="<?php echo $row['course_img']; ?>" class="card-img-top
                mt-4" alt="pic">
            </div>
            <div class="myCourse-content">
                  <p class="card-title"><?php echo $row['course_desc']; ?></p>
                  <small class="card-text">Duration: <?php echo $row['course_duration']; ?></small><br />
                  <small class="card-text">Author: <?php echo $row['course_author']; ?></small><br/>
                  <p class="card-text d-inline">Price: <small><del style="text-decoration:line-through;color:red;">&#8377 <?php echo $row['course_original_price'] ?> </del></small> <span class="font-weight-bolder">&#8377 <?php echo $row['course_price']?> <span></p>
                  <a href="watchcourse.php?course_id=<?php echo $row['course_id'] ?>" class="signinbutton mt-5 float-right">Watch Course</a>
            </div>
        </div>
    </div>
    <?php
     }
    }
   }
  
    ?>
</div>
</div>



<?php
include('./Include/footer.php');
?>