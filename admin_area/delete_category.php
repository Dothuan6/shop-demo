<?php
if(isset($_GET['delete_category'])){
    $get_category_id=$_GET['delete_category'];
    $delete_category="delete from `categories` where category_id = '$get_category_id'";
    $result_delete_category=mysqli_query($con,$delete_category);
    if($result_delete_category){
        echo "<script>alert('successfully')</script>";
        echo "<script>window.open('./index.php?view_category','_self')</script>";
    }
}
 ?>
