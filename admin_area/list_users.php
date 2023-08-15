<h3 class="text-center text-success py-2">All Users</h3>
<table class="table table-bordered mt-5">
<?php
echo"
    <thead>
        <tr>
            <th class='bg-info text-center'>Sl no</th>
            <th class='bg-info text-center'>Username</th>
            <th class='bg-info text-center'>User email</th>
            <th class='bg-info text-center'>User image</th>
            <th class='bg-info text-center'>User address</th>
            <th class='bg-info text-center'>User mobile</th>
            <th class='bg-info text-center'>Delete</th>
        </tr>
    </thead>
    <tbody>";
        
         $get_users="select * from `user_table`";
         $result_users=mysqli_query($con,$get_users);
         $number=0;
        $row_count=mysqli_num_rows($result_users);
        if($row_count==0){
            echo "<script>alert('don't have user')</script>";
        }else{
            while($row_data=mysqli_fetch_assoc($result_users)){
                $user_id = $row_data['user_id'];
                $usernamer=$row_data['username'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $number++;
            echo "<tr>
            <td class='text-center text-light bg-secondary'>$number</td>
            <td class='text-center text-light bg-secondary'>$usernamer</td>
            <td class='text-center text-light bg-secondary'>$user_email</td>
            <td  class='bg-secondary text-light'><img src='../users_area/user_images/$user_image' class='user_images'></td>
            <td class='text-center text-light bg-secondary'>$user_address</td>
            <td class='text-center text-light bg-secondary'>$user_mobile</td>
            <td  class='bg-secondary text-light text-center'><a data-bs-toggle='modal' data-bs-target='#exampleModal' 
            href='./index.php?delete_users=$user_id'>
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
          <a class="text-decoration-none text-light" href="./index.php?list_users">No</a></button>
        <button type="button" class="btn btn-primary">
            <a href="./index.php?delete_users=<?php echo $user_id ?>"
             class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>