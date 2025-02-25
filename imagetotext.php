<?php

class ImageToText extends Anticaptcha implements AntiCaptchaTaskProtocol {

    
    private $body;
    private $phrase = false;
    private $case = false;
    private $numeric = false;
    private $math = 0;
    private $minLength = 0;
    private $maxLength = 0;
    private $websiteURL = "";
    private $languagePool = "";
    private $comment = "";
    
    
    public function getPostData() {
        return array(
            "type"          =>  "ImageToTextTask",
            "body"          =>  str_replace("\n", "", $this->body),
            "phrase"        =>  $this->phrase,
            "case"          =>  $this->case,
            "numeric"       =>  $this->numeric,
            "math"          =>  $this->math,
            "minLength"     =>  $this->minLength,
            "maxLength"     =>  $this->maxLength,
            "websiteURL"    =>  $this->websiteURL,
            "languagePool"  =>  $this->languagePool,
            "comment"       =>  $this->comment
        );
    }
    
    public function getTaskSolution() {
        return $this->taskInfo->solution->text;
    }
    
    public function setFile($fileName) {
        
        if (file_exists($fileName)) {
            
            if (filesize($fileName) > 100) {
                $this->body = base64_encode(file_get_contents($fileName));
                return true;
            } else {
                $this->setErrorMessage("file $fileName too small or empty");
            }
            
        } else {
            $this->setErrorMessage("file $fileName not found");
        }
        return false;
        
    }
    
    public function setBody($base64) {
        $this->body = $base64;
    }
    
    public function setPhraseFlag($value) {
        $this->phrase = $value;
    }
    
    public function setCaseFlag($value) {
        $this->case = $value;
    }
    
    public function setNumericFlag($value) {
        $this->numeric = $value;
    }
    
    public function setMathFlag($value) {
        $this->math = $value;
    }
    
    public function setMinLengthFlag($value) {
        $this->minLength = $value;
    }
    
    public function setMaxLengthFlag($value) {
        $this->maxLength = $value;
    }
    
    public function setWebsiteURL($value) {
        $this->websiteURL = $value;
    }
    
    public function setLanguagePool($languagePool) {
        $this->languagePool = $languagePool;
    }
    
    public function setComment($comment) {
        $this->comment = $comment;
    }
    
}
