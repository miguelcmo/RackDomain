<?php
/* @var $this PduController */
/* @var $model Pdu */

$this->breadcrumbs=array(
	'Pdus'=>array('index'),
	$model->pduId=>array('view','id'=>$model->pduId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pdu', 'url'=>array('index')),
	array('label'=>'Create Pdu', 'url'=>array('create')),
	array('label'=>'View Pdu', 'url'=>array('view', 'id'=>$model->pduId)),
	array('label'=>'Manage Pdu', 'url'=>array('admin')),
);
?>

<h1>Update Pdu <?php echo $model->pduId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>