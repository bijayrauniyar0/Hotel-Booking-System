<?php 
  session_start();
  if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
    header("location: guest-login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
    include 'partials/_dbconnect.php';
    
    $_SESSION['name'] = $_POST['bookingName'];
    $_SESSION['roomType'] = $_POST['roomType'];
    $_SESSION['checkIn_date'] = $_POST['checkIn'];
    $_SESSION['checkOut_date']= $_POST['checkOut'];
    $_SESSION['roomNumber'] = $_POST['roomNumber'];
    $_SESSION['guestsNumber'] = $_POST['guestNumber'];

    $checkIn= new DateTime($_SESSION['checkIn_date']);
    $checkOut = new DateTime($_SESSION['checkOut_date']);
    
    $interval = $checkIn->diff($checkOut);  // diff between dates 

    
    $days = $interval->days; //provides int value for days
    if($days==0){  
      $days=1;
    }
    
    $sql1= "SELECT * FROM roomprices WHERE room_type = '".$_SESSION['roomType']."'";
    $result1= mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $_SESSION['price']= $row1["price"];

      $_SESSION['Total'] = $_SESSION['roomNumber']* $_SESSION['price'] * $days; 
      $_SESSION['vat'] = $_SESSION['Total'] * 0.13;
      $_SESSION['grandTotal'] = $_SESSION['Total'] + $_SESSION['vat'];
      $_SESSION['days']=$days;
}


echo'
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/billing.css">
<title>Card Details Form</title>
</head>';

include "partials/nav.php";



echo'
<body>
  <main>
  <section id="payment-gateway">
    <div class="left-container">
    <div class="billing">
      <h2>Resort Bill of '.$_SESSION['name'].'</h2>
      <br>
      <div class="bill-info">
        <label for="rooms">Room('.$_SESSION['roomType'].')</label>
        <span>Nrs&nbsp;&nbsp;'.$_SESSION['price'].'</span>
      </div>
      <div class="bill-info">
        <label for="rooms">Number of Rooms:</label>
        <span>Nrs&nbsp;&nbsp; '.$_SESSION['roomNumber'].'</span>
      </div>
      <div class="bill-info">
        <label for="days">Number of Days:</label>
        <span>Nrs &nbsp;&nbsp;'.$_SESSION['days'].'</span>
      </div>
      <div class="bill-info">
        <label for="total">Total:</label>
        <span>Nrs&nbsp;&nbsp;'.$_SESSION['Total'].'</span>
      </div>
      <div class="bill-info">
        <label for="vat">VAT (13%):</label>
        <span>Nrs&nbsp;&nbsp;'.$_SESSION['vat'].'</span>
      </div>
      <div class="bill-info">
        <label for="grand-total">Grand Total:</label>
        <span>Nrs&nbsp;&nbsp;'.$_SESSION['grandTotal'].'</span>
      </div>
    

    </div>
    </div>

    <div class="right-container">
    <div class="card-form">
        <div class="cards-title">
          <h2>Enter Card Details</h2>
          <img src="../images/cards-new.png" alt="">
        </div><br>
      <form action="data-sender.php" method="POST" onsubmit="return validateForm("card-form")">

          <label for="card-number">Card Number</label>
          <input type="text" id="card-number" name="card-number" placeholder="Card Number" required>
          <label for="card-holder">Card Holder Name</label>
          <input type="text" id="card-holder" name="card-holder" placeholder="Card Holder Name" required>
          <label for="expiry-date">Expiry Date</label>
          <input type="date" id="expiry-date" name="expiry-date" required>
          <label for="cvv">CVV</label>
          <input type="number" id="cvv" name="cvv" placeholder="CVV" required>
          <input type="submit" class="submit-btn" value="Submit">

      </form>
      </div>
    </div>
    
        
    
  </section>
  <section id="end-payment">
        <div class="end-container">
        <div class="cash-form">
          <h2 class="other-pymt">Other Payment Options</h2><br>
            <form action="data-sender.php" method="POST" onsubmit="return validateForm("card-form")">              
                <div class="fonepay-title">
                    <h2>Fone Pay</h2>
                    <div class="fone-pay">
                        
                        <label for="khalti" class="radio-label">
                            <input type="radio" id="khalti" name="ewallet">
                            <img src="../images/khalti.png">
                        </label>
                        
                        <label for="esewa" class="radio-label">
                            <input type="radio" id="esewa" name="ewallet">
                            <img src="../images/esewa.png">
                        </label>
                    </div>
                </div>
                <div class="cash">
                    <h2>Other: &nbsp;&nbsp;</h2>
                    <select class="form-drop-down" id="cash-in-hand" name="cash-in-hand" required>
                        <option value="cash-in-hand"></option>
                        <option value="cash-in-hand">&nbsp;&nbsp;Cash In Hand</option>
                        
                    </select>
                </div>
                <input type="submit" class="submit-btn"value="Submit">
            </form>
          </div>
        </div>
          </div>
          </section>

  
  </main>

  <script src="../js/script.js"></script>
</body>
</html>';
include "partials/_footer.php";

?>