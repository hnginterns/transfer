<?php
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted
    if (isset($_POST['load500'])) {
        loadAirtime('500');
    } else if (isset($_POST['load1000'])) {
        loadAirtime('1000');
    } 
     else if (isset($_POST['load2000'])) {
        loadAirtime('2000');
    } 
     else if (isset($_POST['load3000'])) {
        loadAirtime('3000');
    }
     else if (isset($_POST['load4000'])) {
        loadAirtime('4000');
    } 
     else if (isset($_POST['load5000'])) {
        loadAirtime('5000');
    }     
   
}



function loadAirtime($amount){
    // replace the amount correctly in the api code
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://mobileairtimeng.com/httpapi/?userid=%2008189115870&pass=dbcc49ee2fba9f150c5e82&network=1&phone=08026737118&amt=$amount",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 1d2f6463-e42b-b5bd-00ac-83d72d17d377"
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
    }
?>