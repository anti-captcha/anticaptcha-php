<?php

include("anticaptcha.php");
include("customcaptcha.php");

$api = new CustomCaptcha();
$api->setVerboseMode(true);
        
//your anti-captcha.com account key
$api->setKey("12345678901234567890123456789012");
 
//image address must be stored on your server
$api->setImageUrl("https://files.anti-captcha.com/26/41f/c23/7c50ff19.jpg?random=".time()); //random here to let same task be assigned to same workers

//description what worker must do with picture and forms
$api->setAssignment("Enter license plate number");

//forms structure
//for more field types use FormBuilder tool or documentation
//1. Formbuilder:  https://anti-captcha.com/clients/factories/directory/formbuilder
//2. Documentation: https://anticaptcha.atlassian.net/wiki/spaces/API/pages/41287896/Form+Object
$api->setForms(
    array(
                array(
                    "label"         =>  "Number",
                    "labelHint"     =>  false,
                    "contentType"   =>  false,
                    "name"          =>  "license_plate",
                    "inputType"     =>  "text",
                    "inputOptions"  =>  array(
                        "width"         => "100",
                        "placeHolder"   => "Enter a letters and number without spaces"
                    )
                ),
                array(
                    "label"         =>  "Car color",
                    "labelHint"     =>  "Select car color",
                    "contentType"   =>  false,
                    "name"          =>  "color",
                    "inputType"     =>  "select",
                    "inputOptions"  =>  array(
                        array(
                            "value"     =>  "white",
                            "caption"   =>  "White color"
                        ),
                        array(
                            "value"     =>  "black",
                            "caption"   =>  "Black color"
                        ),
                        array(
                            "value"     =>  "grey",
                            "caption"   =>  "Grey color"
                        )
                    )
                )
    )
);

if (!$api->createTask()) {
    $api->debout("API v2 send failed - ".$api->getErrorMessage(), "red");
    return false;
}

$taskId = $api->getTaskId();


if (!$api->waitForResult()) {
    $api->debout("could not solve captcha", "red");
    $api->debout($api->getErrorMessage());
} else {
    $answers =   $api->getTaskSolution();
    foreach ($answers as $key => $value) {
        echo "answer for question '$key' : '$value'\n";
    }
}
