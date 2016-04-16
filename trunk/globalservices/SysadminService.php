<?php

/**
 * SysadminService class help to communicate with active model so all crud action done via this service
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 */
?>
<?php

class SysadminService {

    /**
     * isUserExists function will help to check whether user exists in db or not 
     * @param String $username
     * @param String $password
     * @return Array
     */
    public function isUserExists($username, $password) {
        $model = new Sysadmin();
        $criteria = new CDbCriteria();
        $criteria->compare('username', $username, false, 'AND');
        $criteria->compare('password', $password);
        $result = Sysadmin::model()->find($criteria);
        return $result;
    }

    /**
     * registerUser function will help to register new client
     * @param Array $data
     * @return boolean
     */
    public function registerUser($data) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $orgId = time();
            $orgModel = new Organization();
            $data = (Object) $data;
            $orgModel->organization_name = $data->organization_name;
            $orgModel->org_id = $orgId;
            $orgModel->org_reg_date = $data->org_reg_date;
            $orgModel->org_renew_date = $data->org_renew_date;
            $orgModel->no_of_branches = $data->no_of_branches;
            $result = $this->isOrganizationExists($data->organization_name);
            if ($result) {
                $errorMsg = "'" . $data->organization_name . "' already exists!";
                Yii::Log($errorMsg, CLogger::LEVEL_INFO);
                COMMONFUNCTION::setFlash('error', $errorMsg);
                return false;
            }
            $orgModel->save();
            $registerModel = new Register();
            $registerModel->full_name = $data->full_name;
            $registerModel->email_id = $data->email_id;
            $registerModel->password = $data->password;
            $registerModel->org_id = $orgId;
            $registerModel->user_id = $data->email_id;
            $registerModel->role = ADMIN;
            $registerModel->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "'" . $data->organization_name . "' added successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            $tran->rollback();
            return false;
        }
    }

    /**
     * isOrganizationExists function will help to check whether organization is already exists in db
     * @param String $orgName
     * @return boolean
     */
    public function isOrganizationExists($orgName) {
        $orgModel = new Organization();
        $result = $orgModel->findByAttributes(array('organization_name' => $orgName));
        if ($result) {
            return true;
        }
        return false;
    }

}
