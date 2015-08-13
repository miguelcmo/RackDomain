<?php
/* @var $this RowController */
/* @var $model Row */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view', 'id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	//'Rows'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Back To Room', 'url'=>array('room/view', 'id'=>$model->room->roomId)),
	//array('label'=>'List Row', 'url'=>array('index')),
	array('label'=>'Manage Row', 'url'=>array('admin')),
);
?>

<h1>Create Row</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>