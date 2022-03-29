       <!-- Including Header Starts -->
       <?php
         include('./header.php');
       ?>
       <!-- Including Header Ends -->
    <div class="container-fluid remove-marg">
        <div class="row vid-parent">
            <video muted autoplay loop>
                <source src="./video/banvid.mp4" type="video/mp4"> 
              </video>
            <div class="overlay"></div>
            <div class="vid-content">
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>

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
                    <p>7710996253</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="fa fa-envelope"></i></div>
                <div class="text">
                    <h2>E-Mail</h2>
                    <p>bhushankhanavkar.100@gmail.com</p>
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

       <!-- Including Footer Starts -->
        <?php
          include('./footer.php');
        ?>
       <!-- Including Footerr Ends -->