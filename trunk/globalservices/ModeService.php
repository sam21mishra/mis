<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @since $Id:$
 */
?>
<?php

class ModeService {

    public function getAllMode() {
        $org_id = getUserInfo('org_id');
        $result = Mode::model()->findAllByAttributes(array('org_id' => $org_id));
        return $result;
    }

    public function save($data) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = new Mode;
            foreach ($data as $key => $value) {
                $model->$key = $data->$key;
            }
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'{$data->mode}'s' details add successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to add \'' . $data->mode . '\'\'s details');
            $tran->rollback();
            return false;
        }
    }

    public function update($pk, $data) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = Mode::model()->findByPk($pk);
            foreach ($data as $key => $value) {
                $model->$key = $data->$key;
            }
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'{$data->mode}'s' details updated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to update \'' . $data->mode . '\'\'s details');
            $tran->rollback();
            return false;
        }
    }

    public function deactive($pk) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = Mode::model()->findByPk($pk);
            $model->status = 0;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "Mode deactivated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to deactivate mode');
            $tran->rollback();
            return false;
        }
    }

    public function active($pk) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = Mode::model()->findByPk($pk);
            $model->status = 1;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "Mode activated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to activate mode');
            $tran->rollback();
            return false;
        }
    }

}
