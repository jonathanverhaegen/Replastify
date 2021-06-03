<?php
include_once(__DIR__ . "/Db.php");

class User{
    private $username; 	
    private $email; 	
    private $password; 	
    private $firstname; 	
    private $lastname; 	
    private $picture;

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        if(empty($picture)){
            $this->picture = "skull.jpg";
            return $this;
        }else{
            $this->picture = $picture;

            return $this;
        }
        
    }

    public function register(){
        $options = [
            'cost' => 15
        ];
        $password = password_hash($this->password, PASSWORD_DEFAULT, $options);
        $conn = Db::getConnection();
        $statement = $conn->prepare("insert into users (username, firstname, lastname, email, password, picture)  values (:username, :firstname, :lastname, :email, :password, :picture)");
        $statement->bindValue(":username", $this->username);
        $statement->bindValue(":firstname", $this->firstname);
        $statement->bindValue(":lastname", $this->lastname);
        $statement->bindValue(":email", $this->email);
        $statement->bindValue(":password", $password);
        $statement->bindValue(":picture", $this->picture);
        $statement->execute();
    }
}