<?php

@include 'co.php';


if (isset($_POST['add_to_cart'])) {

  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = 1;

  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

  if (mysqli_num_rows($select_cart) > 0) {
    $message[] = 'product already added to cart';
  } else {
    $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
    $message[] = 'product added to cart succesfully';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products ni Germs</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="img/mm.png" />

  <!-- custom css file link  -->

</head>

<body>

  <?php
  if (isset($message)) {
    foreach ($message as $message) {
      echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
  };

  ?>


  <!-- Preloader -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <!-- End Preloader -->
  <div class="tm-top-header">
    <div class="container">
      <div class="row">
        <div class="tm-top-header-inner">
          <div class="tm-logo-container">
            <img src="img/logo.png" alt="Logo" class="tm-site-logo">
            <h1 class="tm-site-name tm-handwriting-font">M & M House</h1>
          </div>
          <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
          <nav class="tm-nav">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="today-special.php">Today Special</a></li>
              <li><a href="product2.php" class="active">Menu</a></li>
              <li><a href="cart2.php">Ordered</a></li>
              <li><a href="admin.php">Admin</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <section class="tm-welcome-section">
    <div class="container tm-position-relative">
      <div class="tm-lights-container">
        <img src="img/light.png" alt="Light" class="light light-1">

        <img src="img/light.png" alt="Light" class="light light-3">
      </div>





      <div class="container">

        <section class="products">

          <h1 class="white-text tm-handwriting-font tm-welcome-header"><img src="img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Our Menu&nbsp;&nbsp;<img src="img/header-line.png" alt="Line" class="tm-header-line"</h1>

          <div class="box-container">

            <?php

            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if (mysqli_num_rows($select_products) > 0) {
              while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>

                <form action="" method="post">
                  <div class="box">
                    <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                    <h3><?php echo $fetch_product['name']; ?></h3>
                    <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                    <input type="submit" class="btn" value="add to cart" name="add_to_cart">
                  </div>
                </form>

            <?php
              };
            };
            ?>

          </div>

        </section>

      </div>

    </div>



  </section>







  <footer>
      <div class="tm-black-bg">
        <div class="container">
          <div class="row margin-bottom-60">
            <nav class="col-lg-3 col-md-3 tm-footer-nav tm-footer-div">
              <h3 class="tm-footer-div-title">Main Menu</h3>
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Directory</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Our Services</a></li>
              </ul>
            </nav>
            <div class="col-lg-5 col-md-5 tm-footer-div">
              <h3 class="tm-footer-div-title">About Us</h3>
              <p class="margin-top-15">"Welcome to M&M Café, where every moment is a treat!" <br>

At M&M Café, we're dedicated to crafting unforgettable experiences centered around delicious food, exceptional coffee, and warm hospitality. Our cozy café is the perfect spot to unwind, catch up with friends, or simply indulge in your favorite treats.</p>
              <p class="margin-top-15">Our menu features a tempting array of delights, from freshly brewed coffees and specialty lattes to mouthwatering pastries, sandwiches, and salads. Whether you're craving a rich espresso to kickstart your day or a decadent dessert to satisfy your sweet tooth, we have something for everyone.</p>
            </div>
            <div class="col-lg-4 col-md-4 tm-footer-div">
              <h3 class="tm-footer-div-title">Get Social</h3>
              <p>At M&M Café, we're not just about serving coffee – we're about creating a vibrant social experience that brings people together. Step into our welcoming space and immerse yourself in the lively atmosphere of coffee culture.</p>
              <div class="tm-social-icons-container">
                <a href="https://www.facebook.com/profile.php?id=100092250229820"  target="_blank"facebook class="tm-social-icon"><i class="fa fa-facebook"></i></a>
                <a href="https://x.com/MM4501314372316" target="_blank"twitter class="tm-social-icon"><i class="fa fa-twitter"></i></a>
                <!-- <a href="#" class="tm-social-icon"><i class="fa fa-linkedin"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-youtube"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-behance"></i></a> -->
              </div>
            </div>
          </div>          
        </div>  
      </div>      
      <div>
        <div class="container">
          <div class="row tm-copyright">
           <p class="col-lg-12 small copyright-text text-center">Copyright &copy; 2024 by MING & GNAR | All Rights Reserved.</p>
         </div>  
       </div>
     </div>
   </footer> <!-- Footer content-->  


  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> <!-- jQuery -->
  <script type="text/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->

</body>

</html>