<?php

class GeeTestProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $websiteChallenge;
    private $geetestApiServerSubdomain;
    private $geetestLib;
    private $userAgent = "";
    
    public function getPostData() {
        $set = array(
            "type"                      =>  "GeeTestTaskProxyless",
            "websiteURL"                =>  $this->websiteUrl,
            "geetestApiServerSubdomain" =>  $this->geetestApiServerSubdomain,
            "geetestGetLib"             =>  $this->geetestLib,
            "gt"                        =>  $this->websiteKey,
            "challenge"                 =>  $this->websiteChallenge,
            "userAgent"                 =>  $this->userAgent,
        );
        return $set;
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
    
    public function setAPISubdomain(string $value): void {
        $this->geetestApiServerSubdomain = $value;
    }
    
    public function setUserAgent(string $value): void {
        $this->userAgent = $value;
    }
    
    public function setGeetestLib(string $geetestLib): void {
        $this->geetestLib = $geetestLib;
    }
    
    
    
    
    
}
