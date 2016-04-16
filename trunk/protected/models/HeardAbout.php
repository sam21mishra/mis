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
class HeardAbout extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'heard_about';
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'org' => array(self::BELONGS_TO, 'Organization', 'org_id'),
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
        $criteria->compare('heard_about', $this->heard_about, true);
        $criteria->compare('org_id', $this->org_id, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return HeardAbout the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
