<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php
require '../connexion/connecter.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "
        SELECT
            player_id,
            pl.name AS player_name,
            pl.photo,
            pl.position,
            pl.physicalGk_id,
            pl.physicalPlayer_id,
            pl.nationality_id,
            pl.club_id,
            c.name AS club_name,
            n.name AS nationality_name,
            pl.rating,
            g.diving,
            g.handling,
            g.kicking,
            g.reflexes,
            g.speed,
            g.positioning,
            p.pace,
            p.shooting,
            p.passing,
            p.dribbling,
            p.defending,
            p.physical
        FROM players pl
        LEFT JOIN clubs c ON pl.club_id = c.club_id
        LEFT JOIN nationalities n ON pl.nationality_id = n.nationality_id
        LEFT JOIN physicalgk g ON pl.physicalGk_id = g.physicalGk_id
        LEFT JOIN physicalplayer p ON pl.physicalPlayer_id = p.physicalPlayer_id
        WHERE player_id='$id'
    ";

    $query = mysqli_query($conn, $sql);

    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        $nom = $row['player_name'];
        $photo = $row['photo'];
        $rating = $row['rating'];
        $nationality_id = $row['nationality_id'];
        $club_id = $row['club_id'];
        $club = $row['club_name'];
        $nationality = $row['nationality_name'];
        $position = $row['position'];

        // Physical GK
        $physicalGK_id = $row['physicalGk_id'];
        $diving = $row['diving'];
        $handling = $row['handling'];
        $kicking = $row['kicking'];
        $reflexes = $row['reflexes'];
        $speed = $row['speed'];
        $positioning = $row['positioning'];

        // Physical Player
        $physicalPlayer_id = $row['physicalPlayer_id'];
        $pace = $row['pace'];
        $shooting = $row['shooting'];
        $passing = $row['passing'];
        $dribbling = $row['dribbling'];
        $defending = $row['defending'];
        $physical = $row['physical'];
    } else {
        echo "<p class='text-red-500'>Erreur : Joueur introuvable.</p>";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nom'];
    $rating = $_POST['rating'];
    $nationality = $_POST['nationality'];
    $club = $_POST['club'];
    $position = $_POST['position'];

    // Physical GK
    $diving = $_POST['diving'] ?? null;
    $handling = $_POST['handling'] ?? null;
    $kicking = $_POST['kicking'] ?? null;
    $reflexes = $_POST['reflexes'] ?? null;
    $speed = $_POST['speed'] ?? null;
    $positioning = $_POST['positioning'] ?? null;

    // Physical Player
    $pace = $_POST['pace'] ?? null;
    $shooting = $_POST['shooting'] ?? null;
    $passing = $_POST['passing'] ?? null;
    $dribbling = $_POST['dribbling'] ?? null;
    $defending = $_POST['defending'] ?? null;
    $physical = $_POST['physical'] ?? null;

    // Update photo
    $newPhoto = $photo;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $target_dir = "uploads/photos/";
        $uniqueFileName = uniqid() . '-' . basename($_FILES['photo']['name']);
        $target_file = $target_dir . $uniqueFileName;

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            $newPhoto = $target_file;
        } else {
            echo "<p class='text-red-500'>Erreur lors du téléchargement du fichier.</p>";
        }
    }

    // Update clubs and nationalities
    $query_club = "UPDATE `clubs` SET `name`='$club' WHERE club_id = '$club_id'";
    mysqli_query($conn, $query_club);

    $query_nationality = "UPDATE `nationalities` SET `name`='$nationality' WHERE nationality_id = '$nationality_id'";
    mysqli_query($conn, $query_nationality);

    // Update physical stats
    if ($position === 'GK') {
        $phisical_gk_query = "
            UPDATE `physicalgk` 
            SET `diving`='$diving', `handling`='$handling', `kicking`='$kicking', 
                `reflexes`='$reflexes', `speed`='$speed', `positioning`='$positioning'
            WHERE `physicalGk_id`='$physicalGK_id'
        ";
        mysqli_query($conn, $phisical_gk_query);
    } else {
        $phisical_player_query = "
            UPDATE `physicalplayer` 
            SET `pace`='$pace', `shooting`='$shooting', `passing`='$passing', 
                `dribbling`='$dribbling', `defending`='$defending', `physical`='$physical'
            WHERE `physicalPlayer_id`='$physicalPlayer_id'
        ";
        mysqli_query($conn, $phisical_player_query);
    }

    // Update player
    $player_query = "
        UPDATE `players` 
        SET `name`='$name', `position`='$position', `rating`='$rating', `photo`='$newPhoto' 
        WHERE `player_id`='$id'
    ";
    $result = mysqli_query($conn, $player_query);

    if ($result) {
        header("Location: ../players.php");
        exit;
    } else {
        echo "<p class='text-red-500'>Erreur lors de la mise à jour : " . mysqli_error($conn) . "</p>";
    }
}

        // Fetch clubs and nationalities for the form
        $query_nationalities = "SELECT * FROM nationalities";
        $nationalities_result = $conn->query($query_nationalities);
        $nationalities = $nationalities_result->fetch_all(MYSQLI_ASSOC);

        $query_clubs = "SELECT * FROM clubs";
        $clubs_result = $conn->query($query_clubs);
        $clubs = $clubs_result->fetch_all(MYSQLI_ASSOC);
?>

            <main class="w-full flex-grow p-6">
                <!-- Title -->
                <h2 class="text-3xl font-extrabold text-black mb-6 text-center dark:text-black-300">
                    <i class="fas fa-user-plus mr-2"></i> Ajouter un Joueur
                </h2>

                <!-- Main Form Container -->
                <form action="" method="POST" enctype="multipart/form-data"
                    class="bg-gray-900 rounded-lg p-6 grid grid-cols-2 gap-6 space-y-0">
                    
                    <!-- Nom -->
                    <div>
                        <label for="nom" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-user mr-2"></i> Nom
                        </label>
                        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom) ?>" 
                            placeholder="Entrez le nom"
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <!-- Rating -->
                    <div>
                        <label for="club" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-building mr-2"></i> Rating
                        </label>
                        <input type="text" id="rating" name="rating" value="<?= htmlspecialchars($rating) ?>" 
                            placeholder="Entrez le rating"
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    
                    <!-- Nationality -->
                    <div>
                        <label for="nationality" class="text-white font-medium dark:text-gray-300">Nationality</label>
                        <select id="nationality" name="nationality" 
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                            required>
                            <?php foreach ($nationalities as $nation): ?>
                                <option value="<?= htmlspecialchars($nation['name']) ?>" 
                                    <?= $nationality == $nation['name'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($nation['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Club -->
                    <div>
                        <label for="club" class="text-white font-medium dark:text-gray-300">Club</label>
                        <select id="club" name="club" 
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                            required>
                            <?php foreach ($clubs as $team): ?>
                                <option value="<?= htmlspecialchars($team['name']) ?>" 
                                    <?= $club == $team['name'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($team['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Position -->
                    <div>
                        <label for="position" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-sitemap mr-2"></i> Position
                        </label>
                        <select id="position" name="position"
                                class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                >
                            <option value="" selected>Select un joueur</option>
                            <option value="GK" <?= $position === 'GK' ? 'selected' : '' ?> >Gardien (GK)</option>
                            <option value="LB" <?= $position === 'LB' ? 'selected' : '' ?> >Arrière Gauche (LB)</option>
                            <option value="CBL" <?= $position === 'CBL' ? 'selected' : '' ?>>Défenseur Gauche (CB Left)</option>
                            <option value="CBR" <?= $position === 'CBR' ? 'selected' : '' ?>>Défenseur Droit (CB Right)</option>
                            <option value="RB" <?= $position === 'RB' ? 'selected' : '' ?>>Arrière Droit (RB)</option>
                            <option value="CML" <?= $position === 'CML' ? 'selected' : '' ?>>Milieu Gauche (CMF Left)</option>
                            <option value="DMF" <?= $position === 'DMF' ? 'selected' : '' ?>>Milieu Défensif (DMF)</option>
                            <option value="CMR" <?= $position === 'CMR' ? 'selected' : '' ?>>Milieu Droit (CMF Right)</option>
                            <option value="LW" <?= $position === 'LW' ? 'selected' : '' ?>>Ailier Gauche (LWF)</option>
                            <option value="ST" <?= $position === 'ST' ? 'selected' : '' ?>>Attaquant (ST)</option>
                            <option value="RW" <?= $position === 'RW' ? 'selected' : '' ?>>Ailier Droit (RWF)</option>
                        </select>
                    </div>
                    <!-- Photo du Joueur -->
                    <div>
                        <label for="photo" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-image mr-2"></i> Photo du Joueur
                        </label>
                        <input type="file" id="photo" name="photo"
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <img src="<?= htmlspecialchars($photo) ?>" alt="Player Photo" class="mt-4 h-20 w-20 rounded-lg object-cover">
                    </div>


                    <!-- GK Ratings -->
                    <div id="divGk" class="col-span-2 mt-6 <?= $position === 'GK' ? '' : 'hidden' ?>">
                        <h5 class="text-lg font-semibold text-blue-400 mb-2">GK Ratings</h5>

                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <label for="diving" class="text-gray-200 mt-2">Diving</label>
                                <input type="number" id="diving" name="diving" value="<?= htmlspecialchars($diving) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="handling" class="text-gray-200 mt-2">Handling</label>
                                <input type="number" id="handling" name="handling" value="<?= htmlspecialchars($handling) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="kicking" class="text-gray-200 mt-2">Kicking</label>
                                <input type="number" id="kicking" name="kicking" value="<?= htmlspecialchars($kicking) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <label for="reflexes" class="text-gray-200 mt-2">Reflexes</label>
                                <input type="number" id="reflexes" name="reflexes" value="<?= htmlspecialchars($reflexes) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="speed" class="text-gray-200 mt-2">Speed</label>
                                <input type="number" id="speed" name="speed" value="<?= htmlspecialchars($speed) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="positioning" class="text-gray-200 mt-2">Positioning</label>
                                <input type="number" id="positioning" name="positioning" value="<?= htmlspecialchars($positioning) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Player Ratings -->
                    <div id="divPlayer" class="col-span-2 mt-6 <?= $position !== 'GK' ? '' : 'hidden' ?>">
                        <h5 class="text-lg font-semibold text-blue-400 mb-2">Player Ratings</h5>

                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <label for="pace" class="text-gray-200 mt-2">Pace</label>
                                <input type="number" id="pace" name="pace" value="<?= htmlspecialchars($pace) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="shooting" class="text-gray-200 mt-2">Shooting</label>
                                <input type="number" id="shooting" name="shooting" value="<?= htmlspecialchars($shooting) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="passing" class="text-gray-200 mt-2">Passing</label>
                                <input type="number" id="passing" name="passing" value="<?= htmlspecialchars($passing) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <label for="dribbling" class="text-gray-200 mt-2">Dribbling</label>
                                <input type="number" id="dribbling" name="dribbling" value="<?= htmlspecialchars($dribbling) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="defending" class="text-gray-200 mt-2">Defending</label>
                                <input type="number" id="defending" name="defending" value="<?= htmlspecialchars($defending) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="physical" class="text-gray-200 mt-2">Physical</label>
                                <input type="number" id="physical" name="physical" value="<?= htmlspecialchars($physical) ?>"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-span-2">
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-yellow-500 to-teal-600 text-white py-2 px-4 rounded-lg mt-4">
                            <i class="fas fa-paper-plane"></i> Update Joueur
                        </button>
                    </div>

                </form>
            </main>
            <script>
            const positionField = document.getElementById('position');
            const gkFields = document.getElementById('gk-fields');
            const playerFields = document.getElementById('player-fields');

            positionField.addEventListener('change', () => {
                if (positionField.value === 'GK') {
                    gkFields.classList.remove('hidden');
                    playerFields.classList.add('hidden');
                } else {
                    gkFields.classList.add('hidden');
                    playerFields.classList.remove('hidden');
                }
            });
    </script>

</body>
</html>