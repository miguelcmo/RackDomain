<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	//'Rooms'=>array('index', 'lid'=>$model->location->locationId),
	'Create',
);

$this->menu=array(
	array('label'=>'Back To Location', 'url'=>array('location/view','id'=>$model->location->locationId)),
	//array('label'=>'List Room', 'url'=>array('index', 'lid'=>$model->location->locationId)),
	array('label'=>'Manage Room', 'url'=>array('admin', 'lid'=>$model->location->locationId)),
);
?>

<h1>Create Room</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>