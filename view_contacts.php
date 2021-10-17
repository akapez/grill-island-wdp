<?php
require_once 'components/header.php';
include_once("./config/variables.php");
require_once 'config/DatabaseConn2.php';
if (!$_SESSION['username']) {
    header("location: " . $host . "/?action=admin");
    die();
}

$result =  $contact->getContactData();
?>

<section class="menu-list-banner"></section>

<div class="menu-list-section">
    <div class="menu-list-container">
        <h3>CONTACTS</h3>
        <hr />

        <table id="menu-list">
            <tr>
                <th>ID</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>EMAIL</th>
                <th>PHONE NUMBER</th>
                <th>MESSAGE</th>           
            </tr>
            <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $r['id'] ?></td>
                    <td><?php echo $r['firstname'] ?></td>
                    <td><?php echo $r['lastname'] ?></td>
                    <td><?php echo $r['email'] ?></td>
                    <td><?php echo $r['mobile'] ?></td>
                    <td><?php echo $r['message'] ?></td>               
                </tr>
            <?php } ?>

        </table>
    </div>
</div>






<?php require_once 'components/footer.php'; ?>