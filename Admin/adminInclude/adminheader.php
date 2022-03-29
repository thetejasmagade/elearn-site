<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Linking JQuery -->
        <script src="js/jquery.min.js"></script>
        <!-- Linking JQuery -->


        <link rel="stylesheet" type="text/css" href="../css/adminstyle.css">
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
                <!--Admin Header Section Start -->
               
                <div class="adminBrand d-print-none">
                  <a href="adminDashboard.php"><i class="fas fa-graduation-cap "></i>शाळा</a>
                  <small>Admin Area</small>
                </div>

               <!--Admin Header Section End -->

               <!-- Admin SideBar Section Starts -->
               
               <div class="adminHome">
               <div class="SideBar d-print-none">
                 <div class="sideBar-contents">
                  <ul>
                   <li><a href="adminDashboard.php"><i class="fas fa-columns" style="padding-right:5px"></i>Dashboard</a></li>
                   <li><a href="courses.php"><i class="fas fa-book-open" style="padding-right:5px"></i>Courses</a></li>
                   <li><a href="lessons.php"><i class="far fa-edit" style="padding-right:5px"></i>Lessons</a></li>
                   <li><a href="quiz.php"><i class="fas fa-file-alt" style="padding-right:5px"></i>Quiz</a></li>
                   <li><a href="students.php"><i class="fas fa-users" style="padding-right:5px"></i>Students</a></li>
                   <!-- <li><a href="sellReport.php"><i class="fas fa-table" style="padding-right:5px"></i>Sell Report</a></li> -->
                   <li><a href="adminPaymentStatus.php"><i class="fas fa-tags" style="padding-right:5px"></i>Payment Status</a></li>
                   <li><a href="feedback.php"><i class="fas fa-comments" style="padding-right:5px"></i>Feedback</a></li>
                   <li><a href="adminChangePass.php"><i class="fas fa-key" style="padding-right:5px"></i>Change Password</a></li>
                   <li><a href="../adminlogout.php"><i class="fas fa-sign-out-alt" style="padding-right:5px"></i>Logout</a></li>
                  </ul>
                 </div>
               </div>
