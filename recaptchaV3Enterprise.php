<?php

class RecaptchaV3Enterprise extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $pageAction;
    private $minScore;
    
    public function getPostData() {
        return array(
            "type"          =>  "RecaptchaV3TaskProxyless",
            "websiteURL"    =>  $this->websiteUrl,
            "websiteKey"    =>  $this->websiteKey,
            "minScore"      =>  $this->minScore,
            "pageAction"    =>  $this->pageAction,
            "isEnterprise"  =>  true
        );
    }
    
    public function setTaskInfo($taskInfo) {
        $this->taskInfo = $taskInfo;
    }
    
    public function getTaskSolution() {
        return $this->taskInfo->solution->gRecaptchaResponse;
    }
    
    public function setWebsiteURL($value) {
        $this->websiteUrl = $value;
    }
    
    public function setWebsiteKey($value) {
        $this->websiteKey = $value;
    }
    
    public function setPageAction($value) {
        $this->pageAction = $value;
    }
    
    public function setMinScore($value) {
        $this->minScore = $value;
    }
    
}
