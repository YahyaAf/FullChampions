<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <title>Modifier Nationalité</title>
</head>
<body>
    <?php
    require '../connexion/connecter.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM nationalities WHERE nationality_id = '$id'";
        $query = mysqli_query($conn, $sql);
        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $nom = $row['name'];
            $flag = $row['flag'];
        } else {
            echo "<p class='text-red-500'>Erreur : Nationalité introuvable.</p>";
            exit;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $id = $_GET['id']; 

        $newFlag = $flag;

        if (isset($_FILES['flag']) && $_FILES['flag']['error'] === 0) {
            $target_dir = "uploads/flags/";
            $uniqueFileName = uniqid() . '-' . basename($_FILES['flag']['name']);
            $target_file = $target_dir . $uniqueFileName;

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            if (move_uploaded_file($_FILES['flag']['tmp_name'], $target_file)) {
                $newFlag = $target_file; 
            } else {
                echo "<p class='text-red-500'>Erreur lors du téléchargement du fichier.</p>";
            }
        }

        $sql = "UPDATE nationalities SET `name`='$nom', `flag`='$newFlag' WHERE nationality_id = '$id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("Location: ../nationality.php");
        } else {
            echo "<p class='text-red-500'>Erreur lors de la mise à jour : " . mysqli_error($conn) . "</p>";
        }
    }
    ?>


    <main class="w-full flex-grow p-6">
        <h2 class="text-3xl font-extrabold text-black mb-6 text-center">
            Modifier une Nationalité
        </h2>
        <form action="" method="POST" enctype="multipart/form-data" class="bg-gray-900 rounded-lg p-5 flex flex-col gap-6">
            <!-- Nom de la nationalité -->
            <div class="flex flex-col">
                <label for="nom" class="text-white font-medium">Nom de la Nationalité</label>
                <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required
                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow">
            </div>

            <!-- Fichier du drapeau -->
            <div class="flex flex-col">
                <label for="flag" class="text-white font-medium">Fichier du Drapeau</label>
                <input type="file" id="flag" name="flag" accept="image/*"
                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow">
                <?php if (!empty($flag)) : ?>
                    <img src="./<?php echo $flag; ?>" alt="Drapeau" class="mt-4 h-20 w-24">
                <?php endif; ?>
            </div>

            <!-- Bouton Submit -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-yellow-500 to-teal-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg hover:opacity-90">
                Modifier
            </button>
        </form>
    </main>
</body>
</html>
