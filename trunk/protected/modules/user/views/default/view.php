<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $model Sysadmin 
 */

$this->breadcrumbs=array(
	'Sysadmins'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sysadmin', 'url'=>array('index')),
	array('label'=>'Create Sysadmin', 'url'=>array('create')),
	array('label'=>'Update Sysadmin', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sysadmin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sysadmin', 'url'=>array('admin')),
);
?>

<h1>View Sysadmin #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'emp_id',
		'username',
		'password',
	),
)); ?>
