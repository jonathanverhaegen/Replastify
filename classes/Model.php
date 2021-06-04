<?php
include_once(__DIR__ . "/Db.php");
class Model{
    private $name; 	
    private $image;
    private $model;	
    private $description;	
    private $user_id;

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        if(empty($name)){
            throw new Exception("name mag niet leeg zijn");
        }
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */ 
    public function setModel($model)
    {
        if(empty($model)){
            throw new Exception("Model mag niet leeg zijn");
        }
        $this->model = $model;

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

    public static function getAllModels(){
        
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from models");
        
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public static function getModelById($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from models where id = :id");
        $statement->bindvalue("id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function saveModel(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("INSERT INTO models (`name`,`image`,`3dmodel`,`description`,`user_id`,`time`) values (:name, :image, :model, :description, :user_id, sysdate())");
        $statement->bindvalue("name", $this->name);
        $statement->bindvalue("image", $this->image);
        $statement->bindvalue("model", $this->model);
        $statement->bindvalue("description", $this->description);
        $statement->bindvalue("user_id", $this->user_id);
        $statement->execute();
        
    }

    public static function getPopModels(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from models limit 4");
        
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}