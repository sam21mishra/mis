<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $dataProvider CActiveDataProvider 
 */

$this->breadcrumbs=array(
	'Courses',
);

$this->menu=array(
	array('label'=>'Create Courses', 'url'=>array('create')),
	array('label'=>'Manage Courses', 'url'=>array('admin')),
);
?>

<h1>Courses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>