<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Students');
define('PAGE', 'students');
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
            <p style="text-align:left;">List Of Students</p>
        </div>
        <?php 
         $sql = "SELECT * FROM student";
         $result = $conn->query($sql);
         if($result->num_rows > 0){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()){ 
                echo '<tr>';
                //  echo '<th scope="row"></th>';
                    echo '<td scope="row">'.$row['stu_id'].'</td>';
                    echo '<td scope="row">'.$row['stu_name'].'</td>';
                    echo '<td scope="row">'.$row['stu_email'].'</td>';
                    echo '<td scope="row" style="display:flex;">';
                        echo '
                      <form action="editstudents.php" method="POST" class="d-inline">
                       <input type="hidden" name="id" value='.$row["stu_id"].'>
                        <button type="submit" class="penbtn" name="view" value="View">
                            <i class="fas fa-pen"></i>
                        </button>
                      </form>

                        <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["stu_id"].'>
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
            $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
            if($conn->query($sql) == TRUE){
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            } else {
                echo "Unable to Delete Data";
            }
        }
        
        
        ?>
    </div>

    <?php
include('./adminInclude/adminfooter.php'); 
?>