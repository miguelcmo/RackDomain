<?php
/* @var $this AttributesController */
/* @var $model Attributes */

$this->breadcrumbs=array(
	'Atributos'=>array('index'),
	$model->attributeId=>array('view','id'=>$model->attributeId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Atributos', 'url'=>array('index')),
	array('label'=>'Crear Atributos', 'url'=>array('create')),
	array('label'=>'Ver Atributos', 'url'=>array('view', 'id'=>$model->attributeId)),
	array('label'=>'Administrar Atributos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Atributos <?php echo $model->attributeId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>