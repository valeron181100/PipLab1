<?php
require('JSON.php');
class DataManager{
    const data_file = "resources/data.json";

    public static function addUser($id){
        if(!file_exists(self::data_file)){
            $file = fopen(self::data_file, 'w');
            fclose($file);
        }
        $json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
        $jsonStr = file_get_contents(self::data_file);

        $jsonObj = null;
        if (isset($jsonStr) && $jsonStr !== '') {
            $jsonObj = $json->decode($jsonStr);
        }

        if(is_null($jsonObj)){
            $jsonObj =array($id => array('score'=>0, 'attempts'=>0));
        }
        else{
            $jsonObj[$id] = array('score'=>0, 'attempts'=>0);
        }

        unset($json);
        $json = new Services_JSON(SERVICES_JSON_IN_STR);
        $editStr = $json->encodeUnsafe($jsonObj);
        file_put_contents(self::data_file,$editStr);
    }

    public static function changeUserData($id, $data, $new_value){
        if(!file_exists(self::data_file)){
            throw new Exception('Data file not found');
        }

        $jsonStr = file_get_contents(self::data_file);

        $json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);

        $jsonObj = $json->decode($jsonStr);

        $jsonObj[$id][$data] = $new_value;
        $editStr  = $json->encodeUnsafe($jsonObj);

        file_put_contents(self::data_file, $editStr);
    }

    public static function getUserData($id, $data){
        $jsonStr = file_get_contents(self::data_file);
        $json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
        $jsonObj = $json->decode($jsonStr);
        return $jsonObj[$id][$data];
    }

    public static function addUserHistory($id, $message){
        $jsonStr = file_get_contents(self::data_file);
        $json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
        $jsonObj = $json->decode($jsonStr);
        if(!isset($jsonObj[$id]['history'])){
            $jsonObj[$id]['history'] = array();
        }
        array_unshift($jsonObj[$id]['history'], $message);
        file_put_contents(self::data_file, $json->encodeUnsafe($jsonObj));
    }

}