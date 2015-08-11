<?php
/* @var $this RoomController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	'Rooms',
);

$this->menu=array(
	array('label'=>'Back To Location', 'url'=>array('location/view','id'=>$model->location->locationId)),
	array('label'=>'Create Room', 'url'=>array('create')),
	array('label'=>'Manage Room', 'url'=>array('admin')),
);
?>

<h1>Rooms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
