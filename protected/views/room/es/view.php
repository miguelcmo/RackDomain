<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $rowDataProvider Rows in room */
/* @var $pduDataProvider PDUs in room */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	$model->roomName,
);

$this->menu=array(
	array('label'=>'Volver a Locación', 'url'=>array('location/view','id'=>$model->location->locationId)),
	array('label'=>'Actualizar Sala', 'url'=>array('update', 'id'=>$model->roomId)),
	array('label'=>'Eliminar Sala', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->roomId,'lid'=>$model->location->locationId),'confirm'=>'Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Crear Fila', 'url'=>array('row/create', 'rid'=>$model->roomId)),
	array('label'=>'Crear Pdu', 'url'=>array('pdu/create', 'rid'=>$model->roomId)),
);
?>

<h1>Ver Sala <?php echo $model->roomName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'locationId',
			'value'=>$model->location->locationName,
		),
		'roomName',
		'roomAlias',
		'roomDescription',
	),
)); ?>

<br />
<h1>Filas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$rowDataProvider,
	'itemView'=>'/row/_view',
)); ?>

<br />
<h1>PDUs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$pduDataProvider,
	'itemView'=>'/pdu/_view',
)); ?>



