<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('./adminInclude/adminheader.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
   } else {
    echo "<script> location.href='../index.php'; </script>";
   }
  $sql = "SELECT * FROM course";
  $result = $conn->query($sql);
  $totalcourse = $result->num_rows;
  
   $sql = "SELECT * FROM student";
   $result = $conn->query($sql);
   $totalstu = $result->num_rows;
  
   $sql = "SELECT * FROM courseorder";
   $result = $conn->query($sql);
   $totalsold = $result->num_rows;
?>

<div class="sideContent">
    <div class="cardContent">
        <div class="adminCard">
            <div class="cardheading">Courses</div>
            <hr>
            <div class="cardBody">
                <h4><?php echo $totalcourse; ?></h4>
                <a href="courses.php" class="view">View</a>
            </div>
        </div>

        <div class="adminCard">
            <div class="cardheading">Students</div>
            <div class="cardBody">
                <h4><?php echo $totalstu; ?></h4>
                <a href="students.php" class="view">View</a>
            </div>
        </div>

        <div class="adminCard">
            <div class="cardheading">Sell</div>
            <div class="cardBody">
                <h4><?php echo $totalsold; ?></h4>
                <a href="sellReport.php" class="view">View</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="tableContent">
    <div class="heading">
        <p style="text-align: center;overflow:hidden">Course Ordered</p>
    </div>
    <?php
      $sql = "SELECT * FROM courseorder";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
    echo '<table class="table">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Course ID</th>
                <th scope="col">Student Email</th>
                <th scope="col">Order Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';
        while($row = $result->fetch_assoc()){
         echo '<tr>';
            echo '<th scope="row">'.$row["order_id"].'</th>';
            echo '<td>'. $row["course_id"].'</td>';
            echo '<td>'.$row["stu_email"].'</td>';
            echo '<td>'.$row["order_date"].'</td>';
            echo '<td>'.$row["amount"].'</td>';
            echo '<td><form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["co_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>';
            echo '</tr>';
          }
        echo '</tbody>
        </table>';
} else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM courseorder WHERE co_id = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
   }
  ?>
</div>
<!-- Admin SideBar Section Ends -->

<?php
include('./adminInclude/adminfooter.php'); 
?>