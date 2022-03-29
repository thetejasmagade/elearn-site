   <!-- Including Header Starts -->
       <?php
         include('./header.php');
         include('./dbConnection.php');

         $ORDER_ID = "";
	
         if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {
           $ORDER_ID = $_POST["ORDER_ID"];
         }

       ?>
   <!-- Including Header Ends -->


        <div class="container-fluid remove-marg d-print-none">
            <div class="row vid-parent">
              <video muted autoplay loop >
                <source src="./video/banvid.mp4" type="video/mp4"> 
              </video>
              <div class="overlay"></div>
              <div class="vid-content">
                <h1>Payment Status</h1>
              </div>
            </div>
        </div>
        
        <div class=" payment-container">
        <form action="" method="POST">
                <div class="payment-content d-print-none">
                  <label>Order ID:</label>
                  <input type="text" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>" >
                  <input type="submit" class="signinbutton" value="View" 	onclick="">
                </div>
            </form>
            </div>
            <div class="container d-print">
    <?php
      if (isset($_POST['ORDER_ID']))
      { 
        $sql = "SELECT order_id,amount,order_date,stu_email FROM courseorder";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
          if($_POST["ORDER_ID"] == $row["order_id"]){ ?>
            <div class="row justify-content-center" style="width:100%;margin-top:40px;margin-bottom: 30px;">
              <div class="col-auto" style="width:75% !important;font-size:16px;">
                <h2 class="text-center">Payment Receipt</h2>
                <table class="table table-bordered">
                  <tbody>
                      <tr >
                        <td><label>Order ID</label></td>
                        <td><?php if (isset($row["order_id"])) echo $row["order_id"] ?></td>
                      </tr>
                      <tr >
                        <td><label>Email</label></td>
                        <td><?php if (isset($row["order_id"])) echo $row["stu_email"] ?></td>
                      </tr>
                      <tr >
                        <td><label>Amount</label></td>
                        <td><?php if (isset($row["order_id"])) echo $row["amount"] ?></td>
                      </tr>
                      <tr >
                        <td><label>Order Date</label></td>
                        <td><?php if (isset($row["order_id"])) echo $row["order_date"] ?></td>
                      </tr>
                      <tr >
                        <td><label>Status</label></td>
                        <td>Success</td>
                      </tr>
                      <tr>
                        <td></td>
                          <td><button class="btn btn-primary d-print-none" onclick="javascript:window.print();">Print Receipt</button></td>
                      </tr>
                    </tbody>
                  </table>      
                </div>
              </div>
      <?php
      }
       }
        }
         ?>
      
      </div>

        </div>


   <!-- Including Footer Starts -->
        <?php
          include('./footer.php');
        ?>
  <!-- Including Footerr Ends -->

