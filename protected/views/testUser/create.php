<?php
/* @var $this TestUserController */
/* @var $model TestUser */

$this->breadcrumbs=array(
	'Test Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TestUser', 'url'=>array('index')),
	array('label'=>'Manage TestUser', 'url'=>array('admin')),
);
?>

<h1>Create TestUser</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>