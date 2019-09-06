<?php
    sleep(1);
    require_once('DataManager.php');
    require_once('JSON.php');
    $arr = DataManager::getUserData($_COOKIE["user_id"], "history");
    $json = new Services_JSON();
    echo $json->encode($arr);
?>