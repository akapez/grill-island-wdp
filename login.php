<?php require_once 'includes/header.php'; ?>

<section class="login-banner"></section>

<!--contact form-->
<div class="login_form">
  <h3>LOG IN</h3>
  <form action="" autocomplete="off">
    <input  class="login_input" type="email" name="email" placeholder="E-mail">   
    <input  class="login_input" type="password" name="password" placeholder="Password">  
    <button class="login_button" type="submit">Login</button>
  </form>
  <h5>New Customer? <a class="register" href="register.php">Register</a></h5>
</div>

<?php require_once 'includes/footer.php'; ?>