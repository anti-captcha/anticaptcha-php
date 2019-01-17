<?php

class FunCaptchaProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $jsSubdomain;
    private $websitePublicKey;
    
    public function getPostData() {
        return array(
            "type"                      =>  "FunCaptchaTaskProxyless",
            "websiteURL"                =>  $this->websiteUrl,
            "funcaptchaApiJSSubdomain"  =>  $this->jsSubdomain,
            "websitePublicKey"          =>  $this->websitePublicKey
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
    
    public function setJSSubdomain($value) {
        $this->jsSubdomain = $value;
    }
    
    public function setWebsitePublicKey($value) {
        $this->websitePublicKey = $value;
    }
    
    
}
