<?php 

include_once("../config/variables.php");
include_once("../config/conn2.php");

if(isset($_POST['register'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

    // echo $name . $email . $password . $confirmPassword;

    // DECLARING EMPTY ARRAY OF ERRORS
    $message = array();

    if (empty($name) && empty($email) && empty($password) && empty($confirmPassword)) {
        $message[] = "Please fill all the fields";           
        header("Location: " . $host . "/index.php?action=register&message=" . $message[0]);
        exit();
    }else if(strlen($password) < 6){
        $message[] = "Make sure your password has atleast 6 latter";
        header("Location: " . $host . "/index.php?action=register&message=" . $message[0]);   
        exit();
    }else if($password !== $confirmPassword){
        $message[] = "Password didn't match";
        header("Location: " . $host . "/index.php?action=register&message=" . $message[0]);
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $message[] = "Email is not valid";
        header("Location: " . $host . "/index.php?action=register&message=" . $message[0]);   
        exit();
    }else{
        // echo "user validation success"; 
        $database = new Database();
        $dbh = $database->connect();
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $email_finding_sql = "SELECT * FROM customers WHERE email=:email";
        $email_finding_stat = $dbh->prepare($email_finding_sql);
        $email_finding_stat->bindParam("email", $email);
        $email_finding_stat->execute();
        $email_result = $email_finding_stat->fetch();

        if(empty($email_result)){

            $register_sql = "INSERT INTO customers(name, email, password) VALUES (:name, :email, :password)"; 
            $register_stat = $dbh->prepare($register_sql);
            $register_stat->bindParam("name", $name);
            $register_stat->bindParam("email", $email);
            $register_stat->bindParam("password", md5($password));
            $register_stat->execute();
    
            $message[] = "User has registered successfully";
            header("Location: " . $host . "/index.php?action=profile&message=" . $message[0]); 
            exit();

        }else{
            $message[] = "An user is already registered with this email";
            header("Location: " . $host . "/index.php?action=register&message=" . $message[0]);
            exit();
        }

      

    }


}



?>