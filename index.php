<?php

$insert = false;
if(isset($_POST['name'])){
    //Set connection variables
$server = "localhost";
$username="root";
$password="";
//Creat a connection

$con=mysqli_connect($server,$username,$password);
//Check for connection success
if(!$con){
    die("Connection to this server failed due to".mysqli_connect_error());
}
// echo"Success connecting to the db";
//Collect post variables
$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$other=$_POST['other'];

$sql =" INSERT INTO `tour_db`.tour (`name`, `age`, `gender`, `email`, `phone`, `other`, `datetime`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
// echo $sql;
//Execute the query
if($con->query($sql)==TRUE){
    // echo "Successfully inserted";
   
   
    //Flag for successfully   
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";


}
//Close the database connection
$con->close();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,500&family=Sriracha&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="bauet1.jpg" alt="BAUET Natore">
    <div class="container">
        <h1>Welcome to Bauet trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
    <?php
    if($insert==true){
       echo '<p class="submitmsg">Thanks for submitting your form. We are happy to see you join the trip</p>';}
        
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter other information here"></textarea>
            <button class="btn">Submit</button>
            
        </form>
    </div>
    <script src="index.js"></script>
   
</body>
</html>