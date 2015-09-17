<?php
/* @var $this RequestFuelController */
/* @var $model RequestFuel */

$this->breadcrumbs=array(
	'Solicitudes de Combustible'=>array('index'),
	$model->requestFuelId=>array('view','id'=>$model->requestFuelId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Solicitud de Combustible', 'url'=>array('index')),
	array('label'=>'Crear Solicitud de Combustible', 'url'=>array('create')),
	array('label'=>'Ver Solicitud de Combustible', 'url'=>array('view', 'id'=>$model->requestFuelId)),
	array('label'=>'Administrar Solicitud de Combustible', 'url'=>array('admin')),
);
?>

<h1>Actualizar Solicitud de Combustible <?php echo $model->requestFuelId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>