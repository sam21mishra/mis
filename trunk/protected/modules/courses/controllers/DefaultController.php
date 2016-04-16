<?php

/**
 * DefaultController will help to perform crud related to Courses * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $data Courses 
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
                'actions' => array('index', 'create', 'update', 'manageCourses','Active','Deactive'),
                'users' => array('@'),
                'expression' => '(validateUser(RoleEnum::ADMIN)) || (validateUser(RoleEnum::HR)) ||(validateUser(RoleEnum::CM))'
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
        $model = new CoursesForm;
        if (isset($_POST['CoursesForm'])) {
            $model->attributes = $_POST['CoursesForm'];
            if ($model->validate()) {
                $courseService = new CoursesService();
                $result = $courseService->save($model);
                if ($result) {
                    $this->redirect(array('manageCourses'));
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

        if ($model->org_id !== getUserInfo('org_id')) {
            throw new CHttpException(403, 'You are not authorized to perform this action.');
        } elseif ($model->branch_id !== getUserInfo('branch_id')) {
            throw new CHttpException(403, 'You are not authorized to perform this action.');
        }


        $formModel = new CoursesForm();
        $formModel->attributes = $model->attributes;
        if (isset($_POST['CoursesForm'])) {
            $formModel->attributes = $_POST['CoursesForm'];
            if ($formModel->validate()) {
                $courseService = new CoursesService();
                $result = $courseService->update($id, $formModel);
                if ($result) {
                    $this->redirect(array('manageCourses'));
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
        $this->redirect(array('manageCourses'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Courses the loaded model
     * @throws CHttpException
     */
    public static function loadModel($id) {
        $model = Courses::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Courses $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'courses-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionManageCourses() {
        $courseService = new CoursesService;
        $model = $courseService->getCourses();
        $this->render('manageCourses', array(
            'model' => $model
        ));
    }

    public function actionDeactive($id) {
        $model = self::loadModel($id);
        if ($model->org_id !== getUserInfo('org_id')) {
            throw new CHttpException(403, 'You are not authorized to perform this action.');
        } elseif ($model->branch_id !== getUserInfo('branch_id')) {
            throw new CHttpException(403, 'You are not authorized to perform this action.');
        }
        $courseService = new CoursesService;
        $courseService->deactive($id);
        $this->redirect(array('manageCourses'));
    }

    public function actionActive($id) {
        $model = self::loadModel($id);
        if ($model->org_id !== getUserInfo('org_id')) {
            throw new CHttpException(403, 'You are not authorized to perform this action.');
        } elseif ($model->branch_id !== getUserInfo('branch_id')) {
            throw new CHttpException(403, 'You are not authorized to perform this action.');
        }
        $courseService = new CoursesService;
        $courseService->active($id);
        $this->redirect(array('manageCourses'));
    }

}
