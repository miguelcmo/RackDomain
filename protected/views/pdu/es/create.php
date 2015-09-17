<?php
/* @var $this PduController */
/* @var $model Pdu */

$this->breadcrumbs=array(
	'Pdus'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Pdu', 'url'=>array('index')),
	array('label'=>'Administrar Pdu', 'url'=>array('admin')),
);
?>

<h1>Crear Pdu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>