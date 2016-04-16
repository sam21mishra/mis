<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * This is the model class for table "mode".
 *
 * The followings are the available columns in table 'mode':
 * @property integer $id
 * @property string $mode
 * @property string $org_id
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Organization $org
 */
class ModeForm extends CFormModel {

    public $id;
    public $mode;
    public $org_id;
    public $status;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('mode', 'required'),
            array('mode', 'length', 'max' => 255),
            array('org_id', 'length', 'max' => 20),
            array('status', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, mode, org_id, status', 'safe'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'mode' => 'Mode',
            'org_id' => 'Org',
            'status' => 'Status',
        );
    }

}
