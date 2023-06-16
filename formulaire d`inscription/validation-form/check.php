<?php

$bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion;charset=utf8', 'root', 'root'); //Database connexion`


if(isset($_POST['submit'])){
    if(isset($_POST['mail']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password'])){
        $mail = $_POST['mail'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $password = $_POST['password'];

        $sql = "INSERT INTO utilisateurs (mail, prenom, nom, password) VALUES (?, ?, ?, ?);";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$mail, $prenom, $nom, $password]);
        header ('location: ../inscription.php');

        exit();

    } else {
        echo "Tous les champs ne sont pas remplis.";
    }
}

?>