<?php
/* @var $this RowController */
/* @var $model Row */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view','id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	//'Rows'=>array('index'),
	$model->rowName=>array('view','id'=>$model->rowId),
	'Update',
);

$this->menu=array(
	//array('label'=>'Back To Room', 'url'=>array('room/view', 'id'=>$model->room->roomId)),
	array('label'=>'Back To Row', 'url'=>array('view', 'id'=>$model->rowId)),
	//array('label'=>'Create Row', 'url'=>array('create', 'rid'=>$model->roomId)),
	//array('label'=>'View Row', 'url'=>array('view', 'id'=>$model->rowId)),
	//array('label'=>'Manage Row', 'url'=>array('admin')),
);
?>

<h1>Update Row <?php echo $model->rowName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>