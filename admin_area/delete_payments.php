<?php
if(isset($_GET['delete_payments'])){
    $payment_id = $_GET['delete_payments'];
    $delete_payments = "delete from `user_payments` where payment_id='$payment_id'";
    $result_payments=mysqli_query($con,$delete_payments);
    if($result_payments){
        echo "<script>alert('Successfully!')</script>";
        echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
} 
?>