<?php

/**
 * SysadminForm is a form model that will help to make form
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 */
class SysadminForm extends CFormModel {
    
    public $emp_id;
    public $username;
    public $password;
    public $id;
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password', 'required','on'=>'login'),
            array('emp_id', 'length', 'max' => 10),
            array('username', 'length', 'max' => 25),
            array('password', 'length', 'max' => 40),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, emp_id, username, password', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'emp_id' => 'Emp',
            'username' => 'Username',
            'password' => 'Password',
        );
    }

}
