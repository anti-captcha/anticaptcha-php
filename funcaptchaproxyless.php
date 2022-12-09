<?php

class FunCaptchaProxyless extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $jsSubdomain;
    private $websitePublicKey;
    private $dataBlob;
    
    public function getPostData() {
        $data = array(
            "type"                      =>  "FunCaptchaTaskProxyless",
            "websiteURL"                =>  $this->websiteUrl,
            "funcaptchaApiJSSubdomain"  =>  $this->jsSubdomain,
            "websitePublicKey"          =>  $this->websitePublicKey
        );
        if ($this->jsSubdomain != null) {
            $data["funcaptchaApiJSSubdomain"] = $this->jsSubdomain;
        }
        if ($this->dataBlob != null) {
            $data["data"] = $this->dataBlob;
        }
        return $data;
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
    
    public function setJSSubdomain($value) {
        $this->jsSubdomain = $value;
    }
    
    public function setWebsitePublicKey($value) {
        $this->websitePublicKey = $value;
    }
    
    /**
     * @param string $dataBlob
     */
    public function setDataBlob($dataBlob) {
        $this->dataBlob = $dataBlob;
    }
    
    
}
