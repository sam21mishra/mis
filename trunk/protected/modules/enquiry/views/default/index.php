<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $dataProvider CActiveDataProvider 
 */

$this->breadcrumbs=array(
	'Enquiry Details',
);

$this->menu=array(
	array('label'=>'Create EnquiryDetail', 'url'=>array('create')),
	array('label'=>'Manage EnquiryDetail', 'url'=>array('admin')),
);
?>

<h1>Enquiry Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
