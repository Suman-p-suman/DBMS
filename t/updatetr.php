<?php
  
    $con = mysqli_connect('localhost', 'root', '', 'dbms');
    error_reporting(0);
    $ti = $_GET['ti'];
    $su = $_GET['su'];
    $de = $_GET['de'];
    $am = $_GET['am'];
    

   
       
       
    
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
    <h1 style="text-align: center;">UPDATE TRIP</h1>
    <!-- <?php
     if($terr){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Warning!</strong> trip-id already exits
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div> ';
     }
     if($succ==true){

        echo '<div class="alert alert-success" role="alert">
        Trip Added Successfully<a href="trip.php" class="alert-link">BACK</a>. Give it a click if you like.
      </div>';

     }

    ?> -->
    <form action="updatetr.php" method="post">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label" style="font-weight:bold; font-size:larger; ">TRIP-ID</label>
        <input type="text" value="<?php echo "$ti";?>" name="tid" class="form-control" id="formGroupExampleInput" placeholder="enter TRIP-ID" required readonly="readonly">
     
        <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold; font-size:larger;">Source</label>
        <input type="text" value="<?php echo "$su";?>" name="source" class="form-control" id="formGroupExampleInput2" placeholder="enter Source" required><br>
      
        <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold; font-size:larger;">Destination</label>
        <input type="text"  value="<?php echo "$de";?>" name="destination" class="form-control" id="formGroupExampleInput2" placeholder="enter  Destination" required><br>
        <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold; font-size:larger;">Amount</label>
        <input type="text"  value="<?php echo "$am";?>"  name="amount" class="form-control" id="formGroupExampleInput2" placeholder="enter  Destination" required><br>
     
      <nav style="text-align: center;">
        <button type="submit" name="submit" class="btn btn-info btn-outline-secondary">UPDATE TRIP</button>
      </nav>
    
    </div>
  </form>
      
        
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $con = mysqli_connect('localhost', 'root', '', 'dbms');
        $tid = $_POST['tid'];
        $sou = $_POST['source'];
        $des = $_POST['destination'];
        $amu = $_POST['amount'];
        $query = "UPDATE trip  SET tid='$tid',source='$sou',destination='$des',amount='$amu' WHERE tid='$tid'";
        $data = mysqli_query($con, $query);
        if ($data) {


            echo '<div class="alert alert-success" role="alert">
         Trip updated Successfully<a href="trip.php" class="alert-link">BACK</a>. Give it a click if you like.
       </div>';
        } else {
            echo "not updated";
        }
        $con->close();
    }
    
    ?>
