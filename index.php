<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link href="https://fonts.googleapis.com/css?family=Literata&display=swap" rel="stylesheet">
    <title>Agike Sports Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Agike Sports Shop</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
            <?php

            if(isset($_SESSION['username'])){
                echo '<li><a href="orders.php">My Orders</a></li>';
            }
            ?>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <img data-interchange="[images/agike-retina.jpg, (retina)], [images/agike-landscape.jpg, (large)], [images/agike-mobile.jpg, (mobile)], [images/agike-landscape.jpg, (medium)]">
    <noscript><img src="images/agike-landscape.jpg"></noscript>

    <div class="row" style="margin-top:10px;">
        <div class="small-12">
            <?php
            $i=0;
            $j=0;
            $product_id = array();
            $product_quantity = array();

            $result = $mysqli->query('SELECT * FROM products');
            if($result === FALSE){
                die(mysql_error());
            }

            if($result){

                while($obj = $result->fetch_object()) {

                    echo '<div class="large-4 columns">';
                    echo '<p><h3>'.$obj->product_name.'</h3></p>';
                    echo '<img src="images/products/'.$obj->product_img_name.'"/>';
                    echo '<br><br><br><br>';
                    echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
                    echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
                    echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



                    if($obj->qty > 0){
                        echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px; border-radius: 10px;" /></a></p>';
                    }
                    else {
                        echo 'Out Of Stock! Come back soon !';
                    }
                    echo '</div>';

                    $i++;
                    $j++;
                }

            }

            $_SESSION['product_id'] = $product_id;


            echo '</div>';
            echo '</div>';
            ?>

    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; Agike Sports Shop. All Rights Reserved.</p>
        </footer>

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>


  </body>
</html>
