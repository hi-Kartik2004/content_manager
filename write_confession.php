<?php   
// echo "Hello";
        error_reporting(0);
        // echo $_SESSION['user'];
        // $_SESSION['user_inside']=true;
        $server="localhost";
        $username="root";
        $password="";
        $database="uvce";
        $text = trim($_POST['text']);
        $title = trim($_POST['title']);
        // echo $text;
        // echo $title;
        if(!empty($_POST['text']) && !empty($_POST['title'])){
            $con = mysqli_connect($server,$username,$password,$database);
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }
            $sql= "INSERT INTO `posts` ( `text`,`title`, `dt`) VALUES ('$text', '$title',current_timestamp())";
            if($con->query($sql)){
                echo "successfully inserted";
            }
        }
    
    // else{
    //     header('Refresh:0; URL=setting.php');
    // }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write confession</title>
    <link rel="icon" href="elements/rocket.png">
    <link rel="stylesheet" href="elements/justsidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <?php
        include 'elements/justsidebar.html';
    ?>
    <hr>
    <center>
        
    <label for="inputPassword5" class="form-label" style="max-width:90%;">Title</label>
    <form action="write_confession.php" method = "post">
        <input type="text" name = "title" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" style="max-width:90%;">
    
        <div id="passwordHelpBlock" class="form-text">
        Your Title must be under 30 characters, can contain letters numbers, special characters, and emoji.
    </div>
    

    <br>
    
       
        <div class="mb-3" style="max-width:90%;">
            <label for="exampleFormControlTextarea1" class="form-label"><h4>Confess here !!</h4></label>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
            
            <textarea class="form-control" name = "text" id="exampleFormControlTextarea1" rows="3" style="height:400px;"></textarea>
            <div id="passwordHelpBlock" class="form-text">
                The content must be with in 200 characters
            </div>
            
        </div>

        <button type = 'submit' class="btn btn-dark"><h5>Sumbit<h5></button>

    </form>
    </center>
    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>