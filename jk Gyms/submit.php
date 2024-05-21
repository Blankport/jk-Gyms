<?php

include 'A_T.php';
//Phone and Amount from Membership
if (( $_GET["phone"]) == "") {

  // Handle case where parameters are not provided
  echo '<script>alert("No input."); window.location.href = "Membership.html";</script>';
  exit();
}if ( $_GET["amount"] !== "3500" && $_GET["amount"] !== "10000" && $_GET["amount"] !== "10500") {
echo '<script>alert("No input."); window.location.href = "Membership.html";</script>';
exit();
}

if(isset($_GET['amount']) && isset($_GET['phone'])) {
    $money = htmlspecialchars_decode($_GET['amount']);
    $phone = htmlspecialchars_decode($_GET['phone']);
    $timeStamp = date('YmdHis');

    // Now you can use $param1 and $param2 in your PHP code
    echo "<br/>Prompt sent to phone: " . $phone. " <br>amount: " . $money . "<br> time: ".$timeStamp . "<br>";

    date_default_timezone_set('Africa/Nairobi');
$processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$ngrok ='https://7581-102-215-32-221.ngrok-free.app';

//#USING NGROK TO GET TEMPORARY LIVE LINK.
$callbackurl = $ngrok. '/callback';
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
// ENCRIPT  DATA TO GET PASSWORD
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
$PartyA = $phone;
$PartyB = '254707676034';
$AccountReference = '254707676034';
$TransactionDesc = 'Jk Gyms';
$Amount = $money;
$stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
//INITIATE CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader); //setting custom header
$curl_post_data = array(
  //Fill in the request parameters with valid values
  'BusinessShortCode' => $BusinessShortCode,
  'Password' => $Password,
  'Timestamp' => $Timestamp,
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' => $Amount,
  'PartyA' => $PartyA,
  'PartyB' => $BusinessShortCode,
  'PhoneNumber' => $PartyA,
  'CallBackURL' => $callbackurl,
  'AccountReference' => $AccountReference,
  'TransactionDesc' => $TransactionDesc
);

$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
 $curl_response = curl_exec($curl);
//ECHO  RESPONSE
$data = json_decode($curl_response);
$CheckoutRequestID = $data->CheckoutRequestID;
$ResponseCode = $data->ResponseCode;
if ($ResponseCode == "0") {
  echo "The CheckoutRequestID for this transaction is : " . $CheckoutRequestID;
  if($Amount == 10500){
    header("Location: check.php?class=p");
    exit();
  }
  if($Amount == 3500){
    header("Location: check.php?class=m");
    exit();
  }
  if($Amount == 10000){
    header("Location: check.php?class=m");
    exit();
  }

}
}




//INCLUDE THE ACCESS TOKEN FILE


