<?php

class HCaptchaProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $userAgent = "";
    private $isInvisible;
    private $enterprisePayload;
    
    public function getPostData() {
        return array(
            "type"              =>  "HCaptchaTaskProxyless",
            "websiteURL"        =>  $this->websiteUrl,
            "websiteKey"        =>  $this->websiteKey,
            "userAgent"         =>  $this->userAgent,
            "isInvisible"       =>  $this->isInvisible,
            "enterprisePayload" =>  $this->enterprisePayload
        );
    }
    
    public function setTaskInfo($taskInfo) {
        $this->taskInfo = $taskInfo;
    }
    
    public function getTaskSolution() {
        return $this->taskInfo->solution->gRecaptchaResponse;
    }
    
    public function getTaskUserAgent() {
        return $this->taskInfo->solution->userAgent;
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
    
    public function setIsInvisible() {
        $this->isInvisible = true;
    }
    
    public function setEnterprisePayload($object) {
        if (!is_array($object)) {
            throw new Exception("Enterprise payload is not an object");
        }
        $this->enterprisePayload = $object;
    }
    
}
