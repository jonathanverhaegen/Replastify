<?php

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
        $this->postalcode = $postalcode;

        return $this;
    }
}