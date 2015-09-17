<?php
/* @var $this RowController */
/* @var $model Row */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view', 'id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a Sala', 'url'=>array('room/view', 'id'=>$model->room->roomId)),
	array('label'=>'Administrar Fila', 'url'=>array('admin')),
);
?>

<h1>Crear Fila</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>