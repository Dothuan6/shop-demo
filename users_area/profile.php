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
    <title>Welcome <?php echo $_SESSION['username']; ?></title>
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
     <link rel="stylesheet" href="../style.css">
     <style>
  .cart_img{
    width: 80px;
    height: 80px;
    object-fit: contain;
}
.profile_img{
    width: 50%;
    height: 60%;
    margin: auto;
    display: block;
    object-fit: contain;
}
.edit_image{
  width: 150px;
  height: 50px;
  object-fit: contain;
}
body{
  overflow-x: hidden;
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
        <a class='nav-link active' aria-current='page' href='../index.php'>Home</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='../display_all.php'>Products</a>
      </li>
      <?php 
        if(isset($_SESSION['username'])){
        echo "<li class='nav-item'>
          <a class='nav-link' href='profile.php'>My Account</a>
        </li>";
      }else{
        echo "  <li class='nav-item'>
        <a class='nav-link' href='user_reg.php'>Register</a>
      </li>";
      }
        ?>
      <li class='nav-item'>
        <a class='nav-link' href='#'>Contact</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='../cart.php'><i class='fa-solid fa-cart-shopping'></i><sup><?php cart_item()?><sup></a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='#'>Total Price: <?php total_price() ?></a>
      </li>
      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <input type="submit" value="Seach" name="search_data_product" class="btn btn-outline-light">
      </form>
    </div>
  </div>
</nav>
<?php
add_cart();
?>
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
    <a class='nav-link' href='profile.php'>Welcome ".$_SESSION['username']."</a>
  </li>"; 
  }
  if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='user_login.php'>Login</a>
  </li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='user_logout.php'>Logout</a>
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

<!-- fourth  -->
<div class="row">
  <div class="col-md-2 bg-secondary p-0">
    <!-- sidenav -->
  <ul class="navbar-nav me-auto text-center" style="height: 100vh;"> 
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light "><h4>Your Profile</h4></a>
      </li>

      <?php
      $username=$_SESSION['username'];
      $user_image="select * from `user_table` where username ='$username'";
      $user_image=mysqli_query($con,$user_image);
      $row_image=mysqli_fetch_array($user_image);
      $user_image=$row_image['user_image'];
      echo "<li class='nav-item'>
          <img src='./user_images/$user_image' class='profile_img my-2'>
        </li>";
      ?>

      <li class="nav-item">
          <a href='profile.php' class="nav-link text-light ">Pending Orders</a>
        </li>
        <li class="nav-item">
          <a href='profile.php?edit_account' class="nav-link text-light ">Edit Accounts</a>
        </li>
        <li class="nav-item">
          <a href='profile.php?my_orders' class="nav-link text-light ">My Orders</a>
        </li>
        <li class="nav-item">
          <a href='profile.php?delete_account' class="nav-link text-light ">Delete Account</a>
        </li>
        <li class="nav-item">
          <a href='user_logout.php' class="nav-link text-light ">Logout</a>
        </li>
  </ul>
  </div>
  <div class="col-md-10 text-center">
    <?php
    get_user_oder_details(); 
    if(isset($_GET['edit_account'])){
      include('edit_account.php');
    }
    if(isset($_GET['my_orders'])){
      include('user_orders.php');
    }if(isset($_GET['delete_account'])){
      include('delete_account.php');
    }
    ?>
  </div>
  <!-- include footer -->
  <?php 
  include('../includes/footer.php');
  ?>
</div>

<!-- js link bstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>

</body>
</html>