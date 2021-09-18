<?php require_once 'includes/header.php'; ?>

<section class="register-banner"></section>

<!--contact form-->
<div class="register-form">
  <h3>REGISTER</h3>
  <form action="" autocomplete="off">
    <input class="register_input" type="text" name="name" placeholder="Name" />    
    <input class="register_input" type="text" name="email" placeholder="E-mail" />    
    <input class="register_input" type="password" name="password" placeholder="Password" />    
    <input class="register_input" type="password" name="confirmpassword" placeholder="Confirm Password" /> 
    <button class="register_button" type="submit">Register</button>
  </form>
  <h5>
    Have an Account? <a class="register" href="login.php">Login</a>
  </h5>
</div>


<?php require_once 'includes/footer.php'; ?>