<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        //self::ERROR_UNKNOWN_IDENTITY stands for 100
        /* if (!isset($users[$this->username]))
          $this->errorCode = self::ERROR_USERNAME_INVALID;
          elseif ($users[$this->username] !== $this->password)
          $this->errorCode = self::ERROR_PASSWORD_INVALID;
          else
          $this->errorCode = self::ERROR_NONE;
          return !$this->errorCode; */
        $sysService = new SysadminService;
        $result = $sysService->isUserExists($this->username, $this->password);
        if ($result) {
            $this->_id = $result->emp_id;
            $this->errorCode = self::ERROR_NONE;
            Yii::app()->user->setState('role', SYSADMIN);
            Yii::app()->user->setState('name', 'Saurabh Mishra');
            Yii::app()->user->setState('role_name', RoleEnum::roleName(SYSADMIN));
            Yii::app()->user->setState('loginStatus', true);
            return true;
        } else {
            $register = new RegisterService();
            $result = $register->isUserExists($this->username, $this->password);
            if ($result) {
                $this->_id = $result->id;
                $orgResult = Organization::model()->findByAttributes(array('org_id' => $result->org_id));
                if ($orgResult->status) {
                    $this->errorCode = self::ERROR_NONE;
                    Yii::app()->user->setState('emp_id', $result->id);
                    Yii::app()->user->setState('role', $result->role);
                    Yii::app()->user->setState('org_id', $result->org_id);
                    Yii::app()->user->setState('name', ucwords($result->full_name));
                    Yii::app()->user->setState('role_name', RoleEnum::roleName($result->role));
                    Yii::app()->user->setState('loginStatus', true);
                    return true;
                } else {
                    Yii::log('Authentication Failed!!', CLogger::LEVEL_ERROR);
                    $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
                    COMMONFUNCTION::setFlash('error', 'Unknow username & password combination!');
                    Yii::app()->user->setState('loginStatus', false);
                    return false;
                }
            } else {
                $employee = new EmployeeService();
                $result = $employee->isUserExists($this->username, $this->password);
                if ($result) {
                    if ($result->status && $result->org->status && $result->branch->branch_status) {
                        $this->_id = $result->id;
                        $this->errorCode = self::ERROR_NONE;
                        
                        Yii::app()->user->setState('emp_id', $result->id);
                        Yii::app()->user->setState('role', $result->role);
                        Yii::app()->user->setState('org_id', $result->org_id);
                        Yii::app()->user->setState('branch_id', $result->branch_id);
                        Yii::app()->user->setState('name', ucwords($result->full_name));
                        Yii::app()->user->setState('role_name', RoleEnum::roleName($result->role));
                        Yii::app()->user->setState('loginStatus', true);
                        return true;
                    } else {
                        Yii::log('Authentication Failed!!', CLogger::LEVEL_ERROR);
                        $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
                        COMMONFUNCTION::setFlash('error', 'Unknow username & password combination!');
                        Yii::app()->user->setState('loginStatus', false);
                        return false;
                    }
                } else {
                    Yii::log('Authentication Failed!!', CLogger::LEVEL_ERROR);
                    $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
                    COMMONFUNCTION::setFlash('error', 'Unknow username & password combination!');
                    Yii::app()->user->setState('loginStatus', false);
                    return false;
                }
            }
        }
    }

    public function getId() {
        return $this->_id;
    }

}
