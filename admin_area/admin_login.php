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
    <title>Admin Login</title>
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
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin.png" alt="Admin" 
                class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
               <form action="" method="post">
                <div class="form-outline mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" 
                placeholder="Enter your name" required="required" class="form-control">
                <div class="form-outline mb-4">
                <label for="admin_password" class="form-label mt-3">Password</label>
                <input type="password" id="admin_password" name="admin_password"
                placeholder="Enter your password" required="required" class="form-control">
                </div>
                <div>
                    <a class="link-danger small py-3 fw-bold mt-2 pt-1" href="">forgot password?</a><br>
                    <input type="submit" class="bg-info py-2 px-3 border-0 mt-3"
                    name="admin_login" value="Login">
                    <p class="small py-3 fw-bold mt-2 pt-1">Don't you have an account? 
                    <a href="admin_reg.php" 
                    class="link-danger">Register</a></p>
                </div>
               </form> 
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['admin_login'])){
    global $con;
    $admin_name = $_POST['username'];
    $admin_password = $_POST['admin_password'];
    $select_query="select * from `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    if($row_count>0){
        $_SESSION['admin_name'] = $admin_name;
        if(password_verify($admin_password,$row_data['admin_password'])){
            echo "<script>alert('Login Successfully')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }else{
            echo "<script>alert('Password Error!')</script>";
        }
    }else{
        echo "<script>alert('The admin account not registed yet!')</script>";        
    }
}
?>