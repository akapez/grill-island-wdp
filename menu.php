<?php require_once 'includes/header.php'; ?>

<!--banner-->
<section class="menu_banner"></section>

<!--search option-->
<div class="search_container">
  <form action="/action_page.php" autocomplete="off">
    <input type="text" placeholder="Search.." name="search" />
    <button type="submit">Search</button>
  </form>
</div>

<!--menu container-->
<div class="menu_container">
  <div class="menu">
    <img class="menu-img" src="./assets/pizza.png" alt="menu" />
    <h4>Pizza</h4>
    <p>RS. 999.99 - RS. 2499.99</p>
    <div>
      <button type="submit">Order Now</button>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>