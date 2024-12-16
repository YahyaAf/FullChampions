<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1><?php echo "Hello, World!"; ?></h1>
    <p><?php echo "Today's date is: " . date('Y-m-d'); ?></p>
<?php 
    $name="Afadisse";
    $prenom="Yahya";
    $age=21;
    echo "$prenom $name age de ".($age+1)." ans";

    
    if($age<18){
        echo "had sabiye mineur";
    }elseif($age>=18 && $age<25){
        echo "had sabiye mediuem";
    }else{
        echo "had sabiye kber bzf";
    }


    for($i=0;$i<5;$i++){
        echo"<br>Yahya ".$i+1;
    }
?>



</body>
</html>