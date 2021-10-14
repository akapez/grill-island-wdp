<?php require_once 'components/header.php';
include_once("./config/variables.php");
require_once 'config/DatabaseConn2.php';
$result =  $order->getOrderData();
if (!$_SESSION['username']) {
    header("location: " . $host . "/?action=admin");
    die();
}
?>

<!--banner-->
<section class="order_page_banner"></section>

<div class="orders-section">
    <div class="order-container">
        <h3>ORDER MANAGE</h3>
        <hr />

        <table id="orders">
            <tr>
                <th>ID</th>
                <th>FULL NAME</th>
                <th>EMAIL</th>
                <th>ADDRESS</th>
                <th>TOTAL</th>
                <th>DATE</th>
                <th>STATUS</th>
                <th>CHANGE STATUS</th>
            </tr>

            <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $r['id'] ?></td>
                    <td><?php echo $r['fullName'] ?></td>
                    <td><?php echo $r['email'] ?></td>
                    <td><?php echo $r['address'] ?></td>
                    <td><?php echo $r['fullAmount'] ?></td>
                    <td><?php echo $r['orderDate'] ?></td>
                    <td><?php echo $r['status'] ?></td>
                    <td><a href="change_status.php?id=<?php echo $r['id'] ?>"><button class="table-btn" style=" background-color: #FFB319">CHANGE</button></a></td>                  

                </tr>
            <?php } ?>


        </table>
    </div>
</div>

<?php require_once 'components/footer.php'; ?>