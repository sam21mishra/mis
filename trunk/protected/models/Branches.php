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
class Branches extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'branches';
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'batches' => array(self::HAS_MANY, 'Batches', 'branch_id'),
            'orgRef' => array(self::BELONGS_TO, 'Organization', 'org_ref_id'),
            'collections' => array(self::HAS_MANY, 'Collection', 'branch_id'),
            'courses' => array(self::HAS_MANY, 'Courses', 'branch_id'),
            'employees' => array(self::HAS_MANY, 'Employee', 'branch_id'),
            'enquiryDetails' => array(self::HAS_MANY, 'EnquiryDetail', 'branch_id'),
            'expenses' => array(self::HAS_MANY, 'Expenses', 'branch_id'),
            'followups' => array(self::HAS_MANY, 'Followups', 'branch_id'),
            'miniEnquiries' => array(self::HAS_MANY, 'MiniEnquiry', 'branch_id'),
            'salaries' => array(self::HAS_MANY, 'Salary', 'branch_id'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('branch_id', $this->branch_id, true);
        $criteria->compare('branch_name', $this->branch_name, true);
        $criteria->compare('landline', $this->landline, true);
        $criteria->compare('branch_address', $this->branch_address, true);
        $criteria->compare('org_ref_id', $this->org_ref_id, true);
        $criteria->compare('branch_status', $this->branch_status, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Branches the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
