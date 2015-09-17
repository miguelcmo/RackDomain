<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	'Locaciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a Locación', 'url'=>array('index')),
	array('label'=>'Administrar Locación', 'url'=>array('admin')),
);
?>

<h1>Crear Locación</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>