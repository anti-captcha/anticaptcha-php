<?php

class RecaptchaV2EnterpriseProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $websiteKey;
    private $enterprisePayload;
    private $isInvisible;
    
    public function getPostData() {
        return array(
            "type"                  =>  "RecaptchaV2EnterpriseTaskProxyless",
            "websiteURL"            =>  $this->websiteUrl,
            "websiteKey"            =>  $this->websiteKey,
            "enterprisePayload"     =>  $this->enterprisePayload,
            "isInvisible"           =>  $this->isInvisible
        );
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
    
    public function setEnterprisePayload($arrayValue) {
        $this->enterprisePayload = $arrayValue;
    }
    
    public function setIsInvisible() {
        $this->isInvisible = true;
    }
    
}
