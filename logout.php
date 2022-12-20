<?php
    session_start();
    session_unset();
    session_destroy();
    header('Refresh: 1; URL=index.php');
    exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
    Redirecting to home page...
   
</body>
</html>