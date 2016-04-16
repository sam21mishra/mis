<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 */
?>

<div class="row wrapper border-bottom white-bg">
    <h2>Register New User</h2>
</div>
<div class="row wrapper wrapper-content">
    <div class="col-sm-12">
        <?php echo COMMONFUNCTION::getFlash(); ?>
    </div>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sysadmin-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ));
    ?>
    <div class="row">
        <div class="form-group col-sm-4">
            <?php
            echo $form->labelEx($model, 'organization_name', array('class' => 'form-title small'));
            echo $form->textField($model, 'organization_name', array('size' => '25', 'maxlength' => 25, 'class' => 'form-control'));
            echo $form->error($model, 'organization_name');
            ?>
        </div>
        <div class="form-group col-sm-4">
            <?php
            echo $form->labelEx($model, 'org_reg_date', array('class' => 'form-title small'));
            echo $form->textField($model, 'org_reg_date', array('class' => 'form-control', 'id' => 'org-reg-date', 'data-date-format' => 'YYYY-MM-DD'));
            echo $form->error($model, 'org_reg_date');
            ?>
        </div>
        <div class="form-group col-sm-4">
            <?php
            echo $form->labelEx($model, 'org_renew_date', array('class' => 'form-title small'));
            echo $form->textField($model, 'org_renew_date', array('class' => 'form-control', 'id' => 'org-renew-date', 'data-date-format' => 'YYYY-MM-DD'));
            echo $form->error($model, 'org_renew_date');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4 b-r">
            <?php
            echo $form->labelEx($model, 'full_name', array('class' => 'form-title small'));
            echo $form->textField($model, 'full_name', array('class' => 'form-control'));
            echo $form->error($model, 'full_name');
            ?>
        </div>
        <div class="form-group col-sm-4">
            <?php
            echo $form->labelEx($model, 'email_id', array('class' => 'form-title small'));
            echo $form->textField($model, 'email_id', array('class' => 'form-control'));
            echo $form->error($model, 'email_id');
            ?>
        </div>
        <div class="form-group col-sm-4">
            <?php
            echo $form->labelEx($model, 'password', array('class' => 'form-title small'));
            echo $form->passwordField($model, 'password', array('class' => 'form-control'));
            echo $form->error($model, 'password');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4">
            <?php
            echo $form->labelEx($model, 'no_of_branches', array('class' => 'form-title small'));
            echo $form->textField($model, 'no_of_branches', array('class' => 'form-control'));
            echo $form->error($model, 'no_of_branches');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="middle">
                <?php echo CHtml::submitButton('Make Account', array('class' => 'btn btn-primary block full-width m-b"')); ?>
            </div>                
        </div>
    </div>

    <?php #echo CHtml::submitButton('Make Account', array('class' => 'btn btn-primary btn-block')); ?>
    <?php $this->endWidget(); ?>
</div>
