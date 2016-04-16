<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 */
?>

<?php echo COMMONFUNCTION::getFlash(); ?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'sysadmin-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'class' => 'c-t',
        'role' => 'form'
    ),
        ));
?>
<div class="form-group">
    <?php #echo $form->labelEx($model, 'username'); ?>
    <?php echo $form->textField($model, 'username', array('size' => 25, 'maxlength' => 25, 'class' => 'form-control', 'placeholder' => "Username")); ?>
    <?php echo $form->error($model, 'username'); ?>
    <!--<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>-->
</div>
<div class="form-group">
    <?php #echo $form->labelEx($model, 'password'); ?>
    <?php echo $form->passwordField($model, 'password', array('size' => 40, 'maxlength' => 40, 'class' => 'form-control', 'placeholder' => "Password")); ?>
    <?php echo $form->error($model, 'password'); ?>
    <!--<input class="form-control" placeholder="Password" name="password" type="password" value="" required>-->
</div>
<?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary block full-width m-b"')); ?>
<!--<a href="#"><small>Forgot password?</small></a>-->
<!--<p class="text-muted text-center"><small>Do not have an account?</small></p>-->
<!--<a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>-->
<?php $this->endWidget(); ?>
