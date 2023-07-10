<?php
$login = false;
  session_start();
  if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true)

  {
    $login = true;
    header("location:customerloggedin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcometo SR travellers</title>
    <link rel="icon" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<style>
    *{
       margin: 0;
       padding: 0;
    }
    body{
        background-color: antiquewhite;
    }
   
    h1
    {
        text-align: center;
        padding-top: 30px;
    }
    .btn{
        text-align:center;
        margin:5%;
    }
</style>

</head>
<body>
    <?php
    if ($login = true) {
       echo"<h1 >Welcome To SR Travellers</h1>";
    }
     ?>
     <div class="d-grid gap-2 col-6 mx-auto" style="padding: 50px;">
  <button class="btn btn-outline-success" type="button"><a href="bookingmodule.php" class="nav-link">BOOKNOW</a></button>
  <button class="btn btn-outline-success" type="button"><a href="mybookings.php" class="nav-link">MYBOOKINGS</a></button>
  <button class="btn btn-outline-success" type="button"><a href="availablecu.php" class="nav-link">AVAILABLETRIPS</a></button>
  <button class="btn btn-outline-success" type="button"><a href="cancel.php" class="nav-link">CANCELTRIP</a></button>
  <button class="btn btn-outline-success" type="button"><a href="logout.php" class="nav-link">logout</a></button>
</div>
    
</body>
</html>