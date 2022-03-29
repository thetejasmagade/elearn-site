       <!-- Including Header Starts -->
       <?php
         include('./header.php');
         include('./dbconnection.php');
         
       ?>
       <!-- Including Header Ends -->

               <!-- Home Section Start -->

               <section class="home">
                 
                 <h1>Welcome to <span><b>शाळा</b></span></h1>
                 <p>Learn and Implement</p>
                 <?php
                  if(!isset($_SESSION['is_login'])){
                    echo ' <a href="#"><button class="button" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Get Started</button></a>';
                  }
                  else{
                    echo ' <a href="./Student/studentProfile.php"><button class="myProfileBtn" >My Profile</button></a>';
                  }
                 ?>

                 <div class="shape">

                 </div>
                 
               </section>
               <!-- Home Section Ends -->

               <div class="container-fluid bottom-banner">
                 <div class="row bottom-banner-content">
                   <div class="col"><h5><i class="fas fa-users mr-5"></i>Expert Instructions</h5></div>
                   <div class="col"><h5><i class="fas fa-keyboard mr-5"></i>Lifetime Access</h5></div>
                   <div class="col"><h5><i class="fas fa-rupee-sign mr-5"></i>Money Back Guarantee</h5></div>
                 </div>
               </div>

               <!-- Course Section Starts -->
               
               <section class="course">
                 <h1 class="heading">Popular Courses</h1>
                 <div class="card-container">
                <?php 
                 $sql = "SELECT * FROM course LIMIT 3";
                 $result = $conn->query($sql);
                 if($result->num_rows > 0){
                   while($row = $result->fetch_assoc()){
                     $course_id = $row['course_id'];
                     echo'<div class="card">
                      <img src="'.str_replace('..','.',$row['course_img']).'">
                     <div class="card-content">
                      <h2>'.$row['course_name'].'</h2>
                      <p> '.$row['course_desc'].' </p>
                        <div class="card-footer">
                        <p>Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small> <span ><b>&#8377 '.$row['course_price'].'</b></span></p>
                        <a href="coursedetails.php?course_id='.$row['course_id'].'" class="card-button">Enroll</a>
                        </div>
                     </div>
                   </div>';
                   }
                 }
                ?>

                <?php 
                 $sql = "SELECT * FROM course LIMIT 3,3";
                 $result = $conn->query($sql);
                 if($result->num_rows > 0){
                   while($row = $result->fetch_assoc()){
                     $course_id = $row['course_id'];
                     echo'<div class="card">
                      <img src="'.str_replace('..','.',$row['course_img']).'">
                     <div class="card-content">
                      <h2>'.$row['course_name'].'</h2>
                      <p> '.$row['course_desc'].' </p>
                        <div class="card-footer">
                        <p>Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small> <span ><b>&#8377 '.$row['course_price'].'</b></span></p>
                        <a href="coursedetails.php?course_id='.$row['course_id'].'" class="card-button">Enroll</a>
                        </div>
                     </div>
                   </div>';
                   }
                 }
                ?>
                   
                 <div class="course-btn"><a href="course.php">View All Courses</a></div>

               </section>

               <!-- Course Section Ends -->

               <!---Teacher Section Starts-->
               
              <section class="teacher">
                <h1 class="heading">Our Expert Teachers</h1>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem culpa tempora animi obcaecati impedit neque! Corporis quisquam accusantium totam odio.</p>

              </section> 

               <!---Teacher Section Ends-->

               <!-- Contact Us Section Starts -->
 
                <div class="contact" id="Contact">
    <div class="content">
        <h1>Contact Us</h1>
        <p>We would love to hear from you</p>
    </div>
    <div class="contact-container">
        <div class="contactInfo">
            <div class="box">
                <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
                <div class="text">
                    <h2>Address</h2>
                    <p>Khalapur, HOC Colony Rd, Taluka, Rasayani, Maharashtra 410207</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="fa fa-phone"></i></div>
                <div class="text">
                    <h2>Phone</h2>
                    <p>02192254151</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="fa fa-envelope"></i></div>
                <div class="text">
                    <h2>E-Mail</h2>
                    <p>phcetstudentportal.mes.ac.in</p>
                </div>
            </div>
        </div>
        <div class="contactForm">
            <h1>Send Message</h1>
            <form action="" method="post">
                <div class="input-box">
                    <input type="text" name="name" />
                    <span>Name</span>
                </div>
                <div class="input-box">
                    <input type="text" name="subject" />
                    <span>Subject</span>
                </div>
                <div class="input-box">
                    <input type="email" name="email" />
                    <span>E-Mail</span>
                </div>
                <div class="input-box">
                    <input type="number" name="number" />
                    <span>Phone No.</span>
                </div>
                <div class="input-box">
                    <textarea name="message"></textarea>
                    <span>Type Your Message Here....</span>
                </div>
                <div class="input-box">
                    <input type="submit" class="signinbutton" name="submit" value="Send" />
                </div>
            </form>
        </div>
    </div>
</div>

               <!-- Contact Us Section Ends -->


               

              <!-- Feedback Section Starts -->
 
      <!-- <div class="container-fluid " style="background-color: #000;padding-top:20px;" id="Feedback">
        <h1 class="text-center testyheading p-4" style="color:antiquewhite;"> Student's Feedback </h1>
        <div class="row" style="margin-top: 70px;">
          <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
            <?php 
              $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                  $s_img = $row['stu_img'];
                  $n_img = str_replace('../','',$s_img)
            ?>
              <div class="testimonial">
                <p class="description" style="border-left: 3px solid #09c6f9;">
                <?php echo $row['f_content'];?>  
                </p>
                <div class="pic" style="border: 3px solid #09c6f9;">
                  <img src="<?php echo $n_img; ?>" alt=""/>
                </div>
                <div class="testimonial-prof">
                  <h4><?php echo $row['stu_name']; ?></h4>
                  <small ><?php echo $row['stu_occ']; ?></small>
                </div>
              </div>
              <?php }} ?>
            </div>
          </div>
        </div>
      </div>   -->
              <!-- Feedback Section Ends -->


              
               <!--Follow Section Starts-->

               <div class="follow-container">
                <h1>Follow Us On</h1>

                <div class="follow-icons">
                  <a href="https://www.facebook.com/pillaihoccollege/" target="_blank"><i class="fab fa-facebook"></i></a>
                  <a href="https://www.instagram.com/pillaihoccollege/" target="_blank"><i class="fab fa-instagram"></i></a>
                  <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                  <a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.snapchat.com/" target="_blank"><i class="fab fa-snapchat-ghost"></i></a>
                </div>
              </div>

              <!-- Follow Section Ends -->

        <!-- FOOTER SECTION STARTS -->

        
       <!-- Including Footer Starts -->
        <?php
          include('./footer.php');
        ?>
       <!-- Including Footerr Ends -->

