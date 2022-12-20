<?php
        error_reporting(0);
        if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["email"]) && !empty($_POST["text"])){
            $server="localhost";
            $username="root";
            $password="";
            $database="uvce";
            $con = mysqli_connect($server,$username,$password,$database);
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }
            $email = $_POST["email"];
            $cat = $_POST["cat"];
            $text = $_POST["text"];
            $sql = "INSERT INTO `query` (`email`, `cat`, `text`,`dt`) VALUES ( '$email', '$cat', '$text', current_timestamp())";
            $result = mysqli_query($con,$sql); //Runs the query;
            // $rows=mysqli_num_rows($result);
            $pass=true;
            
            }
        

        
        

    
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="elements/justsidebar.css">
    <link rel="icon" href="elements/rocket.png">
    <!-- <link rel="stylesheet" href="elements/chat.css"> -->
</head>
<body>
    <?php
        include "elements/justsidebar.html";
    ?>
    
    <center>
        <h3>FAQ's</h3>
        <hr>
    </center>

    <br>
    <center>
    <div class="accordion" id="accordionExample" style="max-width:95%;">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Accordion Item #1
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Accordion Item #2
            </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Accordion Item #3
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
            </div>
        </div>
    </div>

    </center>
    
    <center>
        <br>
    <h2>Have Queries ?</h2>
    <hr>
    </center>
    <center>
        <br>
        <?php
        if($pass==true){
            echo'<div class="alert alert-warning alert-dismissible fade show" role="alert" style="max-width:85%;">
                        <strong>Thanks for reaching us</strong> We will get in touch with you with in 48hours
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }

    ?>
        <br>
        
        <div class="shadow-lg p-3 mb-5 bg-body rounded" style="max-width:95%;"><div class="mb-3">
            
                <form action="query.php" method="post">
                    <label for="exampleFormControlInput1" class="form-label" >Email address</label>
                    <input type="email" class="form-control" name = "email" id="email" placeholder="Enter your email id" style="max-width:60%;">    
                    </div>
                    
                    <p>Select Category</p>
                    <select class="form-select" name ="cat" aria-label="Default select example" style="max-width:60%;">
                        <option selected>Select</option>
                        <option value="1">Bug</option>
                        <option value="2">Incorrect Info</option>
                        <option value="3">Request</option>
                        <option value="4">Sales</option>
                        <option value="5">Others</option>
                    </select>
                    <br>
                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Enter your query Below</label>
                    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3" style="max-width:80%;height:300px;"></textarea>

                    </div>
                    <br>
                    <!-- <button type="submit" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Submit
</button> -->

<!-- Button trigger modal -->
<button type="submit" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Submit
</button>

<!-- Modal -->

                </form>
                <br>
                <br>
           
        </div>
        <?php
            if($pass==true){
                
            }
                
        ?>
    </center>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


</body>
</html>