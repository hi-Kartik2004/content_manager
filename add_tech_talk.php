<?php
error_reporting(0);
    session_start();
    if(isset($_SESSION['user'])){
        // echo $_SESSION['user'];
        // $_SESSION['user_inside']=true;
        $server="localhost";
        $username="root";
        $password="";
        $database="uvce";
        // $name = trim($_POST['title']);
        // $text = trim($_POST['text']);
        $link = trim($_POST['link']);
        // echo $text;
        // echo $title;
        if(!empty($_POST['link'])){
            $con = mysqli_connect($server,$username,$password,$database);
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }
            $sql= "INSERT INTO `tech_talk` (`link`) VALUES ('$link')";
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
    <title>Add tech talk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <br>
<div class="mb-3">
    <center>
    <form action="add_tech_talk.php" method="post">
    <label for="exampleInputEmail1" class="form-label">Enter Link</label>
    <input type="text" name="link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="max-width:50%;">
    <div id="emailHelp" class="form-text">Make sure you enter the share -> embed link from youtube</div>
  </div>
  <center>
  <button class="btn btn-success">Add</button>
  <br>
  <br>
  <a class="btn btn-danger" href="logout.php">Logout</a>
  </center>
  </form>
  </center>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html>