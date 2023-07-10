

    <?php
    $succ = false;
    $terr = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $con = mysqli_connect('localhost', 'root', '', 'dbms');
        if (!$con) {
            die("your databse not connected" . mysqli_connect_error());
        }



        $emp = $_POST["eid"];
        $vc = $_POST["vid"];
        $da = $_POST["ddate"];

        $check = "SELECT * FROM emp WHERE eid='$emp'";
        $check1 = "SELECT * FROM vehicle WHERE vid='$vc'";
        $resu = mysqli_query($con, $check);
        $res1 = mysqli_query($con, $check1);

        $count = mysqli_num_rows($resu);
        $count1 = mysqli_num_rows($res1);

        if ($count > 0 && $count1 > 0) {



            $sql = "INSERT INTO `asignemp` (`eid`, `vid`, `ddate`) VALUES ('$emp' ,'$vc', '$da')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $succ = true;

            } else {
                $con->error;
            }
        } else {
            $terr = true;

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
    <h1 style="text-align: center;">Asign Employee</h1>
    <?php
if($terr){
    echo ' <div class="alert alert-danger" role="alert">
    Vechicle id or Employee id not exits
</div>';

}
if($succ){
    echo ' <div class="alert alert-success" role="alert">
    Assigned successfully <a href="asignorunasignemp.php" class="alert-link">BACK</a>. Give it a click if you like.
  </div>';
}

?>
    <form action="driven.php" method="post">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label" style="font-weight:bold; font-size:larger; ">Employee-ID</label>
        <input type="text"name="eid" class="form-control" id="formGroupExampleInput" placeholder="enter employee-ID" required>
      
        <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold; font-size:larger;">Vechicle-ID</label>
        <input type="text"name="vid" class="form-control" id="formGroupExampleInput2" placeholder="enter Vechicle-ID" required><br>
      
     
        <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold; font-size:larger;">Departure_Date</label>
        <input type="date"name="ddate" class="form-control" id="formGroupExampleInput2" placeholder="enter  Destination" required><br>
     
      
      <nav style="text-align: center;">
        <button type="submit" class="btn btn-info btn-outline-secondary">ASIGN</button>
      </nav>
    
    </div>
  </form>
        
</body>
</html>
