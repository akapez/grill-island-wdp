<?php
require_once 'components/header.php';

?>

<section class="cart_banner"></section>

<div class="row">
  <div class="col-75">
    <h3>FOOD CART</h3>

    <div class="small_container cart_page">
      <table>
        <thead>
          <tr>
            <th>Item No.</th>
            <th>Item</th>
            <th>Variety</th>
            <th>Size</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
          <?php

          if (isset($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $key => $value) {
              $itemNo = $key + 1;
              echo "
              <tr>
              <td>
              <small>$itemNo</small>
              </td>
              <td>            
                <img src='$value[foodImage]' alt='food-item'>               
                <h5>$value[foodName]</h5>            
              </td>
              <td>
                <small>$value[variety]</small>
              </td>
              <td>
                <small>$value[size]</small>
              </td>
              <td>
                <small>Rs. $value[price] <input type='hidden' class='itemPrice' value='$value[price]'/></small>
              </td>
              <td>
              <form action='cart_manage.php' method='POST'>
              <input name='mod_quantity' onchange='this.form.submit();' class='itemQuantity' type='number' min='1' max='10' value='$value[quantity]'>
              <input type='hidden' name='foodName' value='$value[foodName]'/>
              </form>
              </td>  
              <td>
                <small class='subTotal'>Rs. </small>
              </td>           
              <td>
              <form action='cart_manage.php' method='POST'>
              <button class='removeBtn' type='submit' name='removeItem'>Remove</button>
              <input type='hidden' name='foodName' value='$value[foodName]'/>
              </form>
              </td>
            </tr>
              ";
            }
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
        <span class="price" style="color: black"><i class="fa fa-shopping-cart"></i> <b> 
          <?php
           if (isset($_SESSION['cart'])) {
           $count  = count($_SESSION['cart']);
           echo "$count";
           } else {
             echo "0";
        }
        ?></b></span>
      </h4>
      <hr />
      <p>
        Delivery Charges
        <span class="price" style="color: #F0A500">Free</span>
      </p>
      <p>
        Total(Rs.)
        <span id="grandTotal" class="price" style="color: black"></span>
      </p>
      <br>
      <?php 
        if(isset($_SESSION["cart"]) && count($_SESSION["cart"])>0){
      ?>
      <form action="purchase.php" method="POST" >       
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
        <input class="cart_input" type="text" name="pay_email" placeholder="john@example.com">
        <label for="adr">Address</label>
        <textarea class="cart_input" type="text" rows="5" name="address" placeholder="542 W. 15th Street" required></textarea>
        <input type="hidden" name="status" value="Pending">
    

        <?php
        if ($_SESSION['email'] ?? null) { ?>
         <button type="submit" name="purchase" class="checkout_btn">
          MAKE PAYMENT
        </button>
        <?php } else { ?>
          <small>PLEASE REGISTER OR LOGIN AS A CUSTOMER</small>
        <?php } ?>
        
      </form>
      <?php }?>
    </div>
  </div>
</div>


<script src="javascripts/cart.js"></script>






<?php require_once 'components/footer.php'; ?>