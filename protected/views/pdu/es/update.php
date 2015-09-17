<?php
/* @var $this PduController */
/* @var $model Pdu */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view','id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	$model->pduName=>array('view','id'=>$model->pduId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver a Pdu', 'url'=>array('view','id'=>$model->pduId)),
);
?>

<h1>Actualizar Pdu -> <?php echo $model->pduName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>