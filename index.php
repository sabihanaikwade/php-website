<?php
$insert = false;
if(isset($_POST['name'])){

   $server="localhost";
   $username="root";
   $password="";

   $con=mysqli_connect($server,$username,$password);

   if(!$con){
       die("connection to this database failed due to" . mysqli_connect_error());
   }

//    echo "Success connecting to the db";

     $name = $_POST['name'];
     $gender = $_POST['gender'];
     $age = $_POST['age'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $desc = $_POST['desc'];
     $sql="  INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dd`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
     
    //  echo $sql;

     if($con->query($sql)== true){
        //  echo "successfully inserted";
        $insert=true;
     }
     else{
         echo "ERROR: $sql <br> $con->error";
        //  $not_insert = true;
     }

     $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel From</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIT Kharagpur" srcset="">
    <div class="container">
        <h1>Welcome to IIT Kharagpur US Trip Form</h1>
        <p>Enter Your Details and submit this form to confirm your participation in the trip.</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form.we are happy to see you joining for the US trip.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>