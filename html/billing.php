<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
    include 'partials/_dbconnect.php';
    
    $name = $_POST['bookingName'];
    $roomType = $_POST['roomType'];
    $checkIn = $_POST['checkIn'];
    $checkOut= $_POST['checkOut'];
    $numberOfRooms = $_POST['roomNumber'];

}

      $price = 1000; // Example value from the database
      $days=2;
      $total = $numberOfRooms* $price; 
      $vat = $total * 0.13;
      $grandTotal = $total + $vat;

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
      <h2>Resort Bill of '.$name.'</h2>
      <br>
      <div class="bill-info">
        <label for="rooms">Room('.$roomType.')</label>
        <span>'.$price.'</span>
      </div>
      <div class="bill-info">
        <label for="rooms">Number of Rooms:</label>
        <span>'.$numberOfRooms.'</span>
      </div>
      <div class="bill-info">
        <label for="days">Number of Days:</label>
        <span>'.$days.'</span>
      </div>
      <div class="bill-info">
        <label for="total">Total:</label>
        <span>'.$total.'</span>
      </div>
      <div class="bill-info">
        <label for="vat">VAT (13%):</label>
        <span>'.$vat.'</span>
      </div>
      <div class="bill-info">
        <label for="grand-total">Grand Total:</label>
        <span>'.$grandTotal.'</span>
      </div>
    

    </div>
    </div>

    <div class="right-container">
    <div class="card-form">
      <h2>Enter Card Details</h2><br>
      <form>
        <label for="card-number">Card Number</label>
        <input type="text" id="card-number" name="card-number" placeholder="Card Number" required>
        <label for="card-holder">Card Holder Name</label>
        <input type="text" id="card-holder" name="card-holder" placeholder="Card Holder Name" required>
        <label for="expiry-date">Expiry Date</label>
        <input type="date" id="expiry-date" name="expiry-date" required>
        <label for="cvv">CVV</label>
        <input type="number" id="cvv" name="cvv" placeholder="CVV" required>
        <input type="submit" value="Submit">
      </form>
      </div>
    </div>
  </section>
  </main>

</body>
</html>';
?>