<?php
$terr= false;
$empt = false;
$tdexist = false;
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "dbms";
    $con = mysqli_connect($server, $username, $password, $database);
    $customerid = $_SESSION['customerid'];
    $tripid = $_POST["tripid"];
    $sdate = $_POST["sdate"];
    $edate = $_POST["edate"];
    $_SESSION['tripid'] = $tripid;

    $sq = "SELECT tid,cid FROM tripbook where tid='$tripid'and cid='$customerid'";
  $re = $con->query($sq);
  $n = mysqli_num_rows($re);

  $sq1 = "SELECT tid FROM trip where tid='$tripid'";
  $re1 = $con->query($sq1);
  $n1 = mysqli_num_rows($re1);
    

    if (empty($customerid) or empty($tripid) or empty($sdate) or empty($edate)){
        $empt= true;
      }
    else if($n!=0)
    {
        $terr = true;
    } 
    else if($n1==0){
        $tdexist = true;
    }
    else {
        $sql = "INSERT INTO `tripbook` (`TID`, `CID`, `SDATE`, `EDATE`) VALUES ('$tripid', '$customerid', '$sdate', '$edate')";
        $sql1 = "SELECT * FROM trip WHERE TID='$tripid'";
        $result = $con->query($sql1);
        $row = $result->fetch_assoc();
        $n = mysqli_num_rows($result);
        if ($con->query($sql) == true) {
            if ($n!=0) {
                $_SESSION['amount'] = $row["amount"];
                header("location:payment.php");
            }
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
if($empt == true){
    echo'<div class="alert alert-danger" style="color:red; text-align:center;"><b> Error!</b> Fields Must Not be Empty</div>';

    }
    if($terr == true){
        echo'<div class="alert alert-danger" style="color:red; text-align:center;"><b>Trip with'.$tripid.' already exists</div>';

        }
        if($tdexist == true){
            echo'<div class="alert alert-danger" style="color:red; text-align:center;"><b>There is no trip with'.$tripid.'  exists</div>';
    
            }

?>
    <form action="bookingmodule.php" method="post">
            <input type="text" name="tripid" id="tripid" placeholder="Enter  tripid">
        

            <input type="date" name="sdate" id="sdate" placeholder="Enter sdate">

            <input type="date" name="edate" id="edate" placeholder="Enter edate">
           
            

            
            <button class="btn btn-primary btn-outline-dark btn-lg">Submit</button> 
        </form>
      
        
</body>
</html>