<?php require_once 'components/header.php';

   require_once 'config/DatabaseConn2.php';

?>

<!--Contact Section-->
<div class="contacts">
  <div class="contact-section">
    <div class="contact-container">
      <div class="contactInfo">
        <div>
          <h2>Contact Info</h2>
          <ul class="info">
            <li>
              <span><i class="fas fa-map-marker-alt"></i></span>
              <span>
                No.66, R.A. De Mel Mawatha, <br />Colombo 04.
              </span>
            </li>
            <li>
              <span><i class="far fa-paper-plane"></i></span>
              <span>contact@grillisland.com</span>
            </li>
            <li>
              <span><i class="fas fa-phone-square"></i></span>
              <span>0112 600 306</span>
            </li>
          </ul>
        </div>
      </div>

      <?php

if (isset($_POST['submit'])) {
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $email = $_POST['email'];
 $mobile = $_POST['mobile'];
 $message = $_POST['message'];  

 $isSuccessContact = $feedback->insertContact($firstname, $lastname, $email, $mobile, $message);

 if($isSuccessContact){
   ?>
   <div class="alert" style="background-color: #50CB93;"><p style="font-size: 13px">Successfully saved</p></div>

   <?php
}else{
   ?>
   <div class="alert" style="background-color: #FF2626;"><p style="font-size: 13px">Something went wrong</p></div>

   <?php
} 

}
?>

      <div class="contactForm">
        <h2>Send a Message</h2>
        <div class="msgBox">
          <div class="inputBox w50">
          <input type="text" name="firstname" id="firstname" required />
            <span>First Name</span>
          </div>
          <div class="inputBox w50">
          <input type="text" name="lastname" id="lastname" required />
            <span>Last Name</span>
          </div>
          <div class="inputBox w50">
          <input type="email" name="email" id="email" required />
            <span>Email</span>
          </div>
          <div class="inputBox w50">
          <input type="number" name="mobile" id="mobile" required />
            <span>Mobile</span>
          </div>
          <div class="inputBox w100">
            <textarea name="message" id="message" required></textarea>
            <span>Write Your Message</span>
          </div>
          <div class="inputBox w100">
            <input type="submit" id="submit" name="submit">
          </div>
        </div>
      </div>
    </div>
</div>
</div>

<?php require_once 'components/footer.php'; ?>