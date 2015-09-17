<?php
/* @var $this PduTypeController */
/* @var $model PduType */

$this->breadcrumbs=array(
	'Tipos de Pdu'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Pdu', 'url'=>array('index')),
	array('label'=>'Administrar Tipo de Pdu', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo de Pdu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>