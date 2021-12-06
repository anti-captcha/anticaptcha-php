<?php

include("../anticaptcha.php");
include("../antigate.php");

$api = new AntiGate();
$api->setVerboseMode(true);
        
//your anti-captcha.com account key
$api->setKey(readline("You API key: "));

//recaptcha key from target website
$api->setTemplateName("Sign-in and wait for control text");
$api->setWebsiteURL("http://antigate.com/logintest.php");
$api->setVariables([
    "login_input_css"       =>  "#login",
    "login_input_value"     =>  "the login",
    "password_input_css"    =>  "#password",
    "password_input_value"  => "test password",
    "control_text"          =>  "You have been logged successfully"
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

