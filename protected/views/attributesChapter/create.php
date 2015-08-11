<?php
/* @var $this AttributesChapterController */
/* @var $model AttributesChapter */

$this->breadcrumbs=array(
	'Attributes Chapters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AttributesChapter', 'url'=>array('index')),
	array('label'=>'Manage AttributesChapter', 'url'=>array('admin')),
);
?>

<h1>Create AttributesChapter</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>