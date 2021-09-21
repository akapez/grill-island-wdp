<?php require_once 'includes/header.php'; ?>

<!--banner-->
<section class="fooditems-banner"></section>

<div class="fooditems-form">
    <form method="POST" action="" autocomplete="off">

        <div class="fooditems-container">
            <h3>MENU ITEMS</h3>
            <hr />

            <label for="foodName"><b>Food Name</b></label>
            <input type="text" name="foodName"/>

            <label for=" variety"><b>Variety</b></label>
            <input type="text" name=" variety"/>

            <label for="size"><b>Size</b></label><br />
            <input type="radio" name="size" value="regular" />
            <label for="regular">Regular</label><br />
            <input type="radio" name="size" value="medium" />
            <label for="medium">Medium</label><br />
            <input type="radio" name="size" value="large" />
            <label for="large">Large</label><br /><br />

            <label for="price"><b>Price</b></label>
            <input type="text" name="price"/>

            <label for="price"><b>Image</b></label>
            <input type="file" id="myFile" name="filename">

            <button type="submit" name="submit-food" class="fooditembtn">
                SAVE
            </button>
        </div>

    </form>

</div>

<?php require_once 'includes/footer.php'; ?>