<?php
/* @var $this AttributesController */
/* @var $model Attributes */

$this->breadcrumbs=array(
	'Attributes'=>array('index'),
	$model->attributeId,
);

$this->menu=array(
	array('label'=>'List Attributes', 'url'=>array('index')),
	array('label'=>'Create Attributes', 'url'=>array('create')),
	array('label'=>'Update Attributes', 'url'=>array('update', 'id'=>$model->attributeId)),
	array('label'=>'Delete Attributes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->attributeId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Attributes', 'url'=>array('admin')),
);
?>

<h1>View Attributes #<?php echo $model->attributeId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'attributeId',
		'attributeChapterId',
		'attributeName',
		'attributeDescription',
		'createTime',
		'createUserId',
		'updateTime',
		'updateUserId',
		'Satus',
		'Flag',
	),
)); ?>
