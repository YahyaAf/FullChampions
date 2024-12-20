<?php
    require '../connexion/connecter.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM players WHERE player_id = '$id'";
    $query = mysqli_query($conn, $sql);
    if(isset($query)){
        header("Location: ../players.php");
    }else{
        echo 'erreur de suppression';
    }
?>