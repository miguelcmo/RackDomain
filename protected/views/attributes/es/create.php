<?php
/* @var $this AttributesController */
/* @var $model Attributes */

$this->breadcrumbs=array(
	'Atributos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Atributos', 'url'=>array('index')),
	array('label'=>'Administrar Atributos', 'url'=>array('admin')),
);
?>

<h1>Crear Atributos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>