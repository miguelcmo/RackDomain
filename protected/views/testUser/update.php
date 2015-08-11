<?php
/* @var $this TestUserController */
/* @var $model TestUser */

$this->breadcrumbs=array(
	'Test Users'=>array('index'),
	$model->userId=>array('view','id'=>$model->userId),
	'Update',
);

$this->menu=array(
	array('label'=>'List TestUser', 'url'=>array('index')),
	array('label'=>'Create TestUser', 'url'=>array('create')),
	array('label'=>'View TestUser', 'url'=>array('view', 'id'=>$model->userId)),
	array('label'=>'Manage TestUser', 'url'=>array('admin')),
);
?>

<h1>Update TestUser <?php echo $model->userId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>