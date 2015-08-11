<?php
/* @var $this TestLocationController */
/* @var $model TestLocation */

$this->breadcrumbs=array(
	'Test Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TestLocation', 'url'=>array('index')),
	array('label'=>'Manage TestLocation', 'url'=>array('admin')),
);
?>

<h1>Create TestLocation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>