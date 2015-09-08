<?php
/* @var $this RequestFuelController */
/* @var $model RequestFuel */

$this->breadcrumbs=array(
	'Request Fuels'=>array('index'),
	$model->requestFuelId,
);

$this->menu=array(
	array('label'=>'List RequestFuel', 'url'=>array('index')),
	array('label'=>'Create RequestFuel', 'url'=>array('create')),
	array('label'=>'Update RequestFuel', 'url'=>array('update', 'id'=>$model->requestFuelId)),
	array('label'=>'Delete RequestFuel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->requestFuelId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RequestFuel', 'url'=>array('admin')),
);
?>

<h1>View RequestFuel #<?php echo $model->requestFuelId; ?></h1>

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
