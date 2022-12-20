<?php
  //connection to database marks
  error_reporting(0);
  session_start();
    if(isset($_SESSION['user_inside']) && $_SESSION['user_inside']==true){
        header('Refresh:0; URL=contribute.php');
    }
  // $server="localhost";
  // $username="root";
  // $password="";
  // $database="marks";
  // $con = mysqli_connect($server,$username,$password,$database);
  $err=true;
  $empty=false;
  $passed=false;
  if(count(array_filter($_POST))!=count($_POST)){
    
    $fail=true;
    $empty=true;
    //echo "hi";
  }

  
  if((isset($_POST['s1'])) and $empty==false) {
    //echo "Hi";
    $checker=false;
    $data = array();
    $data2 = array();
    array_push($data, $_POST['s1']);
    array_push($data, $_POST['s2']);
    array_push($data, $_POST['s3']);
    array_push($data, $_POST['s4']);
    array_push($data, $_POST['s5']);
    array_push($data, $_POST['s6']);
    array_push($data, $_POST['s7']);
    array_push($data, $_POST['s8']);
    array_push($data, $_POST['s9']);  
    array_push($data2, 3 );    
    array_push($data2, 3 );    
    array_push($data2, 3);    
    array_push($data2, 3);    
    array_push($data2, 3);    
    array_push($data2, 2 );    
    array_push($data2, 1);    
    array_push($data2, 1 );    
    array_push($data2, 1);   
    // array_push($data2, $_POST['c1']);    
    // array_push($data2, $_POST['c2']);    
    // array_push($data2, $_POST['c3']);    
    // array_push($data2, $_POST['c4']);    
    // array_push($data2, $_POST['c5']);    
    // array_push($data2, $_POST['c6']);    
    // array_push($data2, $_POST['c7']);    
    // array_push($data2, $_POST['c8']);    
    // array_push($data2, $_POST['c9']);   
    //print_r($data); 
    //echo $data[0];
    $sum=0;
    $c=0;
    for($i=0;$i<count($data);$i++){
      //echo "The i value is :".$i;
      //echo $data[$i]."*".$data2[$i];
      //echo "<br>";
      if($data[$i]>=90){
        $data[$i]=10;
      }
      else if($data[$i]>=80){
        $data[$i]=9;
      }
      else if($data[$i]>=70){
        $data[$i]=8;
      }
      else if($data[$i]>=60){
        $data[$i]=7;
      }
      else if($data[$i]>=45){
        $data[$i]=5;
      }
      else if($data[$i]>=40){
        $data[$i]=4;
      }
      else{   
        $show_backlock=true;
        $passed=true;
        $err=true; 
        break;
      }
      $sum+=($data[$i]*$data2[$i]);
      $c+=$data2[$i];
      
      $err=false;
 
    }

    if($c==0){
      $err=true;
    }
    if($err==false){
      //echo $sum."\n";
      //echo $c;
      $ans = $sum/$c;
      // $sql = "INSERT INTO `details` (`name`) VALUES ('$ans')";
      // if($con->query($sql)==true){
      //   //echo "passed to data base";
      // }
      $show_ans=true;
    }
    

    if($err==true && $passed=false){
    //   echo "<div class='mx-auto' style='width: 100%;'><div class='alert alert-danger' role='alert'>
    //     Wrong entry — Retry!
    //     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    //     </div></div>";
    }
  }
//   $con->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="icon" href="elements/rocket.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gpa-predictor</title>
    <link rel="stylesheet" href="elements/justsidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <?php
        include "elements/justsidebar.html";
    ?>
     <center>
      <?php
        if($fail==true){
         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:0%;text-align:center;max-width:96%;margin-top:0.5%">
        <strong>Oops!</strong> Seems like you missed something
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
        if($show_ans==true){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-bottom:0%;text-align:center;max-width:96%;margin-top:0.5%">
        <strong>Congratulations!</strong> You are  expected to get <strong>'. $ans. '</strong> Gpa
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
        if($show_backlock==true){
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:0%;text-align:center;max-width:96%;margin-top:0.5%">
          <strong>Oh NO!</strong> Seems like you can expect backlock(s)
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
      ?>
    <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-bottom:0%;text-align:center;max-width:96%;margin-top:0.5%">
      <strong>Congratulations!</strong> You're are expected to get _ GPA
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> -->
  </center>
    <div class="shadow p-3 mb-5 bg-body rounded" style="max-width:98%;margin-left:2%;margin-top:2%;margin-right:2%;">
      <div class="alert alert-dark" role="alert" style="padding-bottom:0.2%;">
          <center>
          <h5>Please enter your expected marks aganist corresponding subject names</h5>
          <p>This predictor is strictly as per the NEP norms</p>
          </center>
      </div>
    <!-- Button -->
    <hr>
    <form action="#" method="post">
      <center>
        <div >
    <div class="table" style="display:flex;flex-direction:row;justify-content:center;">
      <div class="shadow-sm p-3 mb-5 bg-body rounded" style="width:33%;text-align:center;">Enter Maths marks <br> <input type="number" name="s1" max="100";min="0"; style="max-width:80%;border-radius:5px;background-color:grey;text-align:center"></div>
      <div class="shadow-sm p-3 mb-5 bg-body rounded" style="width:33%;text-align:center;">Enter Electrical marks <br>  <input type="number" name="s2" max="100";min="0"; style="max-width:80%;border-radius:5px;background-color:grey;text-align:center"></div>
      <div class="shadow-sm p-3 mb-5 bg-body rounded" style="width:33%;text-align:center">Enter Mechanics marks <br>  <input type="number" name="s3" max="100";min="0"; style="max-width:80%;border-radius:5px;background-color:grey;text-align:center"></div>
      </div>
     
      <div class="table" style="display:flex;flex-direction:row;">
        <div class="shadow-sm p-4 mb-5 bg-body rounded" style="width:33%;text-align:center;display:block;">Enter Physics marks <br>  <input type="number" name="s4" max="100";min="0"; style="max-width:80%;border-radius:5px;background-color:grey;text-align:center"></div>
      <div class="shadow-sm p-3 mb-5 bg-body rounded" style="width:33%;text-align:center;display:block;flex-direction:column">Enter Drawing marks  <br> <input type="number" name="s5" max="100";min="0"; style="max-width:80%;border-radius:5px;background-color:grey;text-align:center"></div>
      <div class="shadow-sm p-3 mb-5 bg-body rounded" style="width:33%;text-align:center">Enter Electrical-lab marks <br>  <input type="number" name="s8" max="100";min="0"; style="max-width:80%;border-radius:5px;background-color:grey;text-align:center"></div>
      </div>

      <div class="table" style="display:flex;flex-direction:row;s ">
        <div class="shadow-sm p-3 mb-5 bg-body rounded" style="width:33%;text-align:center;display:block;text-align:center">Enter Physics-lab marks <br> <input type="number" name="s9" max="100";min="0"; style="max-width:80%;border-radius:5px;background-color:grey;text-align:center"></div>
      <div class="shadow-sm p-3 mb-5 bg-body rounded" style="width:33%;text-align:center;display:block;flex-direction:column">Enter English marks <br> <input type="number" name="s6" max="100";min="0"; style="max-width:80%;border-radius:5px;background-color:grey;text-align:center"></div>
      <div class="shadow-sm p-3 mb-5 bg-body rounded" style="width:33%;text-align:center">Enter Media marks <br> <input type="number" name="s7" max="100";min="0"; style="max-width:80%;border-radius:5px;background-color:grey;text-align:center"> <br></div>
      
      
    </div>
  </div>
    <hr>
    </center>
 
      <center>
          <button type="submit" class="btn btn-dark" style="height:50px;width:100px;font-size:19px;">
              Submit
          </button>
          <button onclick="location.reload()" class="btn btn-dark" style="height:50px;width:100px;font-size:19px;margin:1%">
            Reset
          </button>
      </center>
            </form> 
            
            <br>
            <br>
            <!-- <hr> -->
            <p>
  <a class="btn btn-secondary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Cheat Code</a>
</p>
      <div class="row">
        <div class="col">
          <div class="collapse multi-collapse" id="multiCollapseExample1">
            <div class="card card-body">
              <hr>
              <h6>If a candidate scores 90+ marks in a subject his respective subject Gpa is 10, <br>
              like wise if a candidate score 80+ in a subject his respective subject Gpa is 9, <br>
              70+ --> subject Gpa is 8gpa <br>
              60+ --> subject gpa is 7gpa <br>
              45+ --> subject gpa is 5gpa <br>
              40+ --> subject gpa is 4gpa <br>
              <40 --> fail <br>
              </h6>
              <hr>
              Formula to calculate Gpa is : <br>
              <strong> GPA = Summation of (Subject Gpa X Subject credit) / Summation of (all subject credits) </strong> <hr>
              To verify your Subject credits we suggest you to look at your syllabus <br>
              <h6>
              1st year syllabus <a href="elements/1st_year_syllabus.pdf" target="_blank">here</a> <br>
              2nd year syllabus <a href="">here</a>
              </h6>
              <hr>
              <br>
              *all the marks mentioned are (internal) + (Semester end marks)/2
            </div>
          </div>
        </div>
      </div>
      <div style= "text-align:right;">
      <a href="query.php?gpa2">Facing problem? Report here</a>
      </div>

    </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html>