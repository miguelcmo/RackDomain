<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	$model->locationName,
);

$this->menu=array(
	array('label'=>'Back To Locations', 'url'=>array('index')),
	//array('label'=>'Create Location', 'url'=>array('create')),
	array('label'=>'Update Location', 'url'=>array('update', 'id'=>$model->locationId)),
	array('label'=>'Delete Location', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->locationId),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Location', 'url'=>array('admin')),
	array('label'=>'Create Room', 'url'=>array('room/create', 'lid'=>$model->locationId)),
	array('label'=>'Add User to Location', 'url'=>array('adduser', 'lid'=>$model->locationId)),
);
?>

<h1>View Location <?php echo $model->locationName; ?></h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'locationId',
		array(
			'name'=>'cityId',
			'value'=>isset($model->city)?CHtml::encode($model->city->cityName):"unknown"
		),
		array(
			'name'=>'subdivisionId',
			'value'=>isset($model->subdivision)?CHtml::encode($model->subdivision->subdivisionName):"unknown"
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

<br />
<h1>Location Rooms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$roomDataProvider,
	'itemView'=>'/room/_view',
)); ?>
