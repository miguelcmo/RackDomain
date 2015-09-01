<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	$model->roomName=>array('view','id'=>$model->roomId),
	'Update',
);

$this->menu=array(
	array('label'=>'Back To Room', 'url'=>array('room/view', 'id'=>$model->roomId)),
);
?>

<h1>Update Room <?php echo $model->roomName; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>