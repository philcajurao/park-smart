<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging out</title>
</head>
<body>
<?php   
        echo "<center style='margin-top:20%;'><progress max=100><strong>Progress:100% done.</strong></progress><br>
        <span>Logging out please wait..</span></center>";
        session_unset();
        echo "<script>window.location.replace('login.php');</script>";

        
?>
</body>
</html>