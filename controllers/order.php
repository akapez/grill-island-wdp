<?php
class order
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }


    public function insertOrderData($fullName, $email, $address, $status, $fullAmount)
    {
        try {
            $sql = "INSERT INTO orders (fullName,email,address,status,fullAmount) VALUES (:fullName,:email,:address,:status,:fullAmount)";
            $statement = $this->db->prepare($sql);

            $statement->bindparam(':fullName', $fullName);
            $statement->bindparam(':email', $email);
            $statement->bindparam(':address', $address);
            $statement->bindparam(':status', $status);
            $statement->bindparam(':fullAmount', $fullAmount);

            $statement->execute();
            return true;
        } catch (PDOException $e) {
            // echo $e->getMessage();
            $e->getMessage();
            return false;
        }
    }

    // public function insertCartData($cusemail, $foodName, $variety, $size, $qty)
    // {
    //     try {

    //         $sql = "INSERT INTO order_items (email,foodName,variety,size,qty) VALUES (:email,:foodName,:variety,:size,:qty)";
    //         $statement = $this->db->prepare($sql);

    //         $statement->bindparam('email', $cusemail);
    //         $statement->bindparam('foodName', $foodName);
    //         $statement->bindparam('variety', $variety);
    //         $statement->bindparam('size', $size);
    //         $statement->bindparam('qty', $qty);


    //         $statement->execute();

    //         return true;
    //     } catch (PDOException $e) {
    //         // echo $e->getMessage();
    //         $e->getMessage();
    //         return false;
    //     }
    // }


    public function getOrderData()
    {
        try {
            $sql = "SELECT * FROM orders";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            // echo $e->getMessage();
            $e->getMessage();
            return false;
        }
    }

    public function getOrderDetails($id)
    {
        try {
            $sql = "SELECT * FROM orders WHERE id = :id";
            $statement = $this->db->prepare($sql);
            $statement->bindparam(':id', $id);
            $result = $statement->execute();
            $result = $statement->fetch();
            return $result;
        } catch (PDOException $e) {
            // echo $e->getMessage();
            $e->getMessage();
            return false;
        }
    }

    public function updateOrderData($id, $status)
    {
        try {
            $sql = "UPDATE orders SET status=:status WHERE id = :id ";
            $statement = $this->db->prepare($sql);
            $statement->bindparam(':id', $id);
            $statement->bindparam(':status', $status);

            $statement->execute();
            return true;
        } catch (PDOException $e) {
            //  echo $e->getMessage();
            $e->getMessage();
            return false;
        }
    }
}
