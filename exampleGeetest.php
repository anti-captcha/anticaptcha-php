<?php


include("anticaptcha.php");
include("geetestproxyless.php");

$api = new GeeTestProxyless();
$api->setVerboseMode(true);
        
//your anti-captcha.com account key
$api->setKey(readline("You API key: "));

echo "grabbing challenge key ... \n";
$data = json_decode(file_get_contents("https://www.geetest.com/demo/gt/register-enIcon-official?t=1547634498036"), true);

echo "grabbed data:\n";
print_r($data);

if (!isset($data["gt"]) && !isset($data["challange"])) {
    echo "something went wrong, probably example was changed or network is inaccessible\n";
    exit;
}

$challenge  =   $data["challenge"];
$gt         =   $data["gt"];

echo "setting gt=$gt, challenge=$challenge\n";

$api->setWebsiteURL("https://www.geetest.com/en/");
$api->setGTKey($gt);
$api->setChallenge($challenge);


if (!$api->createTask()) {
    $api->debout("API v2 send failed - ".$api->getErrorMessage(), "red");
    return false;
}

$taskId = $api->getTaskId();


if (!$api->waitForResult()) {
    $api->debout("could not solve captcha", "red");
    $api->debout($api->getErrorMessage());
} else {
    echo "solution: \n";
    print_r($api->getTaskSolution());
}
