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

            <!--user edit form-->
            <div class="profile-form">
            ' . $successMessage . ' 
            <form method="" action="" autocomplete="off">
            <div class="profile-container">
            <h3>PROFILE</h3>
            <hr />

            <label for="name"><b>Name</b></label>
            <input type="text" name="name" id="name" required />

            <label for="email"><b>Email</b></label>            
            <input type="text" name="email" id="email" required />

            <label for="password"><b>Password</b></label>
            <input type="password" name="password" id="password" required />
           
            <label for="confirmpassword"><b>Confirm Password</b></label>
            <input type="password" name="confirmpassword" id="confirmpassword" required />           
          
            <button id="submit" type="submit" name="submit" class="updatebtn">
              UPDATE
            </button>
            </div>
            </form>
            </div>

            <div class="orders-section">
            <h3>ORDER HISTORY</h3>
            <div class="order-container">
            
            <hr />
            <tr>
            <table id="orders">
            <th>TOTAL (Rs.)</th>
            <th>ID</th>
            <th>STATUS</th>
            <th>PAID</th>
            <tr>
            </tr>
            <td>200.00</td>
            <td>1</td>
            <td>Delivered</td>
            <td>YES</td>
            </table>
            </tr>
            </div>
            </div>
            ';
  }
}

?>
