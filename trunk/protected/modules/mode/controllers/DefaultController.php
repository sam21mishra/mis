<?php

/**
 * DefaultController will help to perform crud related to Mode 
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $data Mode 
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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'create', 'update', 'manageMode','Deactive','Active'),
                'users' => array('@'),
                'expression' => '(validateUser(RoleEnum::ADMIN))'
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new ModeForm;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['ModeForm'])) {
            $model->attributes = $_POST['ModeForm'];
            if ($model->validate()) {
                $model->org_id = getUserInfo('org_id');
                $modeService = new ModeService();
                $result = $modeService->save($model);
                if ($result) {
                    $this->redirect(array('manageMode'));
                }
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = self::loadModel($id);
        if (getUserInfo('org_id') !== $model->org_id) {
            throw new CHttpException(404, "The requested page does not exist.");
        }
        $formModel = new ModeForm();
        $formModel->attributes = $model->attributes;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ModeForm'])) {
            $formModel->attributes = $_POST['ModeForm'];
            if ($formModel->validate()) {
                $modeService = new ModeService();
                $result = $modeService->update($id, $formModel);
                if ($result) {
                    $this->redirect(array('manageMode'));
                }
            }
        }

        $this->render('update', array(
            'model' => $formModel,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->redirect(array('manageMode'));
    }

    public function actionManageMode() {
        $model = new ModeService();
        $data = $model->getAllMode();
        $this->render('manageMode', array(
            'data' => $data
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Mode the loaded model
     * @throws CHttpException
     */
    public static function loadModel($id) {
        $model = Mode::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Mode $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'mode-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDeactive($id) {
        $model = self::loadModel($id);
        if (getUserInfo('org_id') !== $model->org_id) {
            throw new CHttpException(404, "The requested page does not exist.");
        }
        $empService = new ModeService();
        $empService->deactive($id);
        $this->redirect(array('manageMode'));
    }

    public function actionActive($id) {
        $model = self::loadModel($id);
        if (getUserInfo('org_id') !== $model->org_id) {
            throw new CHttpException(404, "The requested page does not exist.");
        }
        $empService = new ModeService();
        $empService->active($id);
        $this->redirect(array('manageMode'));
    }

}
