<?php require_once 'components/header.php'; ?>

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
        <tr>
          <td>
            <div class="cart_info">
              <img src="./assets/pizza.png" alt="food-item">
              <div>
                <h4>Pizza</h4>
                <small>Rs. 1000.00</small>
                <br>
                <a href="">Remove</a>
              </div>
            </div>
          </td>
          <td><input class="qty_input" type="number" value="1"></td>
          <td>Rs. 1000.00</td>
        </tr>       
      </table>
    </div>

  </div>
  <div class="col-25">
    <div class="cart_container">
      <h4>
        Cart
        <span class="price" style="color: black"><i class="fa fa-shopping-cart"></i> <b>4</b></span>
      </h4>
      <hr />
      <p>
        Total
        <span class="price" style="color: black"><b>Rs.</b> 2000.00</span>
      </p>
      <button id="submit" type="submit" name="submit" class="checkout_btn">
        CHECKOUT
      </button>
    </div>
  </div>
</div>

<?php require_once 'components/footer.php'; ?>