<?php
    session_start();
    if(isset($_SESSION['user_inside']) && $_SESSION['user_inside']==true){
        header('Refresh:0; URL=contribute.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P cycle Notes</title>
    <link rel="stylesheet" href="elements/justsidebar.css">
    <link rel="icon" href="elements/rocket.png">
</head>
<body>
    <?php
        include 'elements/justsidebar.html';
        include 'elements/table_p_cycle.html';
      
    ?>
</body>
</html>