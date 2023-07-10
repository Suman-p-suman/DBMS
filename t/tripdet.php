
    <?php
    $succ = false;
    $terr = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $con = mysqli_connect('localhost', 'root', '', 'dbms');
        if (!$con) {
            die("your databse not connected" . mysqli_connect_error());
        }

        $cid = $_POST["customerid"];
        $tid = $_POST["tid"];
        $vid = $_POST["vid"];
        $bdate = $_POST["bdate"];

        $sql1 = "SELECT * FROM payment where cid='$cid' AND tid='$tid'";
        $sql2 = "SELECT * FROM vehicle where vid='$vid'";
        $res1 = mysqli_query($con, $sql1);
        $res2 = mysqli_query($con, $sql2);
        $count1 = mysqli_num_rows($res1);
        $count2 = mysqli_num_rows($res2);
        if ($count1 > 0 && $count2 > 0) {

            $sql = "INSERT INTO `bookedfor` (`cid`, `tid`, `vid`, `bdate`) VALUES ('$cid', '$tid', '$vid', '$bdate')";

            if ($con->query($sql) == true) {
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
          background-color: rgb(155, 148, 172);
        }
        /* .btn {
  background-color: #050614;
  border: none;
  color: white;
  padding: 15px 72px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  display: inline; */

.btn:hover{
    
    opacity: 0.8;
    color: rgb(96, 134, 51);
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



    </style>
</head>
<body>
    <h1 style="text-align: center; padding: 30px; font-weight: bold; ">BOOK TRIP</h1>
    <?php
 if($terr){

    echo ' <div class="alert alert-danger" role="alert">
    Vehicle id or customer id or trip id not exits or not Asigned
</div>';

 }
if($succ){
    echo ' <div class="alert alert-success" role="alert">
    BOOKING CONFIRMED <a href="bookedtrip.php" class="alert-link">BACK</a>. Give it a click if you like.
  </div>';
}


?>
    <form action="tripdet.php" method="post">
            
           <input type="text" name="customerid" id="customerid" placeholder="Enter  customerid">

           <input type="text" name="tid" id="tid" placeholder="Enter  tripid">
        

            <input type="text" name="vid" id="vid" placeholder="Enter vid">

            <input type="date" name="bdate" id="bdate" placeholder="Enter bdate">
           
            

            
            <button class="btn btn-primary btn-outline-dark btn-lg">Submit</button> 
        </form>
      
        
</body>
</html>