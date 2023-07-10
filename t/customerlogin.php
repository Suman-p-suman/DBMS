<?php
$login = false;
$showError = false;
$err=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $server = "localhost";
    $username = "root";
    $password = "";
      $database = "dbms";
    $con= mysqli_connect($server, $username, $password,$database);

    $customerid = $_POST["customerid"];
    $password = $_POST["password"]; 
    
    
     
    $sql = "Select * from customer where CID='$customerid' AND PASSWORD='$password'";
   // $sql = "Select * from users where username='$username'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['customerid'] = $customerid;
            header("location:customerloggedin.php");
            } 
            else{
               $err =true;
            }
        }
        
     
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer Login</title>
    <link rel="icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
      *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    
font-family: 'Roboto', sans-serif;
}

.container{
    max-width: 80%; 
    padding: 34px; 
    margin: auto;
}

.container h1 {
    text-align: center;
    font-family: 'Sriracha', cursive;
    font-size: 40px;
}

p{
    font-size: 17px;
    text-align: center;
    font-family: 'Sriracha', cursive;
}

input, textarea{
    
    border: 2px solid black;
    border-radius: 6px;
    outline: none;
    font-size: 16px;
    width: 80%;
    margin: 11px 0px;
    padding: 7px;
}
form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.btn{
    color: white;
    background: purple;
    padding: 8px 12px;
    font-size: 20px;
    border: 2px solid white;
    border-radius: 14px;
    cursor: pointer;
}

.bg{
    width: 100%;
    position: absolute;
    z-index: -1;
    opacity: 0.6;
}
.submitMsg{ 
    color: red;
    text-align:center;
}
    </style>
    
</head>
<body>
    <div class="container">
        <h1>Welcome SR Travellers Travel Agency</h3>
        <p>Enter your details to login </p>
        <?php
        if($err){
        echo '<div class="submitMsg alert alert-danger" role="alert">
         Invallid login credentials!!
      </div>';

        }
    ?> 
     
        <form action="customerlogin.php" method="post">
            <input type="text" name="customerid" id="customerid" placeholder="Enter Customerid">
            <input type="password" name="password" id="password" placeholder="Enter Password">
           
            

            
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>































