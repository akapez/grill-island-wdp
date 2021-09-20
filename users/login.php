<?php 

include_once("../config/variables.php");
include_once("../config/conn2.php");

if(isset($_POST['login'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $message = array();

    if (empty($email) && empty($password)) {
        $message[] = "Please fill all the fields";           
        header("Location: " . $host . "/index.php?action=login&message=" . $message[0]);
        exit();
    }else if(strlen($password) < 6){
        $message[] = "Make sure your password has atleast 6 latter";
        header("Location: " . $host . "/index.php?action=register&message=" . $message[0]);   
        exit();
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Something went wrong with email";
        $message[] = "This is not a valid email address";
        header("Location: " . $host . "/index.php?action=login&message=" . $message[0]);
        exit();        
    }else{
        $database = new Database();
        $dbh = $database->connect();
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $hash_password = md5($password);

        $email_password_finding_sql = "SELECT id, name, email FROM customers WHERE email=:email AND password=:password";
        $email_password_finding_stat = $dbh->prepare($email_password_finding_sql);
        $email_password_finding_stat->bindParam("email", $email);
        $email_password_finding_stat->bindParam("password", $hash_password);
        $email_password_finding_stat->execute();
        $email_password_result = $email_password_finding_stat->fetch();

        if (empty($email_password_result)) {            
            $message[] = "Incorrect password or email";
            header("Location: " . $host . "/index.php?action=login&message=" . $message[0]);
            exit();
        }else{
            session_start();
            $_SESSION['id'] = $email_password_result->id;
            $_SESSION['name'] = $email_password_result->name;
            $_SESSION['email'] = $email_password_result->email;
            
            $message[] = "Login successfully";
            header("Location: " . $host . "/index.php?action=profile&message=" . $message[0]);
            exit();
        }
    }


}


?>