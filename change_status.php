<?php
require_once 'components/header.php';
include_once("./config/variables.php");
if (!$_SESSION['username']) {
    header("location: " . $host . "/?action=admin");
    die();
}
?>

<!--banner-->
<section class="order-manage-banner"></section>

<div class="order-manage-form">

    <?php
    require_once 'config/DatabaseConn2.php';

   if (isset($_POST['update-order'])) {
        $id = $_POST['id'];
        $status = $_POST['status'] ?? null; 
   

        $isSuccessOrderManage =  $order->updateOrderData($id, $status);

        if ($isSuccessOrderManage) {
            header("Location: order_manage.php");
        }else {
        ?>
            <div class="alert" style="background-color: #FF2626;">
                <p style="font-size: 13px">Order updating failed</p>
            </div>

        <?php
        }
    }


    if (!isset($_GET['id'])) {
        ?>
        <div class="alert" style="background-color: #FF2626;">
            <p style="font-size: 13px">Order id is not valid</p>
        </div>

    <?php
    } else {
        $id = $_GET['id'];
        $orderResult = $order->getOrderDetails($id);

    ?>

        <form method="POST" action="change_status.php" autocomplete="off">
            <input type="hidden" name="id" value="<?php echo $orderResult['orderId'] ?>" />
            <div class="order-manage-container">       
           
                <label for="size"><b>CHANGE STATUS</b></label><br />
                <input type="radio" name="status" value="Pending"  <?php if($orderResult['status'] == "Pending") { echo "checked"; }?> />
                <label for="Regular">Pending</label><br />
                <input type="radio" name="status" value="Preparing" <?php if($orderResult['status'] == "Preparing") { echo "checked"; }?>/>
                <label for="Medium">Preparing</label><br />
                <input type="radio" name="status" value="Delivered" <?php if($orderResult['status'] == "Delivered") { echo "checked"; }?> />
                <label for="Large">Delivered</label><br /><br />

                <button type="submit" name="update-order" class="order-manage-btn" style="background-color: #FFB319">
                    update
                </button>
            </div>

        </form>
    <?php } ?>

</div>

<?php require_once 'components/footer.php'; ?>