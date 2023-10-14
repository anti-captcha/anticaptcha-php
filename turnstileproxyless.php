<?php

class TurnstileProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $action;
    private $cData;
    private $userAgent = "";
    
    public function getPostData() {
        return array(
            "type"              =>  "TurnstileTaskProxyless",
            "websiteURL"        =>  $this->websiteUrl,
            "websiteKey"        =>  $this->websiteKey,
            "userAgent"         =>  $this->userAgent,
            "action"            =>  $this->action,
            "turnstileCData"    =>  $this->cData
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
    
    public function setUserAgent($value) {
        $this->userAgent = $value;
    }
    
    public function setAction($value) {
        $this->action = $value;
    }
    
    public function setCData($value) {
        $this->cData = $value;
    }
    
}
