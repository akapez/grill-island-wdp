<?php
require_once 'components/header.php';
require_once 'config/DatabaseConn2.php';
$result =  $menu->getMenuData();

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
    <form action="cart_manage.php" method="POST">
      <div class="menu">
        <img class="menu-img" src="<?php echo $r['foodImage'] ?>" alt="menu-item" />
        <h4><?php echo $r['foodName'] ?></h4>
        <h5 style="color: #4A403A"><?php echo $r['variety'] ?></h5>
        <h5 style="color: #A2416B"><?php echo $r['size'] ?></h5>
        <p>RS. <?php echo $r['price'] ?></p>       
        <div>
          <button class="order_button" name="addToCart" type="submit">ADD TO CART</button>  
          <input type="hidden" name="foodName" value="<?php echo $r['foodName'] ?>"/>
          <input type="hidden" name="variety" value="<?php echo $r['variety'] ?>"/>
          <input type="hidden" name="size" value="<?php echo $r['size'] ?>"/>
          <input type="hidden" name="price" value="<?php echo $r['price'] ?>"/>         
          <input type="hidden" name="foodImage" value="<?php echo $r['foodImage'] ?>"/> 
        </div>
      </div>
    </form>
  <?php } ?>
</div>




<?php require_once 'components/footer.php'; ?>