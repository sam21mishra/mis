<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * This is the model class for table "branches".
 *
 * The followings are the available columns in table 'branches':
 * @property integer $id
 * @property string $branch_id
 * @property string $branch_name
 * @property string $landline
 * @property string $branch_address
 * @property string $org_ref_id
 * @property string $branch_status
 *
 * The followings are the available model relations:
 * @property Batches[] $batches
 * @property Organization $orgRef
 * @property Collection[] $collections
 * @property Courses[] $courses
 * @property Employee[] $employees
 * @property EnquiryDetail[] $enquiryDetails
 * @property Expenses[] $expenses
 * @property Followups[] $followups
 * @property MiniEnquiry[] $miniEnquiries
 * @property Salary[] $salaries
 */
class BranchesForm extends CFormModel {

    public $id;
    public $branch_id;
    public $branch_name;
    public $landline;
    public $branch_address;
    public $org_ref_id;
    public $branch_status;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('branch_name, landline, branch_address', 'required'),
            array('branch_id, org_ref_id', 'length', 'max' => 20),
            array('landline', 'length', 'max' => 10),
            array('branch_name', 'length', 'max' => 25),
            array('branch_status', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, branch_id, branch_name, landline, branch_address, org_ref_id, branch_status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'branch_id' => 'Branch',
            'branch_name' => 'Branch Name',
            'landline' => 'Landline',
            'branch_address' => 'Branch Address',
            'org_ref_id' => 'Org Ref',
            'branch_status' => 'Branch Status',
        );
    }

}
