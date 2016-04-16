<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 */
?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Update Heard About</h3>
        </div>
        <div class="panel-body">
            <?php
            $this->renderPartial('_form', array(
                'model' => $model,
            ));
            ?>
        </div>
    </div>
</div>



