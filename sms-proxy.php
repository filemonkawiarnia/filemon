<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Content-Type: application/json');

$to      = $_POST['to'] ?? '';
$message = $_POST['message'] ?? '';
$from    = $_POST['from'] ?? 'Filemon';
$token   = 'l50OnvURxYvcbkIY2wjtGUQsWSRXUW6bXOniySO6';

$ch = curl_init('https://api.smsapi.pl/sms.do');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $token
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'to'      => $to,
    'message' => $message,
    'from'    => $from,
    'format'  => 'json',
]));

$result = curl_exec($ch);
curl_close($ch);
echo $result;
