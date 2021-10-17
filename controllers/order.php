<?php
class order
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getOrderData()
    {
        try {
            $sql = "SELECT * FROM orders";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {        
            $e->getMessage();
            return false;
        }
    }

    public function getOrderDetails($id)
    {
        try {
            $sql = "SELECT * FROM orders WHERE orderId = :orderId";
            $statement = $this->db->prepare($sql);
            $statement->bindparam(':orderId', $id);
            $result = $statement->execute();
            $result = $statement->fetch();
            return $result;
        } catch (PDOException $e) {   
            $e->getMessage();
            return false;
        }
    }

    public function updateOrderData($id, $status)
    {
        try {
            $sql = "UPDATE orders SET status=:status WHERE orderId = :orderId ";
            $statement = $this->db->prepare($sql);
            $statement->bindparam(':orderId', $id);
            $statement->bindparam(':status', $status);

            $statement->execute();
            return true;
        } catch (PDOException $e) {       
            $e->getMessage();
            return false;
        }
    }
}
