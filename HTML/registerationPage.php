<!DOCTYPE html>
<html lang="en">

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
    <form action="" method="post">
      <div class="inputBox">
        <label for="name">Name:</label>
        <input name="name" type="text" id="name" class="card-holder-input" required />
      </div>

      <div class="inputBox">
        <label for="email">Email:</label>
        <input name="email" type="email" id="email" class="card-holder-input" required />
      </div>

      <div class="inputBox">
        <label for="password">Password:</label>
        <input name="password" type="password" id="password" class="card-holder-input" required />
      </div>

      <div class="inputBox">
        <label for="age">Age:</label>
        <input name="age" type="text" id="age" class="card-holder-input" required />
      </div>

      <div class="inputBox">
        <label for="Phone">Phone:</label>
        <input name="phone" type="number" id="Phone" class="card-holder-input" required />
      </div>

      <div class="inputBox">
        <label for="address">Address:</label>
        <input name="address" type="text" id="address" class="card-holder-input" required />
      </div>

      <div class="sb"><input type="submit" name="button" value="Register" class="btn btn-primary buttonsub"> </div>

    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "hunger");
global $id;
if ($conn) {
  
  if (isset($_POST['button'])) {

  $name = mysqli_escape_string($conn, $_POST['name']);
  $email = mysqli_escape_string($conn, $_POST['email']);
  $password = mysqli_escape_string($conn, $_POST['password']);
  $age = mysqli_escape_string($conn, $_POST['age']);
  $phone = mysqli_escape_string($conn, $_POST['phone']);
  $address = mysqli_escape_string($conn, $_POST['address']);

  $query ="INSERT INTO register SET name ='" .$name ."', email='" .$email ."',
  password='" .$password ."', age='" .$age ."', phoneNum='" .$phone ."', address='" .$address ."'; ";

  $query1="SELECT ID FROM register WHERE email='".$email."' AND password = '".$password."';";
  
  $result = mysqli_query($conn, $query1);
















  while($row = mysqli_fetch_assoc($result)){
    $id = $row['ID'];
  }

  $query2 = "INSERT INTO points_table SET ID = '".$id."', points = '0' ;";
  $result2= mysqli_query($conn, $query2);

  mysqli_query($conn, $query);
  if (mysqli_multi_query($conn, $query)) {
    header("location: loginPage.php");
  } else {
  }
  mysqli_close($conn);
  }
}
?>