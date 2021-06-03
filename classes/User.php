<?php
include_once(__DIR__ . "/Db.php");

class User{
    private $username; 	
    private $email; 	
    private $password; 	
    private $firstname; 	
    private $lastname; 	
    private $picture;
    private $street; 	
    private $housenumber; 	
    private $city; 	
    private $postalcode;
    private $type;

    /**
     * Get the value of street
     */ 
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @return  self
     */ 
    public function setStreet($street)
    {
        if(empty($street)){
            throw new Exception("Straat mag niet leeg zijn");
        }
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of housenumber
     */ 
    public function getHousenumber()
    {
        return $this->housenumber;
    }

    /**
     * Set the value of housenumber
     *
     * @return  self
     */ 
    public function setHousenumber($housenumber)
    {
        if(empty($housenumber)){
            throw new Exception("Huisnummer mag niet leeg zijn");
        }
        $this->housenumber = $housenumber;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        if(empty($city)){
            throw new Exception("Stad mag niet leeg zijn");
        }
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of postalcode
     */ 
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set the value of postalcode
     *
     * @return  self
     */ 
    public function setPostalcode($postalcode)
    {
        if(empty($postalcode)){
            throw new Exception("Postcode mag niet leeg zijn");
        }
        $this->postalcode = $postalcode;

        return $this;
    }

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

        if(empty($username)){
            throw new Exception("Username mag niet leeg zijn");
        }

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
        if(empty($email)){
            throw new Exception("Email mag niet leeg zijn");
        }
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
        if(strlen($password) < 5){
            throw new Exception("Passwords moet langer zijn dan 5 karakters.");
        }

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
        if(empty($firstname)){
            throw new Exception("Voornaam mag niet leeg zijn");
        }
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
        if(empty($lastname)){
            throw new Exception("Achternaam mag niet leeg zijn");
        }
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
        // if(empty($picture)){
        //     $this->picture = "skull.jpg";
        //     return $this;
        // }else{
            $this->picture = $picture;

            return $this;
        
        
    }

    public function register(){
        $options = [
            'cost' => 15
        ];
        $password = password_hash($this->password, PASSWORD_DEFAULT, $options);
        $conn = Db::getConnection();
        $statement = $conn->prepare("insert into users (username, firstname, lastname, email, password, avatar, type)  values (:username, :firstname, :lastname, :email, :password, :picture, :type)");
        $statement->bindValue(":username", $this->username);
        $statement->bindValue(":firstname", $this->firstname);
        $statement->bindValue(":lastname", $this->lastname);
        $statement->bindValue(":email", $this->email);
        $statement->bindValue(":password", $password);
        $statement->bindValue(":picture", $this->picture);
        $statement->bindValue(":type", $this->type);
        $statement->execute();
    }

    public function registerPrinter(){
        $options = [
            'cost' => 15
        ];
        $password = password_hash($this->password, PASSWORD_DEFAULT, $options);
        $conn = Db::getConnection();
        $statement = $conn->prepare("insert into users (username, firstname, lastname, email, password, avatar, street, housenumber, city, postalcode, type)  values (:username, :firstname, :lastname, :email, :password, :picture, :street, :housenumber, :city, :postalcode, :type)");
        $statement->bindValue(":username", $this->username);
        $statement->bindValue(":firstname", $this->firstname);
        $statement->bindValue(":lastname", $this->lastname);
        $statement->bindValue(":email", $this->email);
        $statement->bindValue(":password", $password);
        $statement->bindValue(":picture", $this->picture);
        $statement->bindValue(":street", $this->street);
        $statement->bindValue(":housenumber", $this->housenumber);
        $statement->bindValue(":city", $this->city);
        $statement->bindValue(":postalcode", $this->postalcode);
        $statement->bindValue(":type", $this->type);
        $statement->execute();
    }

    public function getUserByEmail(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from users where email = :email");
        $statement->bindValue(":email", $this->email);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function canLogin(){
        $email = $this->getEmail();
        $password = $this->getPassword();

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from users where email = :email");
        $statement->bindValue(":email", $email);
        $statement->execute();
        $user = $statement->fetch();
        $hash = $user["password"];

        if(!$user){
            throw new Exception("Geen gebruiker gevonden");
        }

        if(password_verify($password,$hash)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public static function getUserById($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from users where id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}