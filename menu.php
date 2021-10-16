<?php
require_once 'components/header.php';
require_once 'config/DatabaseConn1.php';

?>

<!--banner-->
<section class="menu_banner"></section>

<!--search option-->
<div class="search_container">
  <form action="search.php" autocomplete="off" method="POST">
    <input class="search_input" type="text" placeholder="Search.." name="search" />
    <button class="search_button" type="submit" name="submit-search">Search</button>
  </form>
</div>

<!--menu container-->
<div class="menu_container">
  <?php 
      $sql = "SELECT * FROM menus";
      $res = mysqli_query($connection, $sql);    
      $query_result = mysqli_num_rows($res);

      if($query_result >0){
        while ($row = mysqli_fetch_assoc($res)) {
          echo "
          <form action='cart_manage.php' method='POST'>
          <div class='menu'>
            <img class='menu-img' src='$row[foodImage]' alt='menu-item' />
            <h4>$row[foodName]</h4>
            <h5 style='color: #4A403A'>$row[variety]</h5>
            <h5 style='color: #A2416B'>$row[size]</h5>
            <p>RS. $row[price]</p>       
            <div>
              <button class='order_button' name='addToCart' type='submit'>ADD TO CART</button>  
              <input type='hidden' name='foodName' value='$row[foodName]' />
              <input type='hidden' name='variety' value='$row[variety]'  />
              <input type='hidden' name='size' value='$row[size]' />
              <input type='hidden' name='price' value='$row[price]' />         
              <input type='hidden' name='foodImage' value='$row[foodImage]'/> 
            </div>
          </div>
        </form>
          
          ";

        }
      }


  ?>


</div>




<?php require_once 'components/footer.php'; ?>