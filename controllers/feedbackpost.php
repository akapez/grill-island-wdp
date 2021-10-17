<?php
class feedback
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }


    public function insertFeedback($experience, $fullname, $email, $age, $pnumber, $gender, $message)
    {
        try {
            $sql = "INSERT INTO feedback (experience, fullname, email, age, pnumber, gender, message) 
            VALUES (:experience, :fullname, :email, :age, :pnumber, :gender, :message)";
            $statement = $this->db->prepare($sql);

            $statement->bindparam(':experience', $experience);
            $statement->bindparam(':fullname', $fullname);
            $statement->bindparam(':email', $email);
            $statement->bindparam(':age', $age);
            $statement->bindparam(':pnumber', $pnumber);
            $statement->bindparam(':gender', $gender);
            $statement->bindparam(':message', $message);

            $statement->execute();
            return true;
        } catch (PDOException $e) {       
            $e->getMessage();
            return false;
        }
    }

    public function getFeedbackData()
    {
        try {
            $sql = "SELECT * FROM feedback";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {            
            $e->getMessage();
            return false;
        }
    }



}