<?php

class FunCaptchaProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websitePublicKey;
    
    public function getPostData() {
        return array(
            "type"              =>  "FunCaptchaTaskProxyless",
            "websiteURL"        =>  $this->websiteUrl,
            "websitePublicKey"  =>  $this->websitePublicKey
        );
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
    
}
