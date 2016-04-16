<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $model Mode 
 */

$this->breadcrumbs=array(
	'Modes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Mode', 'url'=>array('index')),
	array('label'=>'Create Mode', 'url'=>array('create')),
	array('label'=>'Update Mode', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mode', 'url'=>array('admin')),
);
?>

<h1>View Mode #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mode',
		'org_id',
		'status',
	),
)); ?>
