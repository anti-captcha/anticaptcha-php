<?php

include("../anticaptcha.php");
include("../recaptchaV2Enterpriseproxyless.php");

$api = new RecaptchaV2EnterpriseProxyless();
$api->setVerboseMode(true);
        
//your anti-captcha.com account key
$api->setKey(readline("You API key: "));
 
//recaptcha key from target website
$api->setWebsiteURL("https://store.steampowered.com/join");
$api->setWebsiteKey("6LdIFr0ZAAAAAO3vz0O0OQrtAefzdJcWQM2TMYQH");

$tokenS = readline("s token:");
$api->setEnterprisePayload(["s" => $tokenS]);

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
}
