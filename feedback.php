<?php require_once 'components/header.php';

       require_once 'config/DatabaseConn2.php';

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
          echo "<script>alert('User Registration Completed.')</script>";
        }else{
          echo "<script>alert('Something Went Wrong.')</script>";
        }     
      
    }
    ?>

<section class="feedback-banner"></section>

<div class="feedback-form">
  <form method="post" action="" autocomplete="off">
    <div class="feedback-container">
      <h3>FEEDBACK FORM</h3>
      <hr />

      <label for="experience">How do you rate your overall experience?</label><br />
      <input type="radio" id="good" name="experience" style="cursor:pointer" value="<?php echo $_POST['experience'] ??""; ?>" />
      <label for="Good" style="cursor:pointer">Good</label><br />
      <input type="radio" id="average" name="experience" style="cursor:pointer" value="<?php echo $_POST['experience'] ??""; ?>" />
      <label for="average" style="cursor:pointer">Average</label><br />
      <input type="radio" id="bad" name="experience" style="cursor:pointer" value="<?php echo $_POST['experience'] ??""; ?>" />
      <label for="bad" style="cursor:pointer">Bad</label><br /><br />

      <input type="text" class="fb_input" name="fullname" placeholder="Full Name" value="<?php echo $_POST['fullname'] ??""; ?>" required>

      <input type="email" class="fb_input" name="email" placeholder="Email Address" value="<?php echo $_POST['email'] ??""; ?>" required>

      <input class="fb_input" type="number" placeholder="Age" name="age" id="age" value="<?php echo $_POST['age'] ??""; ?>" required />

      <input class="fb_input" type="number" placeholder="Phone Number" id="phone" name="phone" value="<?php echo $_POST['pnumber'] ??""; ?>" required />

      <label for="gender">Select Gender</label><br />
      <input type="radio" id="male" name="gender" style="cursor:pointer" value="<?php echo $_POST['gender'] ??""; ?>" />
      <label for="male" style="cursor:pointer">Male</label><br />
      <input type="radio" id="female" name="gender" style="cursor:pointer" value="<?php echo $_POST['gender'] ??""; ?>" />
      <label for="female" style="cursor:pointer">Female</label><br /><br />

      <textarea class="fb_input" rows="6" placeholder="Message" name="message" id="message" value="<?php echo $_POST['message'] ??""; ?>" required></textarea>

      <button id="submit" type="submit" name="submit" class="feedbackbtn">
        SUBMIT
      </button>
    </div>
  </form>
</div>

<?php require_once 'components/footer.php'; ?>