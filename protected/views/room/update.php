<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	//'Rooms'=>array('index'),
	$model->roomName=>array('view','id'=>$model->roomId),
	'Update',
);

$this->menu=array(
	array('label'=>'Back To Location', 'url'=>array('location/view','id'=>$model->location->locationId)),
	array('label'=>'Back To Room', 'url'=>array('room/view', 'id'=>$model->roomId)),
	//array('label'=>'List Room', 'url'=>array('index')),
	array('label'=>'Create Room', 'url'=>array('create')),
	//array('label'=>'View Room', 'url'=>array('view', 'id'=>$model->roomId)),
	array('label'=>'Manage Room', 'url'=>array('admin')),
);
?>

<h1>Update Room <?php echo $model->roomName; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>