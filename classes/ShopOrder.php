<?php 

class ShopOrder{
    private $user_id; 	
    private $filament_id; 	
    private $time; 	
    private $amount;

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
     * Get the value of filament_id
     */ 
    public function getFilament_id()
    {
        return $this->filament_id;
    }

    /**
     * Set the value of filament_id
     *
     * @return  self
     */ 
    public function setFilament_id($filament_id)
    {
        $this->filament_id = $filament_id;

        return $this;
    }

    /**
     * Get the value of time
     */ 
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the value of time
     *
     * @return  self
     */ 
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }
}