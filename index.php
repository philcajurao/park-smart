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
    <title>Park Smart</title>
    <?php
        session_start();
    ?>
</head>
<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "dbform";

        $_SESSION["servername"] = $servername;
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["dbname"] = $database_name;
        $_SESSION["success"] = false;
        
        $conn = mysqli_connect($_SESSION["servername"],$_SESSION["username"],$_SESSION["password"],$_SESSION["dbname"]);

        $limit = "SELECT SUM(vehicle_quantity) AS sum
        FROM reservations";
        $maxresult = mysqli_query($conn, $limit);

        while ($column = mysqli_fetch_assoc($maxresult)) {
            $sum = "<header>Reserved &nbsp;slots</header><span
            id='full' style='color:rgb(0, 174, 219);margin:0;width:100%;top:5%;position:relative;padding:4px;border-bottom:5px solid black;'>" . $column['sum'] . "/50</span>";
            $_SESSION['total'] = $sum;
            
        }

        echo "<div class='slot1'>" . $_SESSION['total'] . "</div>";


?>
    <div class="sidenav-wrapper" id="content">
        <div class="logo"><a href="#"><h3><img src="logo.png" alt="" style="width: 90px;height: auto;"></h3></a></div>
            <ul>
                <li style="background: rgb(0, 174, 219);"><a href="index.php"><h4><i class="fa fa-home" aria-hidden="true"></i></h4></a></li>
                <li><a href="reservations.php"><h4 style="font-size:25px;"><i class="fa fa-car"></i></h4></a></li>
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
                <li style="background: rgb(0, 174, 219);"><a href="index.php"><h4 ><i class="fa fa-home" aria-hidden="true"></i></h4></a></li>
                <li><a href="reservations.php"><h4 style="font-size:25px;"><i class="fa fa-car"></i></h4></a></li>
            </ul>
            <div class="widgets" draggable="true">
                        <h3><a href="https://www.facebook.com/philip.cajurao.7"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></h3>
                        <h3><a href="https://twitter.com/kaina_tomoto"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></h3>
                        <h3><a href="https://www.instagram.com/hilai_73/"><i class="fa fa-instagram" aria-hidden="true" style="font-weight:900;" class="insta"></i></a></h3><br>
                        <h5 style="color: white;font-weight:bolder;font-size:16px;z-index:-1;">Click here</h5>
            </div>
    </div>

    
    <div class="container">
        <div class="title">
            <p>Reserve your parking now!</p>
        </div>
        <div class="get-start">
            <button><a href="login.php"><h2>GET STARTED..</h2></a></button>
        </div>
    </div>

    <div class="content">
    <div class="about-container">
        <div class="image"><img src="Park1.jpg" alt="" ></div>
        <div class="about-content">
            <h4>About Us</h4>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;There are several advantages of employing a car park system for urban planners, business owners and vehicle drivers. They offer convenience for vehicle users and efficient usage of space for urban-based companies. We are the ones who manage your parking and to make you comfortable with our system and if the The system is having a problem the supporters will support and fix it. This parking system will make sure that your car are in safe place assuring that your vehicle and other belongings are in the good hands. It is accessible for everyone and easy to access with no hassle that will give a good service and peaceful parking area.</p>
        </div>
    </div>

    <div class="offer-container">
        <div class="image"><img src="Park2.jpg" alt=""></div>
        <div class="offer-content">
            <h4>What We Offer?</h4>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We offer an online parking reservation service for you to lessen your struggles just by filling up forms and get your job done using your phone or your laptop. A faster and no hustle direct give of information to not buy your time. We also offer Overnight Parking, Day Parking, Temporary Parking and assure your vehicle and other belongings are in the safe place</p>
        </div>
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