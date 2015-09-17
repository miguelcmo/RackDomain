<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Ciudades'=>array('index'),
	$model->cityId,
);

$this->menu=array(
	array('label'=>'Listar Ciudad', 'url'=>array('index')),
	array('label'=>'Crear Ciudad', 'url'=>array('create')),
	array('label'=>'Actualizar Ciudad', 'url'=>array('update', 'id'=>$model->cityId)),
	array('label'=>'Eliminar Ciudad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cityId),'confirm'=>'Esta seguro que quiere eliminar este elemento?')),
	array('label'=>'Administrar Ciudad', 'url'=>array('admin')),
);
?>

<h1>Ver Ciudad <?php echo $model->cityName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cityId',
		'departmentId',
		'cityName',
		'cityLongitude',
		'cityLatitude',
		'Status',
		'Flag',
	),
)); ?>
