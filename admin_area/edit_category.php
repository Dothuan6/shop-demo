
<?php
if(isset($_GET['edit_category'])){
    $category_id=$_GET['edit_category'];
    $select_category="select * from `categories` where category_id='$category_id'";
    $result_category = mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
} 
?>

<div class="container mt-2">
<h3 class="text-center text-success py-2">Edit Category</h3>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-outline w-50 m-auto py-2 text-center">
            <lable for="category_title" class="form-label">Category Title</lable>
            <input value="<?php echo $category_title ?>" type="text" id="category_title" name="category_title" class="form-control mt-2 w-50 m-auto" required="required">
        </div>
        <div class="w-50 m-auto text-center">
            <input type="submit" name="edit_category" value="Update category" class="btn btn-info mb-3 px-3 mt-3">
        </div>
</form>
</div>
<?php
if(isset($_POST['edit_category'])){
    $get_category_tt=$_POST['category_title'];
    $get_category_id=$_GET['edit_category'];
    $update_category="update `categories` set 
    category_title='$get_category_tt' where category_id = '$get_category_id'";
    $result_category_tt=mysqli_query($con,$update_category);
    if($result_category_tt){
        echo "<script>alert('Successfully update!')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>
