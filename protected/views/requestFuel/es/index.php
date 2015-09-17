<?php
/* @var $this RequestFuelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Solicitud de Combustible',
);

$this->menu=array(
	array('label'=>'Crear Solicitud de Combustible', 'url'=>array('create')),
	array('label'=>'Administrar Solicitud de Combustible', 'url'=>array('admin')),
);
?>

<h1>Solicitud de Combustible</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
