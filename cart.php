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
    <title>Casual Store</title>

    <!-- Owl carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="header-1">
        <a href="index.php" class="logo"><img src="website/all/logo.png" alt="Logo image"></a>
        <div class="col-md-6 offer">
            <a href="#" class="btn btn-success btn-sm">
                <?php echo isset($_SESSION['customer_email']) ? "Welcome: " . htmlspecialchars($_SESSION['customer_email']) : "Welcome Guest"; ?>
            </a>
            <a id="pr" href="#">Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
        </div>
    </div>
    <div class="header-2">
        <nav class="navbar">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="trimer.php">SHOP</a></li>
                <li><a href="contactus.php">CONTACT</a></li>
                <li>
                    <a href="cart.php"><i class="fa fa-shopping-cart"></i><span><?php item(); ?> items in cart</span></a>
                </li>
                <li>
                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        echo "<a href='checkout.php'>Login</a>";
                    } else {
                        echo "<a href='logout.php'>Logout</a>";
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </div>
</header>

<section class="content" id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><span>Cart</span></li>
            </ul>
        </div>
    </div>
</section>

<div class="col-md-9" id="cart">
    <div class="box">
        <form action="cart.php" method="post">
            <h1>Shopping Cart</h1>
            <?php
            $ip_add = getUserIp();
            $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
            $run_cart = mysqli_query($con, $select_cart);
            $count = mysqli_num_rows($run_cart);
            ?>
            <p class="text-muted">Currently you have <?php echo $count ?> items in your cart</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Size</th>
                            <th>Delete</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        while ($row = mysqli_fetch_array($run_cart)) {
                            $pro_id = $row['p_id'];
                            $pro_size = $row['size'];
                            $pro_qty = $row['qty'];
                            $get_product = "SELECT * FROM products WHERE product_id='$pro_id'";
                            $run_pro = mysqli_query($con, $get_product);
                            while ($row_pro = mysqli_fetch_array($run_pro)) {
                                $p_title = htmlspecialchars($row_pro['product_title']);
                                $p_img1 = htmlspecialchars($row_pro['product_img1']);
                                $p_price = $row_pro['product_price'];
                                $sub_total = $p_price * $pro_qty;
                                $total += $sub_total;
                                ?>
                                <tr>
                                    <td><img src="admin_area/product_images/<?php echo $p_img1 ?>" alt="Product"></td>
                                    <td><?php echo $p_title ?></td>
                                    <td><?php echo $pro_qty ?></td>
                                    <td>INR <?php echo $p_price ?></td>
                                    <td><?php echo $pro_size ?></td>
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
                                    <td>INR <?php echo $sub_total ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6">Total</th>
                            <th>INR <?php echo $total ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="box-footer">
                <div class="pull-left">
                    <a href="index.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue Shopping</a>
                </div>
                <div class="pull-right">
                    <button type="submit" name="update" class="btn btn-default"><i class="fa fa-refresh"></i> Update Cart</button>
                    <a href="checkout.php" class="btn btn-primary">Proceed to Checkout <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    update_cart();
}

function update_cart() {
    global $con;
    if (isset($_POST['remove'])) {
        foreach ($_POST['remove'] as $remove_id) {
            $delete_product = "DELETE FROM cart WHERE p_id='$remove_id'";
            $run_del = mysqli_query($con, $delete_product);
        }
        echo "<script>window.open('cart.php','_self')</script>";
    }
}
?>
</body>
</html>
