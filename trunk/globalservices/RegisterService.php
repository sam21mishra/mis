<?php

/**
 * RegisterService class will help to communicate with register fb
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 */
class RegisterService {

    /**
     * isUserExists function will help to check whether user exists in db or not 
     * @param String $username
     * @param String $password
     * @return Array
     */
    public function isUserExists($username, $password) {
        $criteria = new CDbCriteria();
        $criteria->compare('user_id', $username);
        $criteria->compare('password', $password);
        $criteria->compare('status', '1');
        $result = Register::model()->find($criteria);
        return $result;
    }

}
