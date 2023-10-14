<?php

class Turnstile extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $action;
    private $cData;
    private $proxyType = "http";
    private $proxyAddress;
    private $proxyPort;
    private $proxyLogin;
    private $proxyPassword;
    private $userAgent = "";
    private $cookies = "";
    
    public function getPostData() {
        return array(
            "type"              =>  "TurnstileTask",
            "websiteURL"        =>  $this->websiteUrl,
            "websiteKey"        =>  $this->websiteKey,
            "action"            =>  $this->action,
            "turnstileCData"    =>  $this->cData,
            "proxyType"         =>  $this->proxyType,
            "proxyAddress"      =>  $this->proxyAddress,
            "proxyPort"         =>  $this->proxyPort,
            "proxyLogin"        =>  $this->proxyLogin,
            "proxyPassword"     =>  $this->proxyPassword,
            "userAgent"         =>  $this->userAgent,
            "cookies"           =>  $this->cookies
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
    
    public function setAction($value) {
        $this->action = $value;
    }
    
    public function setCData($value) {
        $this->cData = $value;
    }
    
}