<?php

class OrganizationForm extends CFormModel {

    public $id;
    public $organization_name;
    public $org_id;
    public $org_reg_date;
    public $org_renew_date;
    public $status;
    public $no_of_branches;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('organization_name, org_id, org_reg_date, org_renew_date,no_of_branches', 'required','on'=>'insert'),
            array('organization_name,org_reg_date, org_renew_date,no_of_branches', 'required','on'=>'update'),
            array('organization_name', 'length', 'max' => 255),
            array('org_id', 'length', 'max' => 20),
            array('org_id , no_of_branches', 'numerical', 'integerOnly' => true),
            array('no_of_branches', 'length', 'max' => 3),
            array('status', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, organization_name,no_of_branches, org_id, org_reg_date, org_renew_date,status', 'safe'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'organization_name' => 'Organization Name',
            'org_id' => 'Org Id',
            'org_reg_date' => 'Org Reg Date',
            'org_renew_date' => 'Org Renew Date',
            'status' => 'Status',
            'no_of_branches' => 'No. Of Branches',
        );
    }

}
