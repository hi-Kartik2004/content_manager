<?php
    include 'elements/justsidebar.html';
    error_reporting(0);
        // echo $_SESSION['user'];
        // $_SESSION['user_inside']=true;
        $server="localhost";
        $username="root";
        $password="";
        $database="uvce";
        // $text = trim($_POST['text']);
        // $title = trim($_POST['title']);
        // echo $text;
        // echo $title;
        // if(!empty($_POST['text']) && !empty($_POST['title'])){
            $con = mysqli_connect($server,$username,$password,$database);
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }
            // echo "success";
            $sql = "SELECT * FROM `events` ORDER BY dt DESC;";
            $result = mysqli_query($con,$sql);
            // $count = mysqli_num_rows($result);
            // echo $count;
            

        // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>event</title>
    <link rel="stylesheet" href="elements/justsidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <center>
        <br>
        <p>"Only latest 15 event updates will be shown!!"</p>
        <?php $count=0;?>
        <?php while($rows = mysqli_fetch_assoc($result)):?>
        <div class="card" style="width: 18rem;width:79%;" >
            <div class="card-body" style= "">
                <h5 class="card-title"><?=$rows['name'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Posted on : <?=$rows['dt'];?></h6>
                <p class="card-text"> <?= $rows['text']; ?> </p>
                <a href="<?=$rows['link']; $count++;?>" target="_blank" class="card-link">Registration link</a>
                <!-- <a href="#" class="card-link">Another link</a> -->
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