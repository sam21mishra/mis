<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $data Employee 
 */
?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Add Employee</h3>
        </div>
        <div class="panel-body">
            <?php
            $this->renderPartial('_form', array(
                'model' => $model,
                'roles' => $roles,
                'branches' => $branches
            ));
            ?>
        </div>
    </div>
</div>



