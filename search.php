<?php
require_once 'components/header.php';
require_once 'config/DatabaseConn1.php';

?>

<!--banner-->
<section class="menu_banner"></section>




<!--menu container-->
<div class="menu_container" style="margin-top:5%">



  <?php 
     if(isset($_POST['submit-search'])){
        $search = mysqli_real_escape_string($connection, $_POST['search']);
        $sql = "SELECT * FROM menus WHERE foodName LIKE '%$search%'";
        $res = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($res);

        if($count > 0){
            while ($row = mysqli_fetch_assoc($res)) {
                echo "               
                <form action='cart_manage.php' method='POST'>
                <div class='menu'>
                  <h4 style='margin-bottom: 3%' >Search Result</h3>
                  <h4 style='margin-bottom: 10%; color: #da0037'>$row[foodName]</h3>
                  <img class='menu-img' src='$row[foodImage]' alt='menu-item' />
                  <h4>$row[foodName]</h4>
                  <h5 style='color: #4A403A'>$row[variety]</h5>
                  <h5 style='color: #A2416B'>$row[size]</h5>
                  <p>RS. $row[price]</p>       
                  <div>
                    <button class='order_button' name='addToCart' type='submit'>ADD TO CART</button>  
                    <input type='hidden' name='foodName' value='$row[foodName]' />
                    <input type='hidden' name='variety' value='$row[variety]'  />
                    <input type='hidden' name='size' value='$row[size]' />
                    <input type='hidden' name='price' value='$row[price]' />         
                    <input type='hidden' name='foodImage' value='$row[foodImage]'/> 
                  </div>
                  <a href='menu.php'><button type='button' class='back-btn'>BACK</button> </a>
                </div>
              </form>
              
                ";
            }

        }else{
            echo "<div class='warning'>
            <strong>Food Item Not Available</strong>         
            </div>         
            
            ";
        }
     }

  ?>


</div>




<?php require_once 'components/footer.php'; ?>