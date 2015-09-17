<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	//'Rooms'=>array('index', 'lid'=>$model->location->locationId),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a Locación', 'url'=>array('location/view','id'=>$model->location->locationId)),
	array('label'=>'Administrar Sala', 'url'=>array('admin', 'lid'=>$model->location->locationId)),
);
?>

<h1>Crear Sala</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>