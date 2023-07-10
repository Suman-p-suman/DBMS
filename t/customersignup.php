<?php
 $insert=false;
$empt = false;
$uexist = false;
if (isset($_POST['name'])) {
  $server = "localhost";
  $username = "root";
  $password = "";
    $database = "dbms";
  $con= mysqli_connect($server, $username, $password,$database);
  if (!$con)
    echo "error";
  else
    //echo"success";
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];

  $sq = "SELECT CNAME FROM customer where CNAME='$name'";
  $re = $con->query($sq);
  $n = mysqli_num_rows($re);
  

  if (empty($name) or empty($address) or empty($phone) or empty($password) or empty($cpassword)){
    $empt= true;
  }
  else if($n!=0){
    $uexist = true;
  }
 
  else if($password==$cpassword)
  {
        $sql = "INSERT INTO `customer` ( `CNAME`, `CADDRESS`, `CPHONE`, `PASSWORD`) VALUES ( '$name', '$address', '$phone', '$password');";
        if($con->query($sql)==true) {
          $sql1 = "SELECT CID FROM customer where CNAME='$name'";
          $r = $con->query($sql1);
          $val = $r->fetch_assoc();
    
        $custid = $val["CID"];
           $insert = true;  
    }
    
    } else {
        echo "password mismatch";
       // header("location:customersignup.php");

    }

  
// if ($con->query($sql) == true)
//   $insert = true;//echo "success";
// else
//   echo "error query not executed";
//
  $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer signup</title>
    <link rel="icon" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
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
    color: green;
    text-align:center;
}
    </style>
    
</head>
<body>
    <div class="container">
        <h1>Welcome SR Travellers Travel Agency</h3>
        <p>Enter your details to signup </p>
         <?php
        if($insert == true){
        echo '<div class="submitMsg alert alert-success" role="alert">
       Signup Successfull Your Customer id id is '.$custid.' <a href="booktrip.html" class="alert-link">clickto login</a>. Give it a click if you like.
      </div>';

        }
        if($empt == true){
          echo'<div class="alert alert-danger" style="color:red; text-align:center;"><b>Registration Error!</b> Fields Must Not be Empty</div>';
  
          }
          if($uexist == true){
            echo'<div class="alert alert-danger" style="color:red; text-align:center;"><b>Username already exists</div>';
    
            }
    ?> 
        <form action="customersignup.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter  name">
            <input type="text" name="address" id="address" placeholder="Enter Address">
            <input type="text" name="phone" id="phone" placeholder="Enter Phonenumber">
            <input type="password" name="password" id="password" placeholder="Enter password ">
            <input type="password" name="cpassword" id="cpassword" placeholder="confirmpasssword">
            

            
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
