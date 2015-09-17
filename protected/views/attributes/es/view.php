<?php
/* @var $this AttributesController */
/* @var $model Attributes */

$this->breadcrumbs=array(
	'Atributos'=>array('index'),
	$model->attributeId,
);

$this->menu=array(
	array('label'=>'Listar Atributos', 'url'=>array('index')),
	array('label'=>'Crear Atributos', 'url'=>array('create')),
	array('label'=>'Actualizar Atributos', 'url'=>array('update', 'id'=>$model->attributeId)),
	array('label'=>'Eliminar Atributos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->attributeId),'confirm'=>'Esta seguro que quiere borrar este elemento?')),
	array('label'=>'Administrar Atributos', 'url'=>array('admin')),
);
?>

<h1>Ver Atributos #<?php echo $model->attributeId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'attributeId',
		'attributeChapterId',
		'attributeName',
		'attributeDescription',
		'createTime',
		'createUserId',
		'updateTime',
		'updateUserId',
		'Satus',
		'Flag',
	),
)); ?>
