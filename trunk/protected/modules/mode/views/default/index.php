<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $dataProvider CActiveDataProvider 
 */

$this->breadcrumbs=array(
	'Modes',
);

$this->menu=array(
	array('label'=>'Create Mode', 'url'=>array('create')),
	array('label'=>'Manage Mode', 'url'=>array('admin')),
);
?>

<h1>Modes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
