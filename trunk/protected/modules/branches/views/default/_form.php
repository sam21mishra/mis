<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 */
?>

<div class="panel-body">
    <?php echo COMMONFUNCTION::getFlash(); ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'branches-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ));
    ?>
    <fieldset>
        <div class="form-group">
            <?php
            echo $form->labelEx($model, 'branch_name');
            echo $form->textField($model, 'branch_name', array('size' => '25', 'maxlength' => 25, 'class' => 'form-control'));
            echo $form->error($model, 'branch_name');
            ?>
        </div>
        <div class="form-group">
            <?php
            echo $form->labelEx($model, 'landline');
            echo $form->textField($model, 'landline', array('class' => 'form-control', 'id' => 'org-reg-date', 'data-date-format' => 'YYYY-MM-DD'));
            echo $form->error($model, 'landline');
            ?>
        </div>
        <div class="form-group">
            <?php
            echo $form->labelEx($model, 'branch_address');
            echo $form->textField($model, 'branch_address', array('class' => 'form-control', 'id' => 'org-renew-date', 'data-date-format' => 'YYYY-MM-DD'));
            echo $form->error($model, 'branch_address');
            ?>
        </div>
        <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-success btn-block')); ?>
    </fieldset>
    <?php $this->endWidget(); ?>
</div>
