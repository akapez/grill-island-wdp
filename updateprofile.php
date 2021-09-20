<?php 
require_once 'includes/header.php'; 
include_once("./config/conn1.php")
?>

<!--banner-->
<section class="pro-banner"></section>

<!--user edit form-->
<div class="profile-form">

    <?php    

        if(isset($_GET['error'])){
            if($_GET['error'] == 'emptyNameAndEmail'){
                ?>
                <div class="alert" style="background-color: #FF2626;"><p style="font-size: 13px">Name and Email is required</p></div>
        
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