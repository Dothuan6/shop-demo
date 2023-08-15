<h3 class="text-center text-success py-2">All Payments</h3>
<table class="table table-bordered mt-5">
<?php
echo"
    <thead>
        <tr>
            <th class='bg-info text-center'>Sl no</th>
            <th class='bg-info text-center'>Invoice numbers</th>
            <th class='bg-info text-center'>Amount</th>
            <th class='bg-info text-center'>Payment mode</th>
            <th class='bg-info text-center'>Order date</th>
            <th class='bg-info text-center'>Delete</th>
        </tr>
    </thead>
    <tbody>";
        
         $get_payments="select * from `user_payments`";
         $result_payments=mysqli_query($con,$get_payments);
         $number=0;
        $row_count=mysqli_num_rows($result_payments);
        if($row_count==0){
            echo "<script>alert('don't have payments yet')</script>";
        }else{
            while($row_data=mysqli_fetch_assoc($result_payments)){
                $payment_id = $row_data['payment_id'];
                $invoice_number=$row_data['invoice_number'];
                $amount=$row_data['amount'];
                $payment_mode=$row_data['payment_mode'];
                $payment_date=$row_data['date'];
                $number++;
            echo "<tr>
            <td class='text-center text-light bg-secondary'>$number</td>
            <td class='text-center text-light bg-secondary'>$invoice_number</td>
            <td class='text-center text-light bg-secondary'>$amount</td>
            <td class='text-center text-light bg-secondary'>$payment_mode</td>
            <td class='text-center text-light bg-secondary'>$payment_date</td>
            <td  class='bg-secondary text-light text-center'><a data-bs-toggle='modal' data-bs-target='#exampleModal' 
            href='./index.php?delete_payments=$payment_id'>
            <i class='fa-solid fa-trash text-light'></i></a></td>
        </tr></tbody>";
               
        }
    }
?>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <a class="text-decoration-none text-light" href="./index.php?list_payments">No</a></button>
        <button type="button" class="btn btn-primary">
            <a href="./index.php?delete_payments=<?php echo $payment_id ?>"
             class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>