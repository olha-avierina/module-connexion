<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="inscription.css">
</head>
<body>
    <div class="container mt4">
    <div class="row">
    <div class="col">
         <h1>Formulaire d'inscription</h1>
         <form action="validation-form/check.php" method="post">
            <input type="text" class="form-control" name="mail" id="Email" placeholder="Email" ><br>
            <input type="text" class="form-control" name="prenom" id="Prenom" placeholder="Prenom" ><br>
            <input type="text" class="form-control" name="nom" id="Nom" placeholder="Nom"><br>
            <input type="password" class="form-control" name="password" id="Password" placeholder="Password"><br>
            <input class="btn btn-success" type="submit" name="submit" value="Enregistrer" nam>
         </form>
         </div>

         <div class="col">
            <h1>Formulaire autarisation</h1>
            <form action="validation-form/auth.php" method="post">
                <input type="text" class="form-control" name="mail" id="login" placeholder="Mail"><br>
                <input type="password" class="form-control" name="password" id="Password" placeholder="Password"><br>
                <input class="btn btn-success" type="submit" name="submit" value="connexion" nam>
            </form>  
         </div>

        </div>
    </div>
</body>

</html>
