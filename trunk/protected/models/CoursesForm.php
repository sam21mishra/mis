<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * This is the model class for table "courses".
 *
 * The followings are the available columns in table 'courses':
 * @property integer $id
 * @property string $course_name
 * @property integer $min_duration
 * @property integer $max_duration
 * @property string $org_id
 * @property integer $user_id
 * @property string $branch_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Organization $org
 * @property Branches $branch
 * @property Employee $user
 */
class CoursesForm extends CFormModel {

    public $id;
    public $course_name;
    public $min_duration;
    public $max_duration;
    public $org_id;
    //public $user_id;
    public $branch_id;
    public $status;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('course_name, min_duration, max_duration', 'required'),
            array('min_duration, max_duration, status', 'numerical', 'integerOnly' => true),
            array('course_name', 'length', 'max' => 255),
            array('org_id, branch_id', 'length', 'max' => 20),
            array('min_duration,max_duration','compareDuration'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, course_name, min_duration, max_duration, org_id, branch_id, status', 'safe'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'course_name' => 'Course Name',
            'min_duration' => 'Min Duration',
            'max_duration' => 'Max Duration',
            'org_id' => 'Org',
            //'user_id' => 'User',
            'branch_id' => 'Branch',
            'status' => 'Status',
        );
    }
    
    public function compareDuration(){
        if($this->min_duration > $this->max_duration){
            $this->addError('min_duration', 'Min duration must be less than max duration!');
        }
    }

}
