<?php


include("../anticaptcha.php");
include("../geetestproxyless.php");

$api = new GeeTestProxyless();
$api->setVerboseMode(true);

echo "\nThis example will solve official demo geetest captcha from https://www.geetest.com/en/\n\n";

//your anti-captcha.com account key
$api->setKey(readline("You API key: "));

$api->setWebsiteURL("https://www.geetest.com/en/adaptive-captcha-demo");
$api->setGTKey("fcd636b4514bf7ac4143922550b3008b");
$api->setVersion(4);
$api->setAPISubdomain("gcaptcha4.geetest.com");
$api->setInitParameters([
    "riskType" => "ai"
]);


if (!$api->createTask()) {
    $api->debout("API v2 send failed - ".$api->getErrorMessage(), "red");
    exit;
}

$taskId = $api->getTaskId();


if (!$api->waitForResult()) {
    $api->debout("could not solve captcha", "red");
    $api->debout($api->getErrorMessage());
} else {
    echo "solution: \n";
    print_r($api->getTaskSolution());
}
