<?php
include('../includes/connect.php');
include_once('../functions/common_function.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">
    
    <!-- font aware cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous"
     referrerpolicy="no-referrer" />

     <!-- css style link -->
     <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!-- username field -->
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" class="form-control" 
                        id="user_username" placeholder="Enter your Username"
                        autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="text" class="form-control" 
                        id="user_email" placeholder="Enter your Email"
                        autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- image field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" class="form-control" 
                        id="user_image" placeholder="Enter your Image"
                        autocomplete="off" required="required" name="user_image">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- password field -->
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control" 
                        id="user_password" placeholder="Enter your Password"
                        autocomplete="off" required="required" name="user_password">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- confirm password field -->
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" 
                        id="conf_user_password" placeholder="Confirm password"
                        autocomplete="off" required="required" name="conf_user_password">
                    </div>
                     <!-- address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" class="form-control" 
                        id="user_address" placeholder="Enter your address"
                        autocomplete="off" required="required" name="user_address">
                    </div>
                       <!-- contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" 
                        id="user_contact" placeholder="Enter your phone"
                        autocomplete="off" required="required" name="user_contact">
                    </div>
                    <!--  -->
                <input class="btn btn-info mb-3 px-3" type="submit" name="Register" id="Register" value="Register">
                <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <strong><a class="text-danger" href="./checkout.php"> Login</a></strong></p>
                </form>
            </div>
        </div>
    </div>
    <?php

    if(isset($_POST['Register'])){
        global $con;
        $user_username = $_POST['user_username'];
        $email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
        $conf_user_password= $_POST['conf_user_password'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_ip=getIPAddress();
        
        //accessing images
        $user_image = $_FILES['user_image']['name'];
    
        //accessing image tmp name
        $temp_image = $_FILES['user_image']['tmp_name'];
    //select_query
    $select_query = "select * from `user_table` where username='$user_username' or user_email='$email' ";
    $result = mysqli_query($con,$select_query);
    $row_count = mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Username or Email already exits')</script>";
    }else{
     //checking empty
        if(empty($user_username) or empty($email) or empty($user_password) or 
        empty($conf_user_password) or empty($user_address) or empty($user_contact) or
        empty($user_image)){
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        }else if($user_password != $conf_user_password){
            echo "<script>alert('Please password and confirm password must be matched!')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image,"./user_images/$user_image");

         //insert query
            $insert_user = "insert into `user_table` (username,
            user_email,user_password,
            user_image,user_ip,
            user_address,user_mobile) values ('$user_username','$email',
            '$hash_password',
            '$user_image',
            '$user_ip',
            '$user_address',
            '$user_contact')";
             $result_query = mysqli_query($con,$insert_user);
            if($result_query){
                echo "<script>alert('Successfully insert the user!')</script>";
                echo "<script>window.open('user_login.php','_self')</script>";
            }
        }
        // Selecting cart items
        $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
        $result_cart = mysqli_query($con,$select_cart_items);
        $rows_count = mysqli_num_rows($result_cart);
        if($row_count>0){
            $_SESSION['username'] = $user_username;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
}
    ?>
</body>
</html>