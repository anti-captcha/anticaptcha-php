##Official PHP API for Anti-Captcha.Com

**REQUIREMENTS.**

Any UNIX system with php-curl.


**How to use examples**
1. Navigate to directory in terminal
```bash
cd anticaptcha-php/examples
```
2. Run any example
```bash
php exampleNoCaptchaProxyless.php
```
<br><br>
For example:
<br>
Solve Recaptcha V2 with php:
```
include("anticaptcha.php");
include("recaptchaV2proxyless.php");

$api = new RecaptchaV2Proxyless();
$api->setVerboseMode(true);

//your anti-captcha.com account key
$api->setKey("YOUR_API_KEY_HERE");

//target website address
$api->setWebsiteURL("http://makeawebsitehub.com/recaptcha/test.php");

//recaptcha key from target website
$api->setWebsiteKey("6LfI9IsUAAAAAKuvopU0hfY8pWADfR_mogXokIIZ");

//optional custom parameter which Google made for their search page Recaptcha v2
//$api->setDataSValue("'data-s' token from Google Search");

//Specify softId to earn 10% commission with your app.
//Get your softId here: https://anti-captcha.com/clients/tools/devcenter
$api->setSoftId(0);

//create task in API
if (!$api->createTask()) {
    $api->debout("API v2 send failed - ".$api->getErrorMessage(), "red");
    return false;
}

$taskId = $api->getTaskId();

//wait in a loop for max 300 seconds till task is solved
if (!$api->waitForResult(300)) {
    echo "could not solve captcha\n";
    echo $api->getErrorMessage()."\n";
} else {

    $gResponse = $api->getTaskSolution();
    echo "\n";
    echo "your recaptcha token: $gResponse\n\n";

}
```
<br>

Solve Image Captcha with php:
```
include("anticaptcha.php");
include("imagetotext.php");

$api = new ImageToText();

//your anti-captcha.com account key
$api->setKey("YOUR_API_KEY_HERE");

//setting file
$api->setFile("captcha.jpg");

//Specify softId to earn 10% commission with your app.
//Get your softId here: https://anti-captcha.com/clients/tools/devcenter
$api->setSoftId(0);

//create task in API
if (!$api->createTask()) {
    echo "API v2 send failed - ".$api->getErrorMessage()."\n";
    exit;
}

$taskId = $api->getTaskId();

if (!$api->waitForResult()) {
    echo "could not solve captcha\n";
    echo $api->getErrorMessage()."\n";
} else {
    $captchaText    =   $api->getTaskSolution();
    echo "captcha text: $captchaText\n\n";
}
```
<br>

Solve Hcaptcha with php:
```
include("anticaptcha.php");
include("hcaptchaproxyless.php");

$api = new HCaptchaProxyless();
$api->setVerboseMode(true);

//your anti-captcha.com account key
$api->setKey("YOUR_API_KEY_HERE");

//target website address
$api->setWebsiteURL("http://makeawebsitehub.com/recaptcha/test.php");

//hcaptcha key from target website
$api->setWebsiteKey("f9630567-0000-0000-0000-9c91c6276dff");

//Specify softId to earn 10% commission with your app.
//Get your softId here: https://anti-captcha.com/clients/tools/devcenter
$api->setSoftId(0);

//optional invisible Hcaptcha flag
//$api->setIsInvisible();

//set Enterprise parameters this way:
//$api->setEnterprisePayload([
//    "rqdata"    =>  "somerqdata",
//    "sentry"    =>  true
//]);

//create task in API
if (!$api->createTask()) {
    $api->debout("API v2 send failed - ".$api->getErrorMessage(), "red");
    return false;
}

$taskId = $api->getTaskId();

//wait in a loop for max 300 seconds till task is solved
if (!$api->waitForResult(300)) {
    echo "could not solve captcha\n";
    echo $api->getErrorMessage()."\n";
} else {

    $gResponse = $api->getTaskSolution();
    echo "\n";
    echo "your hcaptcha token: $gResponse\n\n";

}
```


More examples in our [API documentation](https://anti-captcha.com/apidoc). Select desired captcha type and scroll to code example.