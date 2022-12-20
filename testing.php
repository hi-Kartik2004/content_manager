<?php
error_reporting(0);
    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "test";
    $con = mysqli_connect($server,$username,$password,$database);
    if($con){
        // echo "Success";
    }
    else{
        echo "Failure";
    }
    while($result = mysqli_fetch_assoc($con,$text)){
        echo "$result";
    }
    
    $text = $_POST['text'];
    $sql = "INSERT INTO `updates` ( `text`) VALUES ('$text');";
    
    if(!empty(trim($text))){
        if($result = mysqli_query($con,$sql)){
            echo "Record Inserted";
        }
        else{
            echo "Record cannot be inserted";
        }
    }

    

    
    
    
    // $result = mysqli_query($con,$sql);
    
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing</title>
    <link rel="icon" href="elements/rocket.png">

</head> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<body>
    <form action="testing.php" method="post">
        <input type="text" name="text" id="text" >
        <button class="btn" type="submit">Submit</button>
    </form>
    <label for="update">update here</label>
    <form action="testing.php" method="post">
        sno : <input type="number" name="sno" id="sno">
        new : <input type="text" name="new" id="new">
        <button class="btn" type="submit">Change</button>
    </form>
    <?php
           
            if(empty($_POST['new']) && !empty($_POST['sno'])){
               $show_modal=true;
               $sno = $_POST['sno'];
            //    echo "HEllo";

                $sql="
                DELETE FROM `updates` WHERE `updates`.`sno` = $sno";
                if($con->query($sql)){
                    echo "Record Deleted";
                }
                else{
                    echo "Record deletion failed";
                }
            }
            else if(!empty($_POST['sno'])){
                $sno = $_POST['sno'];
                $new = $_POST['new'];
                $sql ="UPDATE `updates` SET `text` = '$new' WHERE `updates`.`sno` = $sno;";
                if($con->query($sql)){
                    echo "Record successfully Changed";
                }
                else{
                    echo "Failure ";
                }
            }
            $sql = "SELECT * FROM `updates`";
            $reuslt2 = mysqli_query($con,$sql2);
            $number = mysqli_num_rows($result2);
            echo $number;
            // $row=mysqli_fetch_assoc($result);
            // while($number){
            //     echo $number;
            //     $number--;
            // }
        ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>