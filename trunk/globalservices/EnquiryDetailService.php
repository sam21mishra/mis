<?php

/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @since $Id:$
 */
?>
<?php

class EnquiryDetailService {

    function save($data) {
        $tran = Yii::app()->db->beginTransaction();
        try {
            $model = new EnquiryDetail;
            foreach ($data as $key => $value) {
                $model->$key = $data->$key;
            }
            $model->org_id = getUserInfo('org_id');
            $model->branch_id = getUserInfo('branch_id');
            $model->enquiry_id = $model->form_no = time();
            $model->handled_by = getUserInfo('emp_id');
            $model->save();
            $tran->commit();
            COMMONFUNCTION::setFlash('success', "{$data->first_name}'s details add successfully!");
            return true;
        } catch (Exception $exc) {
            Yii::log($exc, CLogger::LEVEL_ERROR);
            COMMONFUNCTION::setFlash('error', 'Unable to add \'' . $data->first_name . '\'\'s details');
            $tran->rollback();
            return false;
        }
    }
    
    function getEnquiry(){
        $orgId = getUserInfo('org_id');
        $branchId = getUserInfo('branch_id');
        $model = EnquiryDetail::model()->findAllByAttributes(array('org_id'=>$orgId,'branch_id'=>$branchId));
        return $model;
    }

}
