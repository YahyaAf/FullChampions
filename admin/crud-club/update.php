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
        $sql = "SELECT * FROM clubs WHERE club_id = '$id'";
        $query = mysqli_query($conn, $sql);
        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $nom = $row['name'];
            $logo = $row['logo'];
        } else {
            echo "<p class='text-red-500'>Erreur : Nationalité introuvable.</p>";
            exit;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['name'];
        $id = $_GET['id']; 

        $newLogo = $logo;

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
            $target_dir = "uploads/logos/";
            $uniqueFileName = uniqid() . '-' . basename($_FILES['logo']['name']);
            $target_file = $target_dir . $uniqueFileName;

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_file)) {
                $newLogo = $target_file; 
            } else {
                echo "<p class='text-red-500'>Erreur lors du téléchargement du fichier.</p>";
            }
        }

        $sql = "UPDATE clubs SET `name`='$nom', `logo`='$newLogo' WHERE club_id = '$id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("Location: ../club.php");
        } else {
            echo "<p class='text-red-500'>Erreur lors de la mise à jour : " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
    <main class="w-full flex-grow p-6">
        <h2 class="text-3xl font-extrabold text-black mb-6 text-center dark:text-black-300">
            <i class="fas fa-building mr-2"></i> Ajouter un Club
        </h2>

        <!-- Form container with dark background -->
        <!-- Formulaire d'ajout du club avec upload du logo -->
        <form action="" method="POST" enctype="multipart/form-data" class="bg-gray-900 rounded-lg p-5 flex flex-col gap-6">
            <!-- Nom du club -->
            <div class="flex flex-col">
                <label for="name" class="text-white font-medium dark:text-gray-300">
                    <i class="fas fa-signature mr-2"></i> Nom du Club
                </label>
                <input type="text" id="name" name="name" placeholder="Entrez le nom du club" value="<?php echo $nom; ?>"
                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Upload du logo (Input de type Fichier) -->
            <div class="flex flex-col">
                <label for="logo" class="text-white font-medium dark:text-gray-300">
                    <i class="fas fa-file-upload mr-2"></i> Logo du Club
                </label>
                <input type="file" id="logo" name="logo" accept="image/*"
                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <?php if (!empty($logo)) : ?>
                    <img src="./<?php echo $logo; ?>" alt="logo" class="mt-4 h-20 w-24">
                <?php endif; ?>
            </div>

            <!-- Bouton submit -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-yellow-500 to-teal-600 text-white font-bold py-2 px-4 rounded-lg mt-4 shadow-lg hover:opacity-90">
                <i class="fas fa-paper-plane mr-2"></i> Update Club
            </button>
        </form>
    </main>
</body>
</html>
