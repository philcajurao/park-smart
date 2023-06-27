<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "dbform";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name );


if(isset($_POST['save']))
{ 
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $birthdate = $_POST['birthdate'];
  $age = $_POST['age'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $nationality = $_POST['nationality'];
  $usename = $_POST['usename'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $sql_query = "INSERT INTO accounts (fname,mname,lname,gender,birthdate,age,phone,address,nationality,username,email,password)
  VALUES ('$fname','$mname','$lname','$gender','$birthdate','$age','$contact','$address','$nationality','$usename','$email','$pass')";

  if (mysqli_query($conn, $sql_query))
  {
    echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
          <div style='text-align:center;margin-top:20%;font-family:Segoe UI;'>
          <h3>You successfully signed up your account!</h3>
          <h4><i class='fa fa-arrow-left' aria-hidden='true'></i><a href='login.php' style='text-decoration:none;'> Click here to try logging in.</a></h4>
          </div>";
  }
  else {
    echo "Error" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>