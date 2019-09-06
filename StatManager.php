<?php
class StatManager{
    private $id;
    public function __construct($id){
        $this->id = $id;
    }

    public function incScore(){
        DataManager::changeUserData($this->id,'score', intval(DataManager::getUserData($this->id, 'score')) + 1);
    }

    public function incAttempts(){
        DataManager::changeUserData($this->id,'attempts', intval(DataManager::getUserData($this->id, 'attempts')) + 1);
    }

    public function getScore(){
       return DataManager::getUserData($this->id, 'score');
    }

    public function getAttempts(){
       return DataManager::getUserData($this->id, 'attempts');
    }
}
?>