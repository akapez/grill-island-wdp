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
<?php  while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
  <div class="menu"> 
    <img class="menu-img" src="<?php echo $r['foodImage'] ?>" alt="menu-item" />
    <h4><?php echo $r['foodName'] ?></h4>
    <h5 style="color: #4A403A"><?php echo $r['variety'] ?></h5>
    <h5 style="color: #A2416B"><?php echo $r['size'] ?></h5>
    <p>RS. <?php echo $r['price'] ?></p>
    <div>
    <?php 
      if($_SESSION['email'] ?? null) { ?>
      <button class="order_button" type="submit">Order Now</button>      
    <?php }else{ ?>
      <a href="/grill-island"><button class="order_button" type="submit">Order Now</button></a>
    <?php } ?>
    </div>
  </div>
<?php } ?>
</div>

<?php require_once 'components/footer.php'; ?>