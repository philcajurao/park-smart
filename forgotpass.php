<?php

session_start();
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
    <title>Forgot Password</title>
</head>
<body>
<a href="login.php" style="color:rgb(24, 54, 74);margin:15px;font-size:30px;position:absolute"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
<div class="log-container">
    <div class="login-container" style="height: 300px;">
        <div class="login-content">
            <div class="login-title">
                <div class="login-title-content">
                    <h3><i class="fa fa-mobile" style="font-size:60px" aria-hidden="true"></i>
                    &nbsp;Recovery</h3>
                </div>
            </div>
            <form action="forgotpass.php" method="POST">
                <label for="recov">Phone:</label>
                <input type="number" name="phone" placeholder="0912-345-6789" required><br>
                
                <input type="submit" name="send" value="Send" class="submit">

                <div class="others">
                    <h6>Enter your phone number and try to recover your account.</h6>
                </div>
            </form>
        </div>
    </div>
  </div>
    <?php

    $conn = mysqli_connect($_SESSION["servername"],$_SESSION["username"],$_SESSION["password"],$_SESSION["dbname"]);
    
    if(isset($_POST['send'])){

        $phone = $_POST["phone"];
        $success = false;
    
        $sql = "SELECT p.id FROM `accounts` p WHERE p.phone = '$phone'";

        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row["id"] > 0)
          {
              $success = true;
              $_SESSION['recov'] = $row["id"];
          }
        }
      }
  if ($success == true)
  {       
    echo "<script>window.location.replace('login.php');</script>";
  }                                        
  else {
    // echo "<script>
    // alert('Wrong Credentials!')
    // window.location.replace('forgotpass.php');; 
    // </script>";
    echo mysqli_error($conn);
  }
  mysqli_close($conn);
}

 


    
    ?>
</body>
</html>