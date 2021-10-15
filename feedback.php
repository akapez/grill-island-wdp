<?php require_once 'components/header.php';

       require_once 'config/DatabaseConn2.php';

       ?>

<section class="feedback-banner"></section>

<?php

       if (isset($_POST['submit'])) {
        $experience = $_POST['experience'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $pnumber = $_POST['pnumber'];
        $gender = $_POST['gender'];
        $message = $_POST['message'];  

        $isSuccessFeedback = $feedback->insertFeedback($experience, $fullname, $email, $age, $pnumber, $gender, $message);

        if($isSuccessFeedback){
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

<div class="feedback-form">
  <form method="post" action="" autocomplete="off">
    <div class="feedback-container">
      <h3>FEEDBACK FORM</h3>
      <hr />

      <label for="experience">How do you rate your overall experience?</label><br />
      <input type="radio" id="good" name="experience" style="cursor:pointer"/>
      <label for="Good" style="cursor:pointer">Good</label><br />
      <input type="radio" id="average" name="experience" style="cursor:pointer"/>
      <label for="average" style="cursor:pointer">Average</label><br />
      <input type="radio" id="bad" name="experience" style="cursor:pointer"/>
      <label for="bad" style="cursor:pointer">Bad</label><br /><br />

      <input type="text" class="fb_input" name="fullname" placeholder="Full Name" required>

      <input type="email" class="fb_input" name="email" placeholder="Email Address" required>

      <input class="fb_input" type="number" placeholder="Age" name="age" id="age" required />

      <input class="fb_input" type="number" placeholder="Phone Number" id="pnumber" name="pnumber" required />

      <label for="gender">Select Gender</label><br />
      <input type="radio" id="male" name="gender" style="cursor:pointer"/>
      <label for="male" style="cursor:pointer">Male</label><br />
      <input type="radio" id="female" name="gender" style="cursor:pointer"/>
      <label for="female" style="cursor:pointer">Female</label><br /><br />

      <textarea class="fb_input" rows="6" placeholder="Message" name="message" id="message" required></textarea>

      <button id="submit" type="submit" name="submit" class="feedbackbtn">
        SUBMIT
      </button>
    </div>
  </form>
</div>

<?php require_once 'components/footer.php'; ?>