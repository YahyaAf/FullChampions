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
        $query_nationality = "SELECT * FROM nationalities";
        $result_nationality = $conn->query($query_nationality);
        $nationalities = $result_nationality->fetch_all(MYSQLI_ASSOC); 

        $query_club = "SELECT * FROM clubs";
        $result_club = $conn->query($query_club);
        $clubs = $result_club->fetch_all(MYSQLI_ASSOC); 
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
            <a href="players.php" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-users mr-3"></i>
                players
            </a>
            <a href="nationality.php" class="flex items-center text-white py-4 pl-6 nav-item">
            <i class="fas fa-globe mr-3"></i>
                nationality
            </a>
            <a href="club.php" class="flex items-center text-white py-4 pl-6 nav-item">
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
                <!-- Title -->
                <h2 class="text-3xl font-extrabold text-black mb-6 text-center dark:text-black-300">
                    <i class="fas fa-user-plus mr-2"></i> Ajouter un Joueur
                </h2>

                <!-- Main Form Container -->
                <form action="add_player.php" method="POST"
                    class="bg-gray-900 rounded-lg p-6 grid grid-cols-2 gap-6 space-y-0">
                    
                    <!-- Nom -->
                    <div>
                        <label for="nom" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-user mr-2"></i> Nom
                        </label>
                        <input type="text" id="nom" name="nom"
                            placeholder="Entrez le nom"
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <!-- Prénom -->
                    <div>
                        <label for="prenom" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-user-tie mr-2"></i> Prénom
                        </label>
                        <input type="text" id="prenom" name="prenom"
                            placeholder="Entrez le prénom"
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <!-- Rating -->
                    <div>
                        <label for="club" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-building mr-2"></i> Rating
                        </label>
                        <input type="text" id="rating" name="rating"
                            placeholder="Entrez le rating"
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    
                    <!-- Nationalité -->
                    <div>
                        <label for="nationalite" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-flag mr-2"></i> Nationalité
                        </label>
                        <?php ?>
                        <select name="nationality" id="nationality" 
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <?php foreach ($nationalities as $nationality): ?>
                                <option value="<?php echo htmlspecialchars($nationality['name']); ?>">
                                    <?php echo htmlspecialchars($nationality['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Club -->
                    <div>
                        <label for="club" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-building mr-2"></i> Club
                        </label>
                        <select name="club" id="club" 
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <?php foreach ($clubs as $club): ?>
                                <option value="<?php echo htmlspecialchars($club['name']); ?>">
                                    <?php echo htmlspecialchars($club['name']); ?>
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
                            <option value="GK">Gardien (GK)</option>
                            <option value="LB">Arrière Gauche (LB)</option>
                            <option value="CBleft">Défenseur Gauche (CB Left)</option>
                            <option value="CBright">Défenseur Droit (CB Right)</option>
                            <option value="RB">Arrière Droit (RB)</option>
                            <option value="CMFleft">Milieu Gauche (CMF Left)</option>
                            <option value="DMF">Milieu Défensif (DMF)</option>
                            <option value="CMFright">Milieu Droit (CMF Right)</option>
                            <option value="LWF">Ailier Gauche (LWF)</option>
                            <option value="ST">Attaquant (ST)</option>
                            <option value="RWF">Ailier Droit (RWF)</option>
                        </select>
                    </div>
                    <!-- Photo du Joueur -->
                    <div>
                        <label for="photo" class="text-white font-medium dark:text-gray-300">
                            <i class="fas fa-image mr-2"></i> Photo du Joueur
                        </label>
                        <input type="file" id="photo" name="photo"
                            class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>


                    <!-- GK Ratings -->
                    <div id="divGk" class="col-span-2 mt-6 hidden">
                        <h5 class="text-lg font-semibold text-blue-400 mb-2">GK Ratings</h5>

                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <label for="diving" class="text-gray-200 mt-2">Diving</label>
                                <input type="number" id="diving" name="diving"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="handling" class="text-gray-200 mt-2">Handling</label>
                                <input type="number" id="handling" name="handling"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="kicking" class="text-gray-200 mt-2">Kicking</label>
                                <input type="number" id="kicking" name="kicking"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <label for="reflexes" class="text-gray-200 mt-2">Reflexes</label>
                                <input type="number" id="reflexes" name="reflexes"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="speed" class="text-gray-200 mt-2">Speed</label>
                                <input type="number" id="speed" name="speed"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="positioning" class="text-gray-200 mt-2">Positioning</label>
                                <input type="number" id="positioning" name="positioning"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Player Ratings -->
                    <div id="divPlayer" class="col-span-2 mt-6 hidden">
                        <h5 class="text-lg font-semibold text-blue-400 mb-2">Player Ratings</h5>

                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <label for="pace" class="text-gray-200 mt-2">Pace</label>
                                <input type="number" id="pace" name="pace"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="shooting" class="text-gray-200 mt-2">Shooting</label>
                                <input type="number" id="shooting" name="shooting"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="passing" class="text-gray-200 mt-2">Passing</label>
                                <input type="number" id="passing" name="passing"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <label for="dribbling" class="text-gray-200 mt-2">Dribbling</label>
                                <input type="number" id="dribbling" name="dribbling"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="defending" class="text-gray-200 mt-2">Defending</label>
                                <input type="number" id="defending" name="defending"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="physical" class="text-gray-200 mt-2">Physical</label>
                                <input type="number" id="physical" name="physical"
                                    class="w-full mt-1 p-2 bg-gray-800 text-gray-200 rounded-lg shadow focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-span-2">
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-green-500 to-teal-600 text-white py-2 px-4 rounded-lg mt-4">
                            <i class="fas fa-paper-plane"></i> Ajouter Joueur
                        </button>
                    </div>

                </form>
            </main>
            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="https://www.linkedin.com/in/yahya-afadisse-236b022a9/" class="underline">Yahya Afadisse</a>.
            </footer>
        </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>