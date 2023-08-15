

<?php
  include("./includes/connect.php");
  include_once('./functions/common_function.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page T&T</title>
        <link rel="stylesheet" href="style.css">
            <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">
        <style>         
.banner{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.40),rgba(0,0,0,0.40));
    background-position: center;
    background-size: center;
}
.navbar{
    width: 90%;
    padding: 30px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.logo{
    width: 35%;
    margin-top: -10px;
    cursor: pointer;
}
.navbar ul li{
    list-style: none;
    display: inline-block;
    margin: 20px;
}
.navbar ul li a{
    text-decoration: none;
    text-transform: uppercase;
    color: white;
    font-weight: 600;
    padding: 15px;
}
li a:hover{
    background: white;
    transition: 0.5s;
}
.navbar a:hover{
    color: black;
}
.content{
    width: 100%;
    position: absolute;
    color: white;
    top: 45%;
    transform: translateY(-50%);
    text-align: center;
}
.content h1{
    margin-top: 80px;
    font-size: 90px;
    font-weight: 800;
}
button{
    width: 200px;
    padding: 15px;
    margin: 20px 5px;
    text-align: center;
    border-radius: 25px;
    color: black;
    border: 2px;
    font-size: 20px;
    cursor: pointer;
    font-weight: 600;
}
button:hover{
    background: rgb(0, 192, 226);
    transition: 0.5s;
}
button:hover{
    color: white;
}
.banner video{
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: -1;
}
@media(min-aspect-ratio: 16/9){
    .banner video{
        width: 100%;
        height: auto;
    }
}
        </style>
    </head>
    <body>
        <div class="banner">
            <video autoplay loop muted plays-inline>
                <source src="./video/video_background.webm" type="video/mp4">
            </video>
            <div class="navbar">
                <a href="homepage.php"><img class="logo" src="./images/logo.png"></a>
            </div>
            <div class="content">
                <h1>T&T Shop</h1>
                <div>
                    
                <?php 
    if(isset($_GET['explore'])){
     echo "
     <div class='row'>
     <div class='col-lg-6 col-xl-4'>
     <form action='' method='post'>
    <div class='form-outline mb-4'>
     <a class='text-decoration-none' href='./admin_area/admin_login.php'>
     <input type='button' id='admin' name='admin' 
     class='form-control bg-info' value='Admin'></a>
    <div class='form-outline mb-4 py-2'>
      <a class='text-decoration-none' href='./users_area/user_login.php'>
      <input type='button' id='user' name='User' 
     class='form-control bg-info' value='User'></a>
    </div>
     </div>
      </form> 
     </div>
                ";
                }
?>
                </div>
            </div>
    </body>
</html>