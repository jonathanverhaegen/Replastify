<?php
include_once(__DIR__ . "/Db.php");

class Message{

    private $text;
    private $sender_id;
    private $receiver_id;










    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }


    /**
     * Get the value of sender_id
     */ 
    public function getSender_id()
    {
        return $this->sender_id;
    }

    /**
     * Set the value of sender_id
     *
     * @return  self
     */ 
    public function setSender_id($sender_id)
    {
        $this->sender_id = $sender_id;

        return $this;
    }

    /**
     * Get the value of receiver_id
     */ 
    public function getReceiver_id()
    {
        return $this->receiver_id;
    }

    /**
     * Set the value of receiver_id
     *
     * @return  self
     */ 
    public function setReceiver_id($receiver_id)
    {
        $this->receiver_id = $receiver_id;

        return $this;
    }

    public static function getAllForPrinter($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT MAX(`id`), sender_id FROM messages WHERE `receiver_id` = :id GROUP BY `sender_id` ");
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getChat($id,$user_id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from messages where (sender_id = :id or sender_id = :user_id) AND (receiver_id = :id or receiver_id = :user_id)");
        $statement->bindValue(":id", $id);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("insert into messages (text, time, sender_id, receiver_id) values (:text, sysdate(), :sender_id, :receiver_id)");
        $statement->bindValue(":text", $this->text);
        $statement->bindValue(":sender_id", $this->sender_id);
        $statement->bindValue(":receiver_id", $this->receiver_id);
        $statement->execute();
    }
}