<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $model EnquiryDetail 
 */

$this->breadcrumbs=array(
	'Enquiry Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EnquiryDetail', 'url'=>array('index')),
	array('label'=>'Create EnquiryDetail', 'url'=>array('create')),
	array('label'=>'Update EnquiryDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EnquiryDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EnquiryDetail', 'url'=>array('admin')),
);
?>

<h1>View EnquiryDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'middle_name',
		'last_name',
		'dob',
		'gender',
		'aadhaar_no',
		'education',
		'occupation',
		'college_company',
		'mobile_no',
		'parents_contact_no',
		'email_id',
		'address',
		'flat_floor',
		'postalcode',
		'city',
		'area',
		'country',
		'center',
		'enquiry_time',
		'enquiry_date',
		'batch_time',
		'contact_time',
		'form_no',
		'branch_id',
		'org_id',
		'heard_about',
		'mode',
		'handled_by',
		'course_suggested',
		'course_offered',
		'fees',
		'duration',
		'remark',
		'is_enrolled',
		'enquiry_id',
		'enroll_date',
		'is_emi',
		'max_emi_duration',
		'min_duration',
		'max_duration',
	),
)); ?>
