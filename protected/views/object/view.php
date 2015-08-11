<?php
/* @var $this ObjectController */
/* @var $model Object */

$this->breadcrumbs=array(
	'Objects'=>array('index'),
	$model->objectId,
);

$this->menu=array(
	array('label'=>'List Object', 'url'=>array('index')),
	array('label'=>'Create Object', 'url'=>array('create')),
	array('label'=>'Update Object', 'url'=>array('update', 'id'=>$model->objectId)),
	array('label'=>'Delete Object', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->objectId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Object', 'url'=>array('admin')),
);
?>

<h1>View Object #<?php echo $model->objectId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'objectId',
		'platformId',
		'objectName',
		'objectAlias',
		'objectDescription',
		'createTime',
		'createUserId',
		'updateTime',
		'updateUserId',
		'Status',
		'Flag',
	),
)); ?>
