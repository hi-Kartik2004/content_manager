<?php
include 'elements/justsidebar.html';
        $server="localhost";
        $username="root";
        $password="";
        $database="uvce";
        $con = mysqli_connect($server,$username,$password,$database);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        $sql = "SELECT * FROM `posts` ORDER BY dt DESC;";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        // echo $count;
        
    ?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confessions</title>
    <link rel="stylesheet" href="elements/justsidebar.css">
    <link rel="icon" href="elements/rocket.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <!-- <h1>Hello there I'm kartikeya Saini from uVCE</h1> -->
    <center>
        
        <br>
    <a class = "btn btn-dark" href="write_confession.php">Want to confess anonymous here!?</a>
    <br>
    <br>
    <p>latest ones come to the top ;) <br> "only latest 15 confession will be seen"<p>
    </center>
    <?php $count=0; ?>
    <?php while($rows=mysqli_fetch_assoc($result)):?>
        <center>
        <div class="card" style="width: 18rem; width:95%;">
            <div class="card-body">
                <h5 class="card-title"><?=$rows['title'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?=$rows['dt'];?></h6>
                <p class="card-text"><?=$rows['text'];?> <?php $count++; ?> </p>
                <a href="query.php" class="card-link">Report</a>
                <?php if($count>14){
            break;
        }?>
                <!-- <a href="#" class="card-link">Support</a> -->
            </div>
        </div>
        <br>
        </center>
    <!-- <?php ?> -->
        <?php endwhile;?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>