<?php
    if (isset($_POST['TID'])) {
        $con = mysqli_connect('localhost', 'root', '', 'dbms');
        if (!$con) {
            die("your databse not connected" . mysqli_connect_error());
        }
    session_start();
    



        $tid = $_POST["TID"];
        $cid = $_SESSION['customerid'];
        $sql1 = "SELECT * FROM payment WHERE TID='$tid' AND CID='$cid'";
        $res = mysqli_query($con, $sql1);
        $count = mysqli_num_rows($res);
       $sql2 = "SELECT * FROM asignevehicle WHERE TID='$tid'";
    $res1 = mysqli_query($con, $sql2);
    $count2 = mysqli_num_rows($res1);
        if ($count > 0 && $count2 >0) {

            $sql = "DELETE FROM asignevehicle WHERE tid='$tid'";
            $result = mysqli_query($con, $sql);
        $sql3 = "DELETE FROM payment where CID='$cid'AND TID='$tid'";
        $result2 = mysqli_query($con,$sql3);
            if ($result == true && $result2==true) {
                echo ' <div class="alert alert-success" role="alert">
            Trip Cancellation Successfull<a href="customerloggedin.php" class="alert-link">BACK</a>. Give it a click if you like.
             </div>';
            } else {
                $con->error;
            }
        } else {
            echo ' <div class="alert alert-danger" role="alert">
     Trip under process by the admin ,after booking confirmation you can cancel!!Or The Trip does not exist
</div>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>SRHolidays</title>
    <link rel="icon" href="favicon.ico">
    <style>
        *{
            margin: 10px;
            padding: 0;
           
            
        }
        body{
          background-color: rgb(202, 195, 187);
        }
        .button {
  background-color: #0e1349;
  border: none;
  color: white;
  padding: 15px 72px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  display: inline;
}
.button:hover{
    
    opacity: 0.8;
    color: rgb(154, 187, 114);
}


    </style>
</head>
<body>
    <h1 style="text-align: center;">Cancel Trip</h1>
    <form action="cancel.php" method="post">
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold; font-size:larger;">Trip-ID</label>
        <input type="text"name="TID" class="form-control" id="vid" placeholder="enter TID" required><br>
        
     
        
      
       
     
      <nav style="text-align: center;">
        <button type="submit" class="btn btn-info btn-outline-secondary">CANCEL TRIP</button>
      </nav>
    
    </div>
  </form>
      
        
</body>
</html>