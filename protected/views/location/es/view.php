<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	'Locaciones'=>array('index'),
	$model->locationName,
);

$this->menu=array(
	array('label'=>'Volver a Locación', 'url'=>array('index')),
	array('label'=>'Actualizar Locación', 'url'=>array('update', 'id'=>$model->locationId)),
	array('label'=>'Eliminar Locación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->locationId),'confirm'=>'Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Crear Sala', 'url'=>array('room/create', 'lid'=>$model->locationId)),
	array('label'=>'Agregar Usuario a Locación', 'url'=>array('adduser', 'lid'=>$model->locationId)),
);
?>

<h1>Ver Locación <?php echo $model->locationName; ?></h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'locationId',
		array(
			'name'=>'cityId',
			'value'=>isset($model->city)?CHtml::encode($model->city->cityName):"desconocido"
		),
		array(
			'name'=>'subdivisionId',
			'value'=>isset($model->subdivision)?CHtml::encode($model->subdivision->subdivisionName):"desconocido"
		),
		'locationName',
		'locationAddress',
		'locationNeighborhood',
		/*
		'locationType',
		'locationStatus',
		'locationManager',
		'locationOperator',
		'locationLongitude',
		'locationLatitude',
		'createTime',
		'createUserId',
		'updateTime',
		'updateUserId',
		'Status',
		'Flag',
		*/
	),
)); ?>
<?php echo CHtml::link('Mostrar Locación en Mapas de Google', array('location/map', 'id'=>$model->locationId)); ?>
<br />
<h1>Salas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$roomDataProvider,
	'itemView'=>'/room/_view',
)); ?>
