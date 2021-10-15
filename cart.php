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

<?php

if (isset($_POST['checkout'])) {
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $status = $_POST['status'];
  $fullAmount = $_POST['fullAmount'];

  $isSuccessOrder = $order->insertOrderData($fullName, $email, $address, $status, $fullAmount);

  if ($isSuccessOrder) {
    unset($_SESSION['cart'])
?>

    <div class="alert" style="background-color: #50CB93;">
      <p style="font-size: 13px">Order creation successfully</p>
    </div>

  <?php
  } else {
  ?>
    <div class="alert" style="background-color: #FF2626;">
      <p style="font-size: 13px">Order creation failed</p>
    </div>

<?php
  }
}
?>


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
                              <small style="color: #4A403A"><?php echo $row['variety'] ?></small> |
                              <small style="color: #A2416B"><?php echo $row['size'] ?></small> |
                              <small>Rs. <input type="text" value="<?php echo $row['price'] ?>" class="price price_input" disabled></small>
                              <br>
                              <button class="removeBtn" type="submit" name="remove">Remove</button>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="button-container">
                            <button class="cart-qty-plus" type="button" value="+">+</button>
                            <input type="text" name="quantity" min="0" class="qty qty_input" value="1" />
                            <button class="cart-qty-minus" type="button" value="-">-</button>
                          </div>
                        </td>
                        <td><span id="amount" class="amount">0</span>.00</td>                      
                      </tr>
                    </form>
            <?php
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
      <form action="cart.php" method="POST">
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

        <h3 style="margin-top: 5px">Payment</h3>
        <label for="fname">Accepted Cards</label>
        <div class="icon-container">
          <i class="fab fa-cc-visa" style="color:navy;"></i>
          <i class="fab fa-cc-amex" style="color:blue;"></i>
          <i class="fab fa-cc-mastercard" style="color:red;"></i>
        </div>
        <label for="cname">Name on Card</label>
        <input class="cart_input" type="text" name="cardname" placeholder="John More Doe" required>
        <label for="ccnum">Credit card number</label>
        <input class="cart_input" type="text" name="cardnumber" placeholder="1111-2222-3333-4444" required>
        <label for="expmonth">Exp Month</label>
        <input class="cart_input" type="text" name="expmonth" placeholder="September" required>
        <label for="expyear">Exp Year</label>
        <input class="cart_input" type="text" name="expyear" placeholder="2018" required>
        <label for="cvv">CVV</label>
        <input class="cart_input" type="text" name="cvv" placeholder="352" required>

        <h3 style="margin-top: 5px">Deliver Address</h3>
        <label for="fname">Full Name</label>
        <input class="cart_input" type="text" name="fullName" placeholder="John M. Doe" required>
        <label for="email">Email</label>
        <input class="cart_input" type="text" name="email" value="<?PHP if (isset($_SESSION['email'])) {
                                                                    echo $_SESSION['email'];
                                                                  } ?>" disabled>
        <label for="adr">Address</label>
        <textarea class="cart_input" type="text" rows="5" name="address" placeholder="542 W. 15th Street" required></textarea>
        <input type="hidden" name="status" value="Pending">
        <input type="hidden" name="fullAmount" id="total" class="total price">



        <?php
        if ($_SESSION['email'] ?? null) { ?>
          <button type="submit" name="checkout" class="checkout_btn">CHECKOUT</button>
        <?php } else { ?>
          <small>PLEASE REGISTER OR LOGIN AS A CUSTOMER</small>
        <?php } ?>
      </div>
      </form>
    </div>
  </div>


<script src="javascripts/cart.js"></script>



<?php require_once 'components/footer.php'; ?>