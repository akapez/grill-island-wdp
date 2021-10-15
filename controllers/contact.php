<?php
class contact
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }


    public function insertContact($firstname, $lastname, $email, $mobile, $message)
    {
        try {
            $sql = "INSERT INTO contacts (firstname, lastname, email, mobile, message) 
            VALUES (:firstname, :lastname, :email, :mobile, :message)";
            $statement = $this->db->prepare($sql);

            $statement->bindparam(':firstname', $firstname);
            $statement->bindparam(':lastname', $lastname);
            $statement->bindparam(':email', $email);
            $statement->bindparam(':mobile', $mobile);
            $statement->bindparam(':message', $message);

            $statement->execute();
            return true;
        } catch (PDOException $e) {
            // echo $e->getMessage();
            $e->getMessage();
            return false;
        }
    }
}