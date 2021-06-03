<?php
include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/User.php");
class Printer extends User{
    private $street; 	
    private $housenumber; 	
    private $city; 	
    private $postalcode;

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

    public function register(){
        $options = [
            'cost' => 15
        ];
        $password = password_hash($this->password, PASSWORD_DEFAULT, $options);
        $conn = Db::getConnection();
        $statement = $conn->prepare("insert into printers (username, firstname, lastname, email, password, avatar, street, housenumber, city, postalcode)  values (:username, :firstname, :lastname, :email, :password, :picture, :street, :housenumber, :city, :postalcode)");
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
        $statement->execute();
    }

    public function getPrinterByEmail(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select id from printers where email = :email");
        $statement->bindValue(":email", $this->email);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function canLoginPrinter(){
        $email = $this->getEmail();
        $password = $this->getPassword();

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from printers where email = :email");
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
}