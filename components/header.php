<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Grill-Island</title>
  <!--header and footer css-->
  <link rel="stylesheet" href="./styles/styles.css" />
  <!--index css-->
  <link rel="stylesheet" href="./styles/home.css" />
  <!--menu css-->
  <link rel="stylesheet" href="./styles/menu.css" />
  <!--cart css-->
  <link rel="stylesheet" href="./styles/cart.css" />
  <!--header css-->
  <link rel="stylesheet" href="./styles/feedback.css" />
  <!--about css-->
  <link rel="stylesheet" href="./styles/about.css" />
  <!--contact css-->
  <link rel="stylesheet" href="./styles/contact.css" />
  <!--login and register css-->
  <link rel="stylesheet" href="./styles/index.css" />
  <!--profile css-->
  <link rel="stylesheet" href="./styles/profile.css" />
  <!--user screen css-->
  <link rel="stylesheet" href="./styles/userscreen.css" />
  <!--admin screen css-->
  <link rel="stylesheet" href="./styles/adminscreen.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- CDN-font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>
  <!--header design-->
  <nav>
    <input type="checkbox" id="check" />
    <label for="check" class="check-btn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">
      <a href="home.php" class="navbar__logo">
        <img class="header-logo" src="./assets/logo.png" alt="company-logo">
      </a>
    </label>
    <?php include("config/variables.php"); ?>
    <ul>
      <li><a href="home.php">HOME</a></li>
      <li><a href="menu.php">MENUS</a></li>
      <li><a href="cart.php"><i class="fa fa-shopping-cart"></i>
          <?php
        
        session_start();
          if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
            echo "<span id=\"cart_count\" class=\"badge\">$count</span>";
          } else {
            echo "<span id=\"cart_count\" class=\"badge\">0</span>";
          }

          ?>
          <!-- <span id="cart-count" class="badge">1</span></a> -->
      </li>
      <li><a href="feedback.php">FEEDBACK</a></li>
      <li><a href="about.php">ABOUT</a></li>
      <li><a href="contact.php">CONTACT</a></li>
      <?php     
      if (isset($_SESSION['email'])) {
      ?>
        <li><a href="<?php echo $host; ?>/?action=profile">PROFILE</a></li>
        <li><a href="<?php echo $host; ?>/controllers/logout.php">LOGOUT</a></li>
      <?php } else if (isset($_SESSION['username'])) {
      ?>
        <li><a href="<?php echo $host; ?>/?action=dashboard">DASHBOARD</a></li>
        <li><a href="<?php echo $host; ?>/controllers/logout.php">LOGOUT</a></li>
      <?php } else { ?>
        <li><a href="<?php echo $host; ?>/?action=login">LOGIN</a></li>
        <li><a href="<?php echo $host; ?>/?action=register">REGISTER</a></li>
        <li><a href="<?php echo $host; ?>/?action=admin"><i class="fas fa-users-cog"></i></a></li>
      <?php } ?>

    </ul>
  </nav>