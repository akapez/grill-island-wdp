<?php require_once 'components/header.php'; ?>

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
<?php
    require_once 'config/DatabaseConn2.php';
    $result = $menu->getMenuData();
  ?>
  <div class="menu-wrapper">
  <?php  while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
    <div class="menu">
    <img class="menu-img" src="<?php echo $r['foodImage']; ?>">
    <h4><?php echo $r['foodName']; ?></h4>
    <p> RS. <?php echo $r['price']; ?> </p>
    <div>
      <button class="order_button" type="submit">Order Now</button>
    </div>
    </div>
    <?php } ?>
  </div>
</div>

<?php require_once 'components/footer.php'; ?>