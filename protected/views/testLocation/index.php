<?php
/* @var $this TestLocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Test Locations',
);

$this->menu=array(
	array('label'=>'Create TestLocation', 'url'=>array('create')),
	array('label'=>'Manage TestLocation', 'url'=>array('admin')),
);
?>

<h1>Test Locations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
