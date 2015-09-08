<?php
/* @var $this RequestFuelController */
/* @var $model RequestFuel */

$this->breadcrumbs=array(
	'Request Fuels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RequestFuel', 'url'=>array('index')),
	array('label'=>'Manage RequestFuel', 'url'=>array('admin')),
);
?>

<h1>Create Fuel Request</h1>

<?php $this->renderPartial('_form', array('model'=>$model, /*'modelDepartment'=>$modelDepartment*/)); ?>