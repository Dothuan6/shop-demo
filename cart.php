<?php
  include("./includes/connect.php");
  include_once('./functions/common_function.php');
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
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
     <style>
  .cart_img{
    width: 80px;
    height: 80px;
    object-fit: contain;
    
}

</style>
</head>
<body>
    <!-- navbar-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img class="logo" src="/TRANXINH/images/Logo.jpg">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
     data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
     aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='index.php'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='display_all.php'>Products</a>
        </li>
        <?php 
        if(isset($_SESSION['username'])){
        echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
        </li>";
      }else{
        echo "  <li class='nav-item'>
        <a class='nav-link' href='./users_area/user_reg.php'>Register</a>
      </li>";
      }
        ?>
        <li class='nav-item'>
          <a class='nav-link' href='#'>Contact</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='cart.php'><i class='fa-solid fa-cart-shopping'></i><sup><?php cart_item() ?></sup></a>
        </li>
        </ul>
    </div>
  </div>
</nav>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <?php
  if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='index.php'>Welcome Guest</a>
  </li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
  </li>";
  }
  if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
  </li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/user_logout.php'>Logout</a>
  </li>";
  }

?>
  </ul>
</nav> 

<!-- third child -->
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">Communications is....</p>
</div>
<!-- fourth child-table -->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered">
            <thead>
                 <tr class="text-center">
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                 </tr>
                 <tbody>
                    <?php
                     show_cart();
                    remove_cart_item();
                     ?>
                 </tbody>
            </thead>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-5"><h4 class="px3">Subtotal:<strong class="text-info"><?php subtotal()?></strong></h4>
        <button class="mx-2 bg-info py-2 px-3 border-0"> <a href="index.php" class="text-dark" style="text-decoration: none;">Continue Shopping</a></button>
        <button class="mx-2 bg-secondary py-2 px-3 border-0"> <a href="./users_area/checkout.php" class="text-light" style="text-decoration: none;">Checkout</a></button>

    </div>
    </div>
</div>
</form>


  <?php 
  include('./includes/footer.php');
  ?>
</div>

<!-- js link bstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>

</body>
</html>