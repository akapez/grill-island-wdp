<?php

class UserInterface
{

  public function login()
  {
    $error = isset($_GET['message']) ? $_GET['message'] : '';   

    if ($error) {
      $errorMessage = '<div class="alert" style="background-color: #FF2626;"> <p style="font-size: 13px">' . $error . '</p></div>';
    } else {
      $errorMessage =  '';
    }
    return '
            <section class="user_screen_banner"></section>
            <div class="user_form"> 
            <h3>LOGIN</h3>
            <form method="POST" action="controllers/login.php" autocomplete="off">
            ' . $errorMessage . '          
            <input  class="user_input" type="text" name="email" placeholder="E-mail">   
            <input  class="user_input" type="password" name="password" placeholder="Password">  
            <button class="_button" type="submit" name="login" >Login</button>
            </form>   
            </div>          
            ';
  }

  public function register()
  {
    $error = isset($_GET['message']) ? $_GET['message'] : '';

    if ($error) {
      $errorMessage = '<div class="alert" style="background-color: #FF2626;"><p style="font-size: 13px">' . $error . '</p></div>';
    } else {
      $errorMessage =  '';
    }
    return '
            <section class="user_screen_banner"></section>
            <div class="user_form"> 
            <h3>REGISTER</h3>
            <form method="POST" action="controllers/register.php" autocomplete="off">
            ' . $errorMessage . ' 
            <input class="user_input" type="text" name="name" id="name" placeholder="Name" />    
            <input class="user_input" type="text" name="email" id="email" placeholder="E-mail" />    
            <input class="user_input" type="password" name="password" id="password" placeholder="Password" /> 
            <input class="user_input" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" />     
            <button class="_button" type="submit" name="register">Register</button>
            </form>
            </div>     
            ';
  }

  public function profile()
  {
    $success = isset($_GET['message']) ? $_GET['message'] : '';

    if ($success) {
      $successMessage = '<div class="alert" style="background-color: #50CB93;"><p style="font-size: 13px">' . $success . '</p></div>';
    } else {
      $successMessage =  '';
    }
   
    return '            
        <section class="user-profile-banner"></section>

        <div class="user-profile">
            ' . $successMessage . ' 
            <div class="card" style="background: #261C2C">           
              <div class="card_container">
                <a class="profile_link" href="updateprofile.php"><h4><i class="far fa-user-circle" style="margin-right: 5px"></i><b>UPDATE USER PROFILE</b></h4></a>                  
              </div>
            </div>
            <div class="card" style="background: #261C2C">           
            <div class="card_container">
              <a class="profile_link" href="orderhistory.php"><h4><i class="fas fa-shopping-basket" style="margin-right: 5px"></i><b>VIEW ORDER HISTORY</b></h4></a>                  
            </div>
          </div>
        </div>

        
        ';
  }

  public function admin()
  {
    $error = isset($_GET['message']) ? $_GET['message'] : '';   

    if ($error) {
      $errorMessage = '<div class="alert" style="background-color: #FF2626;"> <p style="font-size: 13px">' . $error . '</p></div>';
    } else {
      $errorMessage =  '';
    }
    return '
            <section class="user_screen_banner"></section>
            <div class="user_form"> 
            <h3>ADMIN LOGIN</h3>
            <form method="POST" action="controllers/admin.php" autocomplete="off">
            ' . $errorMessage . '          
            <input  class="user_input" type="text" name="username" placeholder="User Name">   
            <input  class="user_input" type="password" name="password" placeholder="Password">  
            <button class="_button" type="submit" name="admin" >Login</button>
            </form>   
            </div>          
            ';
  }

  public function dashboard()
  {
    $success = isset($_GET['message']) ? $_GET['message'] : '';

    if ($success) {
      $successMessage = '<div class="alert" style="background-color: #50CB93;"><p style="font-size: 13px">' . $success . '</p></div>';
    } else {
      $successMessage =  '';
    }
   
    return '            
        <section class="admin-profile-banner"></section>

        <div class="admin-profile">
            ' . $successMessage . ' 
            <div class="card" style="background: #261C2C">           
              <div class="card_container">
                <a class="profile_link" href="foods.php"><h4><i class="fas fa-hamburger" style="margin-right: 5px"></i><b>ADD FOOD ITEMS</b></h4></a>                  
              </div>
            </div>

            <div class="card" style="background: #261C2C">           
            <div class="card_container">
              <a class="profile_link" href=""><h4><i class="fas fa-hamburger" style="margin-right: 5px"></i><b>VIEW FOOD ITEMS</b></h4></a>                  
            </div>            
            </div>

            <div class="card" style="background: #261C2C">           
            <div class="card_container">
              <a class="profile_link" href=""><h4><i class="fas fa-shopping-basket" style="margin-right: 5px"></i><b>ORDER MANAGE</b></h4></a>                  
            </div>            
            </div>

            <div class="card" style="background: #261C2C">           
            <div class="card_container">
              <a class="profile_link" href=""><h4><i class="far fa-comments" style="margin-right: 5px"></i><b>VIEW CUSTOMER FEEDBACKS</b></h4></a>                  
            </div>            
            </div>

            <div class="card" style="background: #261C2C">           
            <div class="card_container">
              <a class="profile_link" href=""><h4><i class="far fa-address-book" style="margin-right: 5px"></i><b>VIEW CONTACTS</b></h4></a>                  
            </div>            
            </div>
            
        </div>

        
        ';
  }

  
}

?>
