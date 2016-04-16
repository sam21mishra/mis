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
class EnquiryDetailForm extends CFormModel {

    public $id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $dob;
    public $gender;
    public $aadhaar_no;
    public $education;
    public $occupation;
    public $college_company;
    public $mobile_no;
    public $parents_contact_no;
    public $email_id;
    public $address;
    public $flat_floor;
    public $postalcode;
    public $city;
    public $area;
    public $country;
    public $center;
    public $enquiry_time;
    public $enquiry_date;
    public $batch_time;
    public $contact_time;
    public $form_no;
    public $branch_id;
    public $org_id;
    public $heard_about;
    public $mode;
    public $handled_by;
    public $course_suggested;
    public $course_offered;
    public $fees;
    public $duration;
    public $remark;
    public $is_enrolled;
    public $enquiry_id;
    public $enroll_date;
    public $is_emi;
    public $max_emi_duration;
    public $min_duration;
    public $max_duration;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('first_name, last_name, mobile_no, enquiry_date, heard_about, course_suggested, course_offered, fees, remark', 'required'),
            array('heard_about, mode, handled_by, duration, is_enrolled, is_emi, max_emi_duration, min_duration, max_duration', 'numerical', 'integerOnly' => true),
            array('first_name, middle_name, last_name, aadhaar_no, education, occupation, email_id, flat_floor, city, area, country, center, enquiry_time, batch_time, contact_time', 'length', 'max' => 255),
            array('gender', 'length', 'max' => 1),
            array('college_company', 'length', 'max' => 400),
            array('mobile_no, parents_contact_no', 'length', 'max' => 10),
            array('address', 'length', 'max' => 500),
            array('postalcode, form_no, branch_id, org_id, fees, enquiry_id', 'length', 'max' => 20),
            array('course_suggested, course_offered', 'length', 'max' => 4000),
            array('is_emi,max_emi_duration', 'validateEmi'),
            array('is_emi,max_duration,min_duration', 'validateDuration'),
            array('dob, enroll_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, first_name, middle_name, last_name, dob, gender, aadhaar_no, education, occupation, college_company, mobile_no, parents_contact_no, email_id, address, flat_floor, postalcode, city, area, country, center, enquiry_time, enquiry_date, batch_time, contact_time, form_no, branch_id, org_id, heard_about, mode, handled_by, course_suggested, course_offered, fees, duration, remark, is_enrolled, enquiry_id, enroll_date, is_emi, max_emi_duration, min_duration, max_duration', 'safe'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'aadhaar_no' => 'Aadhaar No',
            'education' => 'Education',
            'occupation' => 'Occupation',
            'college_company' => 'College/Company',
            'mobile_no' => 'Mobile No',
            'parents_contact_no' => 'Parents Contact No',
            'email_id' => 'Email',
            'address' => 'Address',
            'flat_floor' => 'Flat Floor',
            'postalcode' => 'Postalcode',
            'city' => 'City',
            'area' => 'Area',
            'country' => 'Country',
            'center' => 'Center',
            'enquiry_time' => 'Enquiry Time',
            'enquiry_date' => 'Enquiry Date',
            'batch_time' => 'Batch Time',
            'contact_time' => 'Contact Time',
            'form_no' => 'Form No',
            'branch_id' => 'Branch Id',
            'org_id' => 'Org Id',
            'heard_about' => 'Heard About',
            'mode' => 'Mode',
            'handled_by' => 'Handled By',
            'course_suggested' => 'Course Suggested',
            'course_offered' => 'Course Offered',
            'fees' => 'Fees',
            'duration' => 'Duration',
            'remark' => 'Remark',
            'is_enrolled' => 'Is Enrolled',
            'enquiry_id' => 'Enquiry Id',
            'enroll_date' => 'Enroll Date',
            'is_emi' => 'Is Emi',
            'max_emi_duration' => 'Max Emi Duration',
            'min_duration' => 'Min Duration',
            'max_duration' => 'Max Duration',
        );
    }

    public function validateEmi() {
        if ($this->is_emi) {
            if ($this->max_emi_duration <= 0) {
                $this->addError('max_emi_duration', 'Max Emi Duration cannot be zero.');
            } elseif ($this->max_emi_duration == '') {
                $this->addError('max_emi_duration', 'Max Emi Duration cannot be blank.');
            }
        }
        if ($this->max_emi_duration !== '') {
            if ($this->max_emi_duration <= 0) {
                $this->addError('max_emi_duration', 'Max Emi Duration must be larger than zero.');
            }
            if (!$this->is_emi) {
                $this->addError('is_emi', 'Is Emi must be yes for max emi duration.');
            }
        }
    }

    public function validateDuration() {
        if ($this->is_emi) {
            if ($this->max_emi_duration > $this->max_duration) {
                $this->addError('max_duration', 'Max Duration must be greater then max emi duration.');
            }
        }
        if ($this->max_duration < $this->min_duration) {
            $this->addError('max_duration', 'Max Duration must be larger than min duration.');
        }
        if ($this->min_duration !== '' && $this->max_duration !== '') {
            if ($this->min_duration <= 0) {
                $this->addError('min_duration', 'Min Duration must be larger than zero.');
            } elseif ($this->max_duration <= 0) {
                $this->addError('max_duration', 'Max Duration must be larger than zero.');
            }
        }
    }

}
