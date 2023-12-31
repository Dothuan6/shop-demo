<?php
  include_once("../includes/connect.php");
  include_once('../functions/common_function.php');
  @session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
<!-- css link bstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">
    
    <!-- font aware cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous"
     referrerpolicy="no-referrer" />

     <!-- css style link -->
     <link rel="stylesheet" href="./style.css">

</head>
<body>
    <?php
    $username = $_SESSION['username'];
    $get_user="select * from `user_table` where username='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    ?>
<h3 class="text-success">All My Orders</h3>
    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th  class="bg-info">Sl no</th>
            <th  class="bg-info">Order number Due</th>
            <th  class="bg-info">Total products</th>
            <th  class="bg-info">Invoice number</th>
            <th  class="bg-info">Date</th>
            <th class="bg-info">Complete/Incomplete</th>
            <th  class="bg-info">Status</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $number=0;
            $get_order_details = "select * from `user_orders` where user_id=$user_id";
            $result_orders=mysqli_query($con,$get_order_details);
            while($row_orders= mysqli_fetch_assoc($result_orders)){
                
                $order_id = $row_orders['order_id'];
                $amount_due=$row_orders['amount_due'];
                $total_products = $row_orders['total_products'];
                $invoice_number=$row_orders['invoice_number'];
                $order_status = $row_orders['order_status'];
                if($order_status=='pending'){
                    $order_status='Incomplete';
                }else{
                    $order_status='Complete';
                }
                $order_date = $row_orders['order_date'];
                $number += 1;
                echo "<tr>
                <td class='bg-secondary text-light'>$number</td>
                <td class='bg-secondary text-light'>$amount_due</td>
                <td class='bg-secondary text-light'>$total_products</td>
                <td class='bg-secondary text-light'>$invoice_number</td>
                <td class='bg-secondary text-light'>$order_date</td>
                <td class='bg-secondary text-light'>$order_status</td>";
                ?>
                <?php
                if($order_status=='Complete'){
                    echo "<td class='bg-secondary text-light'>Paid</td>";
                }else{
                  echo "<td class='bg-secondary text-light'>
                    <a class='text-light' href='confirm_payment.php?order_id=$order_id'>confirm</a></td>
                    </tr>";
                }
            }
             ?>
            
        </tbody>
    </table>
</body>
</html>