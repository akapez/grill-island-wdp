<?php 
   require_once 'components/header.php';
   require_once('./config/variables.php');
 ?>  

   <?php require_once("controllers/UserInterface.php"); 
    $action = isset($_GET['action']) ? $_GET['action'] : '';
   //  echo $action;

    $userinterface = new UserInterface();

    switch ($action) {
       case 'register':
         if(isset($_SESSION['email'])){
            header("Location: " . $host . "/index.php?action=profile");
            break;
         }else if(isset($_SESSION['username'])){
            header("Location: " . $host . "/index.php?action=dashboard");       
            break;
         }
         echo  $userinterface->register();
          break;
       case 'login':
         if(isset($_SESSION['email'])){
            header("Location: " . $host . "/index.php?action=profile");
            break;
         }else if(isset($_SESSION['username'])){
            header("Location: " . $host . "/index.php?action=dashboard");       
            break;
         }
         echo $userinterface->login();
          break;      
       case 'profile':
         if(!isset($_SESSION['email'])){
            header("Location: " . $host . "/index.php?action=login");
            break;
         }
         echo $userinterface->profile();
          break;
       case 'admin':
         if(isset($_SESSION['username'])){
            header("Location: " . $host . "/index.php?action=dashboard");
            break;
         }else if(isset($_SESSION['email'])){
            header("Location: " . $host . "/index.php?action=profile");       
            break;
         }
         echo $userinterface->admin();                
         break;      
       case 'dashboard':
         if(!isset($_SESSION['username'])){
            header("Location: " . $host . "/index.php?action=admin");
            break;
         }
         echo $userinterface->dashboard();
         break;
       
       default:   
        if(isset($_SESSION['email'])){
         header("Location: " . $host . "/index.php?action=profile");       
         break;
        }
         echo $userinterface->login();
         break;        
    }
    
   ?>


<?php require_once 'components/footer.php'; ?>