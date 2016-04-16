<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $model Courses 
 * @var $form CActiveForm 
 */
?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'courses-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
        ));
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
        <?php echo $form->labelEx($model, 'course_name', array('class' => 'form-title small')); ?>
        <?php echo $form->textField($model, 'course_name', array('maxlength' => 30, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'course_name'); ?>
    </div>

    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'min_duration', array('class' => 'form-title small')); ?>
        <?php echo $form->textField($model, 'min_duration', array('maxlength' => 30, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'min_duration'); ?>
    </div>

    <div class="col-md-4 form-group">
        <?php echo $form->labelEx($model, 'max_duration', array('class' => 'form-title small')); ?>
        <?php echo $form->textField($model, 'max_duration', array('maxlength' => 30, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'max_duration'); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php echo CHtml::submitButton('submit', array('class' => 'btn btn-primary')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>

