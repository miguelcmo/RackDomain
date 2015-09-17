<?php
/* @var $this ChapterController */
/* @var $model Chapter */

$this->breadcrumbs=array(
	'Chapters'=>array('index'),
	$model->chapterId,
);

$this->menu=array(
	array('label'=>'List Chapter', 'url'=>array('index')),
	array('label'=>'Create Chapter', 'url'=>array('create')),
	array('label'=>'Update Chapter', 'url'=>array('update', 'id'=>$model->chapterId)),
	array('label'=>'Delete Chapter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->chapterId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Chapter', 'url'=>array('admin')),
);
?>

<h1>View Chapter #<?php echo $model->chapterId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'chapterId',
		'chapterName',
		'chapterDescription',
		//'createTime',
		//'createUserId',
		//'updateTime',
		//'updateUserId',
		//'Status',
		//'Flag',
	),
)); ?>
