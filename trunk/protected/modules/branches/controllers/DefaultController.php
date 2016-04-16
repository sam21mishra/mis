<?php

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
            /* array('allow', // allow all users to perform 'index' and 'view' actions
              'actions' => array('index','logout'),
              'users' => array('*'),
              ), */
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'ManageBranches', 'AddBranches', 'DeactiveBranch', 'ActiveBranch'),
                'users' => array('@'),
                'expression' => '(validateUser(RoleEnum::ADMIN))'
            ),
            array('allow',
                'actions' => array('Update'),
                'users' => array('@'),
                'expression' => '(validateUser(RoleEnum::ADMIN)) || (validateUser(RoleEnum::CM)) || (validateUser(RoleEnum::HR))'
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * 
     */
    public function actionIndex() {
        $this->redirect(array('manageBranches'));
    }

    /**
     * 
     */
    public function actionManageBranches() {
        $orgId = getUserInfo('org_id');
        $model = new Branches();
        $branchesService = new BranchesService();
        $branchList = $branchesService->getBranches($orgId);
        $this->render('manageBranches', array(
            'model' => $model,
            'data' => $branchList
        ));
    }

    /**
     * 
     */
    public function actionAddBranches() {
        $model = new BranchesForm();
        $orgId = getUserInfo('org_id');
        $branchService = new BranchesService();
        $result = $branchService->getBranchCount($orgId);
        if ($result->no_of_branches == $result->branchCount) {
            COMMONFUNCTION::setFlash('error', 'Branch count exceed!');
            $this->redirect(array('manageBranches'));
        }
        if (isset($_POST['BranchesForm'])) {
            $model->attributes = $_POST['BranchesForm'];
            if ($model->validate()) {

                $result = $branchService->addBranches($_POST['BranchesForm'], $orgId);
                if ($result) {
                    $this->redirect(array('manageBranches'));
                }
            }
        }
        $this->render('addBranches', array(
            'model' => $model
        ));
    }

    /**
     * 
     * @param type $id
     */
    public function actionDeactiveBranch($id) {
        $model = self::loadModel($id);
        if (getUserInfo('org_id') !== $model->org_ref_id) {
            throw new CHttpException(403, "You are not authorized to perform this action!");
        }
        $branchService = new BranchesService;
        $result = $branchService->deactiveBranch($id);
        $this->redirect(array('manageBranches'));
    }

    /**
     * 
     * @param type $id
     */
    public function actionActiveBranch($id) {
        $model = self::loadModel($id);
        if (getUserInfo('org_id') !== $model->org_ref_id) {
            throw new CHttpException(403, "You are not authorized to perform this action!");
        }
        $branchService = new BranchesService;
        $result = $branchService->activeBranch($id);
        $this->redirect(array('manageBranches'));
    }

    public function actionUpdate($id) {
        $model = self::loadModel($id);
        if (getUserInfo('org_id') !== $model->org_ref_id) {
            throw new CHttpException(403, "You are not authorized to perform this action!");
        }
        $form = new BranchesForm;
        $form->attributes = $model->attributes;
        if (isset($_POST['BranchesForm'])) {
            if ($form->validate()) {
                $branchService = new BranchesService;
                $result = $branchService->update($id, $_POST['BranchesForm']);
                if ($result) {
                    $this->redirect(array('manageBranches'));
                }
            }
        }
        $this->render('updateBranches', array(
            'model' => $form
        ));
    }

    public static function loadModel($pk) {
        $model = Branches::model()->findByPk($pk);
        if ($model == null) {
            throw new CHttpException(404, 'The requested page does not exists');
        }
        return $model;
    }

}
