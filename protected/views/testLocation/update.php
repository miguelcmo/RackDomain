<?php
/* @var $this TestLocationController */
/* @var $model TestLocation */

$this->breadcrumbs=array(
	'Test Locations'=>array('index'),
	$model->locationId=>array('view','id'=>$model->locationId),
	'Update',
);

$this->menu=array(
	array('label'=>'List TestLocation', 'url'=>array('index')),
	array('label'=>'Create TestLocation', 'url'=>array('create')),
	array('label'=>'View TestLocation', 'url'=>array('view', 'id'=>$model->locationId)),
	array('label'=>'Manage TestLocation', 'url'=>array('admin')),
);
?>

<h1>Update TestLocation <?php echo $model->locationId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>