<!-- //   include_once("../includes/connect.php");
//   include_once('../functions/common_function.php');
//   @session_start();
//  -->
<!-- <h2 class="text-center mt-5 text-success">Deleting Account</h2>
<form action="" method="post">
    <input name="delete_account" type="submit" value="Delete account" class=" w-50 m-auto btn btn-outline-dark mt-4">
    <input name="dont_delete_account" type="submit" value="Don't delete account" class="mb-3 w-50 m-auto btn btn-outline-dark mt-4">
</form>

    // if(isset($_POST['dont_delete_account'])){
    //     echo "<script>window.open('profile.php','_self')</script>";
    //     }
    // if(isset($_POST['delete_account'])){
    //     $username=$_SESSION['username'];
    //     $delete_account = "Delete from `user_table` where username='$username'";
    //     $result=mysqli_query($con,$delete_account);
    //     if($result){
    //         echo "<script>alert('An account have been deleted!')</script>";
    //         echo "<script>window.open('user_login.php','_self')</script>";
    //     }
    // } -->

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