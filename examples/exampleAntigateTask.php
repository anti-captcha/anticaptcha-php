<?php

include("../anticaptcha.php");
include("../antigate.php");

$api = new AntiGate();
$api->setVerboseMode(true);
        
//your anti-captcha.com account key
$api->setKey(readline("You API key: "));

//recaptcha key from target website
$api->setTemplateName("Demo sign-in at anti-captcha.com");
$api->setWebsiteURL("https://anti-captcha.com/tutorials/v2-textarea");
$api->setVariables([
    "login"     =>  "test login",
    "password"  =>  "test pass"
]);

if (!$api->createTask()) {
    $api->debout("API v2 send failed - ".$api->getErrorMessage(), "red");
    return false;
}

if (!$api->waitForResult()) {
    $api->debout("could not solve captcha", "red");
    $api->debout($api->getErrorMessage());
} else {
    $result =   $api->getTaskSolution();
    echo "\nresult: \n\n";
    print_r($result);
}

