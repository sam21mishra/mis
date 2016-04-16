<?php

/**
 * DefaultController will help to perform crud related to Employee * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $data Employee 
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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'AddEmployee', 'ManageEmployee', 'Deactive', 'Active'),
                'users' => array('@'),
                'expression' => '(validateUser(RoleEnum::ADMIN)) || (validateUser(RoleEnum::HR))'
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
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

    public function actionAddEmployee() {
        $model = new EmployeeForm;
        $roleService = new RoleService;
        $roles = $roleService->getRoles();
        $branchService = new BranchesService;
        $branches = $branchService->getBranches(getUserInfo('org_id'));
        if (isset($_POST['EmployeeForm'])) {
            $model->attributes = $_POST['EmployeeForm'];
            if ($model->validate()) {

                $rnd = rand(0, 9999);  // generate random number between 0-9999
                $uploadedFile = CUploadedFile::getInstance($model, 'resume');
                if (!empty($uploadedFile)) {
                    $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                    $model->resume = $fileName;
                }
                $employeeService = new EmployeeService();
                $result = $employeeService->addEmployee($model);
                if ($result) {
                    if (!empty($uploadedFile)) {
                        $uploadedFile->saveAs(Yii::getPathOfAlias('uploads') . '/valid/' . $fileName);
                    }
                    $this->redirect(array('addEmployee'));
                }
            }
        }
        $this->render('create', array(
            'model' => $model,
            'roles' => $roles,
            'branches' => $branches
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
        $formModel = new EmployeeForm();
        $formModel->attributes = $model->attributes;
        $roleService = new RoleService;
        $roles = $roleService->getRoles();
        $branchService = new BranchesService;
        $branches = $branchService->getBranches(getUserInfo('org_id'));
        if (isset($_POST['EmployeeForm'])) {
            $formModel->attributes = $_POST['EmployeeForm'];
            if ($formModel->validate()) {
                $rnd = rand(0, 9999);  // generate random number between 0-9999
                $uploadedFile = CUploadedFile::getInstance($formModel, 'resume');
                if (!empty($uploadedFile)) {
                    $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                    $formModel->resume = $fileName;
                }
                $employeeService = new EmployeeService();
                $result = $employeeService->updateEmployee($id, $formModel);
                if ($result) {
                    if (!empty($uploadedFile)) {
                        $uploadedFile->saveAs(Yii::getPathOfAlias('uploads') . '/valid/' . $fileName);
                    }
                    $this->redirect(array('addEmployee'));
                }
            }
        }

        $this->render('update', array(
            'model' => $formModel,
            'roles' => $roles,
            'branches' => $branches
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Employee the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Employee::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Employee $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'employee-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionManageEmployee() {
        $empService = new EmployeeService;
        $orgId = getUserInfo('org_id');
        $model = $empService->getEmployee($orgId);
        $this->render('manageEmployee', array(
            'model' => $model
        ));
    }

    public function actionDeactive($id) {
        $model = self::loadModel($id);
        if (getUserInfo('org_id') !== $model->org_id) {
            throw new CHttpException(404, "The requested page does not exist.");
        }
        $empService = new EmployeeService();
        $empService->deactive($id);
        $this->redirect(array('manageEmployee'));
    }

    public function actionActive($id) {
        $model = self::loadModel($id);
        if (getUserInfo('org_id') !== $model->org_id) {
            throw new CHttpException(404, "The requested page does not exist.");
        }
        $empService = new EmployeeService();
        $empService->active($id);
        $this->redirect(array('manageEmployee'));
    }

}
