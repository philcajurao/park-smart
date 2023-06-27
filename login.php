<?php
  session_start();
  if (isset($_SESSION['userid'])) {
    echo "<script>window.location.replace('reservations.php');</script>";
  } 

?>
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
    <title>Login</title>
    
</head>
<body>
<a href="index.php" style="color:rgb(24, 54, 74);margin:15px;font-size:30px;position:absolute"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
  <div class="log-container">
    <div class="login-container">
        <div class="login-content">
            <div class="login-title">
                <div class="login-title-content">
                    <h3><i class="fa fa-user-circle" aria-hidden="true"></i>
                        Login</h3>
                </div>
            </div>
            <form action="login.php" method="POST">
                <label for="usename">Username:</label>
                <input type="text" name="usename" required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" required><br>

                <label for="pass">Password:</label>
                <input type="password" name="pass" minlength="10" required><br>
                
                <input type="submit" name="save" value="Login" class="submit">

                <div class="others">
                    <h6>Don't have an account yet?
                        <a href="signup.html" style="color: blue;">Sign Up</a>
                        </h6>
                </div>
            </form>
        </div>
    </div>
  </div>
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


if(isset($_POST['save']))
{ 
  $usename = $_POST['usename'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  
  $success = false;


  $sql_query = "SELECT u.id FROM `accounts` u WHERE u.username = '$usename' AND u.email = '$email' AND u.password = '$pass'";
  $result = $conn->query($sql_query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row["id"] > 0)
          {
              $success = true;
              $_SESSION["userid"] = $row["id"];
          }
        }
      }
  if ($success == true)
  {       
    echo "<script>window.location.replace('reservations.php');</script>";
  }                                        
  else {
    echo "<script>
          alert('Wrong Username or Password!')
          window.location.replace('login.php');; 
          </script>";
  }
  mysqli_close($conn);
}
?>
    
</body>
</html>