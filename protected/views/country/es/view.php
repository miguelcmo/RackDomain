<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
	'Países'=>array('index'),
	$model->countryId,
);

$this->menu=array(
	array('label'=>'Listar País', 'url'=>array('index')),
	array('label'=>'Crear País', 'url'=>array('create')),
	array('label'=>'Actualizar País', 'url'=>array('update', 'id'=>$model->countryId)),
	array('label'=>'Eliminar País', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->countryId),'confirm'=>'Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Administrar País', 'url'=>array('admin')),
);
?>

<h1>Ver País <?php echo $model->countryName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'countryId',
		'countryName',
		'countryAbbreviation',
		'Status',
		'Flag',
	),
)); ?>
