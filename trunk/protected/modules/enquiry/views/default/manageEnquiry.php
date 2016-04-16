<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @since $Id:$
 */
?>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.enquiry.js" type="text/javascript"></script>
<?php
$str = '';
foreach ($model as $data) {
    $str .= TR;
    $str .= TD . $data->first_name . ' ' . $data->last_name . CTD;
    $str .= TD . $data->mobile_no . CTD;
    $str .= TD . $data->enquiry_date . CTD;
    $str .= TD . $data->course_suggested . CTD;
    $str .= TD . $data->course_offered . CTD;
    $str .= TD . $data->fees . CTD;
    $str .= TD . $data->remark . CTD;

    if (!$data->is_enrolled) {
        $admission .= "<a href='" . Yii::app()->createUrl('temp/download', array()) . "' data-toggle='tooltip' title='Convert Into Admission'><i class='fa fa-fw fa-thumbs-up'></i></a>";
    }
    $edit = "<a href='" . Yii::app()->createUrl('enquiry/default/update', array('id' => $data->id)) . "'  data-toggle='tooltip' title='Update '><i class='fa fa-fw fa-edit'></i></a>";
    $log = "<a href='javascript:void(0);' class='followups' data-value='" . $data->enquiry_id . "' data-toggle='tooltip' title='Followup History'><i class='fa fa-fw fa-comments'></i></a>";
    $str .= TD . $admission . $edit . $log . CTD;
    $str .= CTR;
}
?>
<div class="row wrapper border-bottom white-bg">
    <h2>Manage Enquiry</h2>
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
                        <th>Full Name</th>
                        <th>Mobile No</th>
                        <th>Enquiry Date</th>
                        <th>Course Suggested</th>
                        <th>Course Offered</th>
                        <th>Fees</th>
                        <th>Remark</th>
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
    <div class="chat-history-box"></div>
</div>
