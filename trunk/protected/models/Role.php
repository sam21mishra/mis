<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * This is the model class for table "role".
 *
 * The followings are the available columns in table 'role':
 * @property integer $id
 * @property integer $role
 * @property string $role_name
 *
 * The followings are the available model relations:
 * @property Employee[] $employees
 * @property Register[] $registers
 */
class Role extends CActiveRecord {

    public $id;
    public $role;
    public $role_name;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'role';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('role, role_name', 'required'),
            array('role', 'numerical', 'integerOnly' => true),
            array('role_name', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, role, role_name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'employees' => array(self::HAS_MANY, 'Employee', 'id'),
            'registers' => array(self::HAS_MANY, 'Register', 'role'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'role' => 'Role',
            'role_name' => 'Role Name',
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
        $criteria->compare('role', $this->role);
        $criteria->compare('role_name', $this->role_name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Role the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}