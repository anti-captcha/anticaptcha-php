<?php

class AntiGate extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $websiteUrl;
    private $templateName;
    private $domainsOfInterest = [];
    private $variables;
    private $proxyAddress;
    private $proxyPort;
    private $proxyLogin;
    private $proxyPassword;
    
    public function getPostData() {
        return array(
            "type"                      =>  "AntiGateTask",
            "templateName"              =>  $this->templateName,
            "websiteURL"                =>  $this->websiteUrl,
            "domainsOfInterest"         =>  $this->domainsOfInterest,
            "variables"                 =>  $this->variables,
            "proxyAddress"              =>  $this->proxyAddress,
            "proxyPort"                 =>  $this->proxyPort,
            "proxyLogin"                =>  $this->proxyLogin,
            "proxyPassword"             =>  $this->proxyPassword
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
    
    public function setTemplateName($value) {
        if (!is_string($value)) {
            echo "AntiGate template name must be a string!";
            exit;
        }
        $this->templateName = $value;
    }
    
    public function setDomainsOfInterest($value) {
        $this->domainsOfInterest = $value;
    }
    
    public function setVariables($values) {
        if (!is_array($values)) {
            echo "AntiGate variables must be an array!";
            exit;
        }
        $this->variables = $values;
    }
    
    public function setProxyAddress($value) {
        $this->proxyAddress = $value;
    }
    
    public function setProxyPort($value) {
        $this->proxyPort = $value;
    }
    
    public function setProxyLogin($value) {
        $this->proxyLogin = $value;
    }
    
    public function setProxyPassword($value) {
        $this->proxyPassword = $value;
    }
    
}
