<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $model Employee 
 * @var $form CActiveForm 
 */
?>

<script src="<?php echo Yii::app()->baseUrl.'/js/employee.js' ?>" type="text/javascript"></script>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'employee-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'role' => 'form',
        'enctype' => 'multipart/form-data'
    ))
);
?>
<div class="row">
    <div class="col-md-12">
        <?php
        echo COMMONFUNCTION::getFlash();
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'full_name', array('class' => 'form-title small')); ?>
        <?php echo $form->textField($model, 'full_name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'full_name', array('class' => 'form-title small')); ?>
    </div>

    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'email_id', array('class' => 'form-title small')); ?>
        <?php echo $form->textField($model, 'email_id', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'email_id', array('class' => 'form-title small')); ?>
    </div>

    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'password', array('class' => 'form-title small')); ?>
        <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'password', array('class' => 'form-title small')); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'role', array('class' => 'form-title small')); ?>
        <?php
        $list = CHtml::listData($roles, 'role', 'role_name');
        ?>
        <?php echo $form->dropDownList($model, 'role', $list, array('class' => 'form-control', 'empty' => 'select role')); ?>
        <?php echo $form->error($model, 'role', array('class' => 'form-title small')); ?>
    </div>
    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'branch_id', array('class' => 'form-title small')); ?>
        <?php
        $branch = CHtml::listData($branches, 'branch_id', 'branch_name');
        ?>
        <?php echo $form->dropDownList($model, 'branch_id', $branch, array('class' => 'form-control','empty' => 'select branch')); ?>
        <?php echo $form->error($model, 'branch_id', array('class' => 'form-title small')); ?>
    </div>

    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'mobile_no', array('class' => 'form-title small')); ?>
        <?php echo $form->textField($model, 'mobile_no', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'mobile_no', array('class' => 'form-title small')); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'gender', array('class' => 'form-title small')); ?>
        <?php echo $form->dropDownList($model, 'gender', array('m' => 'Male', 'f' => 'Female'), array('class' => 'form-control', 'empty' => 'select gender')); ?>
        <?php echo $form->error($model, 'gender', array('class' => 'form-title small')); ?>
    </div>

    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'dob', array('class' => 'form-title small')); ?>
        <?php echo $form->textField($model, 'dob', array('class' => 'form-control','id'=>'dob','data-date-format'=>'YYYY-MM-DD','readonly'=>true)); ?>
        <?php echo $form->error($model, 'dob', array('class' => 'form-title small')); ?>
    </div>

    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'date_of_join', array('class' => 'form-title small')); ?>
        <?php echo $form->textField($model, 'date_of_join', array('class' => 'form-control','id'=>'doj','data-date-format'=>'YYYY-MM-DD','readonly'=>true)); ?>
        <?php echo $form->error($model, 'date_of_join', array('class' => 'form-title small')); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'salary', array('class' => 'form-title small')); ?>
        <?php echo $form->textField($model, 'salary', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'salary', array('class' => 'form-title small')); ?>
    </div>

    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'resume', array('class' => 'form-title small')); ?>
        <?php echo $form->fileField($model, 'resume', array('size' => 60, 'maxlength' => 400, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'resume', array('class' => 'form-title small')); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- form -->
<?php $this->endWidget(); ?>

