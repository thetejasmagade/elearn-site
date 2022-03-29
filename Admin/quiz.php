<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Quiz');
define('PAGE', 'quiz');
include('./adminInclude/adminheader.php');
include('../dbconnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
?>


    <div class="Content" style="align-items: flex-start;">
        <form action="" class="mt-3 form-inline d-print-none">
            <div class="form-group mr-3" style="display: flex;justify-content: space-between;align-items: center;flex-direction: row;width: 100%;margin-left:15px">
                <label for="checkid">Enter Course ID:</label>
                <input type="text" class="form-control ml-3" id="checkid" name="checkid" style="margin: 0px 8px;">
                <input type="submit" class="btn btn-primary btn-lg" value="Search">
            </div>  
        </form>

        <?php
         $sql = "SELECT course_id FROM course";
         $result = $conn->query($sql);
         while($row = $result->fetch_assoc()){
             if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']){
                 $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
                 $result = $conn->query($sql);
                 $row = $result->fetch_assoc();
                 if(($row['course_id']) == $_REQUEST['checkid']){
                     $_SESSION['course_id'] = $row['course_id'];
                     $_SESSION['course_name'] = $row['course_name'];
                     ?>
                     <h3 class="mt-5 bg-dark text-white p-2" style="width: 100%;">Course ID: <?php if(isset($row['course_id'])) {echo $row['course_id'];} ?> Course Name: <?php if(isset($row['course_name'])) {echo $row['course_name'];} ?></h3>
                <?php   
                 $sql = "SELECT * FROM quiz WHERE course_id = {$_REQUEST['checkid']}";
                 $result = $conn->query($sql);
                 echo '<table class="table">
                        <thead>
                         <tr>
                          <th scope="col">Quiz ID</th>
                          <th scope="col">Quiz Link</th>
                          <th scope="col">Action</th>
                         </tr>
                        </thead>
                        <tbody>';
                        while($row = $result->fetch_assoc()){
                            echo '<tr>';
                            echo '<th scope="row">'.$row['quiz_id'].'</th>';
                            echo '<td scope="row">'.$row['quiz_link'].'</td>';
                            echo '<td>
                                   <form action="editquiz.php" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["quiz_id"].'>
                                    <button type="submit" class="penbtn" name="view" value="View">
                                     <i class="fas fa-pen"></i>
                                    </button>
                                   </form>

                                   <form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["quiz_id"].'>
                                    <button type="submit" class="trashbtn" name="delete" value="Delete">
                                     <i class="far fa-trash-alt"></i>
                                    </button>
                                   </form>                               
                                  </td>
                                  </tr>';
                        }
                        echo '</tbody>
                       </table>';
                 } else {
                         echo '<div class="alert alert-dark mt-4" role="alert">
                         Course Not Found ! </div>';
                        }
                        if(isset($_REQUEST['delete'])){
                         $sql = "DELETE FROM quiz WHERE quiz_id = {$_REQUEST['id']}";
                         if($conn->query($sql) === TRUE){
                         // echo "Record Deleted Successfully";
                         // below code will refresh the page after deleting the record
                         echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
                         } else {
                         echo "Unable to Delete Data";
                         } 
                       }
            }
         }
        ?>
        
        </table>

    </div>

    <!-- Add Course Button Starts -->
    <?php 
     if(isset($_SESSION['course_id'])){
    echo '<div>
        <a class="box" href="addquiz.php"><i class="fas fa-plus fa-2x"></i></a>
    </div>';      
     }
    ?>

    <!-- Add Course Button Ends -->

<?php
include('./adminInclude/adminfooter.php'); 
?>