<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 */
?>
<script src="<?php echo Yii::app()->baseUrl . '/js/registerUser.js' ?>" type="text/javascript"></script>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
    <!--<h2>Admin <i class="fa fa-fw fa-spinner"></i></h2>-->
        <div class="login-panel panel bg-black">
            <div class="panel-heading">
                <h3 class="panel-title">Update <?php echo ucfirst($model->organization_name); ?></h3>
            </div>
            <div class="panel-body">
                <?php echo COMMONFUNCTION::getFlash(); ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'organization-form',
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
                        echo $form->labelEx($model, 'organization_name');
                        echo $form->textField($model, 'organization_name', array('size' => '25', 'maxlength' => 25, 'class' => 'form-control'));
                        echo $form->error($model, 'organization_name');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $form->labelEx($model, 'org_reg_date');
                        echo $form->textField($model, 'org_reg_date', array('class' => 'form-control', 'id' => 'org-reg-date', 'data-date-format' => 'YYYY-MM-DD'));
                        echo $form->error($model, 'org_reg_date');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $form->labelEx($model, 'org_renew_date');
                        echo $form->textField($model, 'org_renew_date', array('class' => 'form-control', 'id' => 'org-renew-date', 'data-date-format' => 'YYYY-MM-DD'));
                        echo $form->error($model, 'org_renew_date');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $form->labelEx($model, 'no_of_branches');
                        echo $form->textField($model, 'no_of_branches', array('class' => 'form-control'));
                        echo $form->error($model, 'no_of_branches');
                        ?>
                    </div>
                    <?php echo CHtml::submitButton('Update Account', array('class' => 'btn btn-success btn-block')); ?>
                </fieldset>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>
