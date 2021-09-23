<?php
class menuItems
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }


    public function insertMenuData($foodName, $variety, $size, $price , $image_path)
    {
        try {
            $sql = "INSERT INTO menus (foodName,variety,size,price,foodImage) VALUES (:foodName,:variety,:size,:price,:foodImage)";
            $statement = $this->db->prepare($sql);

            $statement->bindparam(':foodName', $foodName);
            $statement->bindparam(':variety', $variety);
            $statement->bindparam(':size', $size);
            $statement->bindparam(':price', $price);
            $statement->bindparam(':foodImage', $image_path);

            $statement->execute();
            return true;
        } catch (PDOException $e) {
            // echo $e->getMessage();
            $e->getMessage();
            return false;
        }
    }

    public function getMenuData()
    {
        try {
            $sql = "SELECT * FROM menus";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            // echo $e->getMessage();
            $e->getMessage();
            return false;
        }
    }

    public function getMenuDetails($id)
    {
        try {
            $sql = "SELECT * FROM menus WHERE id = :id";
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

    public function updateMenuData($id, $foodName, $variety, $size, $price, $image_path)
    {
        try {
            $sql = "UPDATE menus SET foodName=:foodName,variety=:variety,size=:size,price=:price,foodImage=:foodImage WHERE id = :id ";
            $statement = $this->db->prepare($sql);   
            $statement->bindparam(':id', $id);
            $statement->bindparam(':foodName', $foodName);
            $statement->bindparam(':variety', $variety);
            $statement->bindparam(':size', $size);
            $statement->bindparam(':price', $price);
            $statement->bindparam(':foodImage', $image_path);
      
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            //  echo $e->getMessage();
            $e->getMessage();
            return false;
        }
    }

    public function deleteMenu($id){
        try{
             $sql = "DELETE from menus where id = :id";
             $statement = $this->db->prepare($sql);
             $statement->bindparam(':id', $id);
             $statement->execute();
             return true;
         }catch (PDOException $e) {
            //  echo $e->getMessage();
            $e->getMessage();
             return false;
         }
     }
}
