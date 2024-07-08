<?php
$conn = mysqli_connect("localhost", "root", "", "hunger");
if ($conn) {
  global $id;
      if(isset($_POST['item'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM register WHERE email = '".$email."' AND password = '".$password."'; ";
        if($result = mysqli_query($conn, $sql)){
        while ($row = mysqli_fetch_assoc($result)){
          $id = $row['ID'];
        }
      }else{
        echo "email or password are incorrect";
      }
    }
  }
  if (isset($_POST['itemButton'])) {
    
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/itemForm.css">
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
        <div class="Box3">
        <div class="inputBox">
          
          <input name="id" type="hidden" id="id" class="card-holder-input" value ="<?php echo $id?>"/>
        </div>
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
      <input type="submit" value="submit" name="itemButton" class="btn btn-primary buttonsub">
</div>

  </form>
  </body>
</html>



