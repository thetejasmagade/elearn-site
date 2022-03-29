<?php 
include_once('../dbConnection.php');
 if(!isset($_SESSION)){ 
   session_start(); 
 } 
 if(isset($_SESSION['is_login'])){
  $stuLogEmail = $_SESSION['stuLogEmail'];
 } 
 // else {
 //  echo "<script> location.href='../index.php'; </script>";
 // }
 if(isset($stuLogEmail)){
  $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $stu_img = $row['stu_img'];
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
         <!-- Custom CSS -->
        <link rel="stylesheet" href="stustyle.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.5/cssfontawesomemincss">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

        <!-- Font Awesome kit -->
        <script src="https://kit.fontawesome.com/bca2cb55c2.js" crossorigin="anonymous"></script>
      
        <title><?php echo TITLE ?></title>
        <link rel="shortcut icon" href="../images/logo/favicon.png" type="image/png">



</head>

<body>
 
<!-- Top NavBar Starts -->
   
<div class="stuBrand">
  <a href="../index.php"><i class="fas fa-graduation-cap "></i>शाळा</a>
</div>
<!-- Top NavBar Ends -->

<!-- SideBar Starts -->

<div class="studentarea">
  <div class="stuSidebar">
    <nav>
      <ul>
        <li ">
         <img src="<?php echo $stu_img ?>" >
        </li>
        <li>
         <a class="" href="studentProfile.php"><i class="fas fa-user" style="padding-right:5px"></i>Profile</a>
        </li>
        <li>
         <a href="myCourse.php"><i class="fas fa-book-open" style="padding-right:5px"></i>My Courses</a>
        </li>
        <li>
         <a href="stuFeedback.php"><i class="fas fa-comments" style="padding-right:5px"></i>Feedback</a>
        </li>
        <li>
         <a href="stuChangePass.php"><i class="fas fa-key" style="padding-right:5px"></i>Change Password</a>
        </li>
        <li>
         <a href="../logout.php"><i class="fas fa-sign-out-alt" style="padding-right:5px"></i>Logout</a>
        </li>
      </ul>
    </nav>
  </div>
<!-- SideBar Ends -->