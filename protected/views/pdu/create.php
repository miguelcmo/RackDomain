<?php
/* @var $this PduController */
/* @var $model Pdu */

$this->breadcrumbs=array(
	'Pdus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pdu', 'url'=>array('index')),
	array('label'=>'Manage Pdu', 'url'=>array('admin')),
);
?>

<h1>Create Pdu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>