<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BranchesService {

    public function getBranches($orgId) {
        $criteria = new CDbCriteria();
        $criteria->join = 'LEFT JOIN Organization o ON o.org_id=t.org_ref_id';
        $criteria->compare('o.org_id', $orgId);
        $criteria->with = array('orgRef');
        $criteria->together = true;
        $model = Branches::model()->findAll($criteria);
        return $model;
    }

    public function addBranches($modelData, $orgId) {
        $data = (object) $modelData;
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = new Branches;
            $model->branch_name = $data->branch_name;
            $model->branch_address = $data->branch_address;
            $model->landline = $data->landline;
            $model->org_ref_id = $orgId;
            //$model->branch_status = 1;
            $model->branch_id = DateEnum::time();
            $model->save();
            COMMONFUNCTION::setFlash('success', "'" . $model->branch_name . "' created successfully!");
            $tran->commit();
            return true;
        } catch (Exception $exc) {
            $tran->rollback();
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Error occured!');
            return false;
        }
    }

    public function getBranchCount($orgId) {
        $numberOfBranches = Organization::model()->find(array(
            'select' => 'no_of_branches',
            'condition' => 't.org_id=:orgId',
            'params' => array(':orgId' => $orgId),
        ));

        $branchCount = Branches::model()->with(array(
                    'orgRef' => array(
                        'select' => 'no_of_branches',
                        'joinType' => 'LEFT JOIN',
                        'condition' => 'orgRef.org_id=' . $orgId
                    )
                ))->count();
        $result = array('no_of_branches' => $numberOfBranches->no_of_branches, 'branchCount' => $branchCount);
        $result = (object) $result;
        return $result;
    }

    public function deactiveBranch($id) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = Branches::model()->findByPk($id);
            $model->branch_status = 0;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'" . $model->branch_name . "' deactivated successfully!");
            return true;
        } catch (Exception $exc) {
            COMMONFUNCTION::logModelErrors($exc);
            COMMONFUNCTION::setFlash('error', 'Unable to deactive branch');
            $tran->rollback();
            return false;
        }
    }

    public function activeBranch($id) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = Branches::model()->findByPk($id);
            $model->branch_status = 1;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'" . $model->branch_name . "' activated successfully!");
            return true;
        } catch (Exception $exc) {
            COMMONFUNCTION::logModelErrors($exc);
            COMMONFUNCTION::setFlash('error', 'Unable to active branch');
            $tran->rollback();
            return false;
        }
    }

    public function update($pk, $data) {
        $tran = Yii::app()->db->beginTransaction();
        $data = (object) $data;
        try {
            $orgModel = Branches::model()->findByPk($pk);            
            $orgModel->branch_name = $data->branch_name;
            $orgModel->landline = $data->landline;
            $orgModel->branch_address = $data->branch_address;
            $orgModel->save();
            COMMONFUNCTION::setFlash('success', '\'' . $data->branch_name . '\' updated successfully!');
            $tran->commit();
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to update \'' . $data->branch_name . '\'');
            $tran->rollBack();
            return false;
        }
    }
    
    public static function getBranchName($branchId){
        $model = Branches::model()->find(array(
            'select' => 'branch_name',
            'condition' => 'branch_id=:branch_id',
            'params' => array(':branch_id'=>$branchId)
        ));
        return $model->branch_name;
    }

}
