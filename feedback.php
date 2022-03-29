<?php
include('./header.php');
include('./dbconnection.php');

?>

    <div class="container-fluid remove-marg">
        <div class="row vid-parent">
            <video muted autoplay loop>
                <source src="./video/banvid.mp4" type="video/mp4"> 
              </video>
            <div class="overlay"></div>
            <div class="vid-content">
                <h1>Feedback</h1>
            </div>
        </div>
    </div>
        <?php 
         $sql = "SELECT * FROM feedback";
         $result = $conn->query($sql);
         if($result->num_rows > 0){
        ?>
        <table class="table" style="width:90%;margin:30px auto 100px;border: 1px solid #333;">
            <thead>
                <tr style="font-size: 16px; font-weight: 700; border: 1px solid #333; background:linear-gradient(237deg, #09c6f9, #045de9); color: white;">
                    <th scope="col" style="width: 250px;border: 1px solid #333;">Sr No.</th>
                    <th scope="col"style="width: 250px;border: 1px solid #333;">Student Name</th>
                    <th scope="col"style="width: 350px;border: 1px solid #333;">Feedback</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $num = 0;
                while($row = $result->fetch_assoc()){
                    $num++; 
                echo '<tr style="font-size: 14px;font-weight: normal;color: #333;border: 1px solid #333;">';
                //  echo '<th scope="row"></th>';
                    echo '<td scope="row" style="border: 1px solid #333;">'.$num.'</td>';
                    echo '<td scope="row" style="border: 1px solid #333;">'.$row['stu_name'].'</td>';
                    echo '<td scope="row" style="border: 1px solid #333;">'.$row['f_content'].'</td>';
                    echo '</tr>';
             } ?>
            </tbody>
        </table>
        <?php } else{
            echo "0 Result";
        } 
         
        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
            if($conn->query($sql) == TRUE){
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            } else {
                echo "Unable to Delete Data";
            }
        }
        
        
        ?>
    </div>


<?php
 include('./footer.php');
?>