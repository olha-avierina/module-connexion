<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion;charset=utf8', 'root', 'root'); //Database connexion`

if(isset($_POST['submit'])){
    if(isset($_POST['mail']) && isset($_POST['password'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    
    if (isset($_POST['mail']) && isset($_POST['password']) == 'admin') {
         $_SESSION['admin'] = 'admin';
         header("Location: ../admin.php");
    }
        
    $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE mail = ? AND password = ?");
    $requser->execute(array($mail, $password));
    $userexist = $requser->rowCount();
    
    if ($userexist == 1) {
        $userinfo = $requser->fetch();
        $_SESSION['id'] = $userinfo['id'];
        $_SESSION['mail'] = $userinfo['mail'];
        $_SESSION['password'] = $userinfo['password'];
        header ('location: ../profil.php');
       exit ();
        }
}}

?>
