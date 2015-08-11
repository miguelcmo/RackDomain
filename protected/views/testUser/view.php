<?php
/* @var $this TestUserController */
/* @var $model TestUser */

$this->breadcrumbs=array(
	'Test Users'=>array('index'),
	$model->userId,
);

$this->menu=array(
	array('label'=>'List TestUser', 'url'=>array('index')),
	array('label'=>'Create TestUser', 'url'=>array('create')),
	array('label'=>'Update TestUser', 'url'=>array('update', 'id'=>$model->userId)),
	array('label'=>'Delete TestUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->userId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TestUser', 'url'=>array('admin')),
);
?>

<h1>View TestUser #<?php echo $model->userId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'userId',
		'userName',
	),
)); ?>
