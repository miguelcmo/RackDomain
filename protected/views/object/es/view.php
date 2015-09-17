<?php
/* @var $this ObjectController */
/* @var $model Object */

$this->breadcrumbs=array(
	$model->rackSpace->rack->row->room->location->locationName=>array('location/view','id'=>$model->rackSpace->rack->row->room->location->locationId),
	$model->rackSpace->rack->row->room->roomName=>array('room/view','id'=>$model->rackSpace->rack->row->room->roomId),
	$model->rackSpace->rack->row->rowName=>array('row/view','id'=>$model->rackSpace->rack->row->rowId),
	$model->rackSpace->rack->rackName=>array('rack/view','id'=>$model->rackSpace->rack->rackId),
	$model->objectName,
);

$this->menu=array(
	array('label'=>'Volver a Rack', 'url'=>array('rack/view','id'=>$model->rackSpace->rackId)),
	array('label'=>'Actualizar Objeto', 'url'=>array('update', 'id'=>$model->objectId)),
	array('label'=>'Eliminar Objeto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->objectId),'confirm'=>'Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Otra Acción', 'url'=>'#'),
);
?>

<h1>Ver Objeto <?php echo $model->objectName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'objectId',
		array(
			'name'=>'platformId',
			'value'=>$model->platform->platformName,
		),
		'objectName',
		'objectAlias',
		'objectDescription',
		//'createTime',
		//'createUserId',
		//'updateTime',
		//'updateUserId',
		//'Status',
		//'Flag',
	),
)); ?>
