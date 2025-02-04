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
        <li>
            
            <li><a class="active" href="index.php">HOME</a></li>
             
            <li><a href="trimer.php">SHOP</a></li>
            <li><a href="#si">Stone Island</a></li>
            <li><a href="#adidas">Adidas</a></li>
            <li><a href="#nb">New Belance</a></li>
            <li><a href="#deal">DEAL</a></li>
            <li><a href="contactus.php">CONTACT</a></li>
            <li><a href="#footer">ABOUT</a></li>
 
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

                    ?>
                   </li> 

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
    
    
           
    
       
    
<!-- header section ends -->

<!-- home section starts  -->
<section class="home" id="home">

<h1 class="heading"> <span>PENAWARAN TERBAIK UNTUK ANDA</span> </h1>

<div class="slideshow-container">
<!-- dynamic hairstyle images section starts  -->

<?php
$get_slider="select * from slider LIMIT 0,1";
$run_slider= mysqli_query($con,$get_slider);
while ($row= mysqli_fetch_array($run_slider)) {
  $slider_name= $row['slider_name'];
  $slider_image= $row['slider_image'];
   $slider_url= $row['slider_url'];

  echo "<div class='mySlides fade'>
  <a href='$slider_url'><img src='admin_area/slider_images/$slider_image'  width='100%' height='100%'></a>

</div>
  ";
}

    ?>
<?php
$get_slider="select * from slider LIMIT 1,10";
$run_slider= mysqli_query($con,$get_slider);
while ($row= mysqli_fetch_array($run_slider)) {
  $slider_name= $row['slider_name'];
  $slider_image= $row['slider_image'];
   $slider_url= $row['slider_url'];
  echo "<div class='mySlides fade '>
  <a href='$slider_url'><img src='admin_area/slider_images/$slider_image' width='1400' height='400'></a>
        </div>";
}

    ?>


<!-- dynamic hairstyle images section End  -->

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div  style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
  

</div>



</section>




<!-- home section ends -->
<!-- new this week section start -->
<!-- hot start -->

<div class="hot">    
    <div class="box">
        <div class="container">
            <div class="col-md-121">
                <h2>Terbaru Minggu ini</h2>
           
          <!-- dynamic latest this week images section start  -->
          <div class=" col-sm-4" >
          <div class="row">
                   <?php

                   getPro();


                     ?>
 </div>
</div><!-- hot End -->
 </div>
         </div>
    </div>
</div>
          <!-- dynamic latest this week images section End  -->


                   
      


<!-- new this week section End -->


<!--saloon product section starts  -->

<!-- Trimer Start  -->
<!-- Trimer Start  -->
<section class="arrival" id="si">

<h1 class="heading"> <span>Stone Island</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=2"> <img src="website/all/si1.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=2"><h3>Bucket Hat</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>
<!-- Trimer End  -->
    
    <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=6">  <img src="website/all/si2.png" alt="" width="200"></a>
        </div>
        <div class="info">
          <a href="trimer.php?p_cat=6">  <h3>Bermuda Shorts</h3></a>
           
        </div>
        <div class="overlay">
        
        </div>
    </div>

    <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=6"> <img src="website/all/si3.png" alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=6"> <h3>Cargo Pants</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

    <div class="box">
        <div class="image">
            <a href="trimer.php?p_cat=4"><img src="website/all/si4.png" alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=4"><h3>Close Loop Hoodie</h3></a>
        
        </div>
        <div class="overlay">
    </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=4"> <img src="website/all/si6.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=4"><h3>Hooded Sweatshirt</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=4"> <img src="website/all/si11.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=4"><h3>Crewneck</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=4"> <img src="website/all/si12.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=4"><h3>Drill Overshirt</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=2"> <img src="website/all/si13.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=2"><h3>Wool Beanie</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=6"> <img src="website/all/si14.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=6"><h3>Closed Loop Pants</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>
    <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=2"> <img src="website/all/si15.png"  alt=""width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=2"><h3>Rep Hat</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=5"> <img src="website/all/si16.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=5"><h3>Tape Belt</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

    </div>
</section>


<!-- saloon products section ends -->
<!-- parlor products section starts -->
<section class="parlor" id="adidas">

<h1 class="heading"> <span>Adidas</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=2"> <img src="website/all/a1.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=2"><h3>100 THIEVES CAP</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>
<!-- Trimer End  -->
    
    <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=3">  <img src="website/all/a2.png" alt="" width="200"></a>
        </div>
        <div class="info">
          <a href="trimer.php?p_cat=3">  <h3>GAZELLE SHOES</h3></a>
           
        </div>
        <div class="overlay">
        
        </div>
    </div>

    <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=3"> <img src="website/all/a3.png" alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=3"> <h3>HAMBURG SHOES</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

    <div class="box">
        <div class="image">
            <a href="trimer.php?p_cat=3"><img src="website/all/a4.png" alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=3"><h3>SAMBA OG SHOES</h3></a>
        
        </div>
        <div class="overlay">
    </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=3"> <img src="website/all/a5.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=3"><h3>SEPATU R71</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=3"> <img src="website/all/a6.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=3"><h3>SEPATU HANDBALL SPEZIAL</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=4"> <img src="website/all/a7.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=4"><h3>KORN TRACK TOP</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>


    </div>
</section>
<!-- parlor products section ends -->
<!--garment section ends-->
<section class="use" id="nb">

<h1 class="heading"> <span>New Belance</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=4"> <img src="website/all/nb1.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=4"><h3>hoodie black</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>
<!-- Trimer End  -->
    
    <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=3">  <img src="website/all/nb2.png" alt="" width="200"></a>
        </div>
        <div class="info">
          <a href="trimer.php?p_cat=3">  <h3>sneakers shoes</h3></a>
           
        </div>
        <div class="overlay">
        
        </div>
    </div>

    <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=3"> <img src="website/all/nb3.png" alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=3"> <h3>men's sneakers shoes</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=1"> <img src="website/all/nb4.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=1"><h3>baju cewe</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=1"> <img src="website/all/nb5.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=1"><h3>baju cowo</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="trimer.php?p_cat=3"> <img src="website/all/nb6.png"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="trimer.php?p_cat=3"><h3>loop boys sneakers shoes</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

    </div>
</section>


<!-- gallery section ends -->

<!-- deal section starts  -->

<section class="deal" id="deal">

<h1 class="heading"> <span> BEST DEALS </span> </h1>


<div class="icons-container">

<?php

$get_boxes="select * from boxes_section";
$run_box=mysqli_query($con,$get_boxes);
while ($row=mysqli_fetch_array($run_box)) {
    $box_id=$row['box_id'];
    $box_title=$row['box_title'];
    $box_desc=$row['box_desc'];
    $box_icon=$row['box_icon'];
    


  ?>

    <div class="icons">
        <i class="<?php echo $box_icon; ?>"></i>
        <h3><?php echo $box_title ?></h3>
        <p><?php echo $box_desc ?></p>

    </div>

    
    <?php } ?>
</div>

</section>

<!-- deal section ends -->

<!-- newsletter section starts  -->

<section class="newsletter" id="newsletter">

    <h1>Newsletter</h1>
    <p>Get In Touch For Latest Discounts And Updates</p>
    <form action="contactus.php" method="post">

                  
                        <input type="text" placeholder="Enter Your Name" ><br>
                   
                    
        <input type="email" placeholder="Enter Your Email">

                        <textarea type="txt" placeholder="Enter Your Message"></textarea>
                  
        <input type="submit" class="btn" >
    </form>

</section>

<!-- newsletter section ends -->

<!-- footer section starts  -->

<!-- footer section starts  -->



  <footer class="footer" id="footer">
     <div class="cuntainer">
        <div class="wolf">
           
            <div class="footer-ol">
                <h4>company</h4>
                <ul>
                    <li><a href="#">about us</a></li><br><br>
                    <li><a href="#">our services</a></li><br><br>
                    <li><a href="#">privacy policy</a></li><br><br>
                    <li><a href="#">affiliate program</a></li><br><br>
                </ul>
            </div>
            <div class="footer-ol">
                <h4>get help</h4>
                <ul>
                    <li><a href="#">FAQ</a></li><br><br>
                    <li><a href="#">shipping</a></li><br><br>
                    <li><a href="#">returns</a></li><br><br>
                    <li><a href="#">order status</a></li><br><br>
                    <li><a href="#">payment options</a></li><br><br>
                </ul>
            </div>
            <div class="footer-ol">
                <h4>online shop</h4>
                <ul>
                    <li><a href="#">Stone Island</a></li><br><br>
                    <li><a href="#">Adidas</a></li><br><br>
                    <li><a href="#">New Belance</a></li><br><br>
                </ul>
            </div>
            <div class="footer-ol">
                <h4>follow us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f fa-x" style="color: #3b5998;"></i></a>
                    <a href="#"><i class="fab fa-twitter fa-x" style="color: #0084b4;"></i></a>
                    <a href="#"><i class="fab fa-instagram fa-x" style="color:   #E1306C;"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in fa-x" style="color:  #0077B5 ;"></i></a>

                </div>
            </div>
            <div class="pal">
                
            </div>
            <p class="credit">Copyright &copy; <span>2024</span> | kelompok 1 | <span>casual store</span></p>
        </div>
     </div>
  </footer>

<!-- footer section ends -->
<!-- footer section ends -->

  </nav></div></header>  


<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- owl carousel js file cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- custom js file link  -->
<script src="main/js.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";

}
</script>



</body>
</html>