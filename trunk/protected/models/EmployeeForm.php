<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * This is the model class for table "employee".
 *
 * The followings are the available columns in table 'employee':
 * @property integer $id
 * @property integer $user_id
 * @property string $full_name
 * @property string $email_id
 * @property string $password
 * @property integer $role
 * @property string $org_id
 * @property string $branch_id
 * @property string $mobile_no
 * @property string $gender
 * @property string $dob
 * @property string $date_of_join
 * @property string $status
 * @property string $salary
 * @property string $resume
 *
 * The followings are the available model relations:
 * @property Organization $org
 * @property Branches $branch
 * @property Register $user
 */
class EmployeeForm extends CFormModel {

    public $id;
    public $user_id;
    public $full_name;
    public $email_id;
    public $password;
    public $role;
    public $org_id;
    public $branch_id;
    public $mobile_no;
    public $gender;
    public $dob;
    public $date_of_join;
    public $status;
    public $salary;
    public $resume;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('full_name, email_id, password, role, salary', 'required'),
            array('role, status', 'numerical', 'integerOnly' => true),
            array('full_name, email_id, password', 'length', 'max' => 25),
            array('org_id, branch_id, salary', 'length', 'max' => 20),
            array('mobile_no', 'length', 'max' => 10),
            array('gender', 'length', 'max' => 1),
            array('email_id','email'),
            //array('dob, date_of_join', 'safe'),
            array('resume','file','types'=>'doc,docx,pdf','allowEmpty'=>true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, full_name, email_id, password, role, org_id, branch_id, mobile_no, gender, dob, date_of_join, status, salary, resume', 'safe'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User Id',
            'full_name' => 'Full Name',
            'email_id' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'org_id' => 'Org Id',
            'branch_id' => 'Branch',
            'mobile_no' => 'Mobile No',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'date_of_join' => 'Date Of Join',
            'status' => 'Status',
            'salary' => 'Salary',
            'resume' => 'Resume',
        );
    }

}
