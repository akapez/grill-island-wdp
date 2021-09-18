<?php require_once 'includes/header.php'; ?>


<section class="profile-banner"></section>

<!--user edit form-->
<div class="profile-form">
  <form method="" action="" autocomplete="off">
    <div class="profile-container">
      <h3>PROFILE</h3>
      <hr />
      <label for="name"><b>Name</b></label>
      <input type="text" name="name" id="name" required />

      <label for="email"><b>Email</b></label>
      <input type="text" name="email" id="email" required />

      <label for="password"><b>Password</b></label>
      <input type="password" name="password" id="password" required />

      <label for="confirmpassword"><b>Confirm Password</b></label>
      <input type="password" name="confirmpassword" id="confirmpassword" required />

      <button id="submit" type="submit" name="submit" class="updatebtn">
        UPDATE
      </button>
    </div>
  </form>
</div>

<div class="orders-section">
  <div class="order-container">
    <h3>ORDER HISTORY</h3>
    <hr />

    <table id="orders">
      <tr>
        <th>ID</th>
        <th>TOTAL (Rs.)</th>
        <th>PAID</th>
        <th>STATUS</th>
      </tr>
      <tr>
        <td>1</td>
        <td>200.00</td>
        <td>YES</td>
        <td>Delivered</td>
      </tr>
    </table>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>