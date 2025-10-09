<?php
include("../model/Users.php");
if (!empty($_POST["nom"])&& !empty($_POST["email"])&& !empty($_POST["mdp"])) {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $essai = new Users($nom, $email, $mdp);
    $manda = $essai->create_User();

    echo 'réussit';
}
else {
    echo "non reussit ";
}