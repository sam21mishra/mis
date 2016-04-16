<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class OrganizationService {

    public function getAllOrganization() {
        return Organization::model()->findAll();
    }

    public function deactiveOrg($id) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $record = Organization::model()->findByPk($id);
            $record->status = 0;
            $record->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'" . $record->organization_name . "' deactivated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', $exc);
            $tran->rollBack();
            return false;
        }
    }

    public function activeOrg($id) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $record = Organization::model()->findByPk($id);
            $record->status = 1;
            $record->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'" . $record->organization_name . "' activated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', $exc);
            $tran->rollBack();
            return false;
        }
    }

    public function updateOrganization($data,$id) {
        $tran = Yii::app()->db->beginTransaction();
        $data = (object)$data;
        try {
            $orgModel = Organization::model()->findByPk($id);
            $orgModel->organization_name = $data->organization_name;
            $orgModel->org_reg_date = $data->org_reg_date;
            $orgModel->org_renew_date = $data->org_renew_date;
            $orgModel->no_of_branches = $data->no_of_branches;
            $orgModel->save();
            COMMONFUNCTION::setFlash('success', '\'' . $data->organization_name . '\' updated successfully!');
            $tran->commit();
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to update \'' . $data->organization_name . '\'');
            $tran->rollBack();
            return false;
        }
    }

}
