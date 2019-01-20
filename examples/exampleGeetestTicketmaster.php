<?php


include("../anticaptcha.php");
include("../geetestproxyless.php");

$api = new GeeTestProxyless();
$api->setVerboseMode(true);

echo "\nThis example will solve captcha from  https://www.ticketmaster.com/\n\n";

//your anti-captcha.com account key
$api->setKey(readline("You API key: "));

echo "grabbing challenge key ... \n";
$challenge = getChallenge();

if ($challenge == "") {
    echo "something went wrong, probably example was changed or network is inaccessible\n";
    exit;
}


echo "setting gt=ce33de396f8d04030f6eca8fbd225070, challenge=$challenge\n";

$api->setWebsiteURL("https://www.ticketmaster.com/");
$api->setGTKey("ce33de396f8d04030f6eca8fbd225070");
$api->setChallenge($challenge);

//setting custom geetest api subdomain
$api->setAPISubdomain("api-na.geetest.com");


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


function getChallenge() {
    
    
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL, "https://www.ticketmaster.com/distil_r_captcha_challenge");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HTTPHEADER, [
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9;q=0.8",
        "Accept-Encoding: deflate",
        "Accept-Language: en-US,en;q=0.5",
        "Cache-Control: max-age=0",
        "Connection: keep-alive",
        "Host: www.ticketmaster.com"
    ]);
    curl_setopt($ch,CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:50.0) Gecko/20100101 Firefox/50.0");
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_TIMEOUT,10);
    $result =curl_exec($ch);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    if ($curlError != "") {
        echo "Got HTTP error: $curlError\n";
        exit;
    }
    return substr($result, 0, strpos($result,";"));
    
}


