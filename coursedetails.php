   <!-- Including Header Starts -->
   <?php
         include('./header.php');
         include('./dbconnection.php');
       ?>
   <!-- Including Header Ends -->


        <div class="container-fluid remove-marg">
            <div class="row vid-parent">
              <video muted autoplay loop >
                <source src="./video/banvid.mp4" type="video/mp4"> 
              </video>
              <div class="overlay"></div>
              <div class="vid-content">
        <?php 
         if(isset($_GET['course_id'])){
             $course_id = $_GET['course_id'];
             $_SESSION['course_id'] = $course_id;
             $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
             $result = $conn->query($sql);
             $row = $result->fetch_assoc();
         }
        ?>                 
                <h1><?php echo $row['course_name'] ?></h1>
              </div>
            </div>
        </div>

        <!-- Start Main Content -->
        <?php 
         if(isset($_GET['course_id'])){
             $course_id = $_GET['course_id'];
             $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
             $result = $conn->query($sql);
             $row = $result->fetch_assoc();
         }
        ?>
       <div class="course1">
        <div class="coursedetail">
            <div class="row details">
                <div class=" img">
                    <img src="<?php echo str_replace('..','.',$row['course_img'])?>" >
                </div>
                <div class=" detailContent">
                    <div class="detail-card-body">
                        <h5 class="detail-card-title">Course Name: <?php echo $row['course_name'] ?></h5>
                        <p class="detail-card-text">Description: <?php echo $row['course_desc'] ?></p>
                        <p class="detail-card-text">Duration: <?php echo $row['course_duration'] ?></p>
                        <form action="checkout.php" method="POST">
                            <p class="detail-card-text ">
                                Price: <small><del>&#8377 <?php echo $row['course_original_price'] ?></del></small>
                                <span class="detail-price">&#8377 <?php echo $row['course_price'] ?></span>
                            </p>
                            <input type="hidden" name="id" value="<?php echo $row['course_price'] ?>">
                            <button type="submit" class="signinbutton" name="buy" >Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="detailsTable">
            <div class="courseontent">
                <table >
                    <thead>
                        <tr>
                            <th >Lesson No.</th>
                            <th >Lesson Name</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php 
                 $sql = "SELECT * FROM lesson";
                 $result = $conn->query($sql);
                 if($result->num_rows > 0){
                     $num = 0;
                     while($row = $result->fetch_assoc()){
                         if($course_id == $row['course_id']){
                             $num++;
                      echo '<tr>
                            <th >'.$num.'</th>
                            <td>'.$row['lesson_name'].'</td>
                        </tr>';
                        }
                     }
                 }
                ?>

                    </tbody>
                </table>
            </div>
        </div>
       </div>
        <!-- End Main Content -->
        
        


   <!-- Including Footer Starts -->
        <?php
          include('./footer.php');
        ?>
  <!-- Including Footer Ends -->