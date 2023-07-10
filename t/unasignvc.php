


    <?php
    if (isset($_POST['vid'])) {
        $con = mysqli_connect('localhost', 'root', '', 'dbms');
        if (!$con) {
            die("your databse not connected" . mysqli_connect_error());
        }




        $vid = $_POST["vid"];
        $sql1 = "SELECT * FROM asignevehicle WHERE vid='$vid'";
        $res = mysqli_query($con, $sql1);
        $count = mysqli_num_rows($res);
        if ($count > 0) {

            $sql = "DELETE FROM asignevehicle WHERE vid='$vid'";
            $result = mysqli_query($con, $sql);
            if ($result == true) {
                echo ' <div class="alert alert-success" role="alert">
            Unassigned successfully <a href="asignorunasignvc.php" class="alert-link">BACK</a>. Give it a click if you like.
             </div>';
            } else {
                $con->error;
            }
        } else {
            echo ' <div class="alert alert-danger" role="alert">
     Vehicle id not exits or not Asigned
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
    <h1 style="text-align: center;">Unassign vehicle</h1>
    <form action="unasignvc.php" method="post">
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold; font-size:larger;">Vechicle-ID</label>
        <input type="text"name="vid" class="form-control" id="vid" placeholder="enter Source" required><br>
        
     
        
      
       
     
      <nav style="text-align: center;">
        <button type="submit" class="btn btn-info btn-outline-secondary">UnAsign Vechicle</button>
      </nav>
    
    </div>
  </form>
      
        
</body>
</html>