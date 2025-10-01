<?php

class AltchaProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $challengeURL;
    
    public function getPostData() {
        return array(
            "type"              =>  "AltchaTaskProxyless",
            "websiteURL"        =>  $this->websiteUrl,
            "challengeURL"      =>  $this->challengeURL
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
    
    public function setChallengeURL($value) {
        $this->challengeURL = $value;
    }
    
}