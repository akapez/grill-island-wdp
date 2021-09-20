<?php
session_start();
// Report all PHP errors
error_reporting(E_ALL);

if(isset($_POST['update'])){

    include_once("../config/Database.php");

    $userNewName  =    $_POST['username'];
    $userNewEmail =    $_POST['useremail'];
    $userNewPassword =    $_POST['userpassword'];
    $userNewConfirmPassword =    $_POST['userconfirmpassword'];

    if(empty($userNewName) && empty($userNewEmail) && empty($userNewPassword) && empty($userNewConfirmPassword)){
        header('Location: ../updateprofile.php?error=emptyNameAndEmail');
        exit;
    }else if(strlen($userNewPassword) < 6){
        header('Location: ../updateprofile.php?error=passwordNotStrong');
        exit;
    }else if($userNewPassword !== $userNewConfirmPassword){
        header('Location: ../updateprofile.php?error=passwordNotMatch');
        exit;
    }else if(!filter_var($userNewEmail, FILTER_VALIDATE_EMAIL)){
        header('Location: ../updateprofile.php?error=emailNotValid');
        exit;
    }else{
        $loggedInUser = $_SESSION['email'];
        $hash_update_password = md5($userNewPassword);
                        
        $sql = "UPDATE customers SET name ='$userNewName', email = '$userNewEmail' , password = '$hash_update_password'   WHERE email = '$loggedInUser'";

        $results = mysqli_query($connection,$sql);

        header('Location: logout.php?success=userUpdated');
        exit;
        
    }


}

?>