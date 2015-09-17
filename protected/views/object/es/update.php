<?php
/* @var $this ObjectController */
/* @var $model Object */

$this->breadcrumbs=array(
	'Objetos'=>array('index'),
	$model->objectId=>array('view','id'=>$model->objectId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Objeto', 'url'=>array('index')),
	array('label'=>'Crear Objeto', 'url'=>array('create')),
	array('label'=>'Ver Objeto', 'url'=>array('view', 'id'=>$model->objectId)),
	array('label'=>'Administrar Objeto', 'url'=>array('admin')),
);
?>

<h1>Actualizar Objeto <?php echo $model->objectName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>