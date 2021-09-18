<?php require_once 'includes/header.php'; ?>

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
  <div class="menu">
    <img class="menu-img" src="./assets/pizza.png" alt="menu" />
    <h4>Pizza</h4>
    <p>RS. 999.99 - RS. 2499.99</p>
    <div>
      <button class="order_button" type="submit">Order Now</button>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>