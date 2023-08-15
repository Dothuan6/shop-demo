<?php
    if(isset($_GET['delete_orders'])){
        $order_id = $_GET['delete_orders'];
        $delete_orders="delete from `user_orders` where order_id='$order_id'";
        $result_orders=mysqli_query($con,$delete_orders);
        if($result_orders){
            echo "<script>alert('deleted successfully!')</script>";
            echo "<script>window.open('./index.php?list_orders','_self')</script>";
        }
    }
?>