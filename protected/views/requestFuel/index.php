<?php
/* @var $this RequestFuelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Request Fuel',
);

$this->menu=array(
	array('label'=>'Create Request Fuel', 'url'=>array('create')),
	array('label'=>'Manage Request Fuel', 'url'=>array('admin')),
);
?>

<h1>Request Fuel</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
