<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $model Mode 
 * @var $form CActiveForm 
 */
?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'mode-form',
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
        <?php echo $form->labelEx($model, 'mode', array('class' => 'form-title small')); ?>
        <?php echo $form->textField($model, 'mode', array('maxlength' => 40, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'mode', array('class' => 'form-title small')); ?>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- form -->

<?php $this->endWidget(); ?>

