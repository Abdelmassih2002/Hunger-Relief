<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel='stylesheet' type='text/css' media='screen' href='../CSS/registerationPage.css'>
</head>
<body>
<div class="nav">
      <ul>
        <li><a href="loginPage.php">Login</a></li>
        <li><a href="registerationPage.php">Register</a></li>
        <li><a href="contact us.html">Contact US</a></li>
        <li><a href="whoWeAre.html">Who We Are</a></li>
        <li><a href="offers.php">Offers</a></li>
        <li><a href="home.html">Home</a></li>
      </ul>
</div>
<div class="flex-container">  
 <form name="f1" method="post" action="">
    <div class="inputBox">
      <label for="email">Email:</label>
      <input name="email" type="email" id="email" class="card-holder-input" required />
    </div>
    <div class="inputBox">
      <label for="password">Password:</label>
      <input name="password" type="password" id="password" class="card-holder-input" required />
    </div>
    <div class="radio">

    <div class="inputBox"><input name="visa" class="btn-success" type="submit" value="visa" onclick="f1.action='visaForm.php';  "></div>
    <div class="inputBox"><input name="item" class="btn-success" type="submit" value="item" onclick="f1.action='itemForm.php';  "></div>
    <div class="inputBox"><input name="both" class="btn-success" type="submit" value="both" onclick="f1.action='donateForm.php';"></div>

    </div>
    <!-- <div class="submit">
      <input type="submit" name="submit" value="Login" id="Login" >
    </div> -->
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php
global $action;

$conn = mysqli_connect("localhost", "root", "", "hunger");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the email and password from the form
  $email = $_POST['email'];
  $password = $_POST['password']; 

  // Query the database for the user with the given email address
  $sql = "SELECT * FROM register WHERE email = '" .$email. "' AND password ='".$password."';";
  
  $result = mysqli_query($conn,$sql);


  if ($result->num_rows == 1) {

    $row = $result->fetch_assoc();
    $stored_password = $row['password'];

    if ($password == $stored_password) {
      echo "Login success";

  } else {
      // Password is incorrect, show an error message
      $error = '8alat';
    }
  } else {
    // User not found, show an error message
    $error = 'User not found';
  }
}
?>
