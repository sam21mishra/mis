<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $model Courses 
 */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Courses', 'url'=>array('index')),
	array('label'=>'Create Courses', 'url'=>array('create')),
	array('label'=>'Update Courses', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Courses', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Courses', 'url'=>array('admin')),
);
?>

<h1>View Courses #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'course_name',
		'min_duration',
		'max_duration',
		'org_id',
		'user_id',
		'branch_id',
		'status',
	),
)); ?>
