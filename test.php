<?php



if(isset($_POST['submit'])){
    $bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion;charset=utf8', 'root', 'root'); //Database connexion`

    if(isset($_POST['mail']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password'])){
        $mail = $_POST['mail'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $password = $_POST['password'];

        $sql = "INSERT INTO utilisateurs (mail, prenom, nom, password) VALUES (?, ?, ?, ?);";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$mail, $prenom, $nom, $password]);
        exit();

    } else {
        echo "Tous les champs ne sont pas remplis.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>
<body>
    <div class="container mt4">
        
   <div class="row">
         <div class="col">
         <h1>Formulaire d'inscription</h1>
         <form action="test.php" method="post">
            <input type="text" class="form-control" name="mail" id="Email" placeholder="Email" ><br>
            <input type="text" class="form-control" name="prenom" id="Prenom" placeholder="Prenom" ><br>
            <input type="text" class="form-control" name="nom" id="Nom" placeholder="Nom"><br>
            <input type="password" class="form-control" name="password" id="Password" placeholder="Password"><br>
            <input class="btn btn-success" type="submit" name="submit" value="Enregistrer" nam>
         </form>
         </div>
        </div>
    </div>
</body>

</html>
