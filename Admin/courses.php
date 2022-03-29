<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Courses');
define('PAGE', 'courses');
include('./adminInclude/adminheader.php');
include('../dbconnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
?>

    <div class="Content">
        <div class="heading">
            <p style="text-align: left">List Of Course</p>
        </div>
        <?php 
         $sql = "SELECT * FROM course";
         $result = $conn->query($sql);
         if($result->num_rows > 0){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Tutor</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()){ 
                echo '<tr>';
                //  echo '<th scope="row"></th>';
                    echo '<td scope="row">'.$row['course_id'].'</td>';
                    echo '<td scope="row">'.$row['course_name'].'</td>';
                    echo '<td scope="row">'.$row['course_author'].'</td>';
                    echo '<td scope="row" style="display:flex;">';
                        echo '
                      <form action="editcourse.php" method="POST" class="d-inline">
                       <input type="hidden" name="id" value='.$row["course_id"].'>
                        <button type="submit" class="penbtn" name="view" value="View">
                            <i class="fas fa-pen"></i>
                        </button>
                      </form>

                        <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["course_id"].'>
                          <button type="submit" class="trashbtn" name="delete" value="Delete">
                            <i class="far fa-trash-alt"></i>
                          </button>
                        </form>
                    </td>
                </tr>';
             } ?>
            </tbody>
        </table>
        <?php } else{
            echo "0 Result";
        } 
         
        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
            if($conn->query($sql) == TRUE){
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            } else {
                echo "Unable to Delete Data";
            }
        }
        
        
        ?>
    </div>

    <!-- Add Course Button Starts -->
    <div>
        <a class="box" href="addCourse.php"><i class="fas fa-plus fa-2x"></i></a>
    </div>
    <!-- Add Course Button Ends -->

<?php
include('./adminInclude/adminfooter.php'); 
?>