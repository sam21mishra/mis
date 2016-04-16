<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @since $Id:$
 */
?>
<?php
$str = '';
foreach ($data as $records) {
    $str .= TR;
    $str .= TD . $records->heard_about . CTD;
    $edit = "<a href='" . Yii::app()->createUrl('heardabout/default/update', array('id' => $records->id)) . "'><i class='fa fa-fw fa-edit'></i></a>";
    if ($records->status) {
        $link = "<a href='" . Yii::app()->createUrl('heardabout/default/deactive', array('id' => $records->id)) . "'><i class='fa fa-fw fa-close'></i></a>";
    } else {
        $link = "<a href='" . Yii::app()->createUrl('heardabout/default/active', array('id' => $records->id)) . "'><i class='fa fa-fw fa-check'></i></a>";
    }
    $str .= TD . $edit . $link . CTD;
    $str .= CTR;
}
?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Manage Heard About</h3>
        </div>
        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    echo COMMONFUNCTION::getFlash();
                    ?>
                </div>
            </div>
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th>Heard About</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $str;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

