<?php 
session_start();
include("includes/db.php");  
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casual store</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
  <style>


  </style>
 
</head>
<body>

<!-- header section starts  -->

<header>

<div class="header-1">

    <a href="index.php" class="logo" > <img src="website/all/logo.png" alt="Logo image" class="hidden-xs">  </a>
                               
<div class="col-md-6 offer">
    <a href="#" class="btn btn-sucess btn-sm">
          <?php

        if (!isset($_SESSION['customer_email'])){
        echo "Welcome Guest";
      }else{
      echo "Welcome: " .$_SESSION['customer_email'] . "";
    }


        ?>
    </a>
<a id="pr" href="#"> Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
</div>
  
</div>

<div class="header-2">
   

<nav class="navbar"> 


     <ul >
        
            <li><a  href="index.php">HOME</a></li>
            <li><a class="active" href="trimer.php">SHOP</a></li>
             <li><a href="contactus.php">CONTACT</a></li>
       <div class="col-md-6">
        <ul class="menu">
            <li>
                         <div class="collapse clearfix" id="search">
                             <form class="navbar-form" method="get" action="result.php">
                                 <div class="input-group">
                                     <input type="text" name="user_query" placeholder="search" class="form-control" required="">
                                     <button type="submit" value="search" name="search" class="btn btn-primary">
                                         <i class="fa fa-search"></i>
                                     </button>
                                 </div>
                             </form>
                         </div>
                   </li>



                <li>
                  <a href="cart.php" class="">
                    <i class="fa fa-shopping-cart"></i>
                      <span><?php item(); ?> items in cart</span>
                        </a>
                </li>
                   

                   <li>
                   <a  href="customer_registration.php"><i class="fa fa-user-plus"></i>Register</a></li>
                   <li>
                   <?php

                    if (!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>My Account</a>";

                         } else{
                    
                    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                
                         }

                    ?></li> 
                     
                   <li>
                   <a href="cart.php"><i class="fa fa-shopping-cart"></i>Goto Cart</a></li>
                    
                   <li>
                     <?php

                    if (!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>Login</a>";

                         } else{
                    
                    echo "<a href='logout.php'>Logout</a>";
                
                         }

                    ?></li>
             </ul>
       </div>
</ul>



</nav></div></header>

<!-- Header Section Ends -->

<!-- Content Section Starts -->
<div class="content">
    <div class="container">
        <h1>Search Results</h1>
        <div class="row">
            <?php
            if (isset($_GET['search'])) {
                $user_query = $_GET['user_query'];
                $get_products = "SELECT * FROM products WHERE product_keyword LIKE '%$user_query%'";
                $run_products = mysqli_query($con, $get_products);
                $count = mysqli_num_rows($run_products);

                if ($count == 0) {
                    echo "<h3>No products found matching your search!</h3>";
                } else {
                    while ($row = mysqli_fetch_array($run_products)) {
                        $pro_id = $row['product_id'];
                        $pro_title = $row['product_title'];
                        $pro_price = $row['product_price'];
                        $pro_img1 = $row['product_img1'];

                        echo "
                        <div class='col-md-4 col-sm-6 sing'>
                            <div class='prod'>
                                <a href='details.php?pro_id=$pro_id'>
                                    <img src='admin_area/product_images/$pro_img1' class='img-responsive' width='300' height='300'>
                                </a>
                                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                <p class='pric'>INR $pro_price</p>
                                <p class='buttons'>
                                    <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                    <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'></i> Add to Cart
                                    </a>
                                </p>
                            </div>
                        </div>";
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Content Section Ends -->

</body>
</html>