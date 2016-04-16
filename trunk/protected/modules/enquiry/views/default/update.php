<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $model EnquiryDetail 
 */

$this->breadcrumbs=array(
	'Enquiry Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EnquiryDetail', 'url'=>array('index')),
	array('label'=>'Create EnquiryDetail', 'url'=>array('create')),
	array('label'=>'View EnquiryDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EnquiryDetail', 'url'=>array('admin')),
);
?>

<h1>Update EnquiryDetail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>