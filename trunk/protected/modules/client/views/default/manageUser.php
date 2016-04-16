<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$str = '';
foreach ($data as $records) {
    $str .= TR;
    $str .= TD . $records->organization_name . CTD;
    $str .= TD . $records->org_reg_date . CTD;
    $str .= TD . $records->org_renew_date . CTD;
    if ($records->status) {
        $str .= TD.'<div class="btn-group"><a class="btn btn-danger" href="' . Yii::app()->createUrl('organization/default/deactiveOrg', array('id' => $records->id)) . '"><i class="fa fa-fw fa-lock"></i> Deactive</a> <a class="btn btn-primary" href="' . Yii::app()->createUrl('organization/default/update', array('id' => $records->id)) . '"><i class="fa fa-fw fa-pencil"></i> Edit</a></div>'.CTD;
    } else {
        $str .= TD.'<div class="btn-group"><a class="btn btn-success" href="' . Yii::app()->createUrl('organization/default/activeOrg', array('id' => $records->id)) . '"><i class="fa fa-fw fa-unlock-alt"></i> Active</a> <a class="btn btn-primary" href="' . Yii::app()->createUrl('organization/default/update', array('id' => $records->id)) . '"><i class="fa fa-fw fa-pencil"></i> Edit</a></div>'.CTD;
    }
    $str .= CTR;
}
?>
<div class="row wrapper border-bottom white-bg">
    <h2>Manage Organizations</h2>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
    <div class="col-sm-12">
        <?php
        echo COMMONFUNCTION::getFlash();
        ?>
        <div class="table-responsive">
            <table class="table table-inverse table-striped table-bordered table-hover" id="table">
                <thead>
                    <tr>
                        <th>Organization Name</th>
                        <th>Registration Date</th>
                        <th>Renewal Date</th>
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
