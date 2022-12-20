<?php
    error_reporting(0);
    session_start();
    // echo $_SESSION['user'];
    // $_SESSION['user_inside']=true;
  if(isset($_SESSION['user'])){

    $server="localhost";
    $username="root";
    $password="";
    $database="uvce";
    $topic=$_POST['topic'];
    $subject = $_POST['flexRadioDefault'];
    $text =$_POST['text'];
    $link=$_POST['link'];
    // echo $topic;
    // echo $subject;
    // echo $text;
    // echo $link;
    // $text = trim($_POST['text']);
    // $title = trim($_POST['title']);
    // echo $text;
    // echo $title;
    if(!empty($_POST['topic']) && !empty($_POST['text'])){
        $con = mysqli_connect($server,$username,$password,$database);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        $sql= "INSERT INTO `academic_updates` ( `topic`,`subject`, `text`,`link`,`dt`) VALUES ('$topic', '$subject','$text','$link',current_timestamp())";
        if($con->query($sql)){
            echo "successfully inserted";
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
    <title>Academic Update</title>
    <link rel="icon" href="elements/rocket.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

    <br>
    <form action="academic_update.php" method = "post">
      <center>
    <div class="mb-3" style="max-width:90%;display:flex;justify-content:center;align-items:center;flex-direction:column;">
    <label for="exampleInputEmail1" class="form-label">Topic</label>
    <input type="text" name="topic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">upto 50 characters only</div>
    </center>
  </div>
  <br>
  <div style="margin-left:49%;">
    <div class="form-check">
      <input value = "CSE" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
        CSE
      </label>
    </div>
    <div class="form-check">
      <input value = "ISE" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
      <label class="form-check-label" for="flexRadioDefault2">
        ISE
      </label>
    </div>
    <div class="form-check">
      <input value = "AIML" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
      AIML
      </label>
    </div>
    <div class="form-check">
      <input value = "ECE" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
       ECE
      </label>
    </div>
    <div class="form-check">
      <input value = "EEE" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
        EEE
      </label>
    </div>
    <div class="form-check">
      <input value="civil"class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
        Civil
      </label>
    </div>
    <div class="form-check">
      <input value="mech" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
        Mech
      </label>
    </div>
  
    

    
  </div>
  <center>
    <div class="mb-3" style="max-width:90%;">
      <label for="exampleInputEmail1" class="form-label">Redirect link (if reqired)</label>
      <input type="text" name="link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Make sure you check if the link is working after you update :)
    </div>
    </div>
  </center>
<br>
<br>
<center>
<div class="mb-3" style="max-width:90%;">
  <label for="exampleFormControlTextarea1" class="form-label">Text area</label>
  <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height:300px;"></textarea>
</div>
<div id="emailHelp" class="form-text">upto 200 characters only</div>
<br>
<button type="submit" class="btn btn-success">Publish</button>
</form>
<a class = "btn btn-danger" href="logout.php">logout</a>
</center>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>