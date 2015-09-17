<?php
/* @var $this RequestFuelController */
/* @var $model RequestFuel */

$this->breadcrumbs=array(
	'Solicitudes de Combustible'=>array('index'),
	$model->requestFuelId,
);

$this->menu=array(
	array('label'=>'Listar Solicitud de Combustible', 'url'=>array('index')),
	array('label'=>'Crear Solicitud de Combustible', 'url'=>array('create')),
	array('label'=>'Actualizar Solicitud de Combustible', 'url'=>array('update', 'id'=>$model->requestFuelId)),
	array('label'=>'Eliminar Solicitud de Combustible', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->requestFuelId),'confirm'=>'Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Administrar Solicitud de Combustible ', 'url'=>array('admin')),
);
?>

<h1>Ver Solicitud de Combustible #<?php echo $model->requestFuelId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'requestFuelId',
		array(
			'name'=>'requesterId',
			'value'=>$model->requester->username,
		),
		array(
			'name'=>'requestLocationId',
			'value'=>$model->requestLocation->locationName,
		),
		array(
			'name'=>'onSiteContactId',
			'value'=>$model->onSiteContact->username,
		),
		'fuelQty',
		array(
			'name'=>'fuelTypeId',
			'value'=>$model->fuelType->fuelTypeName,
		),
		'requestFuelNotes',
		//'createTime',
		//'createUserId',
		//'updateTime',
		//'updateUserId',
		//'Status',
		//'Flag',
	),
)); ?>
