<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <?php
    $conn = mysqli_connect($_SESSION["servername"],$_SESSION["username"],$_SESSION["password"],$_SESSION["dbname"]);
    
    $current_reserveid = $_SESSION['current_reserveid'];

    if(isset($_POST['delete']))
{ 

    $sql_query = "DELETE FROM `reservations` WHERE id = $current_reserveid";
   

    if (mysqli_query($conn, $sql_query))
  {
    echo "<script>window.location.replace('reservations.php')</script>";
          
  }
  
  else {
    echo "Error" . mysqli_error($conn);
  }
  mysqli_close($conn);
}

    ?>
</body>
</html>