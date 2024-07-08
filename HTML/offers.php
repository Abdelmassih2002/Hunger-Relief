<?php
$conn = mysqli_connect("localhost", "root", "", "hunger");
global $sum;
if ($conn) {
  if (isset($_POST['visaButton'])) {
    $card_holder = mysqli_escape_string($conn, $_POST['card_holder']);
    $Expiration_mmyy = mysqli_escape_string($conn, $_POST['Expiration_mmyy']);
    $cvv = mysqli_escape_string($conn, $_POST['cvv']);
    $Donation_value = mysqli_escape_string($conn, $_POST['Donation_value']);
    $id = mysqli_escape_string($conn, $_POST['id']);
    $sql = "INSERT INTO visa SET  card_holder = '" . $card_holder . "', expiration_date = '" . $Expiration_mmyy . "',cvv = '" . $cvv . "', donation_value ='" . $Donation_value . "' , ID= '" . $id . "' ;";
    if (mysqli_query($conn, $sql)) {

    } else {
    }

    $id = $_POST['id'];

    $Donation_value = mysqli_escape_string($conn, $_POST['Donation_value']);
    $sql = "SELECT * FROM visa WHERE ID = '" . $id . "';";
    if ($result = mysqli_query($conn, $sql)) {
      $sum = 0;

      while ($row = mysqli_fetch_assoc($result)) {
        $Donation_value = $row['donation_value'];
        $Donation_value /= 10;
        $sum += $Donation_value;
      ;

      }
      

      $sql = "UPDATE points_table SET points = '" . $sum . "' WHERE ID = '" . $id . "';";
      if (mysqli_query($conn, $sql)) {
      } else {
      }
    } else {
    }
  }
  if (isset($_POST['itemButton'])) {
    $item_description = mysqli_escape_string($conn, $_POST['item_description']);
    $quantity = mysqli_escape_string($conn, $_POST['quantity']);
    $id = mysqli_escape_string($conn, $_POST['id']);
    $sql = "INSERT INTO items SET  item_description = '" . $item_description . "', quantity = '" . $quantity . "', ID= '" . $id . "' ;";
    if (mysqli_query($conn, $sql)) {

    } else {
    }

    $id = $_POST['id'];

    $quantity = mysqli_escape_string($conn, $_POST['quantity']);
    $sql = "SELECT * FROM items WHERE ID = '" . $id . "';";
    if ($result = mysqli_query($conn, $sql)) {
      $sum = 0;

      while ($row = mysqli_fetch_assoc($result)) {
        $quantity = $row['quantity'];
        $quantity *= 2;
        $sum += $quantity;
       

      }
      

      $sql = "UPDATE points_table SET points = '" . $sum . "' WHERE ID = '" . $id . "';";
      if (mysqli_query($conn, $sql)) {
      } else {
      }
    } else {
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
  
    } else {
    }

    $id = $_POST['id'];
    $Donation_value = mysqli_escape_string($conn, $_POST['Donation_value']);
    $quantity = mysqli_escape_string($conn, $_POST['quantity']);
    $sql = "SELECT * FROM visa o JOIN items c ON o.ID = c.ID";
    if ($result = mysqli_query($conn, $sql)) {
      $sum = 0;

      while ($row = mysqli_fetch_assoc($result)) {
        $Donation_value = $row['donation_value'];
        $quantity = $row['quantity'];
        $Donation_value /= 10;
        $quantity *= 2;
        $sum = $Donation_value+$quantity;
        
      }
      
      $sql = "UPDATE points_table SET points = '" . $sum . "' WHERE ID = '" . $id . "';";
      if (mysqli_query($conn, $sql)) {
        
      } else {
      }
    } else {
    }
  }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Offers</title>
    <link rel="stylesheet" href="../CSS/offers.css" />
    <style>
       
        #popup {
          display: none; 
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          z-index: 9999;
          transition: 0.5s ease-in-out;
        }
        #popup img {
          width: 400px;
          height: 400px;
          object-fit: cover;
          border-radius: 9px;
        }
      </style>
  </head>

  <body>
    <div class="nav">
      <div class="left">
        <h5>Points</h5>
        <h4><?php echo $sum; ?></h4>
      </div>
      <ul>
        <li><a href="loginPage.php">Login</a></li>
        <li><a href="registerationPage.php">Register</a></li>
        <li><a href="contact us.html">Contact US</a></li>
        <li><a href="whoWeAre.html">Who We Are</a></li>
        <li><a href="offers.php">Offers</a></li>
        <li><a href="home.html">Home</a></li>
      </ul>
    </div>
    <div class="container">
      <h1 class="lable">OUR OFFERS</h1>
      <div class="offers">
        <div class="card">
          <div class="cardtop">
            <img src="../image/buffalo-logo.png" alt="" />
          </div>
          <div class="image">
            <img src="../image/buffalo-image.jpg" alt="" />
          </div>
          <div class="cardbottom">
            <p>
              3 Sandwichs + 3 Fries + 3 cola for <span>300 EGP</span> instead of
              <del>400 EGP</del>
            </p>
            <button type="button" onclick="showPopup('../image/bufflo.png')">Get Offer for <b>100 points</b></button>
          </div>
        </div>
        <div class="card">
          <div class="cardtop">
            <h1>Max Burger</h1>
            <img src="../image/maxburger-logo.png" alt="" />
          </div>
          <div class="image"><img src="../image/max-image.jpg" alt="" /></div>
          <div class="cardbottom">
            <p>
              Get Max Tower Meal for <span>75 EGP</span> instead of
              <del>125 EGP</del>
            </p>
            <button onclick="showPopup('../image/max.png')">Get Offer for <b> 50 points</b></button>
          </div>
        </div>
        <div class="card">
          <div class="cardtop">
            <h1>Shawerma ElReem</h1>
            <img src="../image/elreem-logo.png" alt="" />
          </div>
          <div class="image">
            <img src="../image/elreem-image.jpg" alt="" />
          </div>
          <div class="cardbottom">
            <p>
              Get 4 Sandwichs large + Tomeya sauce for
              <span>135 EGP</span> instead of <del>205 EGP</del>
            </p>
            <button onclick="showPopup('../image/shawermaelreem.png')">Get Offer for <b>100 points</b></button>
          </div>
        </div>
        <div class="card">
          <div class="cardtop">
            <h1>Kansas Fried Chicken</h1>
            <img src="../image/kansas-logo.png" alt="" />
          </div>
          <div class="image">
            <img src="../image/kansas-image.jpg" alt="" />
          </div>
          <div class="cardbottom">
            <p>
              2 Fired Chichen pieces + Rice + salad + cola can for
              <span>79 EGP</span> instead of <del>150 EGP</del>
            </p>
            <button onclick="showPopup('../image/kansaschicken.png')">Get Offer for <b> 50 points</b></button>
          </div>
        </div>
        <div class="card">
          <div class="cardtop">
            <h1>Prego</h1>
            <img src="../image/prego-logo.png" alt="" />
          </div>
          <div class="image"><img src="../image/prego-image.jpg" alt="" /></div>
          <div class="cardbottom">
            <p>
              MixGrill Meal for <span>79 EGP</span> instead of
              <del>104 EGP</del>
            </p>
            <button type="button" onclick="showPopup('../image/Pizza King.png')">Get Offer for <b> 50 points</b></button>
          </div>
        </div>
        <div class="card">
          <div class="cardtop">
            <h1>Pizza King</h1>
            <img src="../image/pizzaking-logo.png" alt="" />
          </div>
          <div class="image">
            <img src="../image/pizzaking-image.jpg" alt="" />
          </div>
          <div class="cardbottom">
            <p>
              2 Pizza Large + 2 Salad + 1L cola for <span>190 EGP</span> instead
              of <del>250 EGP</del>
            </p>
            <button type="button" onclick="showPopup('../image/Pizza King.png')">Get Offer for <b>100 points</b></button>
          </div>
        </div>
        <div class="card">
          <div class="cardtop">
            <h1>Kansas Fried Chicken</h1>
            <img src="../image/kansas-logo.png" alt="" />
          </div>
          <div class="image">
            <img src="../image/kansasfamily-image.jpg" alt="" />
          </div>
          <div class="cardbottom">
            <p>
              Kansas Family Meal for <span>300 EGp</span> instead of
              <del>450 EGP</del>
            </p>
            <button type="button" onclick="showPopup('../image/kansaschicken.png')">Get Offer for <b>150 points</b></button>
          </div>
        </div>
        <div class="card">
          <div class="cardtop">
            <h1>Daddy's Burger</h1>
            <img src="../image/daddys-logo.png" alt="" />
          </div>
          <div class="image"><img src="../image/daddy-image.jpg" alt="" /></div>
          <div class="cardbottom">
            <p>
              2 Sandwichs + cola for <span>110 EGP</span> instead of
              <del>145 EGP</del>
            </p>
            <button type="button" onclick="showPopup('../image/daddysburger.png')">Get Offer for <b> 50 points</b></button>
          </div>
        </div>
      </div>
    </div>
    <div id="popup">
        <img id="popup-image" src="" alt="Popup image">
      </div>

    <footer class="footer">
      <div class="sec1">
        <h4>Contact</h4>
        <p><strong>What we do : </strong> help people</p>
        <p><strong>Where we work : </strong>+2 24772248 24772249</p>
        <p><strong>Hours : </strong>09:00 - 04:30 Sat -</p>
      </div>
      <div class="sec2">
        <h4>About</h4>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Privacy & Policy</a></li>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
      <div class="sec3">
        <h4>My Account</h4>
        <ul>
          <li><a href="#">Sign in</a></li>
          <li><a href="#">Sign up</a></li>
          <li><a href="#">Help</a></li>
        </ul>
      </div>
      <div class="sec4">
        <p>&#169; 2023, THANK YOU</p>
      </div>
    </footer>
    <script>
        function showPopup(image) {
          var popupImage = document.getElementById("popup-image");
          popupImage.src = image;
          document.getElementById("popup").style.display = "block";
        }
    </script>
      <form action="" method="post">
      <input name="id" type="hidden" id="id" class="card-holder-input" value ="<?php echo $id ?>"/>

      </form>
  </body>
</html>
