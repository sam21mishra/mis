<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * This is the model class for table "organization".
 *
 * The followings are the available columns in table 'organization':
 * @property integer $id
 * @property string $organization_name
 * @property string $org_id
 * @property string $org_reg_date
 * @property string $org_renew_date
 * @property integer $no_of_branches
 *
 * The followings are the available model relations:
 * @property Batches[] $batches
 * @property Branches[] $branches
 * @property Collection[] $collections
 * @property Courses[] $courses
 * @property Employee[] $employees
 * @property EnquiryDetail[] $enquiryDetails
 * @property Expenses[] $expenses
 * @property Followups[] $followups
 * @property HeardAbout[] $heardAbouts
 * @property Holidays[] $holidays
 * @property MiniEnquiry[] $miniEnquiries
 * @property Mode[] $modes
 * @property Register[] $registers
 */
class Organization extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'organization';
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'batches' => array(self::HAS_MANY, 'Batches', 'org_id'),
            'branches' => array(self::HAS_MANY, 'Branches', 'org_ref_id'),
            'collections' => array(self::HAS_MANY, 'Collection', 'org_id'),
            'courses' => array(self::HAS_MANY, 'Courses', 'org_id'),
            'employees' => array(self::HAS_MANY, 'Employee', 'org_id'),
            'enquiryDetails' => array(self::HAS_MANY, 'EnquiryDetail', 'org_id'),
            'expenses' => array(self::HAS_MANY, 'Expenses', 'org_id'),
            'followups' => array(self::HAS_MANY, 'Followups', 'org_id'),
            'heardAbouts' => array(self::HAS_MANY, 'HeardAbout', 'org_id'),
            'holidays' => array(self::HAS_MANY, 'Holidays', 'org_id'),
            'miniEnquiries' => array(self::HAS_MANY, 'MiniEnquiry', 'org_id'),
            'modes' => array(self::HAS_MANY, 'Mode', 'org_id'),
            'registers' => array(self::HAS_MANY, 'Register', 'org_id'),
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
        $criteria->compare('organization_name', $this->organization_name, true);
        $criteria->compare('org_id', $this->org_id, true);
        $criteria->compare('org_reg_date', $this->org_reg_date, true);
        $criteria->compare('org_renew_date', $this->org_renew_date, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('no_of_branches', $this->no_of_branches, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Organization the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function loadModel($id){
        $result = Organization::model()->findByPk($id);
        return $result;
    }
}
