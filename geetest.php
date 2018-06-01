<?php

class GeeTest extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $websiteChallenge;
    private $proxyType = "http";
    private $proxyAddress;
    private $proxyPort;
    private $proxyLogin;
    private $proxyPassword;
    private $userAgent = "";
    private $cookies = "";
    
    public function getPostData() {
        return array(
            "type"          =>  "GeeTestTask",
            "websiteURL"    =>  $this->websiteUrl,
            "gt"            =>  $this->websiteKey,
            "challenge"     =>  $this->websiteChallenge,
            "proxyType"     =>  $this->proxyType,
            "proxyAddress"  =>  $this->proxyAddress,
            "proxyPort"     =>  $this->proxyPort,
            "proxyLogin"    =>  $this->proxyLogin,
            "proxyPassword" =>  $this->proxyPassword,
            "userAgent"     =>  $this->userAgent,
            "cookies"       =>  $this->cookies
        );
    }
    
    public function setTaskInfo($taskInfo) {
        $this->taskInfo = $taskInfo;
    }
    
    public function getTaskSolution() {
        return $this->taskInfo->solution;
    }
    
    public function setWebsiteURL($value) {
        $this->websiteUrl = $value;
    }
    
    public function setGTKey($value) {
        $this->websiteKey = $value;
    }
    
    public function setChallenge($value) {
        $this->websiteChallenge = $value;
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
    
    public function setUserAgent($value) {
        $this->userAgent = $value;
    }
    
    public function setCookies($value) {
        $this->cookies = $value;
    }
    
}
