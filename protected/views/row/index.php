<?php
/* @var $this RowController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rows',
);

$this->menu=array(
	array('label'=>'Create Row', 'url'=>array('create')),
	array('label'=>'Manage Row', 'url'=>array('admin')),
);
?>

<h1>Rows</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
