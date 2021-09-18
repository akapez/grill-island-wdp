<?php require_once 'includes/header.php'; ?>

<section class="feedback-banner"></section>

<div class="feedback-form">
  <form method="post" action="" autocomplete="off">
    <div class="feedback-container">
      <h3>FEEDBACK FORM</h3>
      <hr />
      <label for="experience">How do you rate your overall experience?</label><br />
      <input type="radio" id="good" name="experience" value="good" />
      <label for="Good">Good</label><br />
      <input type="radio" id="average" name="experience" value="average" />
      <label for="average">Average</label><br />
      <input type="radio" id="bad" name="experience" value="bad" />
      <label for="bad">Bad</label><br /><br />

      <input class="fb_input" type="text" placeholder="Full Name" name="fullname" id="fullname" required />

      <input class="fb_input" type="text" placeholder="Email" name="email" id="email" required />

      <input class="fb_input" type="number" placeholder="Age" name="age" id="age" required />

      <input class="fb_input" type="number" placeholder="Phone Number" id="phone" name="phone" required />

      <label for="age">Select Gender</label><br />
      <input type="radio" id="male" name="gender" value="Male" />
      <label for="male">Male</label><br />
      <input type="radio" id="female" name="gender" value="Female" />
      <label for="female">Female</label><br /><br />

      <textarea class="fb_input" rows="6" placeholder="Message" name="message" id="message" required></textarea>

      <button id="submit" type="submit" name="submit" class="feedbackbtn">
        SUBMIT
      </button>
    </div>
  </form>
</div>

<?php require_once 'includes/footer.php'; ?>