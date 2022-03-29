<!-- Including Header Starts -->
<?php
         include('./header.php');
         include('./dbconnection.php');
       ?>
    <!-- Including Header Ends -->

    <div class="container-fluid remove-marg">
        <div class="row vid-parent">
            <video muted autoplay loop>
                <source src="./video/banvid.mp4" type="video/mp4"> 
              </video>
            <div class="overlay"></div>
            <div class="vid-content">
                <h1>Courses</h1>
            </div>
        </div>
    </div>

    <!-- Course Section Starts -->

    <section class="course">
        <h1 class="heading">All Courses</h1>
        <div class="card-container">
            <?php 
                 $sql = "SELECT * FROM course ";
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
        </div>
    </section>

    <!-- Course Section Ends -->

    <!-- Including Footer Starts -->
    <?php
          include('./footer.php');
        ?>
        <!-- Including Footerr Ends -->