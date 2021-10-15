<?php require_once 'components/header.php';
include_once("./config/variables.php");
require_once 'config/DatabaseConn1.php';

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
            <thead>
            <tr>
                <th>ORDER ID</th>
                <th>CUSTOMER NAME</th>
                <th>EMAIL</th>
                <th>ADDRESS</th>               
                <th>DATE</th>
                <th>STATUS</th>
                <th>CHANGE STATUS</th>
                <th>ORDERS</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $query = "SELECT * FROM `orders` ";
                $user_result=mysqli_query($connection,$query);
                while($user_fetch=mysqli_fetch_assoc($user_result)){
                    echo "
                    <tr>
                    <td>$user_fetch[orderId]</td>
                    <td>$user_fetch[fullName]</td>
                    <td>$user_fetch[email]</td>
                    <td>$user_fetch[address]</td>                 
                    <td>$user_fetch[orderDate]</td>
                    <td>$user_fetch[status]</td>
                    <td><a href='change_status.php?id=$user_fetch[orderId]'><button class='table-btn' style='background-color: #FFB319'>CHANGE</button></a></td>
                    <td>
                    <table>
                    <thead>
                    <tr>
                        <th>FOOD NAME</th>
                        <th>VARIETY</th>
                        <th>SIZE</th>
                        <th>QUANTITY</th>
                        <th>PRICE</th>                     
                    </tr>
                    </thead>
                    <tbody>
                    ";
                    $order_query= "SELECT * FROM `order_items` WHERE `orderId`='$user_fetch[orderId]'";
                    $order_result=mysqli_query($connection,$order_query);
                    while($order_fetch=mysqli_fetch_assoc($order_result)){
                        echo "
                            <tr>
                            <td>$order_fetch[foodName]</td>
                            <td>$order_fetch[variety]</td>
                            <td>$order_fetch[size]</td>
                            <td>$order_fetch[qty]</td>
                            <td>$order_fetch[price]</td>
                            </tr>
                        ";
                    }
                    echo "

                    </tbody>
                    </table>
                    </td>
                </tr>
                    
                    ";
                }

            ?>
           
            </tbody>


        </table>
    </div>
</div>

<?php require_once 'components/footer.php'; ?>