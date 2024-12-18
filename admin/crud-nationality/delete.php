<?php
    require '../connexion/connecter.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM nationalities WHERE nationality_id = '$id'";
    $query = mysqli_query($conn, $sql);
    if(isset($query)){
        header("Location: ../nationality.php");
    }else{
        echo 'erreur de suppression';
    }
?>