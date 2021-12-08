<?php

include("../anticaptcha.php");
include("../antigate.php");

$api = new AntiGate();
$api->setVerboseMode(true);
        
//your anti-captcha.com account key
$api->setKey(readline("You API key: "));

//recaptcha key from target website
$api->setTemplateName("Sign-in with 2FA and wait for control text");
$api->setWebsiteURL("http://antigate.com/logintest2fa.php");
$api->setVariables([
    "login_input_css"       =>  "#login",
    "login_input_value"     =>  "the login",
    "password_input_css"    =>  "#password",
    "password_input_value"  => "test password",
    "2fa_input_css"         =>  "#2facode",
    "2fa_input_value"       =>  "_WAIT_FOR_IT_",
    "control_text"          =>  "You have been logged successfully"
]);

if (!$api->createTask()) {
    $api->debout("API v2 send failed - ".$api->getErrorMessage(), "red");
    return false;
}

echo "emulating some real 2FA retrieval ..";
sleep(5);

$api->pushAntiGateVariable("2fa_input_value", "349001"); // value 349001 is hardcoded for this example

if (!$api->waitForResult()) {
    $api->debout("could not solve captcha", "red");
    $api->debout($api->getErrorMessage());
} else {
    $result =   $api->getTaskSolution();
    echo "\nresult: \n\n";
    print_r($result);
}

