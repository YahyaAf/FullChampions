<?php
    require '../connexion/connecter.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM clubs WHERE club_id = '$id'";
    $query = mysqli_query($conn, $sql);
    if(isset($query)){
        header("Location: ../club.php");
    }else{
        echo 'erreur de suppression';
    }
?>