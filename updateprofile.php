<?php 
require_once 'includes/header.php'; 
include_once("./config/Database.php")
?>

<!--banner-->
<section class="pro-banner"></section>

<!--user edit form-->
<div class="profile-form">

    <?php    

        if(isset($_GET['error'])){
            if($_GET['error'] == 'emptyNameAndEmail'){
                ?>
                <div class="alert" style="background-color: #FF2626;"><p style="font-size: 13px">All fields are required</p></div>
        
                <?php
            }else if($_GET['error'] == 'emailNotValid'){
                ?>
                <div class="alert" style="background-color: #FF2626;"><p style="font-size: 13px">Email is not valid</p></div>
        
                <?php
            }else if($_GET['error'] == 'passwordNotMatch'){
                ?>
                <div class="alert" style="background-color: #FF2626;"><p style="font-size: 13px">Password didn't match</p></div>
        
                <?php
            }else if($_GET['error'] == 'passwordNotStrong'){
                ?>
                <div class="alert" style="background-color: #FF2626;"><p style="font-size: 13px">Make sure your password has 6 character</p></div>
        
                <?php
            }
          
        }
    ?>
  <form method="POST" action="./users/profile.php" autocomplete="off">
      <?php           
       
        $current_user = $_SESSION['email'];
        $sql = "SELECT * FROM customers WHERE email='$current_user'";
      
        $fetch_result = mysqli_query($connection, $sql); 

        if($fetch_result){
            if(mysqli_num_rows($fetch_result)>0){
                while($row = mysqli_fetch_array($fetch_result)){
                    // print_r($row);
                ?>
            <div class="profile-container">
                <h3>PROFILE</h3>
                <hr />
            <label for="name"><b>Name</b></label>
            <input type="text" name="username"  value="<?php echo $row['name'];?>"/>

            <label for="email"><b>Email</b></label>
            <input type="text" name="useremail" value="<?php echo $row['email'];?>"/>

            <label for="password"><b>Password</b></label>
            <input type="password" name="userpassword"/>

            <label for="confirmpassword"><b>Confirm Password</b></label>
            <input type="password" name="userconfirmpassword"/>
     
            <button type="submit" name="update" value="Update" class="updatebtn">
               UPDATE
            </button>
            </div>
                <?php
                }
            }
        }
      ?>
   
  </form>
</div>

<?php require_once 'includes/footer.php'; ?>