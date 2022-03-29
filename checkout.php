<?php 
include('./dbConnection.php');
session_start();
 if(!isset($_SESSION['stuLogEmail'])) {
  echo "<script> location.href='loginsignup.php'; </script>";
 } else {
  header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
  $stuEmail = $_SESSION['stuLogEmail'];
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.5/cssfontawesomemincss">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

        <!-- Font Awesome kit -->
        <script src="https://kit.fontawesome.com/bca2cb55c2.js" crossorigin="anonymous"></script>
    
        <title>Checkout</title>
        <link rel="shortcut icon" href="./images/logo/favicon.png" type="image/png">
  </head>
  <body>
  <div class="container mt-5" style="position: relative; background: lightgray; padding: 25px; width: 80%;" >
    <div class="row">
    <div class="col-sm-6 offset-sm-3 jumbotron">
    <h3 class="mb-5" style="font-size: 25px; text-align: center; padding-top: 16px;">Welcome to <b>शाळा</b> Payment Page
    </h3>
    <form method="post" action="./payscript.php">
      <div class="form-group row">
       <label for="ORDER_ID" class="col-sm-4 col-form-label" style="font-size:16px">Order ID</label>
       <div class="col-sm-8">
         <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly style="padding: 8px 2px; font-size: 16px;">
       </div>
      </div>
      <div class="form-group row">
       <label for="CUST_ID" class="col-sm-4 col-form-label" style="font-size:16px">Student Email</label>
       <div class="col-sm-8">
         <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if(isset($stuEmail)){echo $stuEmail; }?>" readonly style="padding: 8px 2px; font-size: 16px;">
       </div>
      </div>
      <div class="form-group row">
       <label for="TXN_AMOUNT" class="col-sm-4 col-form-label" style="font-size:16px">Amount</label>
       <div class="col-sm-8">
        <input title="TXN_AMOUNT" class="form-control" tabindex="10"
          type="text" name="TXN_AMOUNT" value="<?php if(isset($_POST['id'])){echo $_POST['id']; }?>" readonly style="padding: 8px 2px; font-size: 16px;">
       </div>
      </div>
      <div class="text-center" style="margin-top: 15px;">
       <input value="Checkout" type="submit"	class="btn btn-primary" onclick="">
       <a href="./course.php" class="btn btn-secondary" style="margin-left:5px">Cancel</a>
      </div>
     </form>
     <small class="form-text text-muted" style="font-size: 14px;">Note: Complete Payment by Clicking Checkout Button</small>
     </div>
    </div>
  </div>

    <!-- Jquery and Boostrap JavaScript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Font Awesome JS -->
    <script type="text/javascript" src="js/all.min.js"></script>

    <!-- Custom JavaScript -->
    <script type="text/javascript" src="js/custom.js"></script>

  </body>
  </html>
 <?php } ?>

