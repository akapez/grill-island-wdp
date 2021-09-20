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
            <form method="POST" action="users/login.php" autocomplete="off">
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
            <form method="POST" action="users/register.php" autocomplete="off">
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
        <section class="profile-banner"></section>

        <div class="profile">
            ' . $successMessage . ' 
            <div class="card" style="background: #0F52BA">           
              <div class="card_container">
                <a class="profile_link" href="updateprofile.php"><h4><b>UPDATE USER PROFILE</b></h4></a>                  
              </div>
            </div>
            <div class="card" style="background: #261C2C">           
            <div class="card_container">
              <a class="profile_link" href="orderhistory.php"><h4><b>VIEW ORDER HISTORY</b></h4></a>                  
            </div>
          </div>
        </div>

        
        ';
  }
}

?>
