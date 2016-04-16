<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $model Sysadmin 
 */

$this->breadcrumbs=array(
	'Sysadmins'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sysadmin', 'url'=>array('index')),
	array('label'=>'Create Sysadmin', 'url'=>array('create')),
	array('label'=>'View Sysadmin', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sysadmin', 'url'=>array('admin')),
);
?>

<h1>Update Sysadmin <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>