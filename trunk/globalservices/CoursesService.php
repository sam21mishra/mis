<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CoursesService {

    public function save($data) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = new Courses;
            foreach ($data as $key => $val) {
                $model->$key = $data->$key;
            }
            $model->org_id = getUserInfo('org_id');
            $branchId = getUserInfo('branch_id');
            //$userId = getUserInfo('user_id');
            if ($branchId) {
                $model->branch_id = $branchId;
                //$model->user_id = $userId;
            }
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'{$data->course_name}' added successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', "Unable to add '{$data->course_name}'!");
            $tran->rollback();
            return false;
        }
    }

    public function getCourses() {
        $orgId = getUserInfo('org_id');
        $branchId = getUserInfo('branch_id');
        $criteria = new CDbCriteria();
        $criteria->compare('org_id', $orgId);
        $criteria->addCondition('branch_id IS NULL', 'AND');
        if ($branchId) {
            $criteria->addCondition('branch_id=' . $branchId, 'OR');
        }
        $result = Courses::model()->findAll($criteria);
        //$result = COMMONFUNCTION::returnQuery('courses', $criteria);
        return $result;
    }

    public function update($id, $data) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = Courses::model()->findByPk($id);
            foreach ($data as $key => $val) {
                $model->$key = $data->$key;
            }
            $model->org_id = getUserInfo('org_id');
            $branchId = getUserInfo('branch_id');
            //$userId = getUserInfo('user_id');
            if ($branchId) {
                $model->branch_id = $branchId;
                //$model->user_id = $userId;
            }
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'{$data->course_name}' updated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', "Unable to update '{$data->course_name}'!");
            $tran->rollback();
            return false;
        }
    }

    public function deactive($pk) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = Courses::model()->findByPk($pk);
            $model->status = 0;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "Course deactivated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', "Unable to deactivate course!");
            $tran->rollback();
            return false;
        }
    }

    public function active($pk) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = Courses::model()->findByPk($pk);
            $model->status = 1;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "Course activated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', "Unable to activate course!");
            $tran->rollback();
            return false;
        }
    }

}
