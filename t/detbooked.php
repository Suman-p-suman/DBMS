<?php

$server = "localhost";
$username = "root";
$password = "";
  $database = "dbms";
$con= mysqli_connect($server, $username, $password,$database);
$sql = "SELECT * FROM bookedfor";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRHolidays</title>
    <link rel="icon" href="favicon.ico">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<style>
    *{
        margin: 0;
        padding: 0;
    }
    body{
        background-color: rgb(236, 236, 228);
    }
</style>
</head>
<body style="margin:50px;">
    <h1 style="text-align:center; padding-bottom:30px;">BOOKED DETAILS</h1>
    <table class=" table table-striped">
        <thead>
            <tr>
                <th>CID</th>
                <th>TID</th>
                <th>VID</th>
                <th>BDATE</th>
                

            </tr>
        </thead>
        <tbody>
            <?php
           while($row=$result->fetch_assoc()){
            echo "<tr>
                <td>". $row["cid"] ."</td>
                <td>". $row["tid"] ."</td>
                <td>". $row["vid"] ."</td>
                <td>". $row["bdate"] ."</td>
                

            </tr>";

           }
           ?>
        </tbody>
        
    </table>
    
</body>
</html>