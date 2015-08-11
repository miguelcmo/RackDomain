<?php
/* @var $this AttributesChapterController */
/* @var $model AttributesChapter */

$this->breadcrumbs=array(
	'Attributes Chapters'=>array('index'),
	$model->attributeChapterId=>array('view','id'=>$model->attributeChapterId),
	'Update',
);

$this->menu=array(
	array('label'=>'List AttributesChapter', 'url'=>array('index')),
	array('label'=>'Create AttributesChapter', 'url'=>array('create')),
	array('label'=>'View AttributesChapter', 'url'=>array('view', 'id'=>$model->attributeChapterId)),
	array('label'=>'Manage AttributesChapter', 'url'=>array('admin')),
);
?>

<h1>Update AttributesChapter <?php echo $model->attributeChapterId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>