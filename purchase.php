<?php  
include_once("./config/DatabaseConn1.php");
  session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['purchase'])){
       $query1 = "INSERT INTO `orders`(`fullName`, `email`, `address`, `status`) VALUES ('$_POST[fullName]','$_POST[pay_email]','$_POST[address]','$_POST[status]')";
       if(mysqli_query($connection,$query1)){
        $orderId=mysqli_insert_id($connection);
        $query2 = "INSERT INTO `order_items`(`orderId`, `foodName`, `variety`, `size`, `qty`, `price`) VALUES (?,?,?,?,?,?)";
        $stmt=mysqli_prepare($connection,$query2);
        if($stmt){
            mysqli_stmt_bind_param($stmt,"isssii",$orderId,$foodName,$variety,$size,$qty,$price);
            foreach($_SESSION["cart"] as $key => $value){
                $foodName=$value['foodName'];
                $variety=$value['variety'];
                $size=$value['size'];
                $qty=$value['quantity'];
                $price=$value['price'];
                mysqli_stmt_execute($stmt);
            }
            unset($_SESSION["cart"]);
            echo "<script>alert('Order creation successfully..!')</script>";
            echo "<script>window.location = 'cart.php'</script>";
        }else{
            echo "<script>alert('Something went wrong..!')</script>";
            echo "<script>window.location = 'cart.php'</script>";
        }
       }else{
        echo "<script>alert('Something went wrong..!')</script>";
        echo "<script>window.location = 'cart.php'</script>";
       }
       
    }
}
