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
        $sql = "SELECT * FROM `academic_updates` ORDER BY dt DESC;";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic updates</title>
    <link rel="stylesheet" href="elements/justsidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <center>
    "Latest 15 academic updates are shown here!!"
    <hr>
    </center>
    <center>
        <?php $count=0;?>
        <?php while($rows=mysqli_fetch_assoc($result)):?>
    <div class="card text-center" style="max-width:98%;">
    <div class="card-header">
        <h3><?=$rows['subject'];?></h3>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?=$rows['topic'];?></h5>
        <p class="card-text"><?= $rows['text'];?></p>
        <?php if(!empty(trim($rows['link']))){
        echo '<a href="#" class="btn btn-dark">Redirect link</a>';
        }
        ?>
    </div>
    <div class="card-footer text-muted">
        <?="uploaded on :".$rows['dt']; $count++;?>
    </div>
    </div>
    <br>
    <?php if($count>14){
        break;
        }?>
    <?php endwhile; ?>
    </center>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>