<?php

class AmazonProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $iv;
    private $context;
    private $challengeScript;
    private $captchaScript;
    
    public function getPostData() {
        return array(
            "type"              =>  "AmazonTaskProxyless",
            "websiteURL"        =>  $this->websiteUrl,
            "websiteKey"        =>  $this->websiteKey,
            "iv"                =>  $this->iv,
            "context"           =>  $this->context,
            "challengeScript"   =>  $this->challengeScript,
            "captchaScript"     =>  $this->captchaScript
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
    
}