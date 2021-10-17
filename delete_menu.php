<?php
require_once 'config/DatabaseConn2.php';
if (!isset($_GET['id'])) {
?>
    <div class="alert" style="background-color: #FF2626;">
        <p style="font-size: 13px">Menu id is not valid</p>
    </div>

    <?php
    header("Location: view_menu_list.php");
} else {
    // Get ID values
    $id = $_GET['id'];

    //Call Delete function
    $result = $menu->deleteMenu($id);
    //Redirect to list
    if ($result) {
    ?>
        <div class="alert" style="background-color: #50CB93;">
            <p style="font-size: 13px">Successfully deleted</p>
        </div>

    <?php
        header("Location: view_menu_list.php");
    } else {
    ?>
        <div class="alert" style="background-color: #FF2626;">
            <p style="font-size: 13px">Delete failed</p>
        </div>

<?php
    }
}

?>