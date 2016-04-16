<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$str = '';
foreach ($model as $data) {
    $str .= TR;
    $str .= TD . $data->course_name . CTD;
    $str .= TD . $data->min_duration ." Months". CTD;
    $str .= TD . $data->max_duration ." Months". CTD;
    if (!is_null($data->branch_id) && $data->branch_id == getUserInfo('branch_id')) {
        $edit = "<a href='" . Yii::app()->createUrl('courses/default/update', array('id' => $data->id)) . "'><i class='fa fa-fw fa-edit'></i></a>";
    } elseif (getUserInfo('org_id') == $data->org_id && getUserInfo('role') == ADMIN) {
        $edit = "<a href='" . Yii::app()->createUrl('courses/default/update', array('id' => $data->id)) . "'><i class='fa fa-fw fa-edit'></i></a>";
    } else {
        $edit = '&nbsp;';
    }
    if (!is_null($data->branch_id) && $data->branch_id == getUserInfo('branch_id')) {
        if ($data->status) {
            $link = "<a href='" . Yii::app()->createUrl('courses/default/deactive', array('id' => $data->id)) . "'><i class='fa fa-fw fa-close'></i></a>";
        } else {
            $link = "<a href='" . Yii::app()->createUrl('courses/default/active', array('id' => $data->id)) . "'><i class='fa fa-fw fa-check'></i></a>";
        }
    } elseif (getUserInfo('org_id') == $data->org_id && getUserInfo('role') == ADMIN) {
        if ($data->status) {
            $link = "<a href='" . Yii::app()->createUrl('courses/default/deactive', array('id' => $data->id)) . "'><i class='fa fa-fw fa-close'></i></a>";
        } else {
            $link = "<a href='" . Yii::app()->createUrl('courses/default/active', array('id' => $data->id)) . "'><i class='fa fa-fw fa-check'></i></a>";
        }
    } else {
        $link = '&nbsp;';
    }
    $str .= TD . $edit . $link . CTD;
    $str .= CTR;
}
?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Manage Courses</h3>
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
                        <th>Course Name</th>
                        <th>Min Duration</th>
                        <th>Max Duration</th>
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
