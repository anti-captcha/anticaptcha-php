<?php

include("../anticaptcha.php");
include("../imagecoordinates.php");

$api = new ImageToText();
$api->setVerboseMode(true);
        
//your anti-captcha.com account key
$api->setKey(readline("You API key: "));

//setting file
$api->setFile("capcha.jpg");

//Specify softId to earn 10% commission with your app.
//Get your softId here: https://anti-captcha.com/clients/tools/devcenter
$api->setSoftId(0);

if (!$api->createTask()) {
    $api->debout("API v2 send failed - ".$api->getErrorMessage(), "red");
    return false;
}

$taskId = $api->getTaskId();


if (!$api->waitForResult()) {
    $api->debout("could not solve captcha", "red");
    $api->debout($api->getErrorMessage());
} else {
    $coordinates    =   $api->getTaskSolution();
    echo "\nresult:\n";
    print_r($coordinates);
    //check result, then if results is wrong:
    $api->reportIncorrectImageCaptcha();
}
