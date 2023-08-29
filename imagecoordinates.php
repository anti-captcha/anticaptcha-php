<?php

class ImageCoordinates extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $body;
    private $comment = "";
    private $mode = "points";
    
    
    public function getPostData() {
        return array(
            "type"      =>  "ImageCoordinatesTask",
            "body"      =>  str_replace("\n", "", $this->body),
            "comment"   =>  $this->comment,
            "mode"      =>  $this->mode
        );
    }
    
    public function getTaskSolution() {
        return $this->taskInfo->solution->coordinates;
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
    
    public function setComment($value) {
        $this->comment = $value;
    }
    
    public function setMode($value) {
        if (!in_array($value, ["points", "rectangles"])) return;
        $this->mode = $value;
    }
    
}
