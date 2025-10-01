<?php

class Altcha extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $challengeURL;
    private $proxyType = "http";
    private $proxyAddress;
    private $proxyPort;
    private $proxyLogin;
    private $proxyPassword;
    
    public function getPostData() {
        return array(
            "type"              =>  "AltchaTask",
            "websiteURL"        =>  $this->websiteUrl,
            "challengeURL"      =>  $this->challengeURL,
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
    
    public function setChallengeURL($value) {
        $this->challengeURL = $value;
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
    
}