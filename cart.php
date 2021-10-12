<?php
require_once 'components/header.php';
require_once 'config/DatabaseConn2.php';
require_once 'components/cart.php';

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["food_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Item has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}

?>

<section class="cart_banner"></section>

<div class="row">
  <div class="col-75">
    <h3>FOOD CART</h3>

    <div class="small_container cart_page">
      <table>
        <tr>
          <th>Item</th>
          <th>Quantity</th>
          <th>Sub Total</th>
        </tr>


        <?php

        $total = 0;
        if (isset($_SESSION['cart'])) {
          $food_id = array_column($_SESSION['cart'], 'food_id');

          $result =  $menu->getMenuData();
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            foreach ($food_id as $id) {
              if ($row['id'] == $id) {
                cartElement($row['foodImage'], $row['foodName'], $row['price'], $row['id']);
                $total = $total + (int)$row['price'];
              }
            }
          }
        } else {
          echo "<h5>Cart is Empty</h5>";
        }

        ?>



      </table>
    </div>

  </div>
  <div class="col-25">
    <div class="cart_container">
      <h4>
        Cart
        <span class="price" style="color: black"><i class="fa fa-shopping-cart"></i>
          <b>
            <?php
            if (isset($_SESSION['cart'])) {
              $count  = count($_SESSION['cart']);
              echo "$count";
            } else {
              echo "0";
            }
            ?>
          </b>
        </span>
      </h4>
      <hr />
      <p>
        Delivery Charges
        <span class="price" style="color: #F0A500">Free</span>
      </p>
      <p>
        Total
        <span class="price" style="color: black"><b>Rs.</b> <?php echo $total; ?></span>
      </p>
      <button id="submit" type="submit" name="submit" class="checkout_btn">
        CHECKOUT
      </button>
    </div>
  </div>
</div>

<?php require_once 'components/footer.php'; ?>