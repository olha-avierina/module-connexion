<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            background-color: orange;
        }
    </style>
<?php
 session_start(); 

 $servername = "localhost";
 $username = "root";
 $password = "root";
 $dbname = "moduleconnexion";

 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    }

 if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') {
    $sql = "SELECT * FROM utilisateurs";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Mail</th>";
    echo "<th>Password</th>";
    echo "<th>Prenom</th>";
    echo "<th>Nom</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($utilisateurs as $key =>$user){
    echo '<tr>';
    echo '<td>' . $user['mail'] . '</td>';
    echo '<td>' . $user['password'] . '</td>';
    echo '<td>' . $user['prenom'] . '</td>';
    echo '<td>' . $user['nom'] . '</td>';
    echo '</tr>';
        }

    echo '</tbody>';
    echo '</table>';
    }
    else{
    header("Location: index.php");
    }
    ?>

</body>
</html>