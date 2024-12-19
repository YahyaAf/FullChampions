<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nom'];
    $rating = $_POST['rating'];
    $nationality = $_POST['nationality']; // Nationality name or unique identifier
    $club = $_POST['club']; // Club name or unique identifier
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

    require '../connexion/connecter.php';

    // Récupérer l'ID du club
    $query_club = "SELECT club_id FROM clubs WHERE name = '$club'";
    $result_club = mysqli_query($conn, $query_club);
    if ($result_club && mysqli_num_rows($result_club) > 0) {
        $club_data = mysqli_fetch_assoc($result_club);
        $club_id = $club_data['club_id'];
    } else {
        echo "<h1>Erreur : Club non trouvé.</h1>";
        exit();
    }

    // Récupérer l'ID de la nationalité
    $query_nationality = "SELECT nationality_id FROM nationalities WHERE name = '$nationality'";
    $result_nationality = mysqli_query($conn, $query_nationality);
    if ($result_nationality && mysqli_num_rows($result_nationality) > 0) {
        $nationality_data = mysqli_fetch_assoc($result_nationality);
        $nationality_id = $nationality_data['nationality_id'];
    } else {
        echo "<h1>Erreur : Nationalité non trouvée.</h1>";
        exit();
    }

    // Insérer dans physicalgk ou physicalplayer
    if ($position === 'GK') {
        $phisical = "INSERT INTO `physicalgk` (`diving`, `handling`, `kicking`, `reflexes`, `speed`, `positioning`) 
                     VALUES ('$diving', '$handling', '$kicking', '$reflexes', '$speed', '$positioning')";
        $query_physical = mysqli_query($conn, $phisical);

        // Vérifier si l'insertion dans physicalgk a réussi
        if ($query_physical) {
            // Récupérer l'ID généré
            $physicalGK_id = mysqli_insert_id($conn);
        } else {
            echo "<h1>Erreur lors de l'insertion dans physicalgk.</h1>";
            exit();
        }
        $physicalPlayer_id = null; // Pas nécessaire d'insérer pour un GK
    } else {
        $phisical = "INSERT INTO `physicalplayer` (`pace`, `shooting`, `passing`, `dribbling`, `defending`, `physical`) 
                     VALUES ('$pace', '$shooting', '$passing', '$dribbling', '$defending', '$physical')";
        $query_physical = mysqli_query($conn, $phisical);

        // Vérifier si l'insertion dans physicalplayer a réussi
        if ($query_physical) {
            // Récupérer l'ID généré
            $physicalPlayer_id = mysqli_insert_id($conn);
        } else {
            echo "<h1>Erreur lors de l'insertion dans physicalplayer.</h1>";
            exit();
        }
        $physicalGK_id = null; // Pas nécessaire d'insérer pour un joueur non GK
    }

    // Insérer dans la table players avec les bonnes valeurs de clé étrangère
    if ($position === 'GK') {
        $requete = "INSERT INTO `players` (`name`, `position`, `club_id`, `nationality_id`, `rating`, `physicalGk_id`) 
                    VALUES ('$name', '$position', '$club_id', '$nationality_id', '$rating', '$physicalGK_id')";
    } else {
        $requete = "INSERT INTO `players` (`name`, `position`, `club_id`, `nationality_id`, `rating`, `physicalPlayer_id`) 
                    VALUES ('$name', '$position', '$club_id', '$nationality_id', '$rating', '$physicalPlayer_id')";
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
