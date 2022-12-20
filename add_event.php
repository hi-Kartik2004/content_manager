<?php

session_start();
    error_reporting(0);
    if(isset($_SESSION['user'])){
        // echo $_SESSION['user'];
        // $_SESSION['user_inside']=true;
        $server="localhost";
        $username="root";
        $password="";
        $database="uvce";
        $name = trim($_POST['title']);
        $text = trim($_POST['text']);
        $link = trim($_POST['link']);
        // echo $text;
        // echo $title;
        if(!empty($_POST['text']) && !empty($_POST['title'])){
            $con = mysqli_connect($server,$username,$password,$database);
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }
            $sql= "INSERT INTO `events` ( `name`,`text`, `link`) VALUES ('$name', '$text','$link')";
            if($con->query($sql)){
                echo "successfully inserted";
            }
        }
    }
    else{
        header('Refresh:0; URL=index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <center>
        <form action="add_event.php" method="post">
    <div class="mb-3">
        <br>
    <label for="exampleFormControlInput1" class="form-label">Event name</label>
    <input type="text" name = "title" class="form-control" id="exampleFormControlInput1" placeholder="event name" style="max-width:90%;"> 
    </div>
    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Event info</label>
    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3" style="max-width:90%;"></textarea>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Registration link</label>
    <input type="text" name = "link" class="form-control" id="exampleFormControlInput1" placeholder="Registration link" style="max-width:90%;"> 
    </div>
    
    <button type= "submit" class="btn btn-dark">Publish</button>
    </form>
    <br>
    <a class = "btn btn-danger"href="logout.php">Logout</a>
    </center>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html>