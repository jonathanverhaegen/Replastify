<?php
include_once(__DIR__ . "/Db.php");

class Order{
    private $user_id; 	
    private $printer_id; 	
    private $price; 	
    private $model_id;
    private $title; 
    private $description;
    private $ready;

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
        return $statement->fetch();
    }

    public static function getOrderForUserById($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from opdrachten INNER JOIN `users` ON `opdrachten`.`printer_id` = `users`.`id` where `opdrachten`.`id` = :id ");
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetch();
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        if(empty($title)){
            throw new Exception("Titel mag niet leeg zijn");
        }
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of ready
     */ 
    public function getReady()
    {
        return $this->ready;
    }

    /**
     * Set the value of ready
     *
     * @return  self
     */ 
    public function setReady($ready)
    {
        $this->ready = $ready;

        return $this;
    }

    public function saveOrder(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("insert into opdrachten (user_id, printer_id, model_id, time, title, description, ready) values (:user_id, :printer_id, :model_id, sysdate(), :title, :description, :ready)");
        $statement->bindvalue(":user_id", $this->user_id);
        $statement->bindvalue(":printer_id", $this->printer_id);
        $statement->bindvalue(":model_id", $this->model_id);
        $statement->bindvalue(":title", $this->title);
        $statement->bindvalue(":description", $this->description);
        $statement->bindvalue(":ready", $this->ready);
        $statement->execute();
    }

    public static function getOrdersForUser($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from users INNER JOIN opdrachten ON  `users`.`id` =`opdrachten`.`printer_id` where user_id = :id order by time desc ");
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function updateStatus($status, $id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("update opdrachten set status = :status where id = :id");
        $statement->bindValue(":status", $status);
        $statement->bindValue(":id", $id);
        $statement->execute();
    }

    public static function updatePrice($ready, $price, $id, $status){
        $conn = Db::getConnection();
        $statement = $conn->prepare("update opdrachten set ready = :ready, price = :price, status = :status where id = :id");
        $statement->bindValue(":ready", $ready);
        $statement->bindValue(":price", $price);
        $statement->bindValue(":id", $id);
        $statement->bindValue(":status", $status);
        $statement->execute();
    }
}