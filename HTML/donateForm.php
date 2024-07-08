<?php
$conn = mysqli_connect("localhost", "root", "", "hunger");
if ($conn) {
  global $id;
  if (isset($_POST['both'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM register WHERE email = '" . $email . "' AND password = '" . $password . "'; ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['ID'];
      }
    } else {
      echo "email or password are incorrect";
    }
  }
}
if (isset($_POST['bothButtom'])) {
  $card_holder = mysqli_escape_string($conn, $_POST['card_holder']);
  $Expiration_mmyy = mysqli_escape_string($conn, $_POST['Expiration_mmyy']);
  $cvv = mysqli_escape_string($conn, $_POST['cvv']);
  $Donation_value = mysqli_escape_string($conn, $_POST['Donation_value']);
  $item_description = mysqli_escape_string($conn, $_POST['item_description']);
  $quantity = mysqli_escape_string($conn, $_POST['quantity']);
  $id = mysqli_escape_string($conn, $_POST['id']);
  $sql = "INSERT INTO visa SET  card_holder = '".$card_holder."', expiration_date = '".$Expiration_mmyy."', cvv = '".$cvv."', donation_value ='".$Donation_value."' , ID= '".$id."' ;";
  $sql2 = "INSERT INTO items SET  item_description = '".$item_description."', quantity = '".$quantity."', ID= '".$id."' ;";
  if (mysqli_multi_query($conn, $sql) && mysqli_multi_query($conn, $sql2)) {
    echo 'inserted data';

  } else {
    echo mysqli_error($conn);
  }

  
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/DonateStyle.css">
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
      <form action="offers.php" method="post"> 
      <input name="id" type="hidden" id="id" class="card-holder-input" value ="<?php echo $id ?>"/>
     
        <div class="Box2">
        <div class="inputBox">
            <label for="card holder">card holder:</label>
            <input name="card_holder" type="text" id="card holder" class="card-holder-input" />
          </div>
         
          <div class="inputBox">
            <label for="Expiration (mm/yy)">Expiration (mm/yy):</label>
            <input name="Expiration_mmyy" type="date" name="" id="Expiration (mm/yy)" />
          </div>
         
          <div class="inputBox">
            <label for="cvv">cvv:</label>
            <input name="cvv" type="text" maxlength="4" class="cvv-input" id="cvv" />
          </div>
          <div class="inputBox">
            <label for="Donation value">Donation value:</label>
            <input name="Donation_value" type="text" maxlength="4" class="cvv-input" id="Donation value" />
          </div>
        </div>
        <div class="Box3">

        <div class="inputBox">
            <label for="item_description">Item Description:</label>
            <textarea
              rows="4"
              cols="20"
              id="item_description"
              name="item_description"
              placeholder="1 Tshirt - 2 Toys - 3 Skirts"
            >
            </textarea>
          </div>

          <div class="inputBox">
            <label for="quantity">Quantity:</label>
            <input
              type="number"
              name="quantity"
              id="quantity"
              class="card-holder-input"
            />
          </div>
        </div>
      
    </div>
    <div class="sb">
      <input name="bothButtom" type="submit" value="submit" class="btn btn-primary buttonsub">
</div>

  </form>
  </body>
</html>



