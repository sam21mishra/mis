<?php

/**
 * DefaultController will help to perform crud related to Sysadmin
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $data Sysadmin 
 */
class DefaultController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/login';

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
                'actions' => array('index', 'logout'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('registerUser'),
                'users' => array('@'),
                'expression' => '(Yii::app()->user->getState("role")==SYSADMIN)'
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Sysadmin'])) {
            $model->attributes = $_POST['Sysadmin'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * By default system admin will access this action which is login page
     */
    public function actionIndex() {
        if (Yii::app()->user->getState('loginStatus')) {
            $this->redirectUser(Yii::app()->user->getState('role'));
        }
        $model = new SysadminForm();
        $model->setScenario('login');
        if (isset($_POST['SysadminForm'])) {
            $model->setScenario('login');
            $model->attributes = $_POST['SysadminForm'];
            $validateForm = $model->validate();
            if ($validateForm) {
                $auth = new UserIdentity($model->username, $model->password);
                if ($auth->authenticate()) {
                    Yii::app()->user->setState('username', $model->username);
                    Yii::app()->user->login($auth);
                    $this->redirectUser(Yii::app()->user->getState('role'));
                } else {
                    Yii::log('Authentication failed!', CLogger::LEVEL_INFO);
                }
            }
        }
        $this->render('index', array(
            'model' => $model
        ));
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

    /**
     * actionLogout function will help to logout existing system admin user
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect('index');
    }

    public function redirectUser($user) {

        switch ($user) {
            case SYSADMIN :
                $this->redirect(Yii::app()->createUrl('client'));
                break;
            case ADMIN:
                $this->redirect(Yii::app()->createUrl('branches/default/manageBranches'));
                break;
            case CM :
            case HR :
                $this->redirect(Yii::app()->createUrl('courses/default/manageCourses'));
                break;
            case COUNSELOR :
                $this->redirect(Yii::app()->createUrl('enquiry/default/create'));
                break;
        }
    }

}
