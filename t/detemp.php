<?php
$server = "localhost";
$username = "root";
$password = "";
  $database = "dbms";
$con= mysqli_connect($server, $username, $password,$database);
$sql = "SELECT * FROM emp";
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
    a {
    display: block;
    color: white;
    text-align: center;
    padding:6px;
    text-decoration: none;
    background-color:rgb(31, 118, 65) ;
  }
  a:hover {
    background-color:rgb(51, 60, 60);
  }
</style>
</head>
<body style="margin:50px;">
    <h1 style="text-align:center; padding-bottom:30px;">EMPLOYEE DETAILS</h1>
    <table class=" table table-striped">
        <thead>
            <tr>
                <th>EID</th>
                <th>ENAME</th>
                <th>EADDRESS</th>
                <th>EPHONE</th>
                <th>EJDATE</th>
                <th style="text-align: center;">UPDATE</th>
            </tr>
        </thead>
        <tbody>
            <?php
           while($row=$result->fetch_assoc()){
            echo "<tr>
                <td>". $row["eid"] ."</td>
                <td>". $row["ename"] ."</td>
                <td>". $row["eaddress"] ."</td>
                <td>". $row["ephone"] ."</td>
                <td>". $row["ejdate"] ."</td>
                <td> <a href='updateem.php?ei=$row[eid] &na=$row[ename]  &ead=$row[eaddress] &eph=$row[ephone] &ejd=$row[ejdate]'>UPDATE</a> </td>
            </tr>";

           }
           ?>
        </tbody>
        
    </table>
    
</body>
</html>