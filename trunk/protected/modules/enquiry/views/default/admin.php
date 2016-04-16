<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $model EnquiryDetail 
 */

$this->breadcrumbs=array(
	'Enquiry Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EnquiryDetail', 'url'=>array('index')),
	array('label'=>'Create EnquiryDetail', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#enquiry-detail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Enquiry Details</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'enquiry-detail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'first_name',
		'middle_name',
		'last_name',
		'dob',
		'gender',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
