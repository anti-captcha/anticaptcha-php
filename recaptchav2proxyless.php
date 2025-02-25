<?php

class RecaptchaV2Proxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $websiteSToken;
    private $dataSValue;
    private $isInvisible;
    
    public function getPostData() {
        return array(
            "type"                  =>  "RecaptchaV2TaskProxyless",
            "websiteURL"            =>  $this->websiteUrl,
            "websiteKey"            =>  $this->websiteKey,
            "websiteSToken"         =>  $this->websiteSToken,
            "recaptchaDataSValue"   =>  $this->dataSValue,
            "isInvisible"           =>  $this->isInvisible
        );
    }
    
    public function getTaskSolution() {
        return $this->taskInfo->solution->gRecaptchaResponse;
    }
    
    public function getWorkerCookies() {
        return $this->taskInfo->solution->cookies;
    }
    
    public function setWebsiteURL($value) {
        $this->websiteUrl = $value;
    }
    
    public function setWebsiteKey($value) {
        $this->websiteKey = $value;
    }
    
    public function setWebsiteSToken($value) {
        $this->websiteSToken = $value;
    }
    
    public function setDataSValue($value) {
        $this->dataSValue = $value;
    }
    
    public function setIsInvisible() {
        $this->isInvisible = true;
    }
    
}
