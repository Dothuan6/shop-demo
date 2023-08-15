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
    <title>Admin Registration</title>
    <!-- css bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">

    <!-- font awaresome link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous"
     referrerpolicy="no-referrer" />
     <style>
        body{
            overflow: hidden;
        }
     </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5 ">
                <img src="../images/admin.png" alt="Admin" 
                class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
               <form action="" method="post">
                <div class="form-outline mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" 
                placeholder="Enter your name" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                <label for="admin_email" class="form-label">Email</label>
                <input type="text" id="admin_email" name="admin_email" 
                placeholder="Enter your email" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                <label for="admin_password" class="form-label">Password</label>
                <input type="password" id="admin_password" name="admin_password" 
                placeholder="Enter your password" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                <label for="admin_cfp" class="form-label">Confirm password</label>
                <input type="password" id="admin_cfp" name="admin_cfp" 
                placeholder="Confirm password" required="required" class="form-control">
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0"
                    name="admin_registration" value="Register">
                    <p class="small py-3 fw-bold mt-2 pt-1">Don't you have an account? 
                    <a href="admin_login.php" 
                    class="link-danger">Login</a></p>
                </div>
               </form> 
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['admin_registration'])){
    $username=$_POST['username'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $admin_password_hash=password_hash($admin_password,PASSWORD_DEFAULT);
    $admin_cfp=$_POST['admin_cfp'];
    
    $select_admin = "select * from `admin_table` where admin_email = '$admin_email' or admin_name='$username'";
    $result_admin = mysqli_query($con,$select_admin);
    $row_count = mysqli_num_rows($result_admin);
    if($row_count>0){
        echo "<script>alert('The admin is exits!')</script>";
    }else{
        if(empty($username) or empty($admin_email) or empty($admin_password)
         or empty($admin_cfp)){
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        }elseif($admin_password != $admin_cfp){
            echo "<script>alert('Please password and confirm password must be matched!')</script>";
            exit();
        }else{
            $insert_admin="insert into `admin_table` (admin_name,admin_email,admin_password)
            values ('$username','$admin_email','$admin_password_hash')";
            $result_query= mysqli_query($con,$insert_admin);
            if($result_query){
                echo "<script>alert('Successfully insert the admin!')</script>";
                echo "<script>window.open('admin_login.php','_self')</script>";
            }

        }
    }
}
?>