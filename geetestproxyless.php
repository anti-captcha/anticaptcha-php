<?php

class GeeTestProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $websiteChallenge;
    
    public function getPostData() {
        return array(
            "type"          =>  "GeeTestTaskProxyless",
            "websiteURL"    =>  $this->websiteUrl,
            "gt"            =>  $this->websiteKey,
            "challenge"     =>  $this->websiteChallenge
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
    
}
