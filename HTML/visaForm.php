
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/visaForm.css">
  <title>hu</title>
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
 <?php
  $conn = mysqli_connect("localhost", "root", "", "hunger");
  if ($conn) {
    global $id;
    if (isset($_POST['visa'])) { 
      $email = $_POST['email'];
      $password = $_POST['password'];
      $sql = "SELECT * FROM register WHERE email = '" .$email. "' AND password = '" . $password . "'; ";
      if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['ID'];
        }
      } else {
      }
    }
  }
  
  mysqli_close($conn);
  ?>
    <form name="f2" action="" method="post">
      <div class="Box2">
        <div class="inputBox">
           <input name="id" type="text" id="id" class="card-holder-input" value =" <?php echo $id?>"/> 
        </div>
        <div class="inputBox">
          <label for="card holder">card holder:</label>
          <input name="card_holder" type="text" id="card holder" class="card-holder-input" required />
        </div>
        <div class="inputBox">
          <label for="Expiration (mm/yy)">Expiration (mm/yy):</label>
          <input name="Expiration_mmyy" type="date" name="" id="Expiration (mm/yy)" required />
        </div>
        <div class="inputBox">
          <label for="cvv">cvv:</label>
          <input name="cvv" type="text" maxlength="4" class="cvv-input" id="cvv" required />
        </div>
        <div class="inputBox">
          <label for="Donation value">Donation value:</label>
          <input name="Donation_value" type="text" maxlength="4" class="cvv-input" id="Donation value" required />
        </div>
        <input type="submit" value="submit" name="visaButton" class="btn btn-primary" onclick="f2.action='offers.php';">
      </div>

    </form>
  </div>
</body>

</html>