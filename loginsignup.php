<!-- Including Header Starts -->
<?php
         include('./header.php');
         include('./dbconnection.php');
       ?>
<!-- Including Header Ends -->

<div class="container-fluid remove-marg">
  <div class="row vid-parent">
    <video muted autoplay loop>
      <source src="./video/banvid.mp4" type="video/mp4" />
    </video>
    <div class="overlay"></div>
    <div class="vid-content"></div>
  </div>
</div>

<div class="container jumbotron mb-5" style="margin: 60px auto">
  <div class="row" style="background: linear-gradient(rgb(175, 219, 245), rgb(201, 255, 229))">
    <div class="col-md-4">
      <h5 class="mb-3" style="margin-top: 10px">
        If Already Registered !! Login
      </h5>
      <form role="form" id="stuLoginForm">
        <div class="form-group " style="font-size: 16px; color: #000">
          <i class="fas fa-envelope"></i><label for="stuLogEmail" class="pl-2 font-weight-bold" style="padding-left: 5px;">Email</label>
          <small class="statusMsg" id="statusLogMsg1"></small><input type="email" class="form-control" placeholder="Email" name="stuLogEmail" id="stuLogEmail" style="font-size: 14px; padding: 10px 3px"/>
        </div>
        <div class="form-group " style="font-size: 16px; color: #000">
          <i class="fas fa-key"></i><label for="stuLogPass" class="pl-2 font-weight-bold" style="padding-left: 5px;">Password</label>
          <input type="password" class="form-control" placeholder="Password" name="stuLogPass" id="stuLogPass" style="font-size: 14px; padding: 10px 3px"/>
        </div>
        <button type="button" class="signinbutton" id="stuLoginBtn" onclick="checkStuLogin()" style="margin-top: 15px"> Login
        </button>
      </form>
      <br />
      <small id="statusLogMsg"></small>
    </div>
    <div class="col-md-6 offset-md-1">
      <h5 class="mb-3" style="margin-top: 10px">New User !! Sign Up</h5>
      <form role="form" id="stuRegForm">
        <div class="form-group" style="font-size: 16px; color: #000">
          <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold" style="padding-left: 5px;">Name</label>
          <small id="statusMsg1"></small>
          <input type="text" class="form-control pt-3 pb-3" placeholder="Name" name="stuname" id="stuname" style="font-size: 14px; padding: 10px 3px"/>
        </div>
        <div class="form-group" style="font-size: 16px; color: #000">
          <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold" style="padding-left: 5px;">Email</label>
          <small id="statusMsg2"></small>
          <input type="email" class="form-control pt-3 pb-3" placeholder="Email" name="stuemail" id="stuemail" style="font-size: 14px; padding: 10px 3px"/>
          <span class="form-text">We'll never share your email with anyone else.</span>
        </div>
        <div class="form-group" style="font-size: 16px; color: #000">
          <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold" style="padding-left: 5px;">New Password</label>
          <small id="statusMsg3"></small>
          <input type="password" class="form-control pt-3 pb-3" placeholder="Password" name="stupass" id="stupass" style="font-size: 14px; padding: 10px 3px"/>
        </div>
        <button type="button" class="signinbutton" id="signup" onclick="addStu()" style="margin-top: 15px"> Sign Up
        </button>
      </form>
      <br />
      <small id="successMsg"></small>
    </div>
  </div>
</div>
<!-- Including Footer Starts -->
<?php
  include('./footer.php');
?>
<!-- Including Footer Ends -->
