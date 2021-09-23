<?php require_once 'components/header.php'; 
include_once("./config/variables.php");
if(!$_SESSION['username']) {
    header("location: " .$host . "/?action=admin"); 
    die(); 
}
?>

<!--banner-->
<section class="menu-list-banner"></section>

<?php

require_once 'config/DatabaseConn2.php';
$result =  $menu->getMenuData();
?>

<div class="menu-list-section">
    <div class="menu-list-container">
        <h3>AVAILABLE MENUS</h3>
        <hr />

        <table id="menu-list">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>VARIETY</th>
                <th>SIZE</th>
                <th>PRICE (Rs.)</th>
                <th>IMAGE</th>              
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $r['id'] ?></td>
                    <td><?php echo $r['foodName'] ?></td>
                    <td><?php echo $r['variety'] ?></td>
                    <td><?php echo $r['size'] ?></td>
                    <td><?php echo $r['price'] ?></td>
                    <td><img src="<?php echo $r['foodImage'] ?>" alt="food-image" style="width=300; height=300"/></td>                   
                    <td><a href="update_menu.php?id=<?php echo $r['id'] ?>"><button class="table-btn" style=" background-color: #FFB319">UPDATE</button></a></td>
                    <td><a onclick="return confirm('Are you sure want to delete?')" href="delete_menu.php?id=<?php echo $r['id'] ?>"><button class="table-btn" style=" background-color: #da0037">DELETE</button></a></td>

                </tr>
            <?php } ?>

        </table>
    </div>
</div>

<?php require_once 'components/footer.php'; ?>