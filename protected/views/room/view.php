<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	//'Rooms'=>array('index', 'lid'=>$model->location->locationId),
	$model->roomName,
);

$this->menu=array(
	array('label'=>'Back To Location', 'url'=>array('location/view','id'=>$model->location->locationId)),
	//array('label'=>'List Room', 'url'=>array('index', 'lid'=>$model->location->locationId)),
	//array('label'=>'Create Room', 'url'=>array('create', 'lid'=>$model->location->locationId)),
	array('label'=>'Update Room', 'url'=>array('update', 'id'=>$model->roomId)),
	array('label'=>'Delete Room', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->roomId,'lid'=>$model->location->locationId),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Room', 'url'=>array('admin', 'lid'=>$model->location->locationId)),
	array('label'=>'Create Row', 'url'=>array('row/create', 'rid'=>$model->roomId)),
);
?>

<h1>View Room <?php echo $model->roomName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'roomId',
		array(
			'name'=>'locationId',
			'value'=>$model->location->locationName,
		),
		'roomName',
		'roomAlias',
		'roomDescription',
		//'floorLocation',
		//'createTime',
		//'createUserId',
		//'updateTime',
		//'updateUserId',
		//'Status',
		//'Flag',
	),
)); ?>

<br />
<h1>Room Rows</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$rowDataProvider,
	'itemView'=>'/row/_view',
)); ?>
