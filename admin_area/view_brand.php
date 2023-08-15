
<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5 text-center">
    <thead>
        <tr>
            <th class="bg-info">Sl no</th>
            <th class="bg-info">Brand Title</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $get_products="select * from `brands`";
        $result = mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $number++;      
            $brand_title=$row['brand_title'];
            $brand_id=$row['brand_id'];
            echo "<tr><td class='bg-secondary text-light'>$number</td>
            <td  class='bg-secondary text-light'>$brand_title</td>
            <td  class='bg-secondary text-light text-center'><a class='text-light' 
            href='index.php?edit_brand=$brand_id'><i class='fa-solid
            fa-pen-to-square'></i></a></td>
            <td  class='bg-secondary text-light'><a
             href='index.php?delete_brand=$brand_id' 
             type='button' class='btn text-light' 
data-bs-toggle='modal' data-bs-target='#exampleModal'>
             <i class='fa-solid fa-trash'></i></a></td>
            </tr>";
        }
    ?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <a class="text-decoration-none text-light" href="./index.php?view_brand">No</a></button>
        <button type="button" class="btn btn-primary">
            <a href="index.php?delete_brand=<?php echo $brand_id ?>"
             class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>