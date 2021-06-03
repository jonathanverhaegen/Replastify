<?php 

class Comment{
    private $comment;	
    private $post_id;	
    private $user_id;

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of post_id
     */ 
    public function getPost_id()
    {
        return $this->post_id;
    }

    /**
     * Set the value of post_id
     *
     * @return  self
     */ 
    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;

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

    public function saveComment(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("insert into comments (comment, user_id, post_id) values (:comment, :user_id, :post_id)");
        $statement->bindValue(":user_id", $this->user_id);
        $statement->bindValue(":comment", $this->comment);
        $statement->bindValue(":post_id", $this->post_id);
        $statement->execute();
    }

    public static function getCommentsForPost($post_id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from comments INNER JOIN `users` ON `comments`.`user_id` = `users`.`id` where post_id = :post_id");
        $statement->bindValue(":post_id", $post_id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}