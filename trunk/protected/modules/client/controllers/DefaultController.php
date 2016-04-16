<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DefaultController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/admin';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'registerUser', 'ManageUser', 'DeactiveOrg', 'ActiveOrg','UpdateOrg'),
                'users' => array('@'),
                'expression' => '(Yii::app()->user->getState("role")==SYSADMIN)'
            ),
            /* array('allow', // allow authenticated user to perform 'create' and 'update' actions
              'actions' => array('index'),
              'users' => array('@'),

              ), */
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->redirect(array('registerUser'));
    }

    /**
     * actionRegisterUser function will help to register client by system admin
     */
    public function actionRegisterUser() {
        $model = new RegisterForm();
        if (isset($_POST['RegisterForm'])) {
            $model->attributes = $_POST['RegisterForm'];
            if ($model->validate()) {
                $sysService = new SysadminService();
                $result = $sysService->registerUser($_POST['RegisterForm']);
                if ($result) {
                    $this->redirect(array('registerUser'));
                }
            } else {
                COMMONFUNCTION::logModelErrors($model->getErrors());
            }
        }
        $this->render('registerUser', array(
            'model' => $model
        ));
    }

    public function actionManageUser() {
        $orgService = new OrganizationService();
        $data = $orgService->getAllOrganization();
        $this->render('manageUser', array(
            'data' => $data
        ));
    }

}
