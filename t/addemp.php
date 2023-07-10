
    <?php
    $succ = false;
    $terr = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $con = mysqli_connect('localhost', 'root', '', 'dbms');
        if (!$con) {
            die("your databse not connected" . mysqli_connect_error());
        }


        $emp = $_POST["emp-id"];
        $na = $_POST["e-name"];
        $ad = $_POST["e-address"];
        $ph = $_POST["e-phone"];
        $da = $_POST["e-join-date"];

        $check = "SELECT * FROM emp WHERE eid='$emp'";
        $resu = mysqli_query($con, $check);
        $count = mysqli_num_rows($resu);
        if ($count > 0) {
            $terr = true;
        } else {


            $sql = "INSERT INTO `emp`  VALUES ('$emp' ,'$na', '$ad', '$ph','$da')";

            if ($con->query($sql) == true) {
                $succ = true;
            } else {
                $con->error;
            }
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
    <h1 style="text-align: center;">ADD Employee</h1>
    <?php
     if($terr){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Warning!</strong> Emp-id already exits
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div> ';
     }
     if($succ==true){

        echo '<div class="alert alert-success" role="alert">
        Employee Added Successfully<a href="emp0.php" class="alert-link">BACK</a>. Give it a click if you like.
      </div>';

     }

    ?>
    <form action="addemp.php" method="post">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label" style="font-weight:bold; font-size:larger; ">EmployeeID</label>
        <input type="text" name="emp-id" class="form-control" id="formGroupExampleInput" placeholder="enter EmployeeID" required>
      
      
        <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold; font-size:larger;">E-NAME</label>
        <input type="text" name="e-name" class="form-control" id="formGroupExampleInput2" placeholder="enter E-NAME" required><br>
      
      
        <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold; font-size:larger;">E-Address</label>
        <input type="text"  name="e-address" class="form-control" id="formGroupExampleInput2" placeholder="enter  E-Address" required><br>
      
        <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold; font-size:larger;">E-Phone</label>
        <input type="text" name="e-phone" class="form-control" id="formGroupExampleInput2" placeholder="enter E-Phone" required><br>
     
        <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold; font-size:larger;">E-join_DATE</label>
        <input type="date" name="e-join-date" class="form-control" id="formGroupExampleInput2" placeholder="enter  E-jdate" required><br>
     <nav style="text-align: center;">
        <button type="submit" class="btn btn-info btn-outline-secondary">ADD EMPLOYEE</button>
      </nav>
       
    
    </div>
  </form>
      
        
</body>
</html>