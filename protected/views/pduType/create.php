<?php
/* @var $this PduTypeController */
/* @var $model PduType */

$this->breadcrumbs=array(
	'Pdu Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PduType', 'url'=>array('index')),
	array('label'=>'Manage PduType', 'url'=>array('admin')),
);
?>

<h1>Create PduType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>