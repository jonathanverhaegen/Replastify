<?php
include_once(__DIR__ . "/Db.php");

class Order{
    private $user_id; 	
    private $printer_id; 	
    private $price; 	
    private $model_id; 

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of printer_id
     */ 
    public function getPrinter_id()
    {
        return $this->printer_id;
    }

    /**
     * Set the value of printer_id
     *
     * @return  self
     */ 
    public function setPrinter_id($printer_id)
    {
        $this->printer_id = $printer_id;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of model_id
     */ 
    public function getModel_id()
    {
        return $this->model_id;
    }

    /**
     * Set the value of model_id
     *
     * @return  self
     */ 
    public function setModel_id($model_id)
    {
        $this->model_id = $model_id;

        return $this;
    }

    public static function getOrdersForPrinter($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from users INNER JOIN opdrachten ON  `users`.`id` =`opdrachten`.`user_id`  where printer_id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getOrderById($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from opdrachten INNER JOIN `users` ON `opdrachten`.`user_id` = `users`.`id` where `opdrachten`.`id` = :id ");
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}