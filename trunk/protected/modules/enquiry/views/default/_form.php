<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $model EnquiryDetail 
 * @var $form CActiveForm 
 */
?>

<div class="row wrapper wrapper-content">
    <div class="col-sm-12">
        <?php echo COMMONFUNCTION::getFlash(); ?>
    </div>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'enquiry-detail-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'htmlOptions' => array(
            'role' => 'form',
            'enctype' => 'multipart/form-data'
        )
    ));
    ?>



    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'first_name', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'first_name'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'middle_name', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'middle_name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'middle_name'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'last_name', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'last_name'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'dob', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'dob', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'dob'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'gender', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'gender', array('size' => 1, 'maxlength' => 1, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'gender'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'aadhaar_no', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'aadhaar_no', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'aadhaar_no'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'education', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'education', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'education'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'occupation', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'occupation', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'occupation'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'college_company', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'college_company', array('size' => 60, 'maxlength' => 400, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'college_company'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'mobile_no', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'mobile_no', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'mobile_no'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'parents_contact_no', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'parents_contact_no', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'parents_contact_no'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'email_id', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'email_id', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'email_id'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'address', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'address'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'flat_floor', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'flat_floor', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'flat_floor'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'postalcode', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'postalcode', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'postalcode'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'city', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'city', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'city'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'area', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'area', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'area'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'country', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'country', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'country'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'center', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'center', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'center'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'enquiry_time', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'enquiry_time', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'enquiry_time'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'enquiry_date', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'enquiry_date', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'enquiry_date'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'batch_time', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'batch_time', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'batch_time'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'contact_time', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'contact_time', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'contact_time'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'heard_about', array('class' => 'form-title small')); ?>
            <?php $heardAboutList = CHtml::listData($heardAbout, 'id', 'heard_about') ?>
            <?php echo $form->dropDownList($model, 'heard_about', $heardAboutList, array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'heard_about'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'mode', array('class' => 'form-title small')); ?>
            <?php $modeList = CHtml::listData($modes, 'id', 'mode'); ?>
            <?php echo $form->dropDownList($model, 'mode', $modeList, array('class' => 'form-control', 'empty' => 'Select mode')); ?>
            <?php echo $form->error($model, 'mode'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'course_suggested', array('class' => 'form-title small')); ?>
            <?php $coursesList = CHtml::listData($courses, 'course_name', 'course_name'); ?>
            <div class="input-group">
                <?php echo $form->dropDownList($model, 'course_suggested', $coursesList, array('size' => 60, 'maxlength' => 4000, 'class' => 'form-control chosen-select', 'multiple' => true, 'data-placeholder' => 'Choose a Course..', 'style' => 'width:321px')); ?>
            </div>
            <?php echo $form->error($model, 'course_suggested'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'course_offered', array('class' => 'form-title small')); ?>
            <?php $courseOffered = CHtml::listData($courses, 'course_name', 'course_name'); ?>
            <div class="input-group">
                <?php echo $form->dropDownList($model, 'course_offered', $courseOffered, array('size' => 60, 'maxlength' => 4000, 'class' => 'form-control chosen-select', 'multiple' => true, 'data-placeholder' => 'Choose a Course..', 'style' => 'width:321px')); ?>
            </div>
            <?php echo $form->error($model, 'course_offered'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'fees', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'fees', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'fees'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'duration', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'duration', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'duration'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'enroll_date', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'enroll_date', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'enroll_date'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'is_enrolled', array('class' => 'form-title small')); ?>
            <?php echo $form->dropDownList($model, 'is_enrolled', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'is_enrolled'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'is_emi', array('class' => 'form-title small')); ?>
            <?php echo $form->dropDownList($model, 'is_emi', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'is_emi'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'max_emi_duration', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'max_emi_duration', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'max_emi_duration'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'min_duration', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'min_duration', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'min_duration'); ?>
        </div>
        <div class="col-sm-4 form-group">
            <?php echo $form->labelEx($model, 'max_duration', array('class' => 'form-title small')); ?>
            <?php echo $form->textField($model, 'max_duration', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'max_duration'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <?php echo $form->labelEx($model, 'remark', array('class' => 'form-title small')); ?>
            <?php echo $form->textArea($model, 'remark', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'remark'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="middle">
                <?php echo CHtml::submitButton('Add Enquiry', array('class' => 'btn btn-primary block full-width m-b"')); ?>
            </div>                
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->