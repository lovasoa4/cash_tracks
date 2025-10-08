<?php

include("ConnexionDB.php");
class Users{

    //protected int $id;
    protected string $nom;
    protected string $email;
    protected string $mdp;



    public function __construct($nom, $email, $mdp) {
        $this->nom = $nom;
        $this->email = $email;
        $this->mdp = $mdp;
    }

    public function create_User(){
            //connecter avec la base de données
            $db = new ConnexionDB();//instancé @ base
            $pdo = $db->getConnection();
        try{
            $stmt = $pdo->prepare("INSERT INTO users (nom, email, mdp) VALUES(?, ?, ?)");
            return $stmt->execute([$this->nom, $this->email, $this->mdp]);
        }
        catch(Exception $e){
            return("Insersion echoué". $e->getMessage());
        }
    }

    public function se_Connecté_User(){
        $db = new ConnexionDB();
        $pdo = $db->getConnection();
        try{
            $stmt = $pdo->prepare("SELECT id, nom, email FROM user");
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
        catch(Exception $e){
            return("Erreur d'affichage". $e->getMessage());
        }
    }

    public function get_user_by_email(){
        $db = new ConnexionDB();
        $pdo = $db->getConnection();
        try{
            $stmt = $pdo->prepare("SELECT * FROM user WHERE email = email AND mdp = mdp");
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
        catch(Exception $e){
            return("Erreur lors de la recuperation de l'email". $e->getMessage());
        }
    }
}

?>