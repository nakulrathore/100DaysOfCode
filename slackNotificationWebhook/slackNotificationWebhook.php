<?php

//error dump
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function slack($text, $room, $icon) {
//text = slack message to pass
//room = #channel/@username of who gets thw msg
//icon = the face of bot example=   :thumbsup:


    $data = "payload=" . json_encode(array(
        "channel"       =>  "$room",
        "username" => "testBot", // your bot name
        "text"          =>  $text,
        "icon_emoji"    =>  $icon
        ));

    $ch = curl_init("webhook_endpoint_here");
    // webhook endpoint looks like this = https://hooks.slack.com/services/T1QXXXXRZ/XXXXXXL7/XxxxxxxxxxxXXXX
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

$text = 'test msg!';
$room = '@nakulrathore';
$icon = ":thumbsup:";

slack($text,$room,$icon);


?>
