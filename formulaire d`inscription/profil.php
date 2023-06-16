<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion;charset=utf8', 'root', 'root'); //Database connexion`

echo "ma session".$_SESSION["id"];
// Récupération des informations actuelles de l'utilisateur depuis la base de données
$userID = $_SESSION['id']; // Remplacez cette valeur par l'ID de l'utilisateur connecté


$req = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$req->execute(array($userID));

if ($req->rowCount() > 0) {
    $row = $req->fetch(PDO::FETCH_ASSOC);
    $nom = $row["nom"];
    $prenom = $row["prenom"];
    $login = $row["mail"];
    $password = $row["password"];

     print_r($row); // Utilisation de print_r pour afficher les détails de l'utilisateur
} else {
     echo "Utilisateur non trouvé.";
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nouveauNom = $_POST["nom"];
    $nouveauPrenom = $_POST["prenom"];
    $nouveauEmail = $_POST["mail"];

     $updateSql = "UPDATE utilisateurs SET nom = '$nouveauNom', prenom = '$nouveauPrenom', mail = '$nouveauEmail' WHERE id = $userID";
     if ($bdd->query($updateSql) === TRUE) {
     echo "Profil mis à jour avec succès.";
    }  else {
     echo "Erreur lors de la mise à jour du profil: "; 
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<form class="formulaire" action="profil.php" method="post">
            <ul>
                <br />
                    <h1>Modifier votre profil</h1>
                <br />
                <li>
                    <label for="login">Mail</label>
                    <input type="text" id="login" name="mail" value="<?php echo $login; ?>" required>
                </li>
                <br />
                <li>
                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" required>
                </li>
                <br>
                <li>
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required>
                </li>
                <br />
                <li>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
                </li>
                <br />
                    <input type="submit" name="valider" value="Valider &#10004;" />
                    <a href='../validation-form/deconnexion.php'>Deconnexion</a>
                    <br />
            </ul>
</body>
</html>

