<h3 class="text-center py-2 text-success">All Orders</h3>
<table class="table table-bordered mt-5 text-center">
    <thead>
    <?php
        $get_orders="select * from `user_orders`";
        $result_orders=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result_orders);
        echo " <tr>
        <th  class='bg-info'>SL no</th>
        <th  class='bg-info'>Due Amount</th>
        <th  class='bg-info'>Invoice Number</th>
        <th  class='bg-info'>Total Products</th>
        <th  class='bg-info'>Order Date</th>
        <th  class='bg-info'>Status</th>
        <th  class='bg-info'>Delete</th>
        </tr>   </thead> <tbody>";

        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No order yet</h2>";
        }else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_orders)){
                $order_id=$row_data['order_id'];
                $user_id=$row_data['user_id'];
                $amount_due=$row_data['amount_due'];
                $invoice_number=$row_data['invoice_number'];
                $total_products=$row_data['total_products'];
                $order_date=$row_data['order_date'];
                $order_status=$row_data['order_status'];
                $number++;
                echo "
                <tr>
                 <td class='text-light bg-secondary'>$number</td>
                 <td class='text-light bg-secondary'>$amount_due</td>
                 <td class='text-light bg-secondary'>$invoice_number</td>
                 <td class='text-light bg-secondary'>$total_products</td>
                 <td class='text-light bg-secondary'>$order_date</td>
                 <td class='text-light bg-secondary'>$order_status</td>
                 <td  class='bg-secondary text-light'><a data-bs-toggle='modal' data-bs-target='#exampleModal' href='./index.php?delete_orders=$order_id'>
                <i class='fa-solid fa-trash text-light'></i></a></td>
                </tr>";
            }
        }
        ?>
    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <a class="text-decoration-none text-light" href="./index.php?list_orders">No</a></button>
        <button type="button" class="btn btn-primary">
            <a href="index.php?delete_orders=<?php echo $order_id ?>"
             class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>