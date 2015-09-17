<?php
/* @var $this PlatformController */
/* @var $model Platform */

$this->breadcrumbs=array(
	'Plataformas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Plataforma', 'url'=>array('index')),
	array('label'=>'Administrar Plataforma', 'url'=>array('admin')),
);
?>

<h1>Crear Plataforma</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>