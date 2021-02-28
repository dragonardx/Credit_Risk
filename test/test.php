<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost/credit_risk/api/v1/create.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS =>'{
    "SessionID": "2001t2r123z",
    "ID": "11625484761584",
    "Field1": "1",
    "Field2": "1",
    "Field3": "25",
    "Field4": "5",
    "Field5": "2",
    "Field6": "0.5",
    "Field7": "1",
    "Field8": "16",
    "Field9": "27",
    "Field10": "18",
    "Date": "2020-12-29 16:16"
}',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;