<?php

class GeeTestProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $websiteChallenge;
    private $geetestApiServerSubdomain;
    private $geetestLib;
    private $userAgent = "";
    private $version = 3;
    private $initParameters;
    
    public function getPostData() {
        $set = array(
            "type"                      =>  "GeeTestTaskProxyless",
            "websiteURL"                =>  $this->websiteUrl,
            "geetestApiServerSubdomain" =>  $this->geetestApiServerSubdomain,
            "geetestGetLib"             =>  $this->geetestLib,
            "gt"                        =>  $this->websiteKey,
            "challenge"                 =>  $this->websiteChallenge,
            "userAgent"                 =>  $this->userAgent,
            "version"                   =>  $this->version,
            "initParameters"            =>  $this->initParameters
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
    
    public function setAPISubdomain($value) {
        $this->geetestApiServerSubdomain = $value;
    }
    
    public function setUserAgent($value) {
        $this->userAgent = $value;
    }
    
    public function setGeetestLib($geetestLib) {
        $this->geetestLib = $geetestLib;
    }
    
    public function setVersion($value) {
        $this->version = (int)$value;
    }
    
    public function setInitParameters($value) {
        if (!is_array($value)) return;
        $this->initParameters = $value;
    }
    
    
    
    
    
}
