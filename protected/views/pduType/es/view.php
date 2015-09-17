<?php
/* @var $this PduTypeController */
/* @var $model PduType */

$this->breadcrumbs=array(
	'Tipo de Pdu'=>array('index'),
	$model->pduTypeId,
);

$this->menu=array(
	array('label'=>'Listar Tipo de Pdu', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Pdu', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo de Pdu', 'url'=>array('update', 'id'=>$model->pduTypeId)),
	array('label'=>'Eliminar Tipo de Pdu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pduTypeId),'confirm'=>'Esta seguro que desea aliminar este elemento?')),
	array('label'=>'Administrar Tipo de Pdu', 'url'=>array('admin')),
);
?>

<h1>Ver Tipo de PDU <?php echo $model->pduTypeName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pduTypeId',
		'pduTypeName',
		'pduTypeDescription',
		'pduCircuits',
		'createTime',
		'createUserId',
		'updateTime',
		'updateUserId',
		'Status',
		'Flag',
	),
)); ?>
