
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "dbform";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name );


if(isset($_POST['save']))
{ 
    $datetime = $_POST['datetime'];
    $quantity = $_POST['quantity'];

//   $sql_query = "INSERT INTO reservations (fname,mname,lname,gender,birthdate,age,address,nationality) 
//   SELECT a.fname, a.mname, a.lname, a.gender, a.birthdate, a.age, a.address, a.nationality FROM accounts a 
//   WHERE id = 1 ; ";

    $sql_query = "INSERT INTO reservations (datetime,vehicle_quantity) 
    VALUES ('$datetime','$quantity');";
   

    if (mysqli_query($conn, $sql_query))
  {
    echo "<script>
          window.location.replace('reservation.html');
          </script>";
          
  }
  
  else {
    echo "Error" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>
