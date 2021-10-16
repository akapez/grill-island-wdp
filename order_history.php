<?php require_once 'components/header.php';
include_once("./config/DatabaseConn1.php");
include_once("./config/variables.php");
if (!$_SESSION['email']) {
  header("location: " . $host);
  die();
}
?>

<!--banner-->
<section class="order_page_banner"></section>

<div class="orders-section">
  <div class="order-container">
    <h3>ORDER HISTORY</h3>
    <hr />

    <table id="orders">
      <tr>
        <th>ID</th>    
        <th>DATE</th>
        <th>STATUS</th>
      </tr>
    
        <?php

        $current_user = $_SESSION['email'];
        $sql = "SELECT * FROM orders WHERE email='$current_user'";

        $fetch_result = mysqli_query($connection, $sql);

        if ($fetch_result) {
          if (mysqli_num_rows($fetch_result) > 0) {
            while ($row = mysqli_fetch_array($fetch_result)) {            
        ?>
          <tr>
              <td><?php echo $row['orderId']; ?></td>           
              <td><?php echo $row['orderDate']; ?></td>
              <td><?php echo $row['status']; ?></td>
          </tr>
        <?php
            }
          }
        }
        ?>

 
    </table>
  </div>
</div>

<?php require_once 'components/footer.php'; ?>