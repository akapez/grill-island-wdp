<?php
session_start();
// Report all PHP errors
error_reporting(E_ALL);

if(isset($_POST['update'])){

    include_once("../config/conn1.php");

    $userNewName  =    $_POST['username'];
    $userNewEmail =    $_POST['useremail'];

    if(!empty($userNewName) && !empty($userNewEmail)){
        $loggedInUser = $_SESSION['email'];
                        
        $sql = "UPDATE customers SET name ='$userNewName', email = '$userNewEmail'  WHERE email = '$loggedInUser'";

        $results = mysqli_query($connection,$sql);

        header('Location: logout.php?success=userUpdated');
    exit;

    }else{
        header('Location: ../updateprofile.php?error=emptyNameAndEmail');
        exit;
    }


}

?>