<?php 
require_once 'components/header.php';
include_once("./config/variables.php");
if(!$_SESSION['username']) {
    header("location: " .$host . "/?action=admin"); 
    die(); 
}
 ?>

<!--banner-->
<section class="menu-manage-banner"></section>

<div class="menu-manage-form">
    <?php

    require_once 'config/DatabaseConn2.php';   
  
    if (isset($_POST['add-menu'])) {
        $foodName = $_POST['foodName'];
        $variety = $_POST['variety'];
        $size = $_POST['size'] ?? 'Regular';
        $price = $_POST['price'];    

        $random_num = rand();

        $orig_file = $_FILES["foodImage"]["tmp_name"];
        $ext = pathinfo($_FILES["foodImage"]["name"], PATHINFO_EXTENSION);       
        $target_dir = 'uploads/';
        $image_path =  "$target_dir$random_num.$ext";
        move_uploaded_file($orig_file,$image_path);

    
        $isSuccessFoodManage = $menu->insertMenuData($foodName, $variety, $size, $price, $image_path);

        if($isSuccessFoodManage){
            ?>
            <div class="alert" style="background-color: #50CB93;"><p style="font-size: 13px">Successfully saved</p></div>
    
            <?php
        }else{
            ?>
            <div class="alert" style="background-color: #FF2626;"><p style="font-size: 13px">Menu item creation failed</p></div>
    
            <?php
        }     
      
    }
    ?>

    <form method="POST" action="add_menu.php" autocomplete="off" enctype="multipart/form-data">
        <div class="menu-manage-container">
            <?php ?>
            <h3>MENU ITEMS</h3>
            <hr />

            <label for="foodName"><b>Food Name</b></label>
            <input type="text" name="foodName" required/>

            <label for=" variety"><b>Variety</b></label>
            <input type="text" name=" variety" required/>

            <label for="size"><b>Size</b></label><br />
            <input type="radio" name="size" value="Regular" />
            <label for="Regular">Regular</label><br />
            <input type="radio" name="size" value="Medium" />
            <label for="Medium">Medium</label><br />
            <input type="radio" name="size" value="Large" />
            <label for="Large">Large</label><br /><br />

            <label for="price"><b>Price</b></label>
            <input type="text" name="price" required/>

            <label for="image"><b>Image</b></label>
            <input type="file" accept="image/*"  name="foodImage" required>

            <button type="submit" name="add-menu" class="menu-manage-btn" style="background-color: #da0037">
                SAVE
            </button>
        </div>

    </form>

</div>

<?php require_once 'components/footer.php'; ?>