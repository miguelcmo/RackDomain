<?php
/* @var $this RowController */
/* @var $model Row */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view','id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	$model->rowName,
);

$this->menu=array(
	array('label'=>'Volver a Sala', 'url'=>array('room/view', 'id'=>$model->room->roomId)),
	array('label'=>'Actualizar Fila', 'url'=>array('update', 'id'=>$model->rowId)),
	array('label'=>'Eliminar Fila', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rowId, 'rid'=>$model->room->roomId),'confirm'=>'Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Crear Racks', 'url'=>array('rack/create', 'rid'=>$model->rowId)),
	array('label'=>'Ordenar Racks', 'url'=>array('rack/order', 'rid'=>$model->rowId)),
);
?>

<h1>Ver Fila <?php echo $model->rowName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rowName',
		'rowDescription',
	),
)); ?>

<br />
<h1>Racks de la Fila</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$rackDataProvider,
	'itemView'=>'/rack/_view',
	'htmlOptions'=>array('class'=>'list-view-horizontal'),
)); ?>
