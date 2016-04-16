<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * This is the model class for table "heard_about".
 *
 * The followings are the available columns in table 'heard_about':
 * @property integer $id
 * @property string $heard_about
 * @property string $org_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Organization $org
 */
class HeardAboutForm extends CFormModel {

    public $id;
    public $heard_about;
    public $org_id;
    public $status;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('heard_about', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('heard_about', 'length', 'max' => 255),
            array('org_id', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, heard_about, org_id, status', 'safe'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'heard_about' => 'Heard About',
            'org_id' => 'Org',
            'status' => 'Status',
        );
    }

}
