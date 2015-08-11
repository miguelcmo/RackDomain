<?php
/* @var $this ChapterController */
/* @var $model Chapter */

$this->breadcrumbs=array(
	'Chapters'=>array('index'),
	$model->chapterId=>array('view','id'=>$model->chapterId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Chapter', 'url'=>array('index')),
	array('label'=>'Create Chapter', 'url'=>array('create')),
	array('label'=>'View Chapter', 'url'=>array('view', 'id'=>$model->chapterId)),
	array('label'=>'Manage Chapter', 'url'=>array('admin')),
);
?>

<h1>Update Chapter <?php echo $model->chapterId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>