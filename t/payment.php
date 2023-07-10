<?php
session_start();
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "dbms";
  $con = mysqli_connect($server, $username, $password, $database);
$customerid = $_SESSION['customerid'];
$tripid = $_SESSION['tripid'];
$amount=$_SESSION['amount'];
$sql = "INSERT INTO `payment` (`CID`, `TID`, `AMOUNT`) VALUES ('$customerid', '$tripid', '$amount')";
if ($con->query($sql) == true)
    header("location:amount.php");

?>