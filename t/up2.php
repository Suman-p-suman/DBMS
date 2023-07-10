
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $con = mysqli_connect('localhost', 'root', '', 'dbms');
        $emp = $_POST["emp-id"];
        $na = $_POST["e-name"];
        $ad = $_POST["e-address"];
        $ph = $_POST["e-phone"];
        $da = $_POST["e-join-date"];
        $query = "UPDATE emp  SET eid='$emp',ename='$na',eaddress='$ad',ephone='$ph',ejdate='$da' WHERE eid='$emp'";
        $data = mysqli_query($con, $query);
        if ($data) {


            echo '<div class="alert alert-success" role="alert">
         Employee updated Successfully<a href="emp0.php" class="alert-link">BACK</a>. Give it a click if you like.
       </div>';
        } else {
            echo "not updated";
        }
        $con->close();
    }
    
    ?>
</body>
</html>