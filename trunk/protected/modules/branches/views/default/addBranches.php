<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 */
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
    <!--<h2>Admin <i class="fa fa-fw fa-spinner"></i></h2>-->
        <div class="login-panel panel bg-black">
            <div class="panel-heading">
                <h3 class="panel-title">Add Branches</h3>
            </div>
            <?php
            $this->renderPartial('_form',array(
                'model' => $model
            ));
            ?>
        </div>
    </div>
</div>
