<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];

    if (isset($_FILES['flag']) && $_FILES['flag']['error'] === 0) {
        $fileTmpPath = $_FILES['flag']['tmp_name'];
        $fileName = $_FILES['flag']['name'];
        $fileSize = $_FILES['flag']['size'];
        $fileType = $_FILES['flag']['type'];

        $uploadFolder = 'uploads/flags/';
        $destination = $uploadFolder . uniqid() . '-' . $fileName;


        if (!file_exists($uploadFolder)) {
            mkdir($uploadFolder, 0777, true);
        }

        if (move_uploaded_file($fileTmpPath, $destination)) {
            require '../connexion/connecter.php';

            $requete = "INSERT INTO `nationalities`(`name`, `flag`) VALUES ('$nom', '$destination')";
            $query = mysqli_query($conn, $requete);

            if ($query) {
                header("Location: ../nationality.php");
                exit();
            } else {
                echo "<h1>Erreur d'insertion : " . mysqli_error($conn) . "</h1>";
            }
        } else {
            echo "<h1>Erreur lors du déplacement du fichier.</h1>";
        }
    } else {
        echo "<h1>Erreur : Aucun fichier téléchargé ou problème avec le fichier.</h1>";
    }
} else {
    echo "<h1>Aucune donnée reçue</h1>";
}
?>
