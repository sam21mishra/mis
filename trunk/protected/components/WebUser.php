<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class WebUser extends CWebUser {
    #public $loginUrl = array('/r_admin');

    /* public function beforeLogout() {
      parent::beforeLogout();
      Yii::app()->components['user']['loginUrl'][0] = '/r_admin';
      return true;

      //dumpEx(Yii::app()->components['user']);
      //exit;
      } */

    public $module = array();

    public function init() {
        parent::init();
        if(isset($this->module['loginUrl'])){
            if(!isset($this->module['moduleId'])){
                throw new Exception('moduleId Must defined');
            }else{
                $moduleId = Yii::app()->controller->module->id;
                if($moduleId == $this->module['moduleId']){
                    #$this->loginUrl = Yii::app()->request->redirect(Yii::app()->createUrl($this->module['loginUrl']));
                    $this->loginUrl = array($this->module['loginUrl']);
                    //Yii::app()->request->redirect(Yii::app()->createUrl($this->module['loginUrl']));
                    //parent::logout();
                }
            }
        }
        
    }

}
