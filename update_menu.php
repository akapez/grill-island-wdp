<?php
require_once 'components/header.php';
include_once("./config/variables.php");
if (!$_SESSION['username']) {
    header("location: " . $host . "/?action=admin");
    die();
}
?>

<!--banner-->
<section class="menu-manage-banner"></section>

<div class="menu-manage-form">

    <?php
    require_once 'config/DatabaseConn2.php';

    if (isset($_POST['update-menu'])) {
        $id = $_POST['id'];
        $foodName = $_POST['foodName'];
        $variety = $_POST['variety'];
        $size = $_POST['size'] ?? null;
        $price = $_POST['price'];

        $random_num = rand();

        $orig_file = $_FILES["foodImage"]["tmp_name"];
        $ext = pathinfo($_FILES["foodImage"]["name"], PATHINFO_EXTENSION);       
        $target_dir = 'uploads/';
        $image_path =  "$target_dir$random_num.$ext";
        move_uploaded_file($orig_file,$image_path);

        $isSuccessFoodManage =  $menu->updateMenuData($id, $foodName, $variety, $size, $price, $image_path);

        if ($isSuccessFoodManage) {
            header("Location: view_menu_list.php");
        }else {
        ?>
            <div class="alert" style="background-color: #FF2626;">
                <p style="font-size: 13px">Menu updating failed</p>
            </div>

        <?php
        }
    }


    if (!isset($_GET['id'])) {
        ?>
        <div class="alert" style="background-color: #FF2626;">
            <p style="font-size: 13px">Menu id is not valid</p>
        </div>

    <?php
    } else {
        $id = $_GET['id'];
        $menuResult = $menu->getMenuDetails($id);

    ?>

        <form method="POST" action="update_menu.php" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $menuResult['id'] ?>" />
            <div class="menu-manage-container">
                <h3>MENU ITEMS</h3>
                <hr />

                <label for="foodName"><b>Food Name</b></label>
                <input type="text" name="foodName" value="<?php echo $menuResult['foodName'] ?>" required/>

                <label for=" variety"><b>Variety</b></label>
                <input type="text" name=" variety" value="<?php echo $menuResult['variety'] ?>" required/>

                <label for="size"><b>Size</b></label><br />
                <input type="radio" name="size" value="Regular"  <?php if($menuResult['size'] == "Regular") { echo "checked"; }?> />
                <label for="Regular">Regular</label><br />
                <input type="radio" name="size" value="Medium" <?php if($menuResult['size'] == "Medium") { echo "checked"; }?>/>
                <label for="Medium">Medium</label><br />
                <input type="radio" name="size" value="Large" <?php if($menuResult['size'] == "Large") { echo "checked"; }?> />
                <label for="Large">Large</label><br /><br />

                <label for="price"><b>Price</b></label>
                <input type="text" name="price" value="<?php echo $menuResult['price'] ?>" required/>

                <label for="image"><b>Image</b></label>
                <input type="file" accept="image/*"  name="foodImage" value="<?php echo $menuResult['foodImage'] ?>">

                <button type="submit" name="update-menu" class="menu-manage-btn" style="background-color: #FFB319">
                    update
                </button>
            </div>

        </form>
    <?php } ?>

</div>

<?php require_once 'components/footer.php'; ?>