<?php
    require("connection.php");
    require("../credentials.php");
  
    $apikey="IKCA5bZ6VohlTitvfqjxYu2Lr3B1yFp47P0WNEOw8HGsenkRSMXgp2ZMFVEiJx4G3n6BK1qIsNkPDv9j";
    $number=$_GET['phoneNo'];
    $amount=$_GET['amount'];
    $payID=$_GET['payID'];

    

$fields = array(
    "sender_id" => "ABIIGYM",
    "message" => "Transaction of Rs. $amount.00/- with PaymentID: $payID successful.",
    "language" => "english",
    "route" => "p",
    "numbers" => "$number"
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: IKCA5bZ6VohlTitvfqjxYu2Lr3B1yFp47P0WNEOw8HGsenkRSMXgp2ZMFVEiJx4G3n6BK1qIsNkPDv9j",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
// Promotional Route Success Response:
// {
//     "return": true,
//     "request_id": "lwdtp7cjyqxvfe9",
//     "message": [
//         "Message sent successfully to NonDND numbers"
//     ]
// }
// Transactional Route Success Response:
// {
//     "return": true,
//     "request_id": "vrc5yp9k4sfze6t",
//     "message": [
//         "Message sent successfully"
//     ]
// }?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Successful</title>
</head>
<body>
  <?php

echo "<h1>Transaction Successful!</h1>";?>
<br>
<a href="payments.php"><button class="activityButton">Okay</button></a>

                    
                    
</body>
</html>