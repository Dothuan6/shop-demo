<h3 class="text-success mb-4 mt-5">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" class="form-control btn btn-outline-dark" name="delete" value="Delete account">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" class="form-control btn btn-outline-dark" name="dont_delete" value="Don't delete account">
        </div>
    </form>
<?php
if(isset($_POST['delete'])){
       $username=$_SESSION['username'];
        $delete_query = "Delete from `user_table` where username='$username'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('An account have been deleted!')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }  
    if(isset($_POST['dont_delete'])){
            echo "<script>window.open('profile.php','_self')</script>";
      }
?>