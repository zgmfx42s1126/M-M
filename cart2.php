<?php

@include 'co.php';

if (isset($_POST['update_update_btn'])) {
  $update_value = $_POST['update_quantity'];
  $update_id = $_POST['update_quantity_id'];
  $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
  if ($update_quantity_query) {
    header('location:cart2.php');
  };
};

if (isset($_GET['remove'])) {
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
  header('location:cart2.php');
};

if (isset($_GET['delete_all'])) {
  mysqli_query($conn, "DELETE FROM `cart`");
  header('location:cart2.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E Check Out Nayan</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="img/mm.png" />

</head>

<body>
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
              <li><a href="product2.php">Menu</a></li>
              <li><a href="cart2.php" class="active">Ordered</a></li>
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




      <div class="container" style="padding-top: 120px;" >

        <section class="shopping-cart">

          <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Ordered&nbsp;&nbsp;<img src="img/header-line.png" alt="Line" class="tm-header-line"></h2>

          <table>

            <thead>
              <th>image</th>
              <th>name</th>
              <th>price</th>
              <th>quantity</th>
              <th>total price</th>
              <th>action</th>
            </thead>

            <tbody>

              <?php

              $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
              $grand_total = 0;
              if (mysqli_num_rows($select_cart) > 0) {
                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
              ?>

                  <tr>
                    <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $fetch_cart['name']; ?></td>
                    <td>$<?php echo number_format($fetch_cart['price']); ?>/-</td>
                    <td>
                      <form action="" method="post">
                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                        <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
                        <input type="submit" value="update" name="update_update_btn">
                      </form>
                    </td>
                    <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
                    <td><a href="cart2.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
                  </tr>
              <?php
                  $grand_total += $sub_total;
                };
              };
              ?>
              <tr class="table-bottom">
                <td><a href="product2.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
                <td colspan="3">grand total</td>
                <td>$<?php echo $grand_total; ?>/-</td>
                <td><a href="cart2.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
              </tr>

            </tbody>

          </table>

          <div class="checkout-btn">
            <a href="checkout2.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">procced to checkout</a>
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
  <!-- JS -->
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> <!-- jQuery -->
  <script type="text/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->


</body>

</html>

<style>
  .shopping-cart table .table-bottom{
   background-color: transparent;
   
}

</style>