<?php 
include_once(__DIR__ . "/Db.php");

class Post{
    private $postName; 	
    private $text; 	
    private $image; 	
    private $user_id; 

    /**
     * Get the value of postName
     */ 
    public function getPostName()
    {
        return $this->postName;
    }

    /**
     * Set the value of postName
     *
     * @return  self
     */ 
    public function setPostName($postName)
    {
        $this->postName = $postName;

        return $this;
    }

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

    public function savePost($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("insert into posts (text, user_id, time) values (:text, :user_id, sysdate())");
        $statement->bindValue(":user_id", $id);
        $statement->bindValue(":text", $this->text);
        $statement->execute();
    }

    public static function getAllPosts(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from posts INNER JOIN users on `posts`.`user_id` = `users`.`id` order by time desc");
        $statement->execute();
        return $statement->fetchAll();
    }
}