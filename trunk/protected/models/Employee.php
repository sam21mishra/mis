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
 * @property integer $status
 * @property string $salary
 * @property string $resume
 *
 * The followings are the available model relations:
 * @property Organization $org
 * @property Branches $branch
 * @property Register $user
 * @property Role $role0
 */
class Employee extends CActiveRecord {


    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'employee';
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'org' => array(self::BELONGS_TO, 'Organization', 'org_id'),
            'branch' => array(self::BELONGS_TO, 'Branches', 'branch_id'),
            'role' => array(self::BELONGS_TO, 'Role', 'id'),
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
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('full_name', $this->full_name, true);
        $criteria->compare('email_id', $this->email_id, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('role', $this->role);
        $criteria->compare('org_id', $this->org_id, true);
        $criteria->compare('branch_id', $this->branch_id, true);
        $criteria->compare('mobile_no', $this->mobile_no, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('dob', $this->dob, true);
        $criteria->compare('date_of_join', $this->date_of_join, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('salary', $this->salary, true);
        $criteria->compare('resume', $this->resume, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Employee the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
