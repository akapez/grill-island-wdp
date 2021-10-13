<?php
require_once 'components/header.php';
require_once 'config/DatabaseConn2.php';
$result =  $menu->getMenuData();

if (isset($_POST['addToCart'])){
  // print_r($_POST['quantity']);
  if(isset($_SESSION['cart'])){

      $item_array_id = array_column($_SESSION['cart'], "food_id");

      if(in_array($_POST['food_id'], $item_array_id)){
          echo "<script>alert('Item is already added in the cart..!')</script>";
          echo "<script>window.location = 'menu.php'</script>";
      }else{

          $count = count($_SESSION['cart']);
          $item_array = array(
              'food_id' => $_POST['food_id']             
             
          );

          $_SESSION['cart'][$count] = $item_array;          
      }

  }else{

      $item_array = array(
              'food_id' => $_POST['food_id']              
      );

      // Create new session variable
      $_SESSION['cart'][0] = $item_array;
      print_r($_SESSION['cart']);
  }
}

?>

<!--banner-->
<section class="menu_banner"></section>

<!--search option-->
<div class="search_container">
  <form action="/action_page.php" autocomplete="off">
    <input class="search_input" type="text" placeholder="Search.." name="search" />
    <button class="search_button" type="submit">Search</button>
  </form>
</div>


<!--menu container-->
<div class="menu_container">
  <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
    <form action="menu.php" method="post">
      <div class="menu">
        <img class="menu-img" src="<?php echo $r['foodImage'] ?>" alt="menu-item" />
        <h4><?php echo $r['foodName'] ?></h4>
        <h5 style="color: #4A403A"><?php echo $r['variety'] ?></h5>
        <h5 style="color: #A2416B"><?php echo $r['size'] ?></h5>
        <p>RS. <?php echo $r['price'] ?></p>       
        <div>
          <button class="order_button" name="addToCart" type="submit">Order Now</button>
          <input type="hidden" name="food_id" value="<?= $r['id'] ?>">
        </div>
      </div>
    </form>
  <?php } ?>
</div>

<script src="javascripts/cart.js"></script>



<?php require_once 'components/footer.php'; ?>