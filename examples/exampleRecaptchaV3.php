<?php

include("../anticaptcha.php");
include("../recaptchaV3.php");

$api = new RecaptchaV3();
$api->setVerboseMode(true);
        
//your anti-captcha.com account key
$api->setKey(readline("You API key: "));
 
//recaptcha key from target website
$api->setWebsiteURL("http://http.myjino.ru/recaptcha/test-get.php");
$api->setWebsiteKey("6Lc_aCMTAAAAABx7u2W0WPXnVbI_v6ZdbM6rYf16");

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
    $recaptchaToken =   $api->getTaskSolution();
    echo "\ntoken result: $recaptchaToken\n\n";
    //check result, then:
    $api->reportCorrectRecaptcha();
    //or
    //$api->reportIncorrectRecaptcha();
}

