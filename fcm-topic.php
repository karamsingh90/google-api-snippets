<?php

   /*

   Firebase push notification with device topic
   Working for Android and iOS

   */

   $device_topic = 'you-device-topic'; // topic setup in device

   $topic =  "'".$device_topic."' in topics";
    $apiKey = 'Google-API-key';

    $url = 'https://fcm.googleapis.com/fcm/send';
    
    $headers = array(
        'Authorization: key=' . $apiKey,
        'Content-Type: application/json'
    );

    // when application open then post field 'data' parameter work so 'message' and 'body' key should have same text or value
    $notification_data = array(    

        'message'           => 'This is the test message for FCM Testing'
    );

    // when application close then post field 'notification' parameter work
    $notification = array(       
        'body'  => 'This is the test message for FCM Testing',
        'sound' => 'default'
    );

    $post = array(
        'condition'         => $topic,
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

    
    curl_close($ch);

    // Debug FCM response

    $result_de = json_decode($result);
    var_dump($result_de);

    ?>

