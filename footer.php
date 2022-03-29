             <footer class="footer d-print-none">
                 <div class="row footer-container">
                   <div class="col about">
                     <h1><i class="fas fa-graduation-cap"></i>शाळा</h1>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae mollitia doloremque fugiat sit explicabo minus modi blanditiis quasi ducimus provident?</p>
                     <div class="social">
                       <a href="https://www.facebook.com/pillaihoccollege/" target="_blank"><i class="fab fa-facebook"></i></a>
                       <a href="https://www.instagram.com/pillaihoccollege/" target="_blank"><i class="fab fa-instagram"></i></a>
                       <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                       <a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                       <a href="https://www.snapchat.com/" target="_blank"><i class="fab fa-snapchat-ghost"></i></a>
                     </div>
                   </div>
                   <div class="col links">
                     <h3>Useful Links <div class="underline"><span></span></div></h3>
                     <ul>
                       <li><a href="./index.php">Home</a></li>
                       <li><a href="course.php">Courses</a></li>
                       <li><a href="paymentstatus.php">Payment Status</a></li>
                       <li><a href="#">Feedback</a></li>
                       <li><a href="contactus.php">Contact Us</a></li>
                     </ul>
                   </div>
                   <div class="col contactUs">
                     <h3>Find Us <div class="underline"><span></span></div></h3>
                     <table>
                       <tr>
                         <td><i class="fas fa-map-marker-alt"></i></td>
                         <td><p><a href="#">Khalapur, HOC Colony Rd, Taluka,<br> Rasayani, Maharashtra 410207</a></p></td>
                       </tr>
                       <tr>
                         <td><i class="fas fa-phone"></i></td>
                         <td><p><a href="tel:02192254151">02192254151</a></p></td>
                       </tr>
                       <tr>
                         <td><i class="fa fa-envelope"></i></td>
                         <td><p><a href="mailto: phcetstudentportal.mes.ac.in">phcetstudentportal.mes.ac.in</a></p></td>
                       </tr>
                     </table>
                    </div>
                 </div>
                 <hr>
                 <p class="copyright">PHCET Students © 2021 - All Rights Reserved</p>
               </footer>
               

              <!-- FOOTER SECTION ENDS -->
    <!-- Start Student Registration Modal -->
    <div class="modal fade" id="stuRegModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuRegModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="stuRegModalCenterTitle">Student Registration</h5>
            <button type="button" class="close btn-danger btn-lg" data-dismiss="modal" aria-label="Close" onclick="clearAllStuReg()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!--Start Form Registration-->
            <?php include('studentRegistration.php'); ?>
            <!-- End Form Registration -->
          </div>
          <div class="modal-footer">
            <span id="successMsg"></span>
            <button type="button" class="signinbutton" id="signup" onclick="addStu()">Sign Up</button>
            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" onclick="clearAllStuReg()">Close</button>
          </div>
        </div>
      </div>
    </div> <!-- End Student Registration Modal -->


    <!-- Start Student Login Modal -->
    <div class="modal fade" id="stuLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuLoginModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="stuLoginModalCenterTitle">Student Login</h5>
            <button type="button" class="close btn-danger btn-lg" data-dismiss="modal" aria-label="Close" onClick="clearStuLoginWithStatus()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form" id="stuLoginForm">
              <div class="form-group text-white">
                <i class="fas fa-envelope"></i><label for="stuLogEmail" class="pl-2 font-weight-bold">Email</label><small class="statusMsg" id="statusLogMsg1"></small><input type="email"
                    class="form-control" placeholder="Email" name="stuLogEmail" id="stuLogEmail" style="font-size:14px;padding:10px 3px;">
                </div>
                <div class="form-group text-white">
                  <i class="fas fa-key"></i><label for="stuLogPass" class="pl-2 font-weight-bold">Password</label><input type="password" class="form-control" placeholder="Password" name="stuLogPass" id="stuLogPass" style="font-size:14px;padding:10px 3px;">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <small id="statusLogMsg"></small>
            <button type="button" class="signinbutton" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" onClick="clearStuLoginWithStatus()">Cancel</button>
          </div>
        </div>
      </div>
    </div> <!-- End Student Login Modal -->





        <!-- testimonials js starts  -->
       

        <script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
          </script>
        <!-- testimonials js ends -->

        
        <!-- Jquery and Boostrap JavaScript -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Student Testimonial Owl Slider JS  -->
    <script type="text/javascript" src="./js/owl.min.js"></script>
    <script type="text/javascript" src="./js/testyslider.js"></script>

    <!-- Font Awesome JS -->
        <script type="text/javascript" src="js/all.min.js"></script>
        <script src="js/all.min.js"></script>

    <!-- Student Ajax Call JavaScript -->
        <script type="text/javascript" src="js/ajaxrequest.js"></script>
          
    </body>
</html>