<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * This is the model class for table "register".
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
class Register extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'register';
    }

    

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'admissions' => array(self::HAS_MANY, 'Admission', 'enrolled_by'),
            'batches' => array(self::HAS_MANY, 'Batches', 'faculty_id'),
            'collections' => array(self::HAS_MANY, 'Collection', 'money_collected_by'),
            'collections' => array(self::HAS_MANY, 'Collection', 'user_id'),
            'courses' => array(self::HAS_MANY, 'Courses', 'user_id'),
            'employees' => array(self::HAS_MANY, 'Employee', 'user_id'),
            'enquiryDetails' => array(self::HAS_MANY, 'EnquiryDetail', 'handled_by'),
            'expenses' => array(self::HAS_MANY, 'Expenses', 'user_id'),
            'followups' => array(self::HAS_MANY, 'Followups', 'user_id'),
            'miniEnquiries' => array(self::HAS_MANY, 'MiniEnquiry', 'handled_by'),
            'org' => array(self::BELONGS_TO, 'Organization', 'org_id'),
            'role' => array(self::BELONGS_TO, 'Role', 'role'),
            'salaries' => array(self::HAS_MANY, 'Salary', 'emp_id'),
            'sessions' => array(self::HAS_MANY, 'Session', 'user_id'),
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
        $criteria->compare('full_name', $this->full_name, true);
        $criteria->compare('email_id', $this->email_id, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('role', $this->role);
        $criteria->compare('org_id', $this->org_id, true);
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('status', $this->status, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Register the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
