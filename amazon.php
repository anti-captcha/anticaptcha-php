<?php

class Amazon extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $iv;
    private $context;
    private $challengeScript;
    private $captchaScript;
    private $jsapiScript;
    private $wafType;
    private $proxyType = "http";
    private $proxyAddress;
    private $proxyPort;
    private $proxyLogin;
    private $proxyPassword;
    
    public function getPostData() {
        return array(
            "type"              =>  "AmazonTask",
            "websiteURL"        =>  $this->websiteUrl,
            "websiteKey"        =>  $this->websiteKey,
            "iv"                =>  $this->iv,
            "context"           =>  $this->context,
            "challengeScript"   =>  $this->challengeScript,
            "captchaScript"     =>  $this->captchaScript,
            "jsapiScript"       =>  $this->jsapiScript,
            "wafType"           =>  $this->wafType,
            "proxyType"         =>  $this->proxyType,
            "proxyAddress"      =>  $this->proxyAddress,
            "proxyPort"         =>  $this->proxyPort,
            "proxyLogin"        =>  $this->proxyLogin,
            "proxyPassword"     =>  $this->proxyPassword
        );
    }
    
    public function setTaskInfo($taskInfo) {
        $this->taskInfo = $taskInfo;
    }
    
    public function getTaskSolution() {
        return $this->taskInfo->solution->token;
    }
    
    public function setWebsiteURL($value) {
        $this->websiteUrl = $value;
    }
    
    public function setWebsiteKey($value) {
        $this->websiteKey = $value;
    }
    
    public function setIv($value) {
        $this->iv = $value;
    }
    
    public function setContext($value) {
        $this->context = $value;
    }
    
    public function setChallengeScript($value) {
        $this->challengeScript = $value;
    }
    
    public function setCaptchaScript($value) {
        $this->captchaScript = $value;
    }
    
    public function setProxyType($value) {
        $this->proxyType = $value;
    }
    
    public function setProxyAddress($value) {
        $this->proxyAddress = $value;
    }
    
    public function setProxyPort($value) {
        $this->proxyPort = $value;
    }
    
    public function setProxyLogin($value) {
        $this->proxyLogin = $value;
    }
    
    public function setProxyPassword($value) {
        $this->proxyPassword = $value;
    }
    
    public function setWafType($value) {
        $this->wafType = $value;
    }
    
    public function setJsapiScript($value) {
        $this->jsapiScript = $value;
    }
    
}