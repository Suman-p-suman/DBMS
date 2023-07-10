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
</head>
<body>
    <?php
    $succ = false;
    $terr = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $con = mysqli_connect('localhost', 'root', '', 'dbms');
        if (!$con) {
            die("your databse not connected" . mysqli_connect_error());
        }


        $na = $_POST["na"];
        $email = $_POST["email"];
        $te = $_POST["mesage"];
        

        $check =" INSERT INTO `contact` (`name`, `email`, `text`) VALUES ('$na', '$email', '$te')";
        $resu = mysqli_query($con, $check);
        if($resu)
        {
            echo '<div class="alert alert-success" role="alert">
          SUCCESFULLY SENT Thank you for Contacting us
          </div>';
        }
       
        $con->close();
    }
?>
</body>
</html>