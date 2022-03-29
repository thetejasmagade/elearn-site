<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Linking JQuery -->
        <script src="js/jquery.min.js"></script>
        <!-- Linking JQuery -->


        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.5/cssfontawesomemincss">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

        <!-- Font Awesome kit -->
        <script src="https://kit.fontawesome.com/bca2cb55c2.js" crossorigin="anonymous"></script>

            <!-- Student Testimonial Owl Slider CSS -->
         <link rel="stylesheet" type="text/css" href="css/owl.min.css">
         <link rel="stylesheet" type="text/css" href="css/owl.theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/testyslider.css">
      
        <title>शाळा</title>
        <link rel="shortcut icon" href="./images/logo/favicon.png" type="image/png">

    </head>
    <body>
      
               <!-- Header Section Start -->
               <header class="d-print-none">
                 <nav class="navbar">
                   <input type="checkbox" id="check">
                   <label for="check">
                     <i class="fas fa-bars btn1" id="btn1" ></i>
                     <i class="fas fa-times cancel" id="cancel"></i>
                   </label>

                   <a href="index.php"><h2  class="logo"><i class="fas fa-graduation-cap"></i>शाळा</h2></a>

                   <ul>
                     <li><a href="index.php">Home</a></li>
                     <li><a href="course.php">Courses</a></li>
                     <li><a href="paymentstatus.php">Payment Status</a></li>
                     <?php
                       session_start();
                       if(isset($_SESSION['is_login'])){
                         echo '<li><a href="./Student/studentProfile.php" class="active" style="color: white;
                         background: #f44236;
                         padding: 10px 20px;
                         border-radius: 26px;">My Profile</a></li>
                         <li><a href="logout.php">Logout</a></li>';
                       } else {
                         echo '<li><a href="#" data-bs-toggle="modal" data-bs-target="#stuLoginModalCenter" class="active" style="color: white;
                         background: darkblue;
                         padding: 10px 20px;
                         border-radius: 26px;">Login</a></li>
                         <li><a href="#" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Sign Up</a></li>';
                       }
                     ?>
      
                     <li><a href="feedback.php">Feedback</a></li>
                     <li><a href="contactus.php">Contact Us</a></li>
                   </ul>
                 </nav>
               </header>
               <!-- Header Section End -->