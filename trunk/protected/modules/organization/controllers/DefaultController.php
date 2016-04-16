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
                'actions' => array('index'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update', 'DeactiveOrg', 'ActiveOrg'),
                'users' => array('@'),
                'expression' => '(Yii::app()->user->getState("role")==SYSADMIN)'
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionUpdate($id) {
        $model = new OrganizationForm();
        $model->setScenario('update');
        $orgResult = Organization::loadModel($id);
        $model->attributes = $orgResult->attributes;
        if (isset($_POST['OrganizationForm'])) {
            if ($model->validate()) {
                $service = new OrganizationService;
                $result = $service->updateOrganization($_POST['OrganizationForm'], $id);
                if ($result) {
                    $this->redirect(returnHttpReferrer());
                }
            } else {
                COMMONFUNCTION::logModelErrors($model->getErrors());
            }
        }
        $this->render('update', array(
            'model' => $model
        ));
    }

    public function actionDeactiveOrg($id) {
        $orgService = new OrganizationService;
        $result = $orgService->deactiveOrg($id);
        $this->redirect(returnHttpReferrer());
    }

    public function actionActiveOrg($id) {
        $referre = Yii::app()->request->urlReferrer;
        $orgService = new OrganizationService;
        $result = $orgService->activeOrg($id);
        $this->redirect(returnHttpReferrer());
    }

}
