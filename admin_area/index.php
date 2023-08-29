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
    <title>Admin</title>
    <!-- css bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">

    <!-- font awaresome link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous"
     referrerpolicy="no-referrer" />

    <!-- link css -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .product_images{
            width: 15%;
            object-fit: contain;
        }
        .edit_image{
            width: 10%;
            border-radius: 20%;
            margin-left: 2%;
        }
        .user_images{
            width:100px;
            height: 70px;
            object-fit: contain;
        }
        .img{
            width: 10%;
        }
        .admin_image{
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- firth -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img class='logo' src='../images/Logo.jpg'>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php 
                            if(isset($_SESSION['admin_name'])){
                            echo "<a href='./index.php' class='nav-link'>Welcome {$_SESSION['admin_name']}</a>"; 
                            }else{
                            echo "<a href='./index.php' class='nav-link'>Welcome Guest</a>"; 
                            }
                            ?>
                        </li>

                    </ul>
                 
                </nav>
            </div>
        </nav>
        <!-- second -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>
    <!-- third -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-4">
                <a href="./index.php"><img src="../images/admin.png" class="admin_image"></a>
                <?php
                if(isset($_SESSION['admin_name'])){
                    echo "<p class='text-light text-center'>{$_SESSION['admin_name']}</p>";
                }else{
                    echo "<p class='text-light text-center'>Admin name</p>";

                }
                 ?>
            </div>
            <div class="button text-center">
                <button><a href="insert_products.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button><a href="index.php?view_category" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                <button><a href="index.php?view_brand" class="nav-link text-light bg-info my-1">View Brands</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
                <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
                <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                <button><a href="../homepage.php?logout" class="nav-link text-light bg-info my-1">LogOut</a></button>
            </div>
        </div>
    </div>

        <!-- fourth -->

        <div class="container my-3">
            <?php
            if(isset($_GET["insert_category"])){
                include("insert_categories.php");
            }if(isset($_GET["insert_brands"])){
                include("insert_brands.php");
            }if(isset($_GET['view_products'])){
                include("view_products.php");
            }if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }if(isset($_GET['view_category'])){
                include('view_category.php');
            }if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }if(isset($_GET['view_brand'])){
                include('view_brand.php');
            }if(isset($_GET['edit_brand'])){
                include('edit_brand.php');
            }if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }if(isset($_GET['delete_brand'])){
                include('delete_brand.php');
            }if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }if(isset($_GET['delete_products'])){
                include('delete_product.php');
            }if(isset($_GET['delete_orders'])){
                include('delete_orders.php');
            }if(isset($_GET['delete_payments'])){
                include('delete_payments.php');
            }if(isset($_GET['list_users'])){
                include('list_users.php');
            }if(isset($_GET['delete_users'])){
                include('delete_users.php');
            }if(isset($_GET['logout'])){
                include('admin_logout.php');
            }
            ?>
        </div>

        <div class='bg-info p-3 text-center'>
        <p>All Rights Reserved © Designed by Thuan-2023</p>
    </div>
    </div>
<!-- js bstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>