<?php

class FunCaptcha extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $jsSubdomain;
    private $websitePublicKey;
    private $dataBlob;
    private $proxyType = "http";
    private $proxyAddress;
    private $proxyPort;
    private $proxyLogin;
    private $proxyPassword;
    private $userAgent = "";
    private $cookies = "";
    
    public function getPostData() {
        $data = array(
            "type"                      =>  "FunCaptchaTask",
            "websiteURL"                =>  $this->websiteUrl,
            "funcaptchaApiJSSubdomain"  =>  $this->jsSubdomain,
            "websitePublicKey"          =>  $this->websitePublicKey,
            "proxyType"                 =>  $this->proxyType,
            "proxyAddress"              =>  $this->proxyAddress,
            "proxyPort"                 =>  $this->proxyPort,
            "proxyLogin"                =>  $this->proxyLogin,
            "proxyPassword"             =>  $this->proxyPassword,
            "userAgent"                 =>  $this->userAgent,
            "cookies"                   =>  $this->cookies
        );
        if ($this->jsSubdomain != null) {
            $data["funcaptchaApiJSSubdomain"] = $this->jsSubdomain;
        }
        if ($this->dataBlob != null) {
            $data["data"] = $this->dataBlob;
        }
        return $data;
    }
    
    public function getTaskSolution() {
        return $this->taskInfo->solution->token;
    }
    
    public function setWebsiteURL($value) {
        $this->websiteUrl = $value;
    }
    
    public function setWebsitePublicKey($value) {
        $this->websitePublicKey = $value;
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
    
    /**
     * @param string $dataBlob
     */
    public function setDataBlob($dataBlob) {
        $this->dataBlob = $dataBlob;
    }
    
    public function setJSSubdomain($value) {
        $this->jsSubdomain = $value;
    }
    
    
}
