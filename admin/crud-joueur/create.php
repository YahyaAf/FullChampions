<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nom'];
    $rating = $_POST['rating'];
    $nationality = $_POST['nationality'];
    $club = $_POST['club'];
    $position = $_POST['position'];

    // Physical Goalkeeper
    $diving = $_POST['diving'] ?? null;
    $handling = $_POST['handling'] ?? null;
    $kicking = $_POST['kicking'] ?? null;
    $reflexes = $_POST['reflexes'] ?? null;
    $speed = $_POST['speed'] ?? null;
    $positioning = $_POST['positioning'] ?? null;

    // Physical Normal Player
    $pace = $_POST['pace'] ?? null;
    $shooting = $_POST['shooting'] ?? null;
    $passing = $_POST['passing'] ?? null;
    $dribbling = $_POST['dribbling'] ?? null;
    $defending = $_POST['defending'] ?? null;
    $physical = $_POST['physical'] ?? null;

    // Handle Image Upload
    $photo = null; // Default if no image uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/photos/'; // Directory where images will be saved
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
        }
        $photoName = basename($_FILES['photo']['name']);
        $photoPath = $uploadDir . uniqid() . '_' . $photoName;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
            $photo = $photoPath; // Save the path to the uploaded file
        } else {
            echo "<h1>Erreur lors du téléchargement de l'image.</h1>";
            exit();
        }
    }

    require '../connexion/connecter.php';

    // Retrieve club ID
    $query_club = "SELECT club_id FROM clubs WHERE name = '$club'";
    $result_club = mysqli_query($conn, $query_club);
    if ($result_club && mysqli_num_rows($result_club) > 0) {
        $club_data = mysqli_fetch_assoc($result_club);
        $club_id = $club_data['club_id'];
    } else {
        echo "<h1>Erreur : Club non trouvé.</h1>";
        exit();
    }

    // Retrieve nationality ID
    $query_nationality = "SELECT nationality_id FROM nationalities WHERE name = '$nationality'";
    $result_nationality = mysqli_query($conn, $query_nationality);
    if ($result_nationality && mysqli_num_rows($result_nationality) > 0) {
        $nationality_data = mysqli_fetch_assoc($result_nationality);
        $nationality_id = $nationality_data['nationality_id'];
    } else {
        echo "<h1>Erreur : Nationalité non trouvée.</h1>";
        exit();
    }

    // Insert into physicalgk or physicalplayer
    if ($position === 'GK') {
        $phisical = "INSERT INTO `physicalgk` (`diving`, `handling`, `kicking`, `reflexes`, `speed`, `positioning`) 
                     VALUES ('$diving', '$handling', '$kicking', '$reflexes', '$speed', '$positioning')";
        $query_physical = mysqli_query($conn, $phisical);

        if ($query_physical) {
            $physicalGK_id = mysqli_insert_id($conn);
        } else {
            echo "<h1>Erreur lors de l'insertion dans physicalgk.</h1>";
            exit();
        }
        $physicalPlayer_id = null;
    } else {
        $phisical = "INSERT INTO `physicalplayer` (`pace`, `shooting`, `passing`, `dribbling`, `defending`, `physical`) 
                     VALUES ('$pace', '$shooting', '$passing', '$dribbling', '$defending', '$physical')";
        $query_physical = mysqli_query($conn, $phisical);

        if ($query_physical) {
            $physicalPlayer_id = mysqli_insert_id($conn);
        } else {
            echo "<h1>Erreur lors de l'insertion dans physicalplayer.</h1>";
            exit();
        }
        $physicalGK_id = null;
    }

    // Insert into players table
    if ($position === 'GK') {
        $requete = "INSERT INTO `players` (`name`, `position`, `club_id`, `nationality_id`, `rating`, `physicalGk_id`, `photo`) 
                    VALUES ('$name', '$position', '$club_id', '$nationality_id', '$rating', '$physicalGK_id', '$photo')";
    } else {
        $requete = "INSERT INTO `players` (`name`, `position`, `club_id`, `nationality_id`, `rating`, `physicalPlayer_id`, `photo`) 
                    VALUES ('$name', '$position', '$club_id', '$nationality_id', '$rating', '$physicalPlayer_id', '$photo')";
    }

    $query = mysqli_query($conn, $requete);

    if ($query) {
        header("Location: ../players.php");
        exit();
    } else {
        echo "<h1>Erreur d'insertion dans players : " . mysqli_error($conn) . "</h1>";
    }
} else {
    echo "<h1>Aucune donnée reçue</h1>";
}
?>
