<?php
  
  include ("../view/insert_transaction.php");
class Transaction{
    private $type;
    private $date_transaction;
    private $montant;
    private $description;

    public function __construct($type,$date_transaction,$montant,$description){ 
        $this->type = $type;
        $this->date_transaction = $date_transaction;
        $this->montant = $montant;
        $this->description = $description;
    }

    public function getType(){
        return $this->type;
    }
    public function getDate_transaction(){
     return $this->type;
    }
    public function getMontant(){
     return $this->type;
    }
    public function getDescription(){
     return $this->type;
    }
    public function setType($type){
        return $this->type = $type;
    }
    public function setDate_transaction($date_transaction){
        return $this->type = $date_transaction;
    }
    public function setMontant($montant){
        return $this->type = $montant;
    }
    public function setDescription($description){
        return $this->type = $description;
    }

    public function insertion(){
       
    }

}
?>