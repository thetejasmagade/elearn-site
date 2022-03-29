<?php
$apiKey = 'rzp_test_EchFBIZseLqzC5';
?>


<form action="./paymentdone.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey; ?>" 
    data-amount="<?php echo $_POST['TXN_AMOUNT'] * 100 ?>"
    data-currency="INR"
    data-id="<?php echo $_POST['ORDER_ID']?>"
    data-buttontext="Pay with Razorpay"
    data-name="Shaala"
    data-description="Courses that adds a value in your resume"
    data-image="https://example.com/your_logo.jpg"
    data-prefill.name="Gaurav Kumar"
    data-prefill.email="<?php echo $_POST['CUST_ID']?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" name="TXN_AMOUNT" value="<?php echo $_POST['TXN_AMOUNT'] ?>">
<input type="hidden" name="CUST_ID" value="<?php echo $_POST['CUST_ID']?>">
<input type="hidden" name="ORDER_ID" value="<?php echo $_POST['ORDER_ID'] ?>">
</form>

<!--  -->