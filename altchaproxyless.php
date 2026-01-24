<?php

class AltchaProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $challengeURL;
    private $challengeJSON;
    
    public function getPostData() {
        return array(
            "type"              =>  "AltchaTaskProxyless",
            "websiteURL"        =>  $this->websiteUrl,
            "challengeURL"      =>  $this->challengeURL,
            "challengeJSON"     =>  $this->challengeJSON
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
    
    public function setChallengeJSON($value) {
        $this->challengeJSON = $value;
    }
    
}