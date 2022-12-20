<?php
    // include 'elements/tree.jpg';
    session_start();
    if(isset($_SESSION['user_inside']) && $_SESSION['user_inside']==true){
        header('Refresh:0; URL=contribute.php');
    }
    if(isset($_POST["id"])){
    $id = strtolower($_POST['id']);
    if($id == "kartik"){
            $_SESSION['user']=$id;
            // $_SESSION['login']=true;
            header('Refresh:0; URL=contribute.php');
    }
}
    else{
    //     echo '<script type="text/JavaScript"> 
    //      alert("Something is wrong");
    //      </script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="elements/justsidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" href="elements/rocket.png">
    
</head>
<body style="background-image:url(elements/Bridge.jpg);">
    <?php
        include 'elements/justsidebar.html'
    ?>
    
    <div style="background-image:url(elements/cabin.jpg);height:94%;display:flex;justify-content:center;align-items:center;background-color:green;">
        <center>
        
        <div class="card" style="width: 25rem;padding:1%;background-color:black;height:94%;display:flex;justify-content:center;align-items:center;background-color:black;">
            <img src="elements/contribute2.jpg" class="card-img-top" alt="elements/contribute.jpg" style="opacity:70%;">
            <div class="card-body" style="color:white;">
                <h5 class="card-title">Are you a Contributor ?</h5>
              <hr>
             
                <p class="card-text"> <form action="setting.php" method="post"><h5>Enter ID : <input type="text" name = "id" placeholder = "Awww!"style="border-radius:20px;padding-left:2.2%;font-size:20px;"></h5></p>
                <!-- <p class="card-text">Enter key : <input type="text" style="border-radius:20px;"></p> -->
                <button type="submit" class="btn btn-secondary">Login</button></form>
                
            </div>
        </div>
     
        </center>
    </div>
    
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>