<?php
        $server="localhost";
        $username="root";
        $password="";
        $database="uvce";
        $con = mysqli_connect($server,$username,$password,$database);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        $sql = "SELECT * FROM `tech_talk` ORDER BY dt DESC;";
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
    <title>Tech talks</title>
    <link rel="icon" href="elements/rocket.png">
    <link rel="stylesheet" href="elements/justsidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="elements/tech_talk.css"> -->
    <!-- <link rel="stylesheet" href="elements/container.css"> -->
</head>
<body>
    <?php 
        include 'elements/justsidebar.html';
    ?>
    <center>
    <h3><u>Tech-Talk<u></h3>
    <br>
    </center>
    <!-- <embed src="https://www.youtube.com/embed/v=laLw0A34Kjk" type="video" style="width:400px;height:400px;margin:25px;"> -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        
       
        <?php $count=0?>
     <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" >
        <div class="carousel-inner" >
            <?php while($rows=mysqli_fetch_assoc($result)):?>
            <div class="carousel-item active" data-interval="false">
           <?= $rows['link'];$count++;?>
            </div>
            <?php if($count>0){
                    break;
                }?>
            <?php endwhile; ?>
            <?php while($rows=mysqli_fetch_assoc($result)): ?>
                <div class="carousel-item" data-interval="false">
           <?= $rows['link'];$count++;?>
            </div>
            <?php if($count>1){
                break;
                }?>
                <?php endwhile;?>
                <?php while($rows=mysqli_fetch_assoc($result)): ?>
                <div class="carousel-item" data-interval="false">
           <?= $rows['link'];$count++;?>
            </div>
            <?php if($count>2){
                break;
                }?>
                <?php endwhile;?>
                
            
        </div>
    </div>

        
        
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
    </div>
    
    
    <!-- <iframe width="573" height="315" style="margin-top:2%;margin-left:1.5%;" src="https://www.youtube.com/embed/OAoQKZTLzio" title="video1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="573" height="315" style="margin-top:2%;margin-left:1.5%;" src="https://www.youtube.com/embed/OAoQKZTLzio" title="video1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
  <!-- <script src="elements/tech_talk.js"></script> -->
    
</body>
</html>