<?php

class AntiBotCookie extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $proxyAddress;
    private $proxyPort;
    private $proxyLogin;
    private $proxyPassword;
    
    public function getPostData() {
        return array(
            "type"                      =>  "AntiBotCookieTask",
            "websiteURL"                =>  $this->websiteUrl,
            "proxyAddress"              =>  $this->proxyAddress,
            "proxyPort"                 =>  $this->proxyPort,
            "proxyLogin"                =>  $this->proxyLogin,
            "proxyPassword"             =>  $this->proxyPassword
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
