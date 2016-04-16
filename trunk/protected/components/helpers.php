<?php

function dumpEx($param) {
    echo "<pre>";
    print_r($param);
    exit;
}

function isActiveMenu($url) {
    $explode = explode('/', $url);
    $sizeOfUrl = count($explode);
    if ($sizeOfUrl == 3) {
        $module = Yii::app()->controller->module->id;
        $controller = Yii::app()->controller->id;
        $action = Yii::app()->controller->action->id;
    } else {
        $controller = Yii::app()->controller->id;
        $action = Yii::app()->controller->action->id;
    }
}

function returnHttpReferrer() {
    $referrer = Yii::app()->request->urlReferrer;
    return $referrer;
}

function validateUser($role) {
    if (Yii::app()->user->getState('role') == $role) {
        return true;
    } else {
        return false;
    }
}

function getUserInfo($info = null) {
    if (is_null($info)) {
        return Yii::app()->user;
    } else {
        return Yii::app()->user->getState($info);
    }
}

function visible($role){
    if(is_array($role)){
        
    }else{
        if($role !== getUserInfo('role')){
            return "class='hidden'";
        }
    }
}
?>