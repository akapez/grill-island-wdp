<?php  
  session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST["addToCart"])){
    if(isset($_SESSION["cart"])){
      $cartItem=array_column($_SESSION["cart"],'foodName');
      if(in_array($_POST["foodName"],$cartItem)){
        echo "<script>alert('Item is already added in the cart..!')</script>";
        echo "<script>window.location = 'menu.php'</script>";
      }else{
      $count=count($_SESSION["cart"]);
      $_SESSION["cart"][$count]=array('foodName'=>$_POST['foodName'],'variety'=>$_POST['variety'],'size'=>$_POST["size"],'price'=>$_POST['price'],'foodImage'=>$_POST['foodImage'],'quantity'=>1); 
      echo "<script>alert('Item added to the cart..!')</script>";
      echo "<script>window.location = 'menu.php'</script>";     
      }
    }else{
      $_SESSION["cart"][0]=array('foodName'=>$_POST['foodName'],'variety'=>$_POST['variety'],'size'=>$_POST["size"],'price'=>$_POST['price'],'foodImage'=>$_POST['foodImage'],'quantity'=>1);
      echo "<script>alert('Item added to the cart..!')</script>";
      echo "<script>window.location = 'menu.php'</script>";
    }
  }

  if(isset($_POST["removeItem"])){
    foreach($_SESSION["cart"] as $key => $value){     
        if($value['foodName']==$_POST['foodName']){
            unset($_SESSION['cart'][$key]);
            $_SESSION["cart"]=array_values($_SESSION["cart"]);
            echo "<script>alert('Item removed from the cart..!')</script>";
            echo "<script>window.location = 'cart.php'</script>";
        }
        
    }
  }
  if(isset($_POST['mod_quantity'])){
    foreach($_SESSION["cart"] as $key => $value){     
      if($value['foodName']==$_POST['foodName']){
          $_SESSION['cart'][$key]['quantity']=$_POST['mod_quantity'];
          echo "<script>window.location = 'cart.php'</script>";
      }
      
  }
  }
} ?>