<?php

class GeeTest extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $websiteChallenge;
    private $geetestApiServerSubdomain;
    private $geetestLib;
    private $version = 3;
    private $initParameters;
    private $proxyType = "http";
    private $proxyAddress;
    private $proxyPort;
    private $proxyLogin;
    private $proxyPassword;
    private $userAgent = "";
    private $cookies = "";
    
    public function getPostData() {
        return array(
            "type"                      =>  "GeeTestTask",
            "websiteURL"                =>  $this->websiteUrl,
            "geetestApiServerSubdomain" =>  $this->geetestApiServerSubdomain,
            "geetestGetLib"             =>  $this->geetestLib,
            "gt"                        =>  $this->websiteKey,
            "version"                   =>  $this->version,
            "initParameters"            =>  $this->initParameters,
            "challenge"                 =>  $this->websiteChallenge,
            "proxyType"                 =>  $this->proxyType,
            "proxyAddress"              =>  $this->proxyAddress,
            "proxyPort"                 =>  $this->proxyPort,
            "proxyLogin"                =>  $this->proxyLogin,
            "proxyPassword"             =>  $this->proxyPassword,
            "userAgent"                 =>  $this->userAgent,
            "cookies"                   =>  $this->cookies
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
    
    public function setAPISubdomain($value) {
        $this->geetestApiServerSubdomain = $value;
    }
    
    public function setGeetestLib($geetestLib) {
        $this->geetestLib = $geetestLib;
    }
    
    public function setVersion($value) {
        $this->version = (int)$value;
    }
    
    public function setInitParameters($value) {
        if (!is_array($value)) return;
        $this->initParameters = $value;
    }
    
}
