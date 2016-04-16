<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @since $Id:$
 */
?>
<?php

class HeardAboutService {

    public function getAllHeardAbout() {
        $org_id = getUserInfo('org_id');
        $result = HeardAbout::model()->findAllByAttributes(array('org_id' => $org_id));
        return $result;
    }

    public function save($data) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = new HeardAbout;
            foreach ($data as $key => $value) {
                $model->$key = $data->$key;
            }
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'{$data->heard_about}'s' details add successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to add \'' . $data->heard_about . '\'\'s details');
            $tran->rollback();
            return false;
        }
    }

    public function update($pk, $data) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = HeardAbout::model()->findByPk($pk);
            foreach ($data as $key => $value) {
                $model->$key = $data->$key;
            }
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'{$data->heard_about}'s' details updated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to update \'' . $data->heard_about . '\'\'s details');
            $tran->rollback();
            return false;
        }
    }

    public function deactive($pk) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = HeardAbout::model()->findByPk($pk);
            $model->status = 0;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "Heard about deactivated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to deactivate heard about');
            $tran->rollback();
            return false;
        }
    }

    public function active($pk) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = HeardAbout::model()->findByPk($pk);
            $model->status = 1;
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "Heard about activated successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to activate heard about');
            $tran->rollback();
            return false;
        }
    }

}
