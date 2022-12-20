<?php

session_start();
    error_reporting(0);
    if(isset($_SESSION['user'])){
        echo $_SESSION['user'];
        $_SESSION['user_inside']=true;
        $server="localhost";
        $username="root";
        $password="";
        $database="uvce";
        $text = trim($_POST['text']);
        if(!empty($text)){
            $con = mysqli_connect($server,$username,$password,$database);
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }
            $sql= "INSERT INTO `posts` ( `text`, `dt`) VALUES ('$text', current_timestamp())";
            if($con->query($sql)){
                echo "success";
            }
        }
    }
    else{
        header('Refresh:0; URL=setting.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contribute</title>
    <link rel="icon" href="elements/rocket.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <center>
    <h1>This is the contribute page</h1>
    <form action="contribute.php" method = "post">
    <!-- <textarea name="text" id="text" cols="30" rows="10">
    </textarea> -->

    <!-- <button type="submit" class="btn btn-success">Submit</button> -->
    </form>
    <a href="add_event.php">Add event</a> <br>
    <a href="academic_update.php">Academic update</a>
    <br>
    <a href="add_tech_talk.php">Tech talk update</a>
    <br>
    <br>
    <a class="btn btn-dark" href="logout.php" role="button">logout</a>
    </center>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>