<?php
/* @var $this PduTypeController */
/* @var $model PduType */

$this->breadcrumbs=array(
	'Pdu Types'=>array('index'),
	$model->pduTypeId,
);

$this->menu=array(
	array('label'=>'List PduType', 'url'=>array('index')),
	array('label'=>'Create PduType', 'url'=>array('create')),
	array('label'=>'Update PduType', 'url'=>array('update', 'id'=>$model->pduTypeId)),
	array('label'=>'Delete PduType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pduTypeId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PduType', 'url'=>array('admin')),
);
?>

<h1>View PduType #<?php echo $model->pduTypeId; ?></h1>

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
