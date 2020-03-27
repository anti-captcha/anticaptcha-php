<?php

class SquareCaptcha extends Anticaptcha implements AntiCaptchaTaskProtocol {

    private $body;
    private $objectName     =   "";
    private $rowsCount      =   3;
    private $columnsCount   =   3;
    
    
    public function getPostData() {
        return array(
            "type"          =>  "SquareNetTask",
            "body"          =>  str_replace("\n", "", $this->body),
            "objectName"    =>  $this->objectName,
            "rowsCount"     =>  $this->rowsCount,
            "columnsCount"  =>  $this->columnsCount
        );
    }
    
    public function setTaskInfo($taskInfo) {
        $this->taskInfo = $taskInfo;
    }
    
    public function getTaskSolution() {
        return $this->taskInfo->solution->cellNumbers;
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
    
    public function setObjectName($value) {
        $this->objectName = $value;
    }
    
    public function setRowsCount($value) {
        $this->rowsCount = $value;
    }
    
    public function setColumnsCount($value) {
        $this->columnsCount = $value;
    }
    
}
