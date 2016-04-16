<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$str = '';
foreach ($model as $emp) {
    $str .= TR;
    $str .= TD . $emp->full_name . CTD;
    $str .= TD . $emp->email_id . CTD;
    $str .= TD . RoleService::getRoleName($emp->role) . CTD;
    $str .= TD . BranchesService::getBranchName($emp->branch_id) . CTD;
    $str .= TD . $emp->mobile_no . CTD;
    if (!is_null($emp->resume)) {
        $str .= TD . "<a href='" . Yii::app()->createUrl('temp/download', array('file' => $emp->resume)) . "'><i class='fa fa-fw fa-download'></i></a>" . CTD;
    } else {
        $str .= TD . '&nbsp;' . CTD;
    }
    $edit = "<a href='" . Yii::app()->createUrl('employee/default/update', array('id' => $emp->id)) . "'><i class='fa fa-fw fa-edit'></i></a>";
    if ($emp->status) {
        $link = "<a href='" . Yii::app()->createUrl('employee/default/deactive', array('id' => $emp->id)) . "'><i class='fa fa-fw fa-close'></i></a>";
    } else {
        $link = "<a href='" . Yii::app()->createUrl('employee/default/active', array('id' => $emp->id)) . "'><i class='fa fa-fw fa-check'></i></a>";
    }
    $str .= TD . $edit . $link . CTD;
    $str .= CTR;
}
?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Manage Employee</h3>
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
                        <th>Full Name</th>
                        <th>Email Id</th>
                        <th>Role</th>
                        <th>Branch</th>
                        <th>Mobile No</th>
                        <th>Resume</th>
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
