<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * This is the model class for table "enquiry_detail".
 *
 * The followings are the available columns in table 'enquiry_detail':
 * @property integer $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $dob
 * @property string $gender
 * @property string $aadhaar_no
 * @property string $education
 * @property string $occupation
 * @property string $college_company
 * @property string $mobile_no
 * @property string $parents_contact_no
 * @property string $email_id
 * @property string $address
 * @property string $flat_floor
 * @property string $postalcode
 * @property string $city
 * @property string $area
 * @property string $country
 * @property string $center
 * @property string $enquiry_time
 * @property string $enquiry_date
 * @property string $batch_time
 * @property string $contact_time
 * @property string $form_no
 * @property string $branch_id
 * @property string $org_id
 * @property integer $heard_about
 * @property integer $mode
 * @property integer $handled_by
 * @property string $course_suggested
 * @property string $course_offered
 * @property string $fees
 * @property integer $duration
 * @property string $remark
 * @property integer $is_enrolled
 * @property string $enquiry_id
 * @property string $enroll_date
 * @property integer $is_emi
 * @property integer $max_emi_duration
 * @property integer $min_duration
 * @property integer $max_duration
 *
 * The followings are the available model relations:
 * @property Admission[] $admissions
 * @property Attendance[] $attendances
 * @property BatchStudent[] $batchStudents
 * @property Organization $org
 * @property Branches $branch
 * @property Employee $handledBy
 */
class EnquiryDetail extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'enquiry_detail';
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'admissions' => array(self::HAS_MANY, 'Admission', 'enquiry_id'),
            'attendances' => array(self::HAS_MANY, 'Attendance', 'stdid'),
            'batchStudents' => array(self::HAS_MANY, 'BatchStudent', 'student_id'),
            'org' => array(self::BELONGS_TO, 'Organization', 'org_id'),
            'branch' => array(self::BELONGS_TO, 'Branches', 'branch_id'),
            'handledBy' => array(self::BELONGS_TO, 'Employee', 'handled_by'),
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
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('middle_name', $this->middle_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('dob', $this->dob, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('aadhaar_no', $this->aadhaar_no, true);
        $criteria->compare('education', $this->education, true);
        $criteria->compare('occupation', $this->occupation, true);
        $criteria->compare('college_company', $this->college_company, true);
        $criteria->compare('mobile_no', $this->mobile_no, true);
        $criteria->compare('parents_contact_no', $this->parents_contact_no, true);
        $criteria->compare('email_id', $this->email_id, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('flat_floor', $this->flat_floor, true);
        $criteria->compare('postalcode', $this->postalcode, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('area', $this->area, true);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('center', $this->center, true);
        $criteria->compare('enquiry_time', $this->enquiry_time, true);
        $criteria->compare('enquiry_date', $this->enquiry_date, true);
        $criteria->compare('batch_time', $this->batch_time, true);
        $criteria->compare('contact_time', $this->contact_time, true);
        $criteria->compare('form_no', $this->form_no, true);
        $criteria->compare('branch_id', $this->branch_id, true);
        $criteria->compare('org_id', $this->org_id, true);
        $criteria->compare('heard_about', $this->heard_about);
        $criteria->compare('mode', $this->mode);
        $criteria->compare('handled_by', $this->handled_by);
        $criteria->compare('course_suggested', $this->course_suggested, true);
        $criteria->compare('course_offered', $this->course_offered, true);
        $criteria->compare('fees', $this->fees, true);
        $criteria->compare('duration', $this->duration);
        $criteria->compare('remark', $this->remark, true);
        $criteria->compare('is_enrolled', $this->is_enrolled);
        $criteria->compare('enquiry_id', $this->enquiry_id, true);
        $criteria->compare('enroll_date', $this->enroll_date, true);
        $criteria->compare('is_emi', $this->is_emi);
        $criteria->compare('max_emi_duration', $this->max_emi_duration);
        $criteria->compare('min_duration', $this->min_duration);
        $criteria->compare('max_duration', $this->max_duration);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return EnquiryDetail the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
