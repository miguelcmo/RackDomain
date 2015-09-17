<?php
/* @var $this AttributesChapterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Attributes Chapters',
);

$this->menu=array(
	array('label'=>'Create AttributesChapter', 'url'=>array('create')),
	array('label'=>'Manage AttributesChapter', 'url'=>array('admin')),
);
?>

<h1>Attributes Chapters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
