<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    // Gérer l'upload du logo
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
        $fileTmpPath = $_FILES['logo']['tmp_name'];
        $fileName = $_FILES['logo']['name'];
        $fileSize = $_FILES['logo']['size'];
        $fileType = $_FILES['logo']['type'];

        $uploadFolder = 'uploads/logos/';
        $destination = $uploadFolder . uniqid() . '-' . $fileName;

        // Créer le répertoire si nécessaire
        if (!file_exists($uploadFolder)) {
            mkdir($uploadFolder, 0777, true);
        }

        // Déplacer le fichier uploadé dans le répertoire cible
        if (move_uploaded_file($fileTmpPath, $destination)) {
            require '../connexion/connecter.php';

            // Insérer les données du club dans la base de données
            $requete = "INSERT INTO `clubs`(`name`, `logo`) VALUES ('$name', '$destination')";
            $query = mysqli_query($conn, $requete);

            if ($query) {
                header("Location: ../club.php");
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
