<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $data Sysadmin 
 */

$this->breadcrumbs=array(
	'Sysadmins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sysadmin', 'url'=>array('index')),
	array('label'=>'Manage Sysadmin', 'url'=>array('admin')),
);
?>

<h1>Create Sysadmin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>