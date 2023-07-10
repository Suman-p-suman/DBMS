<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRHolidays</title>
    <link rel="icon" href="favicon.ico">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-color: rgb(243, 243, 243);
        }
        .button {
  background-color: #000000;
  border: none;
  color: rgb(245, 248, 234);
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
    color: rgb(61, 167, 66);
}
    </style>
</head>
<body>
    <h1 style="text-align: center;padding: 20px;text-decoration: underline;">Assign or Unasign vc</h1>
    <?php include("nav.php");?>
    <div style="text-align: center; padding-top: 150px;">
    <a href="asignvc.php" class="button" >Asign Vehicle</a>
</div>
<div style="text-align: center; padding-top: 60px;" >
    <a href="unasignvc.php" class="button" >UnAsign Vehicle </a>
</div>
<div style="text-align: center; padding-top: 60px;" >
    <a href="alreadyassigned.php" class="button" > AssignedVehicle </a>
</div>


        

</div>
</body>
</html>