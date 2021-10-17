<?php 

include_once("../config/variables.php");
include_once("../config/DatabaseConn1.php");

if(isset($_POST['admin'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $message = array();

    if (empty($username) && empty($password)) {
        $message[] = "Please fill all the fields";           
        header("Location: " . $host . "/index.php?action=admin&message=" . $message[0]);
        exit();              
    }else{
        $database = new Database();
        $dbh = $database->connect();
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);       

        $admin_finding_sql = "SELECT id, username FROM admin WHERE username=:username AND password=:password";
        $admin_finding_stat = $dbh->prepare($admin_finding_sql);
        $admin_finding_stat->bindParam("username", $username);
        $admin_finding_stat->bindParam("password", $password);
        $admin_finding_stat->execute();
        $admin_result = $admin_finding_stat->fetch();

        if (empty($admin_result)) {            
            $message[] = "Incorrect password or username";
            header("Location: " . $host . "/index.php?action=admin&message=" . $message[0]);
            exit();
        }else{
            session_start();
            $_SESSION['id'] = $admin_result->id;          
            $_SESSION['username'] = $admin_result->username;
            
            $message[] = "Login successfully";
            header("Location: " . $host . "/index.php?action=dashboard&message=" . $message[0]);
            exit();
        }
    }


}


?>