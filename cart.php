<?php
require_once 'components/header.php';
require_once 'config/DatabaseConn2.php';

if (isset($_POST['remove'])) {
  if ($_GET['action'] == 'remove') {
    foreach ($_SESSION['cart'] as $key => $value) {
      if ($value["food_id"] == $_GET['id']) {
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
      <table id="myTable" class="table">
         <thead>
        <tr>
          <th>Item</th>
          <th>Quantity</th>
          <th><span id="amount" class="amount">Amount(Rs.)</span></th>
        </tr>
        </thead>
        <tbody>

        <?php

        $total = 0;

        if (isset($_SESSION['cart'])) {
          $food_id = array_column($_SESSION['cart'], 'food_id');

          $result =  $menu->getMenuData();
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            foreach ($food_id as $id) {

              if ($row['id'] == $id) { ?>
                <form action="cart.php?action=remove&id=<?php echo $row['id'] ?>" method="post">
                  <tr>
                    <td>
                      <div class="cart_info">
                        <img src="<?php echo $row['foodImage'] ?>" alt="food-item">
                        <div>
                          <h4><?php echo $row['foodName'] ?></h4>
                          <small>Rs. <input type="text" value="<?php echo $row['price'] ?>" class="price price_input" disabled></small>
                          <br>
                          <button class="removeBtn" type="submit" name="remove">Remove</button>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="button-container">
                        <button class="cart-qty-plus" type="button" value="+">+</button>
                        <input type="text" name="qty" min="0" class="qty qty_input" value="1" />
                        <button class="cart-qty-minus" type="button" value="-">-</button>
                      </div>
                    </td>
                    <td><span id="amount" class="amount">0</span>.00</td>
                  </tr>
                </form>
        <?php //$total = $total + (int)$row['price'];
              }
            }
          }
        } else {
          echo "<h2 style='color: #F0A500'>Cart is Empty</h2>";
        }

        ?>
         </tbody>
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
        Total(Rs.)
        <span id="total" class="total price" style="color: black"><b>0</b></span>
      </p>
      <?php
        if ($_SESSION['email'] ?? null) { ?>
          <button id="submit" type="submit" name="submit" class="checkout_btn">CHECKOUT</button>
        <?php } else { ?>
          <a href="/grill-island"><button class="checkout_btn">CHECKOUT</button></a>
        <?php } ?>
    </div>
  </div>
</div>

<script src="javascripts/cart.js"></script>

<?php require_once 'components/footer.php'; ?>