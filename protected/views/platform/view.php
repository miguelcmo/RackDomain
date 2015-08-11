<?php
/* @var $this PlatformController */
/* @var $model Platform */

$this->breadcrumbs=array(
	'Platforms'=>array('index'),
	$model->platformId,
);

$this->menu=array(
	array('label'=>'List Platform', 'url'=>array('index')),
	array('label'=>'Create Platform', 'url'=>array('create')),
	array('label'=>'Update Platform', 'url'=>array('update', 'id'=>$model->platformId)),
	array('label'=>'Delete Platform', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->platformId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Platform', 'url'=>array('admin')),
);
?>

<h1>View Platform #<?php echo $model->platformId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'platformId',
		array(
			'name'=>'vendorId',
			'value'=>isset($model->vendor)?CHtml::encode($model->vendor->vendorName):"Unknown"
		),
		array(
			'name'=>'chapterId',
			'value'=>isset($model->chapter)?CHtml::encode($model->chapter->chapterName):"Unknown"
		),
		'platformName',
		'platformDescription',
		//'platformImagePath',
		//'platformBackgroundTextColor',
		//'platformRackUnits',
		//'createTime',
		//'createUserId',
		//'updateTime',
		//'updateUserId',
		//'Status',
		//'Flag',
	),
)); ?>
