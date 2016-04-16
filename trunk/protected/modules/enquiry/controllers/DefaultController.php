<?php

/**
 * DefaultController will help to perform crud related to EnquiryDetail * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $data EnquiryDetail 
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
                'actions' => array('ManageEnquiry'),
                'users' => array('@'),
                'expression' => '(validateUser(RoleEnum::COUNSELOR)) || (validateUser(RoleEnum::ADMIN)) || (validateUser(RoleEnum::HR)) || (validateUser(RoleEnum::CM))'
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
                'expression' => '(validateUser(RoleEnum::COUNSELOR))'
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new EnquiryDetailForm;
        $modeService = new ModeService();
        $modes = $modeService->getAllMode();
        $courseService = new CoursesService();
        $courses = $courseService->getCourses();
        $heardAboutService = new HeardAboutService();
        $heardAbout = $heardAboutService->getAllHeardAbout();
        if (isset($_POST['EnquiryDetailForm'])) {
            $model->attributes = $_POST['EnquiryDetailForm'];
            $suggestedCourse = '';
            foreach ($_POST['EnquiryDetailForm']['course_suggested'] as $coursesSuggested) {
                $suggestedCourse .= $coursesSuggested . ',';
            }
            $suggestedCourse = rtrim($suggestedCourse, ',');
            $model->course_suggested = $suggestedCourse;

            $offeredCourse = '';
            foreach ($_POST['EnquiryDetailForm']['course_offered'] as $coursesOffered) {
                $offeredCourse .= $coursesOffered . ',';
            }
            $offeredCourse = rtrim($offeredCourse, ',');
            $model->course_offered = $offeredCourse;
            if ($model->validate()) {
                $enquiryService = new EnquiryDetailService();
                $result = $enquiryService->save($model);
                if ($result) {
                    $this->redirect(array('manageEnquiry'));
                }
            }
        }
        $this->render('create', array(
            'model' => $model,
            'modes' => $modes,
            'courses' => $courses,
            'heardAbout' => $heardAbout
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if (getUserInfo('org_id') !== $model->org_ref_id && getUserInfo('branch_id') !== $model->branch_id) {
            throw new CHttpException(403, "You are not authorized to perform this action!");
        }
        $modeService = new ModeService();
        $modes = $modeService->getAllMode();
        $courseService = new CoursesService();
        $courses = $courseService->getCourses();
        $heardAboutService = new HeardAboutService();
        $heardAbout = $heardAboutService->getAllHeardAbout();
        if (isset($_POST['EnquiryDetailForm'])) {
            $model->attributes = $_POST['EnquiryDetail'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('EnquiryDetail');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new EnquiryDetail('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['EnquiryDetail']))
            $model->attributes = $_GET['EnquiryDetail'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return EnquiryDetail the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = EnquiryDetail::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param EnquiryDetail $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'enquiry-detail-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionManageEnquiry() {
        $enquiryDetailService = new EnquiryDetailService;
        $result = $enquiryDetailService->getEnquiry();
        $this->render('manageEnquiry', array(
            'model' => $result
        ));
    }

}
