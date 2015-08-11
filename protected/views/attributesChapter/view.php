<?php
/* @var $this AttributesChapterController */
/* @var $model AttributesChapter */

$this->breadcrumbs=array(
	'Attributes Chapters'=>array('index'),
	$model->attributeChapterId,
);

$this->menu=array(
	array('label'=>'List Attributes Chapter', 'url'=>array('index')),
	array('label'=>'Create Attributes Chapter', 'url'=>array('create')),
	array('label'=>'Update Attributes Chapter', 'url'=>array('update', 'id'=>$model->attributeChapterId)),
	array('label'=>'Delete Attributes Chapter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->attributeChapterId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Attributes Chapter', 'url'=>array('admin')),
	array('label'=>'Create Attribute', 'url'=>array('attributes/create', 'acid'=>$model->attributeChapterId)),
);
?>

<h1>View Attributes Chapter #<?php echo $model->attributeChapterId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'attributeChapterId',
		'attributeChapterName',
		//'createTime',
		//'createUserId',
		//'updateTime',
		//'updateUserId',
	),
)); ?>
