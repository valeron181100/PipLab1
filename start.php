<?php
ini_set('memory_limit', '128M');
ini_set ('log_errors', 1);
ini_set("error_log", "resources/php-error.log");
require ('LoginDefiner.php');
require ('DataManager.php');
$is_unset = !isset($_COOKIE['user_id']);
if($is_unset){
    $definer = new LoginDefiner();
    $definer->getFreeID();
    $id = $definer->takeID();
    setcookie('user_id', $id, time() + 3600 * 24 * 90, '/');
    DataManager::addUser($id);
}
?>