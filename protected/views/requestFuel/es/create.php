<?php
/* @var $this RequestFuelController */
/* @var $model RequestFuel */

$this->breadcrumbs=array(
	'Solicitudes de Combustible'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Solicitud de Combustible', 'url'=>array('index')),
	array('label'=>'Administrar Solicitud de Combustible', 'url'=>array('admin')),
);
?>

<h1>Crear Solicitud de Combustible</h1>

<?php $this->renderPartial('_form', array('model'=>$model, /*'modelDepartment'=>$modelDepartment*/)); ?>