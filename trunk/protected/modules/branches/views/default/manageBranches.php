<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @since $Id:$
 */
?>

<?php
$str = '';
foreach ($data as $records) {
    $str .= '<tr>';
    $str .= '<td>' . $records->branch_name . '</td>';
    $str .= '<td>' . $records->branch_address . '</td>';
    $str .= '<td>' . $records->landline . '</td>';
    if ($records->branch_status) {
        $str .= '<td><a class="btn btn-danger" href="' . Yii::app()->createUrl('branches/default/deactiveBranch', array('id' => $records->id)) . '">Deactive</a> <a class="btn btn-default" href="' . Yii::app()->createUrl('branches/default/update', array('id' => $records->id)) . '">Edit</a></td>';
    } else {
        $str .= '<td><a class="btn btn-success" href="' . Yii::app()->createUrl('branches/default/activeBranch', array('id' => $records->id)) . '">Active</a> <a class="btn btn-default" href="' . Yii::app()->createUrl('branches/default/update', array('id' => $records->id)) . '">Edit</a></td>';
    }
    $str .= '</tr>';
}
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="heading-text">
            Manage Branches
        </h2>   
        <?php
        echo COMMONFUNCTION::getFlash();
        ?>
        <div class="table-responsive">
            <table class="table table-inverse" id="table">
                <thead>
                    <tr>
                        <th>Branch Name</th>
                        <th>Branch Address</th>
                        <th>Landline No.</th>
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
