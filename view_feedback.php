<?php
require_once 'components/header.php';
include_once("./config/variables.php");
require_once 'config/DatabaseConn2.php';
if (!$_SESSION['username']) {
    header("location: " . $host . "/?action=admin");
    die();
}

$result =  $feedback->getFeedbackData();
?>

<section class="menu-list-banner"></section>

<div class="menu-list-section">
    <div class="menu-list-container">
        <h3>CUSTOMER FEEDBACKS</h3>
        <hr />

        <table id="menu-list">
            <tr>
                <th>ID</th>
                <th>FULL NAME</th>
                <th>EMAIL</th>
                <th>AGE</th>
                <th>PHONE NUMBER</th>
                <th>GENDER</th>
                <th>EXPERIENCE</th>
                <th>MESSAGE</th>
            </tr>
            <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $r['id'] ?></td>
                    <td><?php echo $r['fullname'] ?></td>
                    <td><?php echo $r['email'] ?></td>
                    <td><?php echo $r['age'] ?></td>
                    <td><?php echo $r['pnumber'] ?></td>
                    <td><?php echo $r['gender'] ?></td>
                    <td><?php echo $r['experience'] ?></td>
                    <td><?php echo $r['message'] ?></td>

                </tr>
            <?php } ?>

        </table>
    </div>
</div>






<?php require_once 'components/footer.php'; ?>