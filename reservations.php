<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Permanent+Marker&display=swap" rel="stylesheet">
    <title>Reservation</title>
    <?php
        session_start();
        if(empty($_SESSION['userid'])):
            header('Location:login.php');
        endif;
    ?>
    <style>
    
    </style>
</head>
<body>
<div class="sidenav-wrapper" id="content">
        <div class="logo"><a href="#"><h3><img src="logo.png" alt="" style="width: 90px;height: auto;"></h3></a></div>
            <ul>
                <li><a href="index.php"><h4><i class="fa fa-home" aria-hidden="true"></i></h4></a></li>
                <li style="background: rgb(0, 174, 219);"><a href="reservations.php"><h4 style="font-size:25px;"><i class="fa fa-car"></i></h4></a></li>
            </ul>

            <div class="social-media">
                <div class="row">
                    <div class="column">
                        <h3 style="font-weight:normal;font-size:medium">&nbsp;Contacts</h3>
                    </div>
                    <div class="column">
                        <h3><a href="https://www.facebook.com/philip.cajurao.7"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></h3>
                        <h3><a href="https://twitter.com/kaina_tomoto"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></h3>
                        <h3><a href="https://www.instagram.com/hilai_73/"><i class="fa fa-instagram" aria-hidden="true"></i></a></h3>
                    </div>
                </div>
            </div>
    </div>

    <div class="top-nav">
        <div class="logo1">
            <a href="index.php"><h3><img src="logo.png" alt="" style="width: 70px;height: auto;"></h3></a>
        </div>
            <ul>
                <li><a href="index.php"><h4 ><i class="fa fa-home" aria-hidden="true"></i></h4></a></li>
                <li style="background: rgb(0, 174, 219);"><a href="reservations.php"><h4 style="font-size:25px;"><i class="fa fa-car"></i></h4></a></li>
            </ul>
            <div class="widgets">
                        <h3><a href="https://www.facebook.com/philip.cajurao.7"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></h3>
                        <h3><a href="https://twitter.com/kaina_tomoto"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></h3>
                        <h3><a href="https://www.instagram.com/hilai_73/"><i class="fa fa-instagram" aria-hidden="true" style="font-weight:900;" class="insta"></i></a></h3><br>
                        <h5 style="color: white;font-weight:bolder;font-size:16px;z-index:-1;">Click here</h5>
                    </div>
    </div>

    <div class="reserve-cont">
    <div class="reservation">
        <div class="reservation-container">
            <div class="reservation-title">
                <h2>Reserve a place</h2>
            </div>
            <div class="reservation-content">
                <form action="reservations.php" method="POST">
                <div class="row">
                    <div class="column">
                        <label for="datetime">Choose your date and time:</label><br>
                        <input type="datetime-local" id="dateInput" name="datetime" style="cursor: pointer;" min="2019-12-12T04:21" required><br><br>
                    </div>
                    <div class="column">
                        <label for="quantity">Vehicle Quantity:</label><br>
                        <input type="number"  name="quantity" max="2" id="quantitybtn" class="vquantity" style="padding: 5px;" required disabled>
                    </div>
                    <div class="column">
                        <input type="submit" class="rservebtn" id="reservebtn" name="save" value="RESERVE" style="margin: 15px;border-radius:5px;padding: 10px;background: rgb(0, 174, 219);
                        border: 1px solid rgba(0,0,0,0.3);color: white;" disabled>
                    </div>
                </form>
                </div>

            </div>
            <div class="label">
            <h3>Date and time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vehicle Quantity</h3>
        </div>
            <div class="test"><?php

// Create connection
$conn = mysqli_connect($_SESSION["servername"],$_SESSION["username"],$_SESSION["password"],$_SESSION["dbname"]);
$success = false;
$user = $_SESSION["userid"];

$sql = "SELECT id, datetime, vehicle_quantity, current_userid FROM reservations
    WHERE current_userid = $user";
$limit = "SELECT SUM(vehicle_quantity) AS sum
FROM reservations";
$maxresult = mysqli_query($conn, $limit);

while ($column = mysqli_fetch_assoc($maxresult)) {
    $sum = "<header>Reserved slots<br><span style='color:rgb(0, 174, 219);position:relative;padding:4px;border-bottom:5px solid black;' id='full'>" . $column['sum'] . "/50</span></header>";
    $_SESSION['total'] = $sum;
    if ($column['sum'] == 49) {
        echo "<script>
        document. getElementById('reservebtn').disabled = false;
        document. getElementById('quantitybtn').disabled = false;
        document. getElementById('quantitybtn').setAttribute('max', '1');
        </script>";
    } elseif ($column['sum'] < 49) {
        echo "<script>
        document. getElementById('reservebtn').disabled = false;
        document. getElementById('quantitybtn').disabled = false;
        </script>";
    }

}

  $result = $conn->query($sql);
    if ($result->num_rows > 0) {     
        while($row = $result->fetch_assoc()) {
           echo "<li>" . $row["datetime"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;" . $row["vehicle_quantity"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <form method='POST' action='delete.php' class='dltbtn'><input class='delete' 
           type='submit' value='Cancel Reservation' name='delete'></form></input></li><br><br>";
          if($row["id"] > 0)
          {
            $success = true;
            $_SESSION['current_reserveid'] = $row['id'];
          }
        }
      }
  if ($success == true)
  {       
    echo "<script>yuo = 'success';
            alert.(yuo);</script>";
  }      

if(isset($_POST['save']))
{ 
    $datetime = $_POST['datetime'];
    $quantity = $_POST['quantity'];
    $user = $_SESSION["userid"];


    $sql_query = "INSERT INTO reservations (current_userid, datetime,vehicle_quantity) 
    VALUES ('$user','$datetime','$quantity');";
    
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
    
            </div>
            <div class="rsrv">
                <?php
                echo "<div class='slot'>" . $_SESSION['total'];
                echo "<span style='margin-left:-520px;margin-top:-30px;'>Your ID: " . $user . "</span></div>";
                ?>
            </div>
            <form action="logout.php" class="form1">
        <input type="submit" value="Logout" style="font-size: 15px;
    padding: 7px; 
    color: white;
    background: rgb(0, 174, 219);
    cursor: pointer;
    border: 1px solid rgba(0,0,0,0.3);
    border-radius:5px;
    position:relative;
    top:120px">
    </form>
        </div>
        </div>
    <footer>
        <div class="copyright">
            <h5><sup>&#169;</sup>2021 Park Smart</h5>
            <h5>All Rights Reserved.</h5>
        </div>
    </footer>
</body>
</html>