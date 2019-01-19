<?php

/*
Firebase push notification with device token
Working for Android and iOS
*/
$device_token = array('device token here');

$apiKey = "Goole API here";

$url = 'https://fcm.googleapis.com/fcm/send';

$headers = array(
    'Authorization: key=' . $apiKey,
    'Content-Type: application/json'
);

$notification_data = array(
    'message'           => 'This is the test message for FCM Testing',

);

$notification = array(
    'body'  => 'This is the test message for FCM Testing',
    'sound' => 'default'
);

$post = array(
    'registration_ids'         =>  $device_token,
    'notification'      => $notification,
    "content_available" => true,
    'priority'          => 'high',
    'data'              => $notification_data
);

$ch = curl_init();
// Set URL to FCM endpoint
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set JSON post data
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
$result = curl_exec($ch);
$responseJSON = json_decode($result);

curl_close($ch);
var_dump($responseJSON);

?>

 

