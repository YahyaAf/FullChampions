<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $flag = $_POST['flag']; 

    require '../connexion/connecter.php';

    $requete = "INSERT INTO `nationalities`(`name`, `flag`) VALUES ('$nom', '$flag')";
    $query = mysqli_query($conn, $requete);

    if ($query) {
        header("Location: ../nationality.php");
        exit(); 
    } else {
        echo "<h1>Erreur d'insertion : " . mysqli_error($conn) . "</h1>";
    }
} else {
    echo "<h1>Aucune donnée reçue</h1>";
}
?>
