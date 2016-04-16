<?php

/**
 * 
 */
class EmployeeService {

    public function addEmployee($data) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = new Employee;
            foreach ($data as $key => $value) {
                $model->$key = $data->$key;
            }
            $model->org_id = getUserInfo('org_id');
            $model->user_id = $data->email_id;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'{$data->full_name}'s' details add successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to add employee \'' . $data->full_name . '\'\'s details');
            $tran->rollback();
            return false;
        }
    }

    public function getEmployee($orgId) {
        return Employee::model()->findAll(array(
                    'condition' => 'org_id=:orgId',
                    'params' => array(':orgId' => $orgId)
        ));
    }

    public function updateEmployee($pk, $data) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = Employee::model()->findByPk($pk);
            foreach ($data as $key => $value) {
                $model->$key = $data->$key;
            }
            $model->org_id = getUserInfo('org_id');
            $model->user_id = $data->email_id;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'{$data->full_name}\'s' details updated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to update employee \'' . $data->full_name . '\'\'s details');
            $tran->rollback();
            return false;
        }
    }

    public function deactive($pk) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = Employee::model()->findByPk($pk);
            $model->status = 0;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "Account deactivated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to deactivate account');
            $tran->rollback();
            return false;
        }
    }

    public function active($pk) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = Employee::model()->findByPk($pk);
            $model->status = 1;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "Account activated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to activate account');
            $tran->rollback();
            return false;
        }
    }

    public function isUserExists($username, $password) {
        $criteria = new CDbCriteria();
        $criteria->compare('user_id', $username);
        $criteria->compare('password', $password);
        $criteria->with = array('org', 'branch');
        $criteria->together = true;
        $result = Employee::model()->find($criteria);
        return $result;
    }

}
