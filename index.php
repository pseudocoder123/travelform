<?php 

$insert = false;
if(isset($_POST['name'])){
   // set connection variable
   $server = "localhost";
   $username = "root";
   $password = "";

   // create a database connection using connection variable '$con'
   $con = mysqli_connect($server,$username,$password);

   // Check for connection success
   if(!$con){
       die("connection to this database failed due to" . mysqli_connect_error());
   }
   // echo "Successful connecting to the db"
 
   // Collect post variables
   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $other = $_POST['other'];

   $sql = "INSERT INTO `travel`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
   
   // echo $sql;
   // The above displays the input we have provided in the front end

   // Insert into db. Execute query
   if($con->query($sql) == true){
       //echo "Successfully inserted";
       $insert = true;   // flag for successful insertion
   }
   else{
       echo "ERROR : $sql <br> $con->error";
   }

   // Close the db connection
   $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="IIT Indore">
    <div class="container">
        <h1>Welcome to IITI Travel Consultancy</h1>
        <p>Enter your details below and submit the form to take part in the trip</p>
        <?php
        if($insert == true){
            echo "<p class='submsg'>Thanks for submitting the form. We are happy to see you joining with us</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other info"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>