<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * This is the form model class for table "register".
 *
 * The followings are the available columns in table 'register':
 * @property integer $id
 * @property string $full_name
 * @property string $email_id
 * @property string $password
 * @property integer $role
 * @property string $org_id
 * @property string $user_id
 * @property string $status
 * 
 * The followings are the available model relations:
 * @property Admission[] $admissions
 * @property Batches[] $batches
 * @property Collection[] $collections
 * @property Collection[] $collections1
 * @property Courses[] $courses
 * @property Employee[] $employees
 * @property EnquiryDetail[] $enquiryDetails
 * @property Expenses[] $expenses
 * @property Followups[] $followups
 * @property MiniEnquiry[] $miniEnquiries
 * @property Organization $org
 * @property Role $role0
 * @property Salary[] $salaries
 * @property Session[] $sessions
 */
class RegisterForm extends CFormModel {

    // Register model variables 
    public $id;
    public $full_name;
    public $email_id;
    public $password;
    public $role;
    public $user_id;
    public $status;

    // Organization model Variable
    //public $id;
    public $organization_name;
    public $org_id;
    public $org_reg_date;
    public $org_renew_date;
    public $no_of_branches;
    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            // Register model rules 
            array('full_name, email_id, password', 'required'),
            array('role', 'numerical', 'integerOnly' => true),
            array('email_id', 'length', 'max' => 400),
            array('email_id','email'),
            array('user_id','email'),
            array('password', 'length', 'max' => 255),
            //array('org_id, user_id', 'length', 'max' => 20),
            array('status', 'length', 'max' => 8),
            
            // Organization model rules
            array('organization_name, org_reg_date, org_renew_date,no_of_branches', 'required'),
            array('organization_name', 'length', 'max' => 25),
            array('org_id', 'length', 'max' => 20),
            array('no_of_branches', 'length', 'max' => 3),
            array('org_id,no_of_branches','numerical','integerOnly'=>true),
            array('org_reg_date,org_renew_date','length','max'=>10),
            array('organization_name','checkOrg'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, full_name, email_id,organization_name, password, role,no_of_branches, org_id, user_id, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'full_name' => 'Owner Name',
            'email_id' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'org_id' => 'Org',
            'user_id' => 'User',
            'status' => 'Status',
            'organization_name' => 'Organization Name',
            'org_reg_date' => 'Registration Date',
            'org_renew_date' => 'Renewal Date',
            'no_of_branches' => 'No. Of Branches'
        );
    }
    
    /**
     * checkOrg fuction will help whether entered organization already exists or not
     * @param String $attribute -- this can be attribute name here organization_name
     */
    public function checkOrg($attribute){
        $result = Organization::model()->findByAttributes(array('organization_name'=>$attribute));
        if($result){
            $this->addError($attribute,"'".$attribute."' Organization already exists!");
        }
    }

}
