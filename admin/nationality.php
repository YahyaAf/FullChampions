<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background:rgb(44, 44, 45); }
        .cta-btn { background:rgb(44, 44, 45); }
        .upgrade-btn { background:rgb(44, 44, 45); }
        .upgrade-btn:hover { background:rgb(44, 44, 45); }
        .active-nav-link { background:rgb(44, 44, 45); }
        .nav-item:hover { background:rgb(44, 44, 45); }
        .account-link:hover { background:rgb(44, 44, 45); }
    </style>
</head>
<?php
    include 'connexion/connecter.php';
        $query = "SELECT * FROM nationalities";
        $result = $conn->query($query);
?>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="dashboard.php" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="players.php" class="flex items-center text-white py-4 pl-6 nav-item"">
                <i class="fas fa-users mr-3"></i>
                players
            </a>
            <a href="nationality.php" class="flex items-center text-white py-4 pl-6 nav-item"">
            <i class="fas fa-globe mr-3"></i>
                nationality
            </a>
            <a href="club.php" class="flex items-center text-white py-4 pl-6 nav-item"">
                <i class="fas fa-futbol mr-3"></i>
                club
            </a>
        </nav>
        <a href="#" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            <i class="fas fa-arrow-circle-up mr-3"></i>
            Upgrade to Pro!
        </a>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="../assets/img/me.png" alt="">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="dashboard.php" class="flex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="players.php" class="flex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-users mr-3"></i>
                    players
                </a>
                <a href="nationality.php" class="flex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-globe mr-3"></i>
                    nationality
                </a>
                <a href="club.php" class="flex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-futbol mr-3"></i>
                    club
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
                <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                </button>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>
    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h2 class="text-3xl font-extrabold text-black mb-6 text-center dark:text-black-300">
                    <i class="fas fa-flag mr-2"></i> Ajouter une Nationalité
                </h2>

                <!-- Form container with dark background -->
                <form action="crud-nationality/create.php" method="POST" enctype="multipart/form-data" class="bg-gray-900 rounded-lg p-5 flex flex-col gap-6">
                    <!-- Nom de la nationalité -->
                    <div class="flex flex-col">
                        <label for="nom" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-globe mr-2"></i> Nom de la Nationalité
                        </label>
                        <input type="text" id="nom" name="nom" placeholder="Entrez le nom de la nationalité"
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <!-- Fichier du drapeau -->
                    <div class="flex flex-col">
                        <label for="flag" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-file-upload mr-2"></i> Fichier du Drapeau
                        </label>
                        <input type="file" id="flag" name="flag" accept="image/*"
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-green-500 to-teal-600 text-white font-bold py-2 px-4 rounded-lg mt-4 shadow-lg hover:opacity-90">
                        Ajouter Nationalité
                    </button>
                </form>
            </main>
            <!-- Liste des nationality -->
            <div class="container mx-auto mt-8">
                <h1 class="text-2xl font-bold text-center mb-6">Liste des Nationalités</h1>
                <div class="bg-gray-900 rounded-lg p-5 shadow-lg">
                    <table class="w-full table-auto bg-gray-800 rounded-lg">
                            <thead>
                                <tr class="bg-gray-900">
                                    <th class="py-2 px-4 text-left font-medium text-gray-200 border-t border-gray-700">Nom</th>
                                    <th class="py-2 px-4 text-left font-medium text-gray-200 border-t border-gray-700">Flag</th>
                                    <th class="py-2 px-4 text-left font-medium text-gray-200 border-t border-gray-700">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if ($result && $result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <tr class="hover:bg-gray-700">
                                            <td class="py-2 px-4 text-gray-300"><?php echo $row['name']; ?></td>
                                            <td class="py-2 px-4">
                                                <img src="<?php echo './crud-nationality/'.$row['flag']; ?>" alt="drapeau" class="rounded-lg" width="50">
                                            </td>
                                            <td class="py-2 px-4">
                                                <?php $id =$row['nationality_id']?>
                                                <a href="crud-nationality/delete.php?id=<?php echo $id; ?>"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition duration-200">
                                                    Supprimer
                                                </a>
                                                <a href="update.php?id=<?php echo $row['nationality_id']; ?>"
                                                class="ml-2 bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition duration-200">
                                                    Modifier
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-gray-500">
                                            Aucune nationalité trouvée.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                    </table>
                </div>
            </div>
            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="https://www.linkedin.com/in/yahya-afadisse-236b022a9/" class="underline">Yahya Afadisse</a>.
            </footer>
        </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

   
</body>
</html>